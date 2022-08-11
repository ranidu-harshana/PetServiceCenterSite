<?php
    include("../db.php");

    if (isset($_POST['update_vc_accept'])) {
        echo $vc_id = $_POST['update_vc_id'];
        $query = "UPDATE vet_clinic SET status = 1 WHERE vc_id = {$vc_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location: ../../home.php?interface=view_all_vet_clinics&vc_state=accepted");
        }else{
            header("Location: ../../home.php?interface=view_all_vet_clinics&vc_state=failed");
        }
    }

    if (isset($_POST['update_vc_reject'])) {
        echo $vc_id = $_POST['update_vc_id'];
        $query = "UPDATE vet_clinic SET status = 0 WHERE vc_id = {$vc_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            header("Location: ../../home.php?interface=view_all_vet_clinics&vc_state=rejected");
        }else{
            header("Location: ../../home.php?interface=view_all_vet_clinics&vc_state=failed");
        }
    }