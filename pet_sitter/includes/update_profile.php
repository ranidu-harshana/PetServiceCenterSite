<?php
    include("../../admin/includes/db.php");
    session_start();
    if (isset($_POST['save'])) {
        if(isset($_SESSION['dc_id'])){
            $dc_id = $_SESSION['dc_id'];
            $dc_name = $_POST['dc_name'];
            $dc_email = $_POST['dc_email'];

            $dc_image = $_FILES['dc_image']['name'];
            if ($dc_image == "") {
                $dc_image = $_POST['hidden_image'];
            }else{
                $temp_dc_image = $_FILES['dc_image']['tmp_name'];
                move_uploaded_file($temp_dc_image, "../../login_reg/images/pet_sitters/{$dc_image}");
            }
            
            $dc_address = $_POST['dc_address'];
            $dc_profile_title = $_POST['dc_profile_title'];
            $dc_about = $_POST['dc_about'];
            $dc_mobNo = $_POST['dc_mobNo'];
            $dc_brpp = $_POST['dc_brpp'];
            $dc_petCount = $_POST['dc_petCount'];
            $dc_petType = $_POST['dc_petType'];

            if ($dc_name != "" && $dc_profile_title != "" && $dc_about != "" && $dc_email != "" && $dc_address != "" && $dc_mobNo != "" && $dc_brpp != "" && $dc_petCount != "" && $dc_petType != "") {
                if (filter_var($dc_email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($dc_mobNo) == 11 && ($dc_mobNo[0] . "" . $dc_mobNo[1]) == "94") {
                        $dc_name = mysqli_real_escape_string($connection, $dc_name);
                        $dc_profile_title = mysqli_real_escape_string($connection, $dc_profile_title);
                        $dc_email = mysqli_real_escape_string($connection, $dc_email);
                        $dc_address = mysqli_real_escape_string($connection, $dc_address);
                        $dc_image = mysqli_real_escape_string($connection, $dc_image);
                        $dc_about = mysqli_real_escape_string($connection, $dc_about);

                        $query = "UPDATE pet_sitter SET dc_name = '{$dc_name}', dc_email = '{$dc_email}', dc_address = '{$dc_address}', dc_profile_title = '{$dc_profile_title}', dc_about = '{$dc_about}', dc_image = '{$dc_image}', dc_mobNo = '{$dc_mobNo}', dc_brpp = '{$dc_brpp}', dc_petCount = '{$dc_petCount}', dc_petType = '{$dc_petType}' WHERE dc_id = {$dc_id}";
                        $result = mysqli_query($connection, $query);
                        if($result){
                            header("Location: ../profile.php?dc_state=success");
                        }else{
                            // die("ERR " . mysqli_error($connection));
                            header("Location: ../profile.php?dc_state=failed");
                        }
                    }else{
                        header("Location: ../profile.php?dc_state=mob_num_err");
                    }
                }else{
                    header("Location: ../profile.php?dc_state=invalid_mail");
                }
            }else{
                header("Location: ../profile.php?dc_state=required");
            }
        }else{
            header("Location: ../../login_reg/login.php");
        }
    }