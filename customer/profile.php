<?php include("includes/header.php"); ?>
    <?php include("includes/navigation.php"); ?>

        <?php
            if (isset($_SESSION['customer_id'])) {
                $customer_id = $_SESSION['customer_id'];
                $query = "SELECT * FROM customer WHERE customer_id = {$customer_id}";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                $customer_name = $row['customer_name'];
                $customer_email = $row['customer_email'];
                $customer_image = $row['customer_image'];
                $customer_address = $row['customer_address'];
                $gender = $row['gender'];
                $customer_mobile = $row['customer_mobile'];
            }
        ?>
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">User Profile</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2" style="background-color: white; border:1px solid #7c7c7c">
                        <form action="includes/update_profile.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
                                    <div class="product-thumbnail">
                                        <img src="../login_reg/images/customers/<?php echo $customer_image?>" class="img-thumbnail img-fluid" alt="">
                                    </div>
                                </div>
                            </div><br>
                            <?php 
                                if (isset($_GET['customer_state'])) {
                                    $msg = $_GET['customer_state'];
                                    if ($msg == 'success') {
                                        echo "<div class='alert alert-success' role='alert'>";
                                        echo    "Save Details Successfully!.";
                                        echo "</div>";
                                    }else if ($msg == 'failed') {
                                        echo "<div class='alert alert-danger' role='alert'>";
                                        echo    "Save Details Failed!.";
                                        echo "</div>";
                                    }else if ($msg == 'invalid_mail') {
                                        echo "<div class='alert alert-warning' role='alert'>";
                                        echo    "Invalid Mail!.";
                                        echo "</div>";
                                    }else if ($msg == 'required') {
                                        echo "<div class='alert alert-warning' role='alert'>";
                                        echo    "Required Field!.";
                                        echo "</div>";
                                    }else if ($msg == 'mob_num_err') {
                                        echo "<div class='alert alert-warning' role='alert'>";
                                        echo    "Mobile Number is not in the format!.";
                                        echo "</div>";
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="customer_name" value="<?php echo $customer_name?>" required>
                            </div>
                        
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="customer_email" value="<?php echo $customer_email?>" required>
                            </div>

                            <div class="form-group">
                                <label>Profile Image</label>
                                <div>
                                    <input class="form-control" type="file" name="customer_image">
                                    <input type="hidden" name="hidden_image" value="<?php echo $customer_image?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" name="customer_address" value="<?php echo $customer_address?>" required>
                            </div>

                            <div class="form-group">
                                <?php 
                                    if($gender == 1){
                                        ?>
                                            <label class="display-block">Gender</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="1" checked>
                                                <label class="form-check-label" for="gender">
                                                Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="0">
                                                <label class="form-check-label" for="gender">
                                                Female
                                                </label>
                                            </div>
                                        <?php
                                    }else{
                                        ?>
                                            <label class="display-block">Gender</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="1">
                                                <label class="form-check-label" for="gender">
                                                Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="0" checked>
                                                <label class="form-check-label" for="gender">
                                                Female
                                                </label>
                                            </div>
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input class="form-control" type="number" name="customer_mobile" value="<?php echo $customer_mobile?>" required onkeypress="return this.value.length != 11" onkeyup="validateMobileNumber(this.value)">
                                <span id="mob_error" style="display:none">should be in the format - 94775626541</span>
                            </div>

                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="save" type="submit">Save</button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    <?php include("includes/footer.php"); ?>
    <script>
        function validateMobileNumber(value){
            if(value[0] + value[1] !== "94"){
                document.getElementById("mob_error").setAttribute("style", "color:red; font-size:12px; display:block");
            }else{
                document.getElementById("mob_error").setAttribute("style", "display:none");
            }
        }
    </script>