<?php
    if (isset($_POST['update_post'])) {
        $post_id = $_POST['update_p'];
        $query = "SELECT * FROM post WHERE post_id = {$post_id}";
        $result = mysqli_query($connection, $query);
        if($result){
            while ($row = mysqli_fetch_assoc($result)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title']; 
                $post_content = $row['post_content']; 
                $post_image = $row['post_image'];
                $tags = $row['tags'];
                $status = $row['status'];
            }
        }
    }else {
        header("Location: home.php");
    }
?>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div id="display_area"></div>
        <form action="" method="post" enctype="multipart/form-data" id="update-post-form">
            <input type="hidden" name="post_id" id="post_id" value="<?php echo $post_id; ?>">
            <div class="form-group">
                <label>Post Title</label>
                <input class="form-control" type="text" id="post_title" required value="<?php echo $post_title; ?>">
            </div>
        
            <div class="form-group">
                <label>Post Image</label>
                <div>
                    <input class="form-control" type="file" id="post_image" value="<?php echo $post_image; ?>">
                </div>
                <div id="thumbnail_area"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-4 col-lg-3 col-xl-2">
                        <div class="product-thumbnail">
                            <img src="images/<?php echo $post_image; ?>" class="img-thumbnail img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Post Content</label>
                <textarea cols="30" rows="6" class="form-control" id="post_content" required><?php echo $post_content; ?></textarea>
            </div>

            <div class="form-group">
                <label>Tags <small>(separated with a comma)</small></label>
                <input type="text" placeholder="Enter your tags" data-role="tagsinput" class="form-control" id="tags" value="<?php echo $tags; ?>">
            </div>

            <div class="form-group">
                <label class="display-block">Post Status</label>
                <?php
                    if ($status == 1) {
                        ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="publish" checked>
                                <label class="form-check-label" for="publish">
                                Publish
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="unpublish">
                                <label class="form-check-label" for="unpublish">
                                Unpublish
                                </label>
                            </div>
                        <?php
                    }else{
                        ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="publish">
                                <label class="form-check-label" for="publish">
                                Publish
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="unpublish" checked>
                                <label class="form-check-label" for="unpublish">
                                Unpublish
                                </label>
                            </div>
                        <?php
                    }
                ?>
                
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn" id="create">Update Post</button>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $("#update-post-form").submit(function(e){
            e.preventDefault();
            var post_id = $("#post_id").val();
            var post_title = $("#post_title").val();
            var post_image = document.getElementById("post_image").files[0];
            var post_content = $("#post_content").val();
            var tags = $("#tags").val();
            var action = 2;
            
            if ($('#publish').is(':checked')) {
                status = 1;
            }else if($('#unpublish').is(':checked')){
                status = 0;
            }
            
            var form_data = new FormData();

            form_data.append("post_id", post_id);
            form_data.append("post_title", post_title);
            form_data.append("post_image", post_image);
            form_data.append("post_content", post_content);
            form_data.append("tags", tags);
            form_data.append("status", status);
            form_data.append("action", action);

            $.ajax({
                url: "includes/ajax.php",
                type: "POST",
                async: false,
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    $("#display_area").html(data);
                }
            })
        });
        
	});
</script>