<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title">Pet Sitter/ Day Care Center Profile</h4>
    </div>
</div>
<?php
    if(isset($_GET['dc_id'])){
        $dc_id = $_GET['dc_id'];
        $query = "SELECT * FROM pet_sitter WHERE dc_id = {$dc_id}";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $dc_name = $row['dc_name'];
            $dc_email = $row['dc_email'];
            $dc_profile_title = $row['dc_profile_title'];
            $dc_about = $row['dc_about'];
            $dc_address = $row['dc_address'];
            $dc_mobNo = $row['dc_mobNo'];
            $dc_image = $row['dc_image'];
            $dc_brpp = $row['dc_brpp'];
            $dc_petCount = $row['dc_petCount'];
            $dc_petType = $row['dc_petType'];
            $created_at = $row['created_at'];
            $status = $row['status'];
	        $dc_longitude = $row['dc_longitude'];
	        $dc_latitude = $row['dc_latitude'];
	        $location = ["lat" => (double)$dc_latitude, "lng" => (double)$dc_longitude];
        }
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="profile-view">
            <div class="profile-img-wrap">
                <div class="profile-img">
                    <a href="#"><img class="avatar" src="../login_reg/images/pet_sitters/<?php echo $dc_image; ?>" alt=""></a>
                </div>
            </div>
            <div class="profile-basic">
                <div class="row">
                    <div class="col-md-5">
                        <div class="profile-info-left">
                            <h3 class="user-name m-t-0 mb-0"><?php echo $dc_name; ?></h3>
                            <div class="staff-id"><?php echo $dc_profile_title; ?></div>
                            <div class="staff-msg">
                                <a href="https://msng.link/o/?<?php echo $dc_mobNo?>=wa">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-whatsapp" aria-hidden="true" style="color: white"></i> Contact
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <ul class="personal-info">
                            <li>
                                <span class="title">Phone:</span>
                                <span class="text">+<a href="#"><?php echo $dc_mobNo?></a></span>
                            </li>
                            <li>
                                <span class="title">Email:</span>
                                <span class="text"><a href="mailto:<?php echo $dc_email?>"><?php echo $dc_email?></a></span>
                            </li>
                            <li>
                                <span class="title">Created At::</span>
                                <span class="text"><?php echo $created_at?></span>
                            </li>
                            <li>
                                <span class="title">Address:</span>
                                <span class="text"><?php echo $dc_address?></span>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>                        
    </div>
</div>
<br>
<div class="profile-tabs">
    <ul class="nav nav-tabs nav-tabs-bottom">
        <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane show active" id="about-cont">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box mb-0">
                        <h3 class="card-title">Additional Details</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>About</th>
                                                        <td><?php echo $dc_about; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Base Rate Per Pet</th>
                                                        <td><?php echo $dc_brpp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Number of Pets can accept</th>
                                                        <td><?php echo $dc_petCount; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pet Type</th>
                                                        <td><?php echo $dc_petType; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
