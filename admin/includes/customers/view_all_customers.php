<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">All Customers</h4>
    </div>
</div>

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
                                <th>Gender</th>
                                <th>Mobile No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM customer ORDER BY customer_id DESC";
                                $result = mysqli_query($connection, $query);
                                if($result){
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $customer_id = $row['customer_id'];
                                        $customer_name = $row['customer_name']; 
                                        $customer_email = $row['customer_email'];
                                        $customer_address = $row['customer_address'];
                                        $gender = $row['gender'];
                                        $customer_mobile = $row['customer_mobile'];
                                        ?>
                                            <tr>
                                                <td><?php echo $customer_id; ?></td>
                                                <td><?php echo $customer_name; ?></td>
                                                <td><?php echo $customer_email; ?></td>
                                                <td><?php echo $customer_address; ?></td>
                                                <td>
                                                    <?php
                                                        if($gender == 1){
                                                            echo "Male";
                                                        }else{
                                                            echo "Female";
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php echo $customer_mobile; ?></td>
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