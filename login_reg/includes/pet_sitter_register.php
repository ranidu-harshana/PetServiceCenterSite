<?php
    include("../../admin/includes/db.php");

    if (isset($_POST['register'])) {
        $lat = $_POST['lat'];
        $long = $_POST['long'];

        $dc_name = $_POST['dc_name'];
        $dc_email = $_POST['dc_email'];
        $dc_profile_title = $_POST['dc_profile_title'];
        $dc_about = $_POST['dc_about'];
        $dc_address = $_POST['dc_address'];
        $dc_mobNo = $_POST['dc_mobNo'];

        $dc_image = $_FILES['dc_image']['name'];
        $temp_dc_image = $_FILES['dc_image']['tmp_name'];
        
        move_uploaded_file($temp_dc_image, "../images/pet_sitters/{$dc_image}");

        $dc_brpp = $_POST['dc_brpp'];
        $dc_petCount = $_POST['dc_petCount'];
        $dc_petType = $_POST['dc_petType'];
        $dc_password = $_POST['dc_password'];
        $dc_cpassword = $_POST['dc_cpassword'];

        if (!empty($dc_name) && !empty($dc_email) && !empty($dc_profile_title) && !empty($dc_about) && !empty($dc_address) && !empty($dc_mobNo) && !empty($dc_image) && !empty($dc_brpp) && !empty($dc_petCount) && !empty($dc_petType) && !empty($dc_password)) {
            if($lat != '' && $long != ''){
                if (filter_var($dc_email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($dc_mobNo) == 11 && ($dc_mobNo[0] . "" . $dc_mobNo[1]) == "94") {
                        if ($dc_password === $dc_cpassword) {
                            if (strlen($dc_password) > 8) {
                                if (preg_match("/[0-9]/", $dc_password)) {
                                    if (preg_match("/[A-Z]/", $dc_password)) {
                                        if (preg_match("/[a-z]/", $dc_password)) {
                                            $dc_name = mysqli_real_escape_string($connection, $dc_name);
                                            $dc_email = mysqli_real_escape_string($connection, $dc_email);
                                            $dc_about = mysqli_real_escape_string($connection, $dc_about);
                                            $dc_address = mysqli_real_escape_string($connection, $dc_address);
                                            $dc_mobNo = mysqli_real_escape_string($connection, $dc_mobNo);
                                            $dc_image = mysqli_real_escape_string($connection, $dc_image);
                                            $dc_brpp = mysqli_real_escape_string($connection, $dc_brpp);
                                            $dc_petCount = mysqli_real_escape_string($connection, $dc_petCount);
                                            $dc_petType = mysqli_real_escape_string($connection, $dc_petType);
                                            $dc_password = mysqli_real_escape_string($connection, $dc_password);

                                            $dc_password = password_hash($dc_password, PASSWORD_BCRYPT, array('cost' => 12));
                                            $query = "INSERT INTO pet_sitter (dc_name, dc_email, dc_profile_title, dc_about, dc_address, dc_mobNo, dc_image, dc_brpp, dc_petCount, dc_petType, dc_password, dc_longitude, dc_latitude) VALUES ('{$dc_name}', '{$dc_email}', '{$dc_profile_title}', '{$dc_about}', '{$dc_address}', '{$dc_mobNo}', '{$dc_image}', {$dc_brpp}, {$dc_petCount}, '{$dc_petType}', '{$dc_password}', {$long}, {$lat})";
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