<?php
    include("../../admin/includes/db.php");
    session_start();
    if (isset($_POST['save'])) {
        if(isset($_SESSION['ps_id'])){
            $ps_id = $_SESSION['ps_id'];
            $ps_name = $_POST['ps_name'];
            $ps_email = $_POST['ps_email'];

            $ps_image = $_FILES['ps_image']['name'];
            if ($ps_image == "") {
                $ps_image = $_POST['hidden_image'];
            }else{
                $temp_ps_image = $_FILES['ps_image']['tmp_name'];
                move_uploaded_file($temp_ps_image, "../../login_reg/images/pet_shops/{$ps_image}");
            }
            
            $ps_address = $_POST['ps_address'];
            $ps_profile_title = $_POST['ps_profile_title'];
            $ps_about = $_POST['ps_about'];
            $ps_mobNo = $_POST['ps_mobNo'];
            $ps_brpp = $_POST['ps_brpp'];
            $ps_petCount = $_POST['ps_petCount'];
            $ps_petType = $_POST['ps_petType'];

            if ($ps_name != "" && $ps_profile_title != "" && $ps_about != "" && $ps_email != "" && $ps_address != "" && $ps_mobNo != "" && $ps_brpp != "" && $ps_petCount != "" && $ps_petType != "") {
                if (filter_var($ps_email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($ps_mobNo) == 11 && ($ps_mobNo[0] . "" . $ps_mobNo[1]) == "94") {
                        $ps_name = mysqli_real_escape_string($connection, $ps_name);
                        $ps_profile_title = mysqli_real_escape_string($connection, $ps_profile_title);
                        $ps_email = mysqli_real_escape_string($connection, $ps_email);
                        $ps_address = mysqli_real_escape_string($connection, $ps_address);
                        $ps_image = mysqli_real_escape_string($connection, $ps_image);
                        $ps_about = mysqli_real_escape_string($connection, $ps_about);

                        $query = "UPDATE pet_shop SET ps_name = '{$ps_name}', ps_email = '{$ps_email}', ps_address = '{$ps_address}', ps_profile_title = '{$ps_profile_title}', ps_about = '{$ps_about}', ps_image = '{$ps_image}', ps_mobNo = '{$ps_mobNo}', ps_brpp = '{$ps_brpp}', ps_petCount = '{$ps_petCount}', ps_petType = '{$ps_petType}' WHERE ps_id = {$ps_id}";
                        $result = mysqli_query($connection, $query);
                        if($result){
                            header("Location: ../profile.php?ps_state=success");
                        }else{
                            // die("ERR " . mysqli_error($connection));
                            header("Location: ../profile.php?ps_state=failed");
                        }
                    }else{
                        header("Location: ../profile.php?ps_state=mob_num_err");
                    }
                }else{
                    header("Location: ../profile.php?ps_state=invalid_mail");
                }
            }else{
                header("Location: ../profile.php?ps_state=required");
            }
        }else{
            header("Location: ../../login_reg/login.php");
        }
    }