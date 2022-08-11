<div class="col-lg-9 col-sm-12 col-md-12">
    <?php
        if (isset($_SESSION['customer_id'])) {
            $customer_id  = $_SESSION['customer_id'];
            $customer_location = "SELECT customer_latitude, customer_longitude FROM customer WHERE customer_id = {$customer_id}";
	        $r = mysqli_query($connection, $customer_location);
            $c_row = mysqli_fetch_assoc($r);
            $customer_latitude = $c_row['customer_latitude'];
            $customer_longitude = $c_row['customer_longitude'];
            $cust_location = ["lat" => (double)$customer_latitude, "lng" => (double)$customer_longitude];
            $locations = [];
            $services_query = "SELECT * FROM pet_sitter WHERE status = 1";
            $r = mysqli_query($connection, $services_query);
            $ids = [];
            $informations = [];
            $index = 0;
            if($r){
                while($row = mysqli_fetch_assoc($r)){
                    $dc_latitude = $row['dc_latitude'];
                    $dc_longitude = $row['dc_longitude'];
                    $dc_image = $row['dc_image'];
                    $dc_profile_title = $row['dc_profile_title'];

                    $distance = getDistance($customer_latitude, $customer_longitude, $dc_latitude, $dc_longitude);
                    if($distance <= 2){
                        $ids[$index] = $row['dc_id'];
                        $locations[$index] = ["lat" => (double)$dc_latitude, "lng" => (double)$dc_longitude];
                        $informations[$index] = ["id" => (int)$row['dc_id'], "image" => $dc_image, "title" => $dc_profile_title];
                    }else{
                        continue;
                    }
                    $index++;
                }
            }
            ?>
                <div id="map"></div><br>
                <script>
                    function initMap() {
                        const cust_location = <?php echo json_encode($cust_location)?>;
                        const locations = <?php echo json_encode($locations)?>;
                        console.log(locations);
                        const ids = <?php echo json_encode($ids)?>;
                        const informations = <?php echo json_encode($informations)?>;

                        var infowindow = new google.maps.InfoWindow();
                        const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 17,
                            center: cust_location,
                        });

                        for(i = 0; i < locations.length; i++){
                            const marker = new google.maps.Marker({
                                position: locations[i],
                                map: map,
                            });
                            makeInfoWindowEvent(map, infowindow, 
                                    '<div class="product-thumbnail" style="width:200px"><img width="100%" src="../login_reg/images/pet_sitters/' + informations[i]["image"] + '" class="img-thumbnail img-fluid" alt=""></div><h3><a href="">' + informations[i]["title"] + '</a></h3>', 
                            marker);
                        }

                        function makeInfoWindowEvent(map, infowindow, contentString, marker) {
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.setContent(contentString);
                                infowindow.open(map, marker);
                            });
                        }
                    }
                </script>
            <?php
            $id = implode(",", $ids);
            $query = "SELECT * FROM pet_sitter WHERE status = 1 AND dc_id IN ($id)";
        }else{
            $query = "SELECT * FROM pet_sitter WHERE status = 1";
        }
        if ($result = mysqli_query($connection, $query)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $dc_name = $row['dc_name'];
                    $dc_profile_title = $row['dc_profile_title'];
                    $dc_address = $row['dc_address'];
                    $dc_brpp = $row['dc_brpp'];
                    $dc_image = $row['dc_image'];
                    $dc_mobNo = $row['dc_mobNo'];
                    ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="blog grid-blog row">
                            <div class="blog-image col-sm-3">
                                <a href=""><img class="img-fluid" src="../login_reg/images/pet_sitters/<?php echo $dc_image?>" alt=""></a>
                            </div>
                            <div class="blog-content col-sm-9">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h3 class="blog-title"><a href=""><?php echo $dc_name?></a></h3>
                                        <h6><?php echo $dc_profile_title?></h6>
                                        <p><?php echo $dc_address?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2 class="pull-right col-lg-12">$<?php echo $dc_brpp?></h2><br>
                                        <p class="pull-right col-lg-12">Per Pet</p>
                                    </div>
                                </div>
                                
                                <div class="blog-info clearfix">
                                    <div class="post-right">
                                        <?php
                                        if (isset($_SESSION['customer_id'])) {
                                            ?>
                                                <a href="https://msng.link/o/?<?php echo $dc_mobNo?>=wa">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-whatsapp" aria-hidden="true" style="color: white"></i> Contact
                                                    </button>
                                                </a>
                                            <?php
                                        }else{
                                            ?>
                                                <a href="../login_reg/login.php">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-whatsapp" aria-hidden="true" style="color: white"></i> Contact
                                                    </button>
                                                </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }else{
                ?>
                    <div class="alert alert-primary" role="alert">
                    There are no any Pet Sitters & Daycare Centers.
                    </div>
                <?php
            }
        }else{
            ?>
                <div class="alert alert-primary" role="alert">
                There are no any Pet Sitters & Daycare Centers.
                </div>
            <?php
        }
    ?>
</div>