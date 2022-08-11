<?php
    include("../../admin/includes/db.php");

    $fake = $_POST['fake'];
    if ($fake == 1) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $account_type = $_POST['account_type'];
        $lat = $_POST['lat'];
        $long = $_POST['long'];
        if($account_type == 1){
            $customer_email = mysqli_real_escape_string($connection, $email);
            $customer_password = mysqli_real_escape_string($connection, $password);

            $query = "SELECT * FROM customer WHERE customer_email = '{$customer_email}'";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                header("Location: login.php?user_add=wrong_credentials");
            }else if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $db_customer_id = $row['customer_id'];
                    $db_customer_email = $row['customer_email'];
                    $db_customer_name = $row['customer_name'];
                    $db_customer_password = $row['customer_password'];

                }

                if($customer_email === $db_customer_email && password_verify($customer_password, $db_customer_password)){
                    if($lat != '' && $long != ''){
                        session_start();
                        $_SESSION['customer_id'] = $db_customer_id;
                        $_SESSION['customer_name'] = $db_customer_name;
                        
                        $query = "UPDATE customer SET customer_longitude = '{$long}', customer_latitude = '{$lat}' WHERE customer_id = {$db_customer_id}";
                        mysqli_query($connection, $query);
                        echo '
                            <script>
                                window.history.pushState({"html":"response.html","pageTitle":"response.pageTitle"},"", "../"); 
                                location.reload()
                            </script>';
                    }else{
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Please Allow the Location!.
                            </div>
                        <?php
                    }
                }else{
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Username or Password is wrong!.
                        </div>
                    <?php
                }
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        Username or Password is wrong!.
                    </div>
                <?php
            }
        }elseif ($account_type == 2) {
            $ps_email = mysqli_real_escape_string($connection, $email);
            $ps_password = mysqli_real_escape_string($connection, $password);

            $query = "SELECT * FROM pet_shop WHERE ps_email = '{$ps_email}'";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                header("Location: login.php?user_add=wrong_credentials");
            }else if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $db_ps_id = $row['ps_id'];
                    $db_ps_email = $row['ps_email'];
                    $db_ps_password = $row['ps_password'];
                    $db_ps_name = $row['ps_name'];
                }

                if($ps_email === $db_ps_email && password_verify($ps_password, $db_ps_password)){
                    session_start();
                    $_SESSION['ps_id'] = $db_ps_id;
                    $_SESSION['ps_name'] = $db_ps_name;
                    
                    echo '
                        <script>
                            window.history.pushState({"html":"response.html","pageTitle":"response.pageTitle"},"", "../pet_shop/profile.php"); 
                            location.reload()
                        </script>';
                }else{
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Username or Password is wrong!.
                        </div>
                    <?php
                }
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        Username or Password is wrong!.
                    </div>
                <?php
            }
        }elseif ($account_type == 3) {
            $vc_email = mysqli_real_escape_string($connection, $email);
            $vc_password = mysqli_real_escape_string($connection, $password);

            $query = "SELECT * FROM vet_clinic WHERE vc_email = '{$vc_email}'";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                header("Location: login.php?user_add=wrong_credentials");
            }else if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $db_vc_id = $row['vc_id'];
                    $db_vc_email = $row['vc_email'];
                    $db_vc_password = $row['vc_password'];
                    $db_vc_name = $row['vc_name'];
                }

                if($vc_email === $db_vc_email && password_verify($vc_password, $db_vc_password)){
                    session_start();
                    $_SESSION['vc_id'] = $db_vc_id;
                    $_SESSION['vc_name'] = $db_vc_name;
                    
                    echo '
                        <script>
                            window.history.pushState({"html":"response.html","pageTitle":"response.pageTitle"},"", "../vet_clinic/profile.php"); 
                            location.reload()
                        </script>';
                }else{
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Username or Password is wrong!.
                        </div>
                    <?php
                }
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        Username or Password is wrong!.
                    </div>
                <?php
            }
        }elseif ($account_type == 4) {
            $dc_email = mysqli_real_escape_string($connection, $email);
            $dc_password = mysqli_real_escape_string($connection, $password);

            $query = "SELECT * FROM pet_sitter WHERE dc_email = '{$dc_email}'";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                header("Location: login.php?user_add=wrong_credentials");
            }else if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $db_dc_id = $row['dc_id'];
                    $db_dc_email = $row['dc_email'];
                    $db_dc_password = $row['dc_password'];
                    $db_dc_name = $row['dc_name'];
                }

                if($dc_email === $db_dc_email && password_verify($dc_password, $db_dc_password)){
                    session_start();
                    $_SESSION['dc_id'] = $db_dc_id;
                    $_SESSION['dc_name'] = $db_dc_name;
                    
                    echo '
                        <script>
                            window.history.pushState({"html":"response.html","pageTitle":"response.pageTitle"},"", "../pet_sitter/profile.php"); 
                            location.reload()
                        </script>';
                }else{
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Username or Password is wrong!.
                        </div>
                    <?php
                }
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        Username or Password is wrong!.
                    </div>
                <?php
            }
        }else{
            ?>
                <div class="alert alert-danger" role="alert">
                    Invalid Account Type!.
                </div>
            <?php
        }
    }