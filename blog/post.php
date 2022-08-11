
<?php include("includes/header.php"); ?>
    <?php
        if (isset($_GET['post_id'])) {
            $post_id = $_GET['post_id'];
            $query = "SELECT * FROM post WHERE post_id = {$post_id} AND status = 1";
            $result = mysqli_query($connection, $query);
            if($result){
                while ($row = mysqli_fetch_assoc($result)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title']; 
                    $post_content = $row['post_content']; 
                    $post_image = $row['post_image'];
                    $post_author = $row['post_author'];
                    $created_at = $row['created_at'];
                }
            }
        }else{
            header("Location: index.php");
        }
    ?>
    <?php include("includes/navigation.php"); ?>
    <div class="elfsight-app-679f6894-bd2d-44e6-a0fa-65903c48a41e"></div>

    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-view">
                        <article class="blog blog-single-post">
                            <h3 class="blog-title"><?php echo $post_title; ?></h3>
                            <div class="blog-info clearfix">
                                <div class="post-left">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> <span>
                                            <?php 
                                                $datetime1 = new DateTime();
                                                $datetime2 = new DateTime($created_at);
                                                $interval = $datetime1->diff($datetime2);
                                                $elapsed = $interval->format('%a days %h hours');
                                                echo $elapsed . " before";
                                            ?>
                                        </span></li>
                                        <li><i class="fa fa-user-o"></i> <span>By <?php echo $post_author; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-image">
                                <a href="#."><img alt="" src="../admin/images/<?php echo $post_image; ?>" class="img-fluid"></a>
                            </div>
                            <div class="blog-content">
                                <p><?php echo nl2br($post_content); ?></p>
                            </div>
                        </article>
                    </div>
                </div>

                <aside class="col-md-4">
                    <div class="widget post-widget">
                        <h5>Latest Posts</h5>
                        <ul class="latest-posts">
                            <?php
                                $query = "SELECT * FROM post WHERE status = 1 ORDER BY post_id DESC LIMIT 5";
                                $result = mysqli_query($connection, $query);
                                if($result){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title']; 
                                        $post_content = $row['post_content']; 
                                        $post_image = $row['post_image'];
                                        $post_author = $row['post_author'];
                                        $created_at = $row['created_at'];
                                        ?>
                                            <li>
                                                <div class="post-thumb">
                                                    <a href="post.php?post_id=<?php echo $post_id; ?>">
                                                        <img class="img-fluid" src="../admin/images/<?php echo $post_image; ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="post-info">
                                                    <h4>
                                                        <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                                                    </h4>
                                                    <p><i aria-hidden="true" class="fa fa-calendar"></i>
                                                        <?php 
                                                            $datetime1 = new DateTime();
                                                            $datetime2 = new DateTime($created_at);
                                                            $interval = $datetime1->diff($datetime2);
                                                            $elapsed = $interval->format('%a days %h hours');
                                                            echo $elapsed . " before";
                                                        ?>
                                                    </p>
                                                </div>
                                            </li>
                                        <?php
                                    }
                                }else{
                                    header("Location: index.php");
                                }
                            ?>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>

    </div>
<?php include("includes/footer.php"); ?>