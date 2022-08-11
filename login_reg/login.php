<?php include("includes/header.php"); ?>
    <div class="account-page">
        <div class="account-center">
            <div class="account-box">
                <form action="" class="form-signin" id="login-form">
                    <div class="account-logo">
                        <img src="images/user.png" alt="">
                    </div>
                    <?php 
                        if (isset($_GET['state'])) {
                            $msg = $_GET['state'];
                            if ($msg == 'success') {
                                echo "<div class='alert alert-success' role='alert'>";
                                echo    "Login Here";
                                echo "</div>";
                            }
                        }
                    ?>
                    <div id="display_area"></div>
                    <div class="form-group">
                        <label>Acount Type</label>
                        <select name="" id="account_type" class="form-control" required>
                            <option value="">Select Type</option>
                            <option value="1">Customer</option>
                            <option value="2">Pet Shops</option>
                            <option value="3">Veterinary Clinics</option>
                            <option value="4">Pet Sitters & Daycare Centers</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username or Email</label>
                        <input type="text" autofocus="" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <input type="hidden" name="" id="lat" value="">
                    <input type="hidden" name="" id="long" value="">
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary account-btn" style="background-color: #C22083">Login</button>
                    </div>
                    <div class="text-center register-link">
                        Don’t have an account? <a href="register.php">Register Now</a><br>
                        <a href="../index.php">Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>

<script src="js/geolocation.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $("#account_type").on("change", function(){
            var account_type = $("#account_type").val();
            if(account_type == 1){
                getLocation();
            }
        });
        $("#login-form").submit(function(e){
            e.preventDefault();
            var email = $("#email").val();
            var password = $("#password").val();
            var account_type = $("#account_type").val();
            var lat = $("#lat").val();
            var long = $("#long").val();
            
            var fake = 1;

            var form_data = new FormData();

            form_data.append("email", email);
            form_data.append("password", password);
            form_data.append("account_type", account_type);
            form_data.append("lat", lat);
            form_data.append("long", long);
            form_data.append("fake", fake);
            
            $.ajax({
                url: "includes/login_ajax.php",
                type: "POST",
                async: false,
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    $("#display_area").html(data);
                }
            })
        });
	});
</script>