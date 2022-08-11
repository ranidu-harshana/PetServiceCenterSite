<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #C22083">
    <div class="container">
        <a class="navbar-brand" href="#">PetCare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="../index.php">Home</a></li> 
                <li class="nav-item active"><a class="nav-link" href="index.php">Blog</a></li>
                <li class="nav-item active"><a class="nav-link" href="#contact-us">Contact</a></li>
                <?php
                if (!isset($_SESSION['customer_id'])) {
                    ?>
                        <li class="scroll"><a href="login_reg/login.php">Login</a></li>
                        <li class="scroll"><a href="login_reg/register.php">Register</a></li>
                    <?php
                }else{
                    $customer_name = $_SESSION['customer_name'];
                    ?>
                        <li class="dropdown nav-item active">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" class="custom-a">
                                <?php echo $customer_name; ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="">Profile</a>
                                <a class="dropdown-item" href="">Logout</a>
                            </ul>
                        </li>
                    <?php
                }
                ?>
        </ul>
        </div>
    </div>
    </nav>
<br><br><br><br>