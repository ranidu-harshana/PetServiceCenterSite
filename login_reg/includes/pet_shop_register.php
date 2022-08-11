<?php
    include("../../admin/includes/db.php");

    if (isset($_POST['register'])) {
        $lat = $_POST['lat'];
        $long = $_POST['long'];

        $ps_name = $_POST['ps_name'];
        $ps_email = $_POST['ps_email'];
        $ps_profile_title = $_POST['ps_profile_title'];
        $ps_about = $_POST['ps_about'];
        $ps_address = $_POST['ps_address'];
        $ps_mobNo = $_POST['ps_mobNo'];

        $ps_image = $_FILES['ps_image']['name'];
        $temp_ps_image = $_FILES['ps_image']['tmp_name'];
        
        move_uploaded_file($temp_ps_image, "../images/pet_shops/{$ps_image}");

        $ps_brpp = $_POST['ps_brpp'];
        $ps_petCount = $_POST['ps_petCount'];
        $ps_petType = $_POST['ps_petType'];
        $ps_password = $_POST['ps_password'];
        $ps_cpassword = $_POST['ps_cpassword'];

        if (!empty($ps_name) && !empty($ps_email) && !empty($ps_profile_title) && !empty($ps_about) && !empty($ps_address) && !empty($ps_mobNo) && !empty($ps_image) && !empty($ps_brpp) && !empty($ps_petCount) && !empty($ps_petType) && !empty($ps_password)) {
            if($lat != '' && $long != ''){
                if(strlen($ps_mobNo) == 11 && ($ps_mobNo[0] . "" . $ps_mobNo[1]) == "94") {
                    if (filter_var($ps_email, FILTER_VALIDATE_EMAIL)) {
                        if ($ps_password === $ps_cpassword) {
                            if (strlen($ps_password) > 8) {
                                if (preg_match("/[0-9]/", $ps_password)) {
                                    if (preg_match("/[A-Z]/", $ps_password)) {
                                        if (preg_match("/[a-z]/", $ps_password)) {
                                            $ps_name = mysqli_real_escape_string($connection, $ps_name);
                                            $ps_email = mysqli_real_escape_string($connection, $ps_email);
                                            $ps_about = mysqli_real_escape_string($connection, $ps_about);
                                            $ps_address = mysqli_real_escape_string($connection, $ps_address);
                                            $ps_mobNo = mysqli_real_escape_string($connection, $ps_mobNo);
                                            $ps_image = mysqli_real_escape_string($connection, $ps_image);
                                            $ps_brpp = mysqli_real_escape_string($connection, $ps_brpp);
                                            $ps_petCount = mysqli_real_escape_string($connection, $ps_petCount);
                                            $ps_petType = mysqli_real_escape_string($connection, $ps_petType);
                                            $ps_password = mysqli_real_escape_string($connection, $ps_password);

                                            $ps_password = password_hash($ps_password, PASSWORD_BCRYPT, array('cost' => 12));
                                            $query = "INSERT INTO pet_shop (ps_name, ps_email, ps_profile_title, ps_about, ps_address, ps_mobNo, ps_image, ps_brpp, ps_petCount, ps_petType, ps_password, ps_longitude, ps_latitude) VALUES ('{$ps_name}', '{$ps_email}', '{$ps_profile_title}', '{$ps_about}', '{$ps_address}', '{$ps_mobNo}', '{$ps_image}', {$ps_brpp}, {$ps_petCount}, '{$ps_petType}', '{$ps_password}', {$long}, {$lat})";
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
                        header("Location: ../register.php?state=invalid_mail");
                    }
                }else{
                    header("Location: ../register.php?state=mob_num_err");
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