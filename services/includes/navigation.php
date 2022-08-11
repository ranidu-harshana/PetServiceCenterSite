<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #C22083">
    <div class="container">
        <a class="navbar-brand" href="../" style="font-size: 30px">PetCare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" style="font-size: 15px;padding-right:20px" href="../index.php">Home</a></li> 
                <li class="nav-item active"><a class="nav-link" style="font-size: 15px;padding-right:20px" href="../blog">Blog</a></li>
                <li class="dropdown nav-item active">
                    <a class="dropdown-toggle nav-link" style="font-size: 15px;padding-right:20px" data-toggle="dropdown" href="#" class="custom-a">
                        Services
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="../services/index.php?service_interface=pet_shops">Pet Shops</a>
                        <a class="dropdown-item" href="../services/index.php?service_interface=vet_clinics">Veterinary Clinics</a>
                        <a class="dropdown-item" href="../services/index.php?service_interface=pet_sitters">Pet Sitters & Daycare Centers</a>
                    </ul>
                </li>

                <li class="dropdown nav-item active d-lg-none">
                    <a class="dropdown-toggle nav-link" style="font-size: 15px;padding-right:20px" data-toggle="dropdown" href="#" class="custom-a">
                        Services
                        <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="">Pet Shops</a>
                        <a class="dropdown-item" href="">Veterinary Clinics</a>
                        <a class="dropdown-item" href="">Pet Sitters & Daycare Centers</a>
                    </div>
                </li>

                <?php
                if (!isset($_SESSION['customer_id']) && !isset($_SESSION['ps_id']) && !isset($_SESSION['vc_id']) && !isset($_SESSION['dc_id'])) {
                    ?>
                        <li class="nav-item active"><a class="nav-link" style="font-size: 15px;padding-right:20px" href="../login_reg/login.php">Login</a></li>
                        <li class="nav-item active"><a class="nav-link" style="font-size: 15px;padding-right:20px" href="../login_reg/register.php">Register</a></li>
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
                        <li class="dropdown nav-item active">
                            <a class="dropdown-toggle nav-link" style="font-size: 15px;padding-right:20px" data-toggle="dropdown" href="#" class="custom-a">
                                <?php echo $name; ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
	                                    if (isset($_SESSION['customer_id'])) {
		                                    echo '<a class="dropdown-item" href="../customer/profile.php">Profile</a>';
	                                    } else if (isset($_SESSION['ps_id'])) {
		                                    echo '<a class="dropdown-item" href="../pet_shop/profile.php">Profile</a>';
	                                    } else if (isset($_SESSION['vc_id'])) {
		                                    echo '<a class="dropdown-item" href="../vet_clinic/profile.php">Profile</a>';
	                                    } else if (isset($_SESSION['dc_id'])) {
		                                    echo '<a class="dropdown-item" href="../pet_sitter/profile.php">Profile</a>';
	                                    }
                                ?>
                                <a class="dropdown-item" href="../login_reg/logout.php">Logout</a>
                            </ul>
                        </li>
                    <?php
                }
                ?>
        </ul>
        </div>
    </div>
    </nav>
<br><br><br><br><br>