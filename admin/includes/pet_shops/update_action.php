<?php
    include("../db.php");

    if (isset($_POST['update_ps_accept'])) {
        echo $ps_id = $_POST['update_ps_id'];
        $query = "UPDATE pet_shop SET status = 1 WHERE ps_id = {$ps_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location: ../../home.php?interface=view_all_pet_shops&ps_state=accepted");
        }else{
            header("Location: ../../home.php?interface=view_all_pet_shops&ps_state=failed");
        }
    }

    if (isset($_POST['update_ps_reject'])) {
        echo $ps_id = $_POST['update_ps_id'];
        $query = "UPDATE pet_shop SET status = 0 WHERE ps_id = {$ps_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location: ../../home.php?interface=view_all_pet_shops&ps_state=rejected");
        }else{
            header("Location: ../../home.php?interface=view_all_pet_shops&ps_state=failed");
        }
    }