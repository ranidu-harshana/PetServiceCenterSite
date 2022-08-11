<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div id="display_area"></div>
        <form action="" method="post" enctype="multipart/form-data" id="create-post-form">
            <div class="form-group">
                <label>Post Title</label>
                <input class="form-control" type="text" id="post_title" required>
            </div>
        
            <div class="form-group">
                <label>Post Image</label>
                <input class="form-control" type="file" id="post_image" name="any" required>
            </div>

            <div class="form-group">
                <label>Post Content</label>
                <textarea cols="30" rows="6" class="form-control" id="post_content" required></textarea>
            </div>

            <div class="form-group">
                <label>Tags <small>(separated with a comma)</small></label>
                <input type="text" placeholder="Enter your tags" data-role="tagsinput" class="form-control" id="tags">
            </div>

            <div class="form-group">
                <label class="display-block">Post Status</label>
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
            </div>
            <div class="m-t-20 text-center">
                <button class="btn btn-primary submit-btn" id="create">Create Post</button>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $("#create-post-form").submit(function(e){
            e.preventDefault();
            var post_title = $("#post_title").val();
            var post_image = document.getElementById("post_image").files[0];
            var post_content = $("#post_content").val();
            var tags = $("#tags").val();
            var action = 1;
            
            if ($('#publish').is(':checked')) {
                status = 1;
            }else if($('#unpublish').is(':checked')){
                status = 0;
            }
            
            var form_data = new FormData();

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