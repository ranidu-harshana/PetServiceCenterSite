<?php
    include("../../admin/includes/db.php");

    if (isset($_POST['register'])) {
        $lat = $_POST['lat'];
        $long = $_POST['long'];

        $vc_name = $_POST['vc_name'];
        $vc_email = $_POST['vc_email'];
        $vc_profile_title = $_POST['vc_profile_title'];
        $vc_about = $_POST['vc_about'];
        $vc_address = $_POST['vc_address'];
        $vc_mobNo = $_POST['vc_mobNo'];

        $vc_image = $_FILES['vc_image']['name'];
        $temp_vc_image = $_FILES['vc_image']['tmp_name'];
        
        move_uploaded_file($temp_vc_image, "../images/vet_clinics/{$vc_image}");

        $vc_brpp = $_POST['vc_brpp'];
        $vc_petCount = $_POST['vc_petCount'];
        $vc_petType = $_POST['vc_petType'];
        $vc_password = $_POST['vc_password'];
        $vc_cpassword = $_POST['vc_cpassword'];

        if (!empty($vc_name) && !empty($vc_email) && !empty($vc_profile_title) && !empty($vc_about) && !empty($vc_address) && !empty($vc_mobNo) && !empty($vc_image) && !empty($vc_brpp) && !empty($vc_petCount) && !empty($vc_petType) && !empty($vc_password)) {
            if($lat != '' && $long != ''){
                if (filter_var($vc_email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($vc_mobNo) == 11 && ($vc_mobNo[0] . "" . $vc_mobNo[1]) == "94") {
                        if ($vc_password === $vc_cpassword) {
                            if (strlen($vc_password) > 8) {
                                if (preg_match("/[0-9]/", $vc_password)) {
                                    if (preg_match("/[A-Z]/", $vc_password)) {
                                        if (preg_match("/[a-z]/", $vc_password)) {
                                            $vc_name = mysqli_real_escape_string($connection, $vc_name);
                                            $vc_email = mysqli_real_escape_string($connection, $vc_email);
                                            $vc_about = mysqli_real_escape_string($connection, $vc_about);
                                            $vc_address = mysqli_real_escape_string($connection, $vc_address);
                                            $vc_mobNo = mysqli_real_escape_string($connection, $vc_mobNo);
                                            $vc_image = mysqli_real_escape_string($connection, $vc_image);
                                            $vc_brpp = mysqli_real_escape_string($connection, $vc_brpp);
                                            $vc_petCount = mysqli_real_escape_string($connection, $vc_petCount);
                                            $vc_petType = mysqli_real_escape_string($connection, $vc_petType);
                                            $vc_password = mysqli_real_escape_string($connection, $vc_password);

                                            $vc_password = password_hash($vc_password, PASSWORD_BCRYPT, array('cost' => 12));
                                            $query = "INSERT INTO vet_clinic (vc_name, vc_email, vc_profile_title, vc_about, vc_address, vc_mobNo, vc_image, vc_brpp, vc_petCount, vc_petType, vc_password, vc_longitude, vc_latitude) VALUES ('{$vc_name}', '{$vc_email}', '{$vc_profile_title}', '{$vc_about}', '{$vc_address}', '{$vc_mobNo}', '{$vc_image}', {$vc_brpp}, {$vc_petCount}, '{$vc_petType}', '{$vc_password}', {$long}, {$lat})";
                                            $result = mysqli_query($connection, $query);
                                            if($result){
                                                header("Location: ../login.php?state=success");
                                            }else{
                                                header("Location: ../register.php?state=failed");
                                            }
                                        }else {
                                            header("Location: ../register.php?state=invalid_pass");
                                        }
                                    }else {
                                        header("Location: ../register.php?state=invalid_pass");
                                    }
                                }else {
                                    header("Location: ../register.php?state=invalid_pass");
                                }
                            }else {
                                header("Location: ../register.php?state=invalid_pass");
                            }
                        }else{
                            header("Location: ../register.php?state=mismatch");
                        }
                    }else{
                        header("Location: ../register.php?state=mob_num_err");
                    }
                }else{
                    header("Location: ../register.php?state=invalid_mail");
                }
            }else{
                header("Location: ../register.php?state=allow_location");
            }
        }else{
            header("Location: ../register.php?state=required");
        }
    }else{
        header("Location: ../register.php?state=failed");
    }