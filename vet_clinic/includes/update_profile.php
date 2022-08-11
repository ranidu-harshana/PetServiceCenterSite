<?php
    include("../../admin/includes/db.php");
    session_start();
    if (isset($_POST['save'])) {
        if(isset($_SESSION['vc_id'])){
            $vc_id = $_SESSION['vc_id'];
            $vc_name = $_POST['vc_name'];
            $vc_email = $_POST['vc_email'];

            $vc_image = $_FILES['vc_image']['name'];
            if ($vc_image == "") {
                $vc_image = $_POST['hidden_image'];
            }else{
                $temp_vc_image = $_FILES['vc_image']['tmp_name'];
                move_uploaded_file($temp_vc_image, "../../login_reg/images/vet_clinics/{$vc_image}");
            }
            
            $vc_address = $_POST['vc_address'];
            $vc_profile_title = $_POST['vc_profile_title'];
            $vc_about = $_POST['vc_about'];
            $vc_mobNo = $_POST['vc_mobNo'];
            $vc_brpp = $_POST['vc_brpp'];
            $vc_petCount = $_POST['vc_petCount'];
            $vc_petType = $_POST['vc_petType'];

            if ($vc_name != "" && $vc_profile_title != "" && $vc_about != "" && $vc_email != "" && $vc_address != "" && $vc_mobNo != "" && $vc_brpp != "" && $vc_petCount != "" && $vc_petType != "") {
                if (filter_var($vc_email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($vc_mobNo) == 11 && ($vc_mobNo[0] . "" . $vc_mobNo[1]) == "94") {
                        $vc_name = mysqli_real_escape_string($connection, $vc_name);
                        $vc_profile_title = mysqli_real_escape_string($connection, $vc_profile_title);
                        $vc_email = mysqli_real_escape_string($connection, $vc_email);
                        $vc_address = mysqli_real_escape_string($connection, $vc_address);
                        $vc_image = mysqli_real_escape_string($connection, $vc_image);
                        $vc_about = mysqli_real_escape_string($connection, $vc_about);

                        $query = "UPDATE vet_clinic SET vc_name = '{$vc_name}', vc_email = '{$vc_email}', vc_address = '{$vc_address}', vc_profile_title = '{$vc_profile_title}', vc_about = '{$vc_about}', vc_image = '{$vc_image}', vc_mobNo = '{$vc_mobNo}', vc_brpp = '{$vc_brpp}', vc_petCount = '{$vc_petCount}', vc_petType = '{$vc_petType}' WHERE vc_id = {$vc_id}";
                        $result = mysqli_query($connection, $query);
                        if($result){
                            header("Location: ../profile.php?vc_state=success");
                        }else{
                            // die("ERR " . mysqli_error($connection));
                            header("Location: ../profile.php?vc_state=failed");
                        }
                    }else{
                        header("Location: ../profile.php?vc_state=mob_num_err");
                    }
                }else{
                    header("Location: ../profile.php?vc_state=invalid_mail");
                }
            }else{
                header("Location: ../profile.php?vc_state=required");
            }
        }else{
            header("Location: ../../login_reg/login.php");
        }
    }