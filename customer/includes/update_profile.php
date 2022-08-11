<?php
    include("../../admin/includes/db.php");
    session_start();
    if (isset($_POST['save'])) {
        if(isset($_SESSION['customer_id'])){
            $customer_id = $_SESSION['customer_id'];
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];

            $customer_image = $_FILES['customer_image']['name'];
            if ($customer_image == "") {
                $customer_image = $_POST['hidden_image'];
            }else{
                $temp_customer_image = $_FILES['customer_image']['tmp_name'];
                move_uploaded_file($temp_customer_image, "../../login_reg/images/customers/{$customer_image}");
            }
            
            $customer_address = $_POST['customer_address'];
            $gender = $_POST['gender'];
            $customer_mobile = $_POST['customer_mobile'];

            if ($customer_name != "" && $gender != "" && $customer_mobile != "" && $customer_email != "" && $customer_address != "") {
                if (filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
                    if(strlen($customer_mobile) == 11 && ($customer_mobile[0] . "" . $customer_mobile[1]) == "94") {
                        $customer_name = mysqli_real_escape_string($connection, $customer_name);
                        $gender = mysqli_real_escape_string($connection, $gender);
                        $customer_email = mysqli_real_escape_string($connection, $customer_email);
                        $customer_address = mysqli_real_escape_string($connection, $customer_address);
                        $customer_image = mysqli_real_escape_string($connection, $customer_image);
                        $customer_mobile = mysqli_real_escape_string($connection, $customer_mobile);

                        $query = "UPDATE customer SET customer_name = '{$customer_name}', customer_email = '{$customer_email}', customer_address = '{$customer_address}', gender = {$gender}, customer_mobile = '{$customer_mobile}', customer_image = '{$customer_image}' WHERE customer_id = {$customer_id}";
                        $result = mysqli_query($connection, $query);
                        if($result){
                            header("Location: ../profile.php?customer_state=success");
                        }else{
                            header("Location: ../profile.php?customer_state=failed");
                        }
                    }else{
                        header("Location: ../profile.php?state=mob_num_err");
                    }
                }else{
                    header("Location: ../profile.php?customer_state=invalid_mail");
                }
            }else{
                header("Location: ../profile.php?customer_state=required");
            }
        }else{
            header("Location: ../../login_reg/login.php");
        }
    }