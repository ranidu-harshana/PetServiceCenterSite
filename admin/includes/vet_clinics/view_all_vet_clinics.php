<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">All Pet Shops</h4>
    </div>
</div>
<?php
    if(isset($_GET['vc_state'])){
        $msg = $_GET['vc_state'];
        if ($msg == 'failed') {
            echo "<div class='alert alert-danger' role='alert'>";
            echo    "Something Went Wrong!.";
            echo "</div>";
        }elseif ($msg == "accepted") {
            echo "<div class='alert alert-success' role='alert'>";
            echo    "Vetanary Clinic has been accepted!.";
            echo "</div>";
        }elseif ($msg == "rejected") {
            echo "<div class='alert alert-warning' role='alert'>";
            echo    "Vetanary Clinic has been rejected!.";
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Mobile No.</th>
                                <th>Registered At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM vet_clinic ORDER BY vc_id DESC";
                                $result = mysqli_query($connection, $query);
                                if($result){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $vc_id = $row['vc_id'];
                                        $vc_name = $row['vc_name']; 
                                        $vc_email = $row['vc_email'];
                                        $vc_address = $row['vc_address'];
                                        $vc_mobNo = $row['vc_mobNo'];
                                        $created_at = $row['created_at'];
                                        $status = $row['status'];
                                        ?>
                                            <tr>
                                                <td><?php echo $vc_id; ?></td>
                                                <td><a href="home.php?interface=vet_clinics_profile&vc_id=<?php echo $vc_id;?>"><?php echo $vc_name;?></a></td>
                                                <td><?php echo $vc_email; ?></td>
                                                <td><?php echo $vc_address; ?></td>
                                                <td><?php echo $vc_mobNo; ?></td>
                                                <td><?php echo $created_at; ?></td>
                                                <td>
                                                    <?php
                                                        if($status == 0){
                                                            ?>
                                                                <form action='includes/vet_clinics/update_action.php' method='post'>
                                                                    <input type='hidden' name='update_vc_id' value='<?php echo $vc_id; ?>'>
                                                                    <button class='btn btn-success' name='update_vc_accept' type='submit'>Accept</button>
                                                                </form>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <form action='includes/vet_clinics/update_action.php' method='post'>
                                                                    <input type='hidden' name='update_vc_id' value='<?php echo $vc_id; ?>'>
                                                                    <button class='btn btn-warning' name='update_vc_reject' type='submit'>Reject</button>
                                                                </form>
                                                            <?php
                                                        }
                                                    ?>
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