<?php include("includes/header.php"); ?>        
    <div class="account-page">
        <div class="account-center">
            <div id="display_area"></div>
            <div class="account-box" id='start-box'> 
                <form action="" method="POST" class="form-signin" id="start-form" >
                    <div class="account-logo">
                        <img src="images/user.png" alt="">
                    </div>
                    <?php 
                        if (isset($_GET['state'])) {
                            $msg = $_GET['state'];
                            if ($msg == 'failed') {
                                echo "<div class='alert alert-danger' role='alert'>";
                                echo    "User Registraion Failed!.";
                                echo "</div>";
                            }else if ($msg == 'mismatch') {
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo    "Password Mismatch!.";
                                echo "</div>";
                            }else if ($msg == 'required') {
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo    "Required Field!.";
                                echo "</div>";
                            }else if ($msg == 'invalid_mail') {
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo    "Invalid Mail!.";
                                echo "</div>";
                            }else if ($msg == 'allow_location') {
                                echo "<div class='alert alert-danger' role='alert'>";
                                echo    "Please Allow Location.";
                                echo "</div>";
                            }else if ($msg == 'mob_num_err') {
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo    "Mobile Number is not in the format!.";
                                echo "</div>";
                            }else if ($msg == 'invalid_pass') {
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo    "Password should not be shorter than 8 characters and should include atleast one numeric, uppercases letter and a lowercase letter";
                                echo "</div>";
                            }
                        }
                    ?>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="number" class="form-control" placeholder="94776006495" id="mobile" required onkeypress="return this.value.length != 11" onkeyup="validateMobileNumber(this.value)">
                        <span id="mob_error" style="display:none">should be in the format - 94775626541</span>
                    </div>
                    <input type="hidden" name="" id="lat">
                    <input type="hidden" name="" id="long">
                    <div class="form-group">
                        <label>Account Type</label>
                        <select name="" id="account_type" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="1">Customer</option>
                            <option value="2">Pet Shops</option>
                            <option value="3">Veterinary Clinics</option>
                            <option value="4">Pet Sitters & Daycare Centers</option>
                        </select>
                    </div>
                    
                    <div class="text-center login-link">
                        Already have an account? <a href="login.php">Login</a><br>
                        <a href="../index.php">Home</a>
                    </div>
                </form>
            </div>

            
        </div>
    </div>
<?php include("includes/footer.php"); ?> 
<script src="js/geolocation.js"></script>
<script type="text/javascript" >
    function validateMobileNumber(value){
        if(value[0] + value[1] !== "94"){
            document.getElementById("mob_error").setAttribute("style", "color:red; font-size:12px; display:block");
        }else{
            document.getElementById("mob_error").setAttribute("style", "display:none");
        }
    }
	$(document).ready(function(){
        getLocation();
        $("#account_type").on("change", function(){
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var account_type = $("#account_type").val();
            var lat = $("#lat").val();
            var long = $("#long").val();
            var fake = 1;

            var form_data = new FormData();

            form_data.append("email", email);
            form_data.append("mobile", mobile);
            form_data.append("account_type", account_type);
            form_data.append("lat", lat);
            form_data.append("long", long);
            form_data.append("fake", fake);
            
            $.ajax({
                url: "includes/select_form_ajax.php",
                type: "POST",
                async: false,
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    $("#start-box").remove();
                    $("#display_area").html(data);
                    getLocation();
                }
            })
        });
	});
</script>