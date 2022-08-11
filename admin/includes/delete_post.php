<?php
    include('db.php');

    if (isset($_POST['delete_post'])) {
        $post_id = $_POST['delete_p'];
        $query = "DELETE FROM post WHERE post_id = {$post_id}";
        if(mysqli_query($connection, $query)){
            header("Location: ../home.php?interface=view_all_posts&post_state=deleted");
        }
    }
?>