<?php include("includes/header.php"); ?>

    <?php include("includes/navigation.php"); ?>

    <?php include("includes/main-slider.php"); ?>

    <?php include("includes/about.php"); ?>

    <?php include("includes/services.php"); ?>

    <section id="contact-us">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Contact Us</h2>
                <p class="text-center wow fadeInDown">We're here to help and answer any question you might<br> have. We look forward to hearing from you. </p>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container-wrapper">
            <div class="container contact-info">
                <div class="row d-flex justify-content-center">
                    
                    <div class="col-sm-6 col-md-6 ">                      
						<div class="contact-form">											
                            <form name="sentMessage" id="contactForm" method="POST" action="">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <textarea rows="10" cols="100" class="form-control" placeholder="Message" name="message" required minlength="5" maxlength="999" style="resize:none"></textarea>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary pull-right">Send</button><br>
                            </form>
							 					
						</div>
                    </div>
                    <div class="col-sm-6 wow fadeInLeft">
                        <img class="img-responsive" src="images/smiling-woman-headset-presentation-something.jpg" alt="">
                    </div>
                </div>
            </div>

        </div>

    </section>
    <?php include("includes/footer.php"); ?>

<?php
    include("admin/includes/db.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $name = mysqli_real_escape_string($connection, $name);
        $email = mysqli_real_escape_string($connection, $email);
        $message = mysqli_real_escape_string($connection, $message);

        $query = "INSERT INTO feedback (name, email, message) VALUES ('{$name}', '{$email}', '{$message}')";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("ERROR" . mysqli_error($connection));
        }
    }
?>