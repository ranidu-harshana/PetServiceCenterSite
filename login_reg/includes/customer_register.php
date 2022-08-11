<?php
    include("../../admin/includes/db.php");

    if (isset($_POST['register'])) {
        $lat = $_POST['lat'];
        $long = $_POST['long'];

        $customer_name = $_POST['customer_name'];
        $gender = $_POST['gender'];
        $customer_mobile = $_POST['customer_mobile'];
        $customer_email = $_POST['customer_email'];

        $customer_image = $_FILES['customer_image']['name'];
        $temp_customer_image = $_FILES['customer_image']['tmp_name'];
        
        move_uploaded_file($temp_customer_image, "../images/customers/{$customer_image}");

        $customer_address = $_POST['customer_address'];
        $customer_password = $_POST['customer_password'];
        $customer_cpassword = $_POST['customer_cpassword'];

        if (!empty($customer_name) && !empty($gender) && !empty($customer_mobile) && !empty($customer_email) && !empty($customer_address) && !empty($customer_password) && !empty($customer_cpassword) && !empty($customer_image)) {
            if($lat != '' && $long != ''){
                if (filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($customer_mobile) == 11 && ($customer_mobile[0] . "" . $customer_mobile[1]) == "94") {
                        if ($customer_password === $customer_cpassword) {
                            if (strlen($customer_password) > 8) {
                                if (preg_match("/[0-9]/", $customer_password)) {
                                    if (preg_match("/[A-Z]/", $customer_password)) {
                                        if (preg_match("/[a-z]/", $customer_password)) {
                                            $customer_name = mysqli_real_escape_string($connection, $customer_name);
                                            $gender = mysqli_real_escape_string($connection, $gender);
                                            $customer_email = mysqli_real_escape_string($connection, $customer_email);
                                            $customer_address = mysqli_real_escape_string($connection, $customer_address);
                                            $customer_password = mysqli_real_escape_string($connection, $customer_password);
                                            $customer_image = mysqli_real_escape_string($connection, $customer_image);
                                            $customer_mobile = mysqli_real_escape_string($connection, $customer_mobile);

                                            $customer_password = password_hash($customer_password, PASSWORD_BCRYPT, array('cost' => 12));
                                            $query = "INSERT INTO customer (customer_name, customer_email, customer_address, gender, customer_mobile, customer_image, customer_longitude, customer_latitude, customer_password) VALUES ('{$customer_name}', '{$customer_email}', '{$customer_address}', {$gender}, '{$customer_mobile}', '{$customer_image}', '{$long}', '{$lat}', '{$customer_password}')";
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