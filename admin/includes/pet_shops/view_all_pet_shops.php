<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">All Pet Shops</h4>
    </div>
</div>
<?php
    if(isset($_GET['ps_state'])){
        $msg = $_GET['ps_state'];
        if ($msg == 'failed') {
            echo "<div class='alert alert-danger' role='alert'>";
            echo    "Something Went Wrong!.";
            echo "</div>";
        }elseif ($msg == "accepted") {
            echo "<div class='alert alert-success' role='alert'>";
            echo    "Pet shop has been accepted!.";
            echo "</div>";
        }elseif ($msg == "rejected") {
            echo "<div class='alert alert-warning' role='alert'>";
            echo    "Pet shop has been rejected!.";
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
                                $query = "SELECT * FROM pet_shop ORDER BY ps_id DESC";
                                $result = mysqli_query($connection, $query);
                                if($result){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $ps_id = $row['ps_id'];
                                        $ps_name = $row['ps_name']; 
                                        $ps_email = $row['ps_email'];
                                        $ps_address = $row['ps_address'];
                                        $ps_mobNo = $row['ps_mobNo'];
                                        $created_at = $row['created_at'];
                                        $status = $row['status'];
                                        ?>
                                            <tr>
                                                <td><?php echo $ps_id; ?></td>
                                                <td><a href="home.php?interface=pet_shop_profile&ps_id=<?php echo $ps_id;?>"><?php echo $ps_name;?></a></td>
                                                <td><?php echo $ps_email; ?></td>
                                                <td><?php echo $ps_address; ?></td>
                                                <td><?php echo $ps_mobNo; ?></td>
                                                <td><?php echo $created_at; ?></td>
                                                <td>
                                                    <?php
                                                        if($status == 0){
                                                            ?>
                                                                <form action='includes/pet_shops/update_action.php' method='post'>
                                                                    <input type='hidden' name='update_ps_id' value='<?php echo $ps_id; ?>'>
                                                                    <button class='btn btn-success' name='update_ps_accept' type='submit'>Accept</button>
                                                                </form>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <form action='includes/pet_shops/update_action.php' method='post'>
                                                                    <input type='hidden' name='update_ps_id' value='<?php echo $ps_id; ?>'>
                                                                    <button class='btn btn-warning' name='update_ps_reject' type='submit'>Reject</button>
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