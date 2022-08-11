<?php include("includes/header.php"); ?>
    <?php include("includes/navigation.php"); ?>
    <?php include("includes/functions.php"); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-12 d-none d-sm-none d-md-none d-lg-block">
                <p class="lead">Services Types</p>
                <div class="list-group">
                    <a href="index.php?service_interface=pet_shops" class="list-group-item">Pet Shops</a>
                    <a href="index.php?service_interface=vet_clinics" class="list-group-item">Veterinary Clinics</a>
                    <a href="index.php?service_interface=pet_sitters" class="list-group-item">Pet Sitters & Daycare Centers</a>
                </div>
            </div>
            <?php
            if (isset($_GET['service_interface'])) {
                $service_interface = $_GET['service_interface'];
                switch ($service_interface) {
                    case 'pet_shops':
                        include("includes/pet_shops.php");
                        break;
                    case 'vet_clinics':
                        include("includes/vet_clinics.php");
                        break;
                    case 'pet_sitters':
                        include("includes/pet_sitters.php");
                        break;
                    default:
                        include("includes/pet_shops.php");
                        break;
                }
            }else{
                include("includes/pet_shops.php");
            }
            ?>
        </div>
    </div>
<?php include("includes/footer.php"); ?>