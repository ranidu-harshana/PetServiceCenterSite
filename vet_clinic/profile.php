<?php include("includes/header.php"); ?>
    <?php include("includes/navigation.php"); ?>
        <?php
            if (isset($_SESSION['vc_id'])) {
                $vc_id = $_SESSION['vc_id'];
                $query = "SELECT * FROM vet_clinic WHERE vc_id = {$vc_id}";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);

                $vc_name = $row['vc_name'];
                $vc_email = $row['vc_email'];
                $vc_profile_title = $row['vc_profile_title'];
                $vc_about = $row['vc_about'];
                $vc_address = $row['vc_address'];
                $vc_mobNo = $row['vc_mobNo'];
                $vc_image = $row['vc_image'];
                $vc_brpp = $row['vc_brpp'];
                $vc_petCount = $row['vc_petCount'];
                $vc_petType = $row['vc_petType'];
                $created_at = $row['created_at'];
                $status = $row['status'];
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
                                        <img src="../login_reg/images/pet_shops/<?php echo $vc_image?>" class="img-thumbnail img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9 col-8 col-lg-9 col-xl-10">
                                    <div class="product-thumbnail pull-right">
                                        <?php 
                                            if ($status == 1) {
                                                echo '<span class="badge badge-pill badge-success">Accepted Profile</span>';
                                            }else{
                                                echo '<span class="badge badge-pill badge-warning">Not Accepted Profile</span>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div><br>
                            <?php 
                                if (isset($_GET['vc_state'])) {
                                    $msg = $_GET['vc_state'];
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
                                <input class="form-control" type="text" name="vc_name" value="<?php echo $vc_name?>" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="vc_email" value="<?php echo $vc_email?>" required>
                            </div>

                            <div class="form-group">
                                <label>Profile Title</label>
                                <input class="form-control" type="text" name="vc_profile_title" value="<?php echo $vc_profile_title?>" required>
                            </div>

                            <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control" name="vc_about" id="" cols="30" rows="5"><?php echo $vc_about?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Profile Image</label>
                                <div>
                                    <input class="form-control" type="file" name="vc_image">
                                    <input type="hidden" name="hidden_image" value="<?php echo $vc_image?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" type="text" name="vc_address" value="<?php echo $vc_address?>" required>
                            </div>

                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input class="form-control" type="number" name="vc_mobNo" value="<?php echo $vc_mobNo?>" required onkeypress="return this.value.length != 11" onkeyup="validateMobileNumber(this.value)">
                                <span id="mob_error" style="display:none">should be in the format - 94775626541</span>
                            </div>

                            <div class="form-group">
                                <label>Base Rate Per Pet</label>
                                <input class="form-control" type="number" name="vc_brpp" value="<?php echo $vc_brpp?>" required>
                            </div>

                            <div class="form-group">
                                <label>Number of Pets can Accept</label>
                                <input class="form-control" type="number" name="vc_petCount" value="<?php echo $vc_petCount?>" required>
                            </div>

                            <div class="form-group">
                                <label>Pet Type</label>
                                <input class="form-control" type="text" name="vc_petType" value="<?php echo $vc_petType?>" required>
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