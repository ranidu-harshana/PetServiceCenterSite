<?php
    $fake = $_POST['fake'];
    if ($fake == 1) {
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $account_type = $_POST['account_type'];
        $lat = $_POST['lat'];
        $long = $_POST['long'];
        if($account_type == 1){
        ?>
            <div class="col-md-12">
                <div class="card-box">
                    <form action="includes/customer_register.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="lat" id="lat" value="<?php echo $lat?>">
                        <input type="hidden" name="long" id="long" value="<?php echo $long?>">

                        <div class="row">
                            <div class="col-md-6">
                                <img alt="" src="../images/2.jpg" class="img-fluid"></a>
                            </div>
                            <div class="col-md-6">
                                <h4 class="card-title">Customer Information</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="customer_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Gender</label>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="1" checked>
                                            <label class="form-check-label" for="gender_male">
                                            Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="0">
                                            <label class="form-check-label" for="gender_female">
                                            Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Contact Number</label>
                                    
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="94776006495" value="<?php echo $mobile; ?>" name="customer_mobile" required onkeypress="return this.value.length != 11" onkeyup="validateMobileNumber(this.value)">
                                        <span id="mob_error" style="display:none">should be in the format - 94775626541</span>
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo $email; ?>" name="customer_email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Profile Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="customer_image" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="customer_address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="customer_password" required onkeyup="passwordValidate()" id="pass">
                                    </div>
                                </div>
                                <div id="pass_check" style="display:none" class="mt-1">
                                    <p style="display:block">
                                        <span id="inc_char12_0" style="display:none;" ><i class="fa fa-check-circle" aria-hidden="true"></i> Length must be more than 8 characters</span>
                                        <span id="inc_char12_1" style="display:inline;color:red"><i  class="fa fa-times-circle" aria-hidden="true"></i> Length must be more than 8 characters</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span  id="inc_onenumber_0" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one number</span>
                                        <span  id="inc_onenumber_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one number</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span  id="inc_lowercase_0" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one Lowercase letter</span>
                                        <span  id="inc_lowercase_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one Lowercase letter</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span id="inc_uppercase_0" style="display:none;" ><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one Uppercase letter</span>
                                        <span  id="inc_uppercase_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one Uppercase letter</span> 
                                    </p>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Repeat Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="customer_cpassword" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="register" style="background-color: #C22083">Regiter</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php
        }elseif($account_type == 2){
            ?>
            <div class="col-md-12">
                <div class="card-box">
                    <form action="includes/pet_shop_register.php" method="POST" enctype="multipart/form-data">
                    
                        <input type="hidden" name="lat" id="lat" value="<?php echo $lat?>">
                        <input type="hidden" name="long" id="long" value="<?php echo $long?>">

                        <h4 class="card-title">Pet Shop Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="ps_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Profile Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="ps_profile_title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">About</label>
                                    <div class="col-md-9">
                                        <textarea name="ps_about" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo $email; ?>" name="ps_email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Contact Number</label>
                                    
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="94776006495" value="<?php echo $mobile; ?>" name="ps_mobNo" required onkeypress="return this.value.length != 11" onkeyup="validateMobileNumber(this.value)">
                                        <span id="mob_error" style="display:none">should be in the format - 94775626541</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Profile Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="ps_image" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="ps_address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="ps_password" required onkeyup="passwordValidate()" id="pass">
                                    </div>
                                </div>
                                <div id="pass_check" style="display:none" class="mt-1">
                                    <p style="display:block">
                                        <span id="inc_char12_0" style="display:none;" ><i class="fa fa-check-circle" aria-hidden="true"></i> Length must be more than 8 characters</span>
                                        <span id="inc_char12_1" style="display:inline;color:red"><i  class="fa fa-times-circle" aria-hidden="true"></i> Length must be more than 8 characters</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span  id="inc_onenumber_0" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one number</span>
                                        <span  id="inc_onenumber_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one number</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span  id="inc_lowercase_0" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one Lowercase letter</span>
                                        <span  id="inc_lowercase_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one Lowercase letter</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span id="inc_uppercase_0" style="display:none;" ><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one Uppercase letter</span>
                                        <span  id="inc_uppercase_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one Uppercase letter</span> 
                                    </p>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Repeat Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="ps_cpassword" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Additional Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Base Rate Per Pet</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="ps_brpp" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Number of Pets Can Accept</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="ps_petCount" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Pet Type</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="ps_petType" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15838.099651761657!2d80.02419942433795!3d7.064969713219551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2fe991fdff6c7%3A0xfe84e7e8756c8bfb!2sKinigama%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1632668940344!5m2!1sen!2slk" width="600" height="260" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div> -->
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="register" style="background-color: #C22083">Regiter</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }elseif($account_type == 3){
            ?>
            <div class="col-md-12">
                <div class="card-box">
                    <form action="includes/vet_clinic_register.php" method="POST" enctype="multipart/form-data">
                    
                        <input type="hidden" name="lat" id="lat" value="<?php echo $lat?>">
                        <input type="hidden" name="long" id="long" value="<?php echo $long?>">

                        <h4 class="card-title">Veterinary Clinic Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="vc_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Profile Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="vc_profile_title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">About</label>
                                    <div class="col-md-9">
                                        <textarea name="vc_about" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo $email; ?>" name="vc_email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Contact Number</label>
                                    
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" placeholder="94776006495" value="<?php echo $mobile; ?>" name="vc_mobNo" required onkeypress="return this.value.length != 11" onkeyup="validateMobileNumber(this.value)">
                                        <span id="mob_error" style="display:none">should be in the format - 94775626541</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Profile Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="vc_image" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="vc_address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="vc_password" required onkeyup="passwordValidate()" id="pass">
                                    </div>
                                </div>
                                <div id="pass_check" style="display:none" class="mt-1">
                                    <p style="display:block">
                                        <span id="inc_char12_0" style="display:none;" ><i class="fa fa-check-circle" aria-hidden="true"></i> Length must be more than 8 characters</span>
                                        <span id="inc_char12_1" style="display:inline;color:red"><i  class="fa fa-times-circle" aria-hidden="true"></i> Length must be more than 8 characters</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span  id="inc_onenumber_0" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one number</span>
                                        <span  id="inc_onenumber_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one number</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span  id="inc_lowercase_0" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one Lowercase letter</span>
                                        <span  id="inc_lowercase_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one Lowercase letter</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span id="inc_uppercase_0" style="display:none;" ><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one Uppercase letter</span>
                                        <span  id="inc_uppercase_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one Uppercase letter</span> 
                                    </p>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Repeat Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="vc_cpassword" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Additional Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Base Rate Per Pet</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="vc_brpp" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Number of Pets Can Accept</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="vc_petCount" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Pet Type</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="vc_petType" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15838.099651761657!2d80.02419942433795!3d7.064969713219551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2fe991fdff6c7%3A0xfe84e7e8756c8bfb!2sKinigama%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1632668940344!5m2!1sen!2slk" width="600" height="260" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div> -->
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="register" style="background-color: #C22083">Regiter</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }elseif($account_type == 4){
            ?>
            <div class="col-md-12">
                <div class="card-box">
                    <form action="includes/pet_sitter_register.php" method="POST" enctype="multipart/form-data">
                    
                        <input type="hidden" name="lat" id="lat" value="<?php echo $lat?>">
                        <input type="hidden" name="long" id="long" value="<?php echo $long?>">

                        <h4 class="card-title">Pet Sitter/ Day Care Center Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="dc_name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Profile Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="dc_profile_title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">About</label>
                                    <div class="col-md-9">
                                        <textarea name="dc_about" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="<?php echo $email; ?>" name="dc_email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Contact Number</label>
                                    
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" placeholder="94776006495" value="<?php echo $mobile; ?>" name="dc_mobNo" required onkeypress="return this.value.length != 11" onkeyup="validateMobileNumber(this.value)">
                                        <span id="mob_error" style="display:none">should be in the format - 94775626541</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Profile Image</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="file" name="dc_image" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="dc_address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="dc_password" required onkeyup="passwordValidate()" id="pass">
                                    </div>
                                </div>
                                <div id="pass_check" style="display:none" class="mt-1">
                                    <p style="display:block">
                                        <span id="inc_char12_0" style="display:none;" ><i class="fa fa-check-circle" aria-hidden="true"></i> Length must be more than 8 characters</span>
                                        <span id="inc_char12_1" style="display:inline;color:red"><i  class="fa fa-times-circle" aria-hidden="true"></i> Length must be more than 8 characters</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span  id="inc_onenumber_0" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one number</span>
                                        <span  id="inc_onenumber_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one number</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span  id="inc_lowercase_0" style="display:none;"><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one Lowercase letter</span>
                                        <span  id="inc_lowercase_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one Lowercase letter</span> 
                                    </p>
                                    <p style="display:block;">
                                        <span id="inc_uppercase_0" style="display:none;" ><i class="fa fa-check-circle" aria-hidden="true"></i> At least include one Uppercase letter</span>
                                        <span  id="inc_uppercase_1" style="display:inline;color:red"><i class="fa fa-times-circle" aria-hidden="true"></i> At least include one Uppercase letter</span> 
                                    </p>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Repeat Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="dc_cpassword" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Additional Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Base Rate Per Pet</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="dc_brpp" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Number of Pets Can Accept</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="dc_petCount" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Pet Type</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="dc_petType" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Location</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15838.099651761657!2d80.02419942433795!3d7.064969713219551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2fe991fdff6c7%3A0xfe84e7e8756c8bfb!2sKinigama%2C%20Gampaha!5e0!3m2!1sen!2slk!4v1632668940344!5m2!1sen!2slk" width="600" height="260" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div> -->
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="register" style="background-color: #C22083">Regiter</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
    }
