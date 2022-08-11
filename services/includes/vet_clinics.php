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
            $services_query = "SELECT * FROM vet_clinic WHERE status = 1";
            $r = mysqli_query($connection, $services_query);
            $ids = [];
            $informations = [];
            $index = 0;
            if($r){
                while($row = mysqli_fetch_assoc($r)){
                    $vc_latitude = $row['vc_latitude'];
                    $vc_longitude = $row['vc_longitude'];
                    $vc_image = $row['vc_image'];
                    $vc_profile_title = $row['vc_profile_title'];

                    $distance = getDistance($customer_latitude, $customer_longitude, $vc_latitude, $vc_longitude);
                    if($distance <= 2){
                        $ids[$index] = $row['vc_id'];
                        $locations[$index] = ["lat" => (double)$vc_latitude, "lng" => (double)$vc_longitude];
                        $informations[$index] = ["id" => (int)$row['vc_id'], "image" => $vc_image, "title" => $vc_profile_title];
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
                        const ids = <?php echo json_encode($ids)?>;
                        console.log(ids);
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
                                    '<div class="product-thumbnail" style="width:200px"><img width="100%" src="../login_reg/images/vet_clinics/' + informations[i]["image"] + '" class="img-thumbnail img-fluid" alt=""></div><h3><a href="">' + informations[i]["title"] + '</a></h3>', 
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
            $query = "SELECT * FROM vet_clinic WHERE status = 1 AND vc_id IN ($id)";
        }else{
            $query = "SELECT * FROM vet_clinic WHERE status = 1";
        }
        if ($result = mysqli_query($connection, $query)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $vc_name = $row['vc_name'];
                    $vc_profile_title = $row['vc_profile_title'];
                    $vc_address = $row['vc_address'];
                    $vc_brpp = $row['vc_brpp'];
                    $vc_image = $row['vc_image'];
                    $vc_mobNo = $row['vc_mobNo'];
                    ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="blog grid-blog row">
                            <div class="blog-image col-sm-3">
                                <a href=""><img class="img-fluid" src="../login_reg/images/vet_clinics/<?php echo $vc_image?>" alt=""></a>
                            </div>
                            <div class="blog-content col-sm-9">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h3 class="blog-title"><a href=""><?php echo $vc_name?></a></h3>
                                        <h6><?php echo $vc_profile_title?></h6>
                                        <p><?php echo $vc_address?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2 class="pull-right col-lg-12">$<?php echo $vc_brpp?></h2><br>
                                        <p class="pull-right col-lg-12">Per Pet</p>
                                    </div>
                                </div>
                                
                                <div class="blog-info clearfix">
                                    <div class="post-right">
                                        <?php
                                        if (isset($_SESSION['customer_id'])) {
                                            ?>
                                                <a href="https://msng.link/o/?<?php echo $vc_mobNo?>=wa">
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
                    There are no any Vetenary Clinics.
                    </div>
                <?php
            }
        }else{
            ?>
                <div class="alert alert-primary" role="alert">
                There are no any Vetenary Clinics.
                </div>
            <?php
        }
    ?>
</div>