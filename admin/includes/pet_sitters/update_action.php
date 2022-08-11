<?php
    include("../db.php");

    if (isset($_POST['update_dc_accept'])) {
        echo $dc_id = $_POST['update_dc_id'];
        $query = "UPDATE pet_sitter SET status = 1 WHERE dc_id = {$dc_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location: ../../home.php?interface=view_all_pet_sitters&dc_state=accepted");
        }else{
            header("Location: ../../home.php?interface=view_all_pet_sitters&dc_state=failed");
        }
    }

    if (isset($_POST['update_dc_reject'])) {
        echo $dc_id = $_POST['update_dc_id'];
        $query = "UPDATE pet_sitter SET status = 0 WHERE dc_id = {$dc_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location: ../../home.php?interface=view_all_pet_sitters&dc_state=rejected");
        }else{
            header("Location: ../../home.php?interface=view_all_pet_sitters&dc_state=failed");
        }
    }