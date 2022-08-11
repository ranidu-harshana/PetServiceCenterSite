<?php include("includes/header.php"); ?>
    <?php include("includes/navigation.php"); ?>
        <?php include("includes/sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="content">
                
                <?php
                    if(isset($_GET['interface'])){
                        $interface = $_GET['interface'];
                        switch ($interface) {
                            case 'view_all_posts':
                                include('includes/view_all_posts.php');
                                break;
                            case 'add_posts':
                                include('includes/add_posts.php');
                                break;
                            case 'update_post':
                                include('includes/update_post.php');
                                break;
                            case 'view_all_customers':
                                include('includes/customers/view_all_customers.php');
                                break;
                            case 'view_all_pet_shops':
                                include('includes/pet_shops/view_all_pet_shops.php');
                                break;
                            case 'pet_shop_profile':
                                include('includes/pet_shops/pet_shop_profile.php');
                                break;
                            case 'view_all_vet_clinics':
                                include('includes/vet_clinics/view_all_vet_clinics.php');
                                break;
                            case 'vet_clinics_profile':
                                include('includes/vet_clinics/vet_clinics_profile.php');
                                break;
                            case 'view_all_pet_sitters':
                                include('includes/pet_sitters/view_all_pet_sitters.php');
                                break;
                            case 'pet_sitters_profile':
                                include('includes/pet_sitters/pet_sitters_profile.php');
                                break;
                            case 'feedbacks':
                                include('includes/feedbacks.php');
                                break;
                            default:
                                include('includes/dashboard.php');
                                break;
                        }
                    }else{
                        include('includes/dashboard.php');
                    }
                ?>
            </div>
        </div>
<?php include("includes/footer.php"); ?>