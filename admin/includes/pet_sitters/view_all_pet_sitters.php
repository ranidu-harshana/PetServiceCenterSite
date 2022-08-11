<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">All Pet Sitter/ Day Care Centers</h4>
    </div>
</div>
<?php
    if(isset($_GET['dc_state'])){
        $msg = $_GET['dc_state'];
        if ($msg == 'failed') {
            echo "<div class='alert alert-danger' role='alert'>";
            echo    "Something Went Wrong!.";
            echo "</div>";
        }elseif ($msg == "accepted") {
            echo "<div class='alert alert-success' role='alert'>";
            echo    "Pet Sitter/ Day Care Center has been accepted!.";
            echo "</div>";
        }elseif ($msg == "rejected") {
            echo "<div class='alert alert-warning' role='alert'>";
            echo    "Pet Sitter/ Day Care Center has been rejected!.";
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
                                $query = "SELECT * FROM pet_sitter ORDER BY dc_id DESC";
                                $result = mysqli_query($connection, $query);
                                if($result){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $dc_id = $row['dc_id'];
                                        $dc_name = $row['dc_name']; 
                                        $dc_email = $row['dc_email'];
                                        $dc_address = $row['dc_address'];
                                        $dc_mobNo = $row['dc_mobNo'];
                                        $created_at = $row['created_at'];
                                        $status = $row['status'];
                                        ?>
                                            <tr>
                                                <td><?php echo $dc_id; ?></td>
                                                <td><a href="home.php?interface=pet_sitters_profile&dc_id=<?php echo $dc_id;?>"><?php echo $dc_name;?></a></td>
                                                <td><?php echo $dc_email; ?></td>
                                                <td><?php echo $dc_address; ?></td>
                                                <td><?php echo $dc_mobNo; ?></td>
                                                <td><?php echo $created_at; ?></td>
                                                <td>
                                                    <?php
                                                        if($status == 0){
                                                            ?>
                                                                <form action='includes/pet_sitters/update_action.php' method='post'>
                                                                    <input type='hidden' name='update_dc_id' value='<?php echo $dc_id; ?>'>
                                                                    <button class='btn btn-success' name='update_dc_accept' type='submit'>Accept</button>
                                                                </form>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <form action='includes/pet_sitters/update_action.php' method='post'>
                                                                    <input type='hidden' name='update_dc_id' value='<?php echo $dc_id; ?>'>
                                                                    <button class='btn btn-warning' name='update_dc_reject' type='submit'>Reject</button>
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