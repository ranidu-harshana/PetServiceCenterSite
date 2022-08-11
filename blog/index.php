<?php include("includes/header.php"); ?>
    <?php include("includes/navigation.php"); ?>

    <div class="container">
        <div class="content">
            <div class="row">
                <?php
                    $query = "SELECT * FROM post WHERE status = 1";
                    $result = mysqli_query($connection, $query);
                    if($result){
                        while ($row = mysqli_fetch_assoc($result)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title']; 
                            $post_content = substr($row['post_content'],0,140); 
                            $post_image = $row['post_image'];
                            $post_author = $row['post_author'];
                            $created_at = $row['created_at'];
                            ?>
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <div class="blog grid-blog">
                                        <div class="blog-image">
                                            <a href="post.php?post_id=<?php echo $post_id; ?>"><img class="img-fluid" src="../admin/images/<?php echo $post_image; ?>" alt="" style="height:200px"></a>
                                        </div>
                                        <div class="blog-content">
                                            <h3 class="blog-title"><a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></h3>
                                            <p><?php echo $post_content; ?> .....</p>
                                            <a href="post.php?post_id=<?php echo $post_id; ?>" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
                                            <div class="blog-info clearfix">
                                                <div class="post-left">
                                                    <ul>
                                                        <li><a href="#."><i class="fa fa-calendar"></i> <span>
                                                            <?php 
                                                                $datetime1 = new DateTime();
                                                                $datetime2 = new DateTime($created_at);
                                                                $interval = $datetime1->diff($datetime2);
                                                                $elapsed = $interval->format('%a days %h hours');
                                                                echo $elapsed . " before";
                                                            ?>
                                                        </span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="post-right">By <?php echo $post_author; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }else{
                        header("Location: ../index.php");
                    }
                ?>
            </div>
        </div>
    </div>
<?php include("includes/footer.php"); ?>