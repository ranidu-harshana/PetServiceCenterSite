<header id="header">
    <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="index.php" style="font-size: 30px">PetCare</a></h1>
            </div>
            
            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="scroll active"><a href="#home">Home</a></li> 
                    <li class="scroll"><a href="#about">About Us</a></li>
                    <li class="dropdown scroll">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#services" class="custom-a">Our Service<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="services/index.php?service_interface=pet_shops">Pet Shops</a></li>
                            <li><a tabindex="-1" href="services/index.php?service_interface=vet_clinics">Veterinary Clinics</a></li>
                            <li><a tabindex="-1" href="services/index.php?service_interface=pet_sitters">Pet Sitters & Daycare Centers</a></li>
                        </ul>
                    </li>
                    <li class="scroll"><a href="blog">Blog</a></li>
                    <li class="scroll"><a href="#contact-us">Contact Us</a></li>
                    <?php
                        if (!isset($_SESSION['customer_id']) && !isset($_SESSION['ps_id']) && !isset($_SESSION['vc_id']) && !isset($_SESSION['dc_id'])) {
                            ?>
                                <li class="scroll"><a href="login_reg/login.php">Login</a></li>
                                <li class="scroll"><a href="login_reg/register.php">Register</a></li>
                            <?php
                        }else{
                            if(isset($_SESSION['customer_name'])){
                                $name = $_SESSION['customer_name'];
                            }else if(isset($_SESSION['ps_name'])){
                                $name = $_SESSION['ps_name'];
                            }else if(isset($_SESSION['vc_name'])){
                                $name = $_SESSION['vc_name'];
                            }else if(isset($_SESSION['dc_name'])){
                                $name = $_SESSION['dc_name'];
                            }
                            ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" class="custom-a">
                                        <?php echo $name; ?>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                    <?php
                                        if (isset($_SESSION['customer_id'])) {
                                            echo '<li><a tabindex="-1" href="customer/profile.php">Profile</a></li>';
                                        }else if (isset($_SESSION['ps_id'])) {
                                            echo '<li><a tabindex="-1" href="pet_shop/profile.php">Profile</a></li>';
                                        }else if (isset($_SESSION['vc_id'])) {
                                            echo '<li><a tabindex="-1" href="vet_clinic/profile.php">Profile</a></li>';
                                        }else if (isset($_SESSION['dc_id'])) {
                                            echo '<li><a tabindex="-1" href="pet_sitter/profile.php">Profile</a></li>';
                                        }
                                    ?>
                                        <li><a tabindex="-1" href="login_reg/logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            <?php
                        }
                    ?>

                    
                </ul>
            </div>
        </div>
    </nav>
</header>
