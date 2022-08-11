<?php
    include('db.php');

    if (isset($_POST['publish'])) {
        $post_id = $_POST['publish_p'];
        $query = "UPDATE post SET status = 1 WHERE post_id = {$post_id}";
        if(mysqli_query($connection, $query)){
            header("Location: ../home.php?interface=view_all_posts");
        }
    }

    if (isset($_POST['unpublish'])) {
        $post_id = $_POST['unpublish_p'];
        $query = "UPDATE post SET status = 0 WHERE post_id = {$post_id}";
        if(mysqli_query($connection, $query)){
            header("Location: ../home.php?interface=view_all_posts");
        }
    }