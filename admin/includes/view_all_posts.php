<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">All Posts</h4>
    </div>
</div>
<?php
    if(isset($_GET['post_state'])){
        $msg = $_GET['post_state'];
        if ($msg == 'deleted') {
            echo "<div class='alert alert-warning' role='alert'>";
            echo    "Post has been deleted!.";
            echo "</div>";
        }elseif ($msg == "inserted") {
            echo "<div class='alert alert-success' role='alert'>";
            echo    "Post Created Successfuly!.";
            echo "</div>";
        }elseif ($msg == "updated") {
            echo "<div class='alert alert-success' role='alert'>";
            echo    "Post Updated Successfuly!.";
            echo "</div>";
        }
    }
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="card-block">
                <div class="table-responsive">
                    <table class="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>Publish</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM post ORDER BY post_id DESC";
                                $result = mysqli_query($connection, $query);
                                if($result){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title']; 
                                        $created_at = $row['created_at'];
                                        $status = $row['status'];
                                        ?>
                                            <tr>
                                                <td><?php echo $post_id; ?></td>
                                                <td><?php echo $post_title; ?></td>
                                                <td><?php echo $created_at; ?></td>
                                                <td>
                                                    <?php if($status == 0){ ?>
                                                        <form action='includes/publish_unpublish.php' method='post'>
                                                            <input type='hidden' name='publish_p' value='<?php echo $post_id; ?>'>
                                                            <button class='btn btn-primary' name='publish' type='submit'>Publish</button>
                                                        </form>
                                                    <?php }else{ ?>
                                                        <form action='includes/publish_unpublish.php' method='post'>
                                                            <input type='hidden' name='unpublish_p' value='<?php echo $post_id; ?>'>
                                                            <button class='btn btn-warning' name='unpublish' type='submit'>Unpublish</button>
                                                        </form>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <form action='home.php?interface=update_post' method='post'>
                                                        <input type='hidden' name='update_p' value='<?php echo $post_id; ?>'>
                                                        <button class='btn btn-success' name='update_post' type='submit'>Update</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action='includes/delete_post.php' method='post'>
                                                        <input type='hidden' name='delete_p' value='<?php echo $post_id; ?>'>
                                                        <button class='btn btn-danger' name='delete_post' type='submit'>Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>