<?php
    include("db.php");

    $action = $_POST['action'];
    if ($action == 1) {
        $post_title = $_POST['post_title'];

        $post_image = $_FILES['post_image']['name'];
        $temp_post_image = $_FILES['post_image']['tmp_name'];
        
        move_uploaded_file($temp_post_image, "../images/{$post_image}");

        $post_content = $_POST['post_content'];
        $tags = $_POST['tags'];
        $status = $_POST['status'];
        $post_author = "Ranidu Harshana";
        
        $post_title = mysqli_escape_string($connection, $post_title);
        $post_content = mysqli_escape_string($connection, $post_content);
        $post_image = mysqli_escape_string($connection, $post_image);
        $tags = mysqli_escape_string($connection, $tags);
        $status = mysqli_escape_string($connection, $status);
        $post_author = mysqli_escape_string($connection, $post_author);

        $query = "INSERT INTO post (post_title, post_content, post_image, post_author, tags, status) VALUES ('{$post_title}', '{$post_content}', '{$post_image}', '{$post_author}','{$tags}', {$status})";
        $result = mysqli_query($connection, $query);
        if($result){
            echo '
            <script>
                window.history.pushState({"html":"response.html","pageTitle":"response.pageTitle"},"", "../admin/home.php?interface=view_all_posts&post_state=inserted"); 
                location.reload()
            </script>';
        }else{
            die(mysqli_error($connection));
            ?>
                <div class="alert alert-danger" role="alert">
                    Creating Post Failed!.
                </div>
            <?php
        }
    }

    if ($action == 2) {
        $post_id = $_POST['post_id'];
        $post_title = $_POST['post_title'];


        if (!isset($_FILES['post_image']['name'])) {
            $query = "SELECT * FROM post WHERE post_id = {$post_id}";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result);
            $post_image = $row['post_image'];
        }else{
	        $post_image = $_FILES['post_image']['name'];
            $temp_post_image = $_FILES['post_image']['tmp_name'];
            move_uploaded_file($temp_post_image, "../images/{$post_image}");
        }
        
        $post_content = $_POST['post_content'];
        $tags = $_POST['tags'];
        $status = $_POST['status'];
        $post_author = "Ranidu Harshana";
        
        $post_title = mysqli_escape_string($connection, $post_title);
        $post_content = mysqli_escape_string($connection, $post_content);
        $post_image = mysqli_escape_string($connection, $post_image);
        $tags = mysqli_escape_string($connection, $tags);
        $status = mysqli_escape_string($connection, $status);
        $post_author = mysqli_escape_string($connection, $post_author);

        $query = "UPDATE post SET post_title = '{$post_title}', post_content = '{$post_content}', post_image = '{$post_image}', post_author ='{$post_author}', tags = '{$tags}', status = {$status} WHERE post_id = {$post_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            echo '
            <script>
                window.history.pushState({"html":"response.html","pageTitle":"response.pageTitle"},"", "../admin/home.php?interface=view_all_posts&post_state=updated"); 
                location.reload()
            </script>';
        }else{
            die(mysqli_error($connection));
            ?>
                <div class="alert alert-danger" role="alert">
                    Updating Post Failed!.
                </div>
            <?php
        }
    }
?>