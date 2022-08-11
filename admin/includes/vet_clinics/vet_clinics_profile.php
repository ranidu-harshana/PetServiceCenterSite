<div class="row">
    <div class="col-sm-7 col-6">
        <h4 class="page-title">Pet Shop Profile</h4>
    </div>
</div>
<?php
    if(isset($_GET['vc_id'])){
        $vc_id = $_GET['vc_id'];
        $query = "SELECT * FROM vet_clinic WHERE vc_id = {$vc_id}";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $vc_name = $row['vc_name'];
            $vc_email = $row['vc_email'];
            $vc_profile_title = $row['vc_profile_title'];
            $vc_about = $row['vc_about'];
            $vc_address = $row['vc_address'];
            $vc_mobNo = $row['vc_mobNo'];
            $vc_image = $row['vc_image'];
            $vc_brpp = $row['vc_brpp'];
            $vc_petCount = $row['vc_petCount'];
            $vc_petType = $row['vc_petType'];
            $created_at = $row['created_at'];
            $status = $row['status'];
	        $vc_longitude = $row['vc_longitude'];
	        $vc_latitude = $row['vc_latitude'];
	        $location = ["lat" => (double)$vc_latitude, "lng" => (double)$vc_longitude];
        }
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="profile-view">
            <div class="profile-img-wrap">
                <div class="profile-img">
                    <a href="#"><img class="avatar" src="../login_reg/images/vet_clinics/<?php echo $vc_image; ?>" alt=""></a>
                </div>
            </div>
            <div class="profile-basic">
                <div class="row">
                    <div class="col-md-5">
                        <div class="profile-info-left">
                            <h3 class="user-name m-t-0 mb-0"><?php echo $vc_name; ?></h3>
                            <div class="staff-id"><?php echo $vc_profile_title; ?></div>
                            <div class="staff-msg">
                                <a href="https://msng.link/o/?<?php echo $vc_mobNo?>=wa">
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
                                <span class="text">+<a href="#"><?php echo $vc_mobNo?></a></span>
                            </li>
                            <li>
                                <span class="title">Email:</span>
                                <span class="text"><a href="mailto:<?php echo $vc_email?>"><?php echo $vc_email?></a></span>
                            </li>
                            <li>
                                <span class="title">Created At::</span>
                                <span class="text"><?php echo $created_at?></span>
                            </li>
                            <li>
                                <span class="title">Address:</span>
                                <span class="text"><?php echo $vc_address?></span>
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
                                                        <td><?php echo $vc_about; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Base Rate Per Pet</th>
                                                        <td><?php echo $vc_brpp; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Number of Pets can accept</th>
                                                        <td><?php echo $vc_petCount; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Pet Type</th>
                                                        <td><?php echo $vc_petType; ?></td>
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
