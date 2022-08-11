<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Dashboard</h4>
    </div>
</div>

<div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-rss" aria-hidden="true" style="color: green"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Blog Posts</p>
                                <p class="card-title">
	                                <?php
		                                $query = "SELECT * FROM post";
		                                $result = mysqli_query($connection, $query);
		                                echo mysqli_num_rows($result);
	                                ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-check" style="color: greenyellow"></i>
                        <a href="home.php?interface=view_all_posts">View All</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-handshake-o" aria-hidden="true" style="color: blue"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Services</p>
                                <p class="card-title">
                                    <?php
                                        $query = "SELECT * FROM pet_shop";
                                        $result = mysqli_query($connection, $query);
                                        $count = mysqli_num_rows($result);

	                                    $query = "SELECT * FROM pet_sitter";
	                                    $result = mysqli_query($connection, $query);
	                                    $count += mysqli_num_rows($result);

	                                    $query = "SELECT * FROM vet_clinic";
	                                    $result = mysqli_query($connection, $query);
	                                    $count += mysqli_num_rows($result);

                                        echo $count;
                                    ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-check" style="color: greenyellow"></i>
                        Total Services
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-users" aria-hidden="true" style="color: red"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Customers</p>
                                <p class="card-title">
                                    <?php
	                                    $query = "SELECT * FROM customer";
	                                    $result = mysqli_query($connection, $query);
	                                    echo mysqli_num_rows($result);
                                    ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-check" style="color: greenyellow"></i>
                        <a href="home.php?interface=view_all_customers">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        <?php
            $query = "SELECT * FROM post WHERE status = 1";
            $result = mysqli_query($connection, $query);
            $posted =  mysqli_num_rows($result);

            $query = "SELECT * FROM post WHERE status = 0";
            $result = mysqli_query($connection, $query);
            $not_posted =  mysqli_num_rows($result);

            $query = "SELECT * FROM pet_shop WHERE status = 1";
            $result = mysqli_query($connection, $query);
            $ps_approved =  mysqli_num_rows($result);

            $query = "SELECT * FROM pet_shop WHERE status = 0";
            $result = mysqli_query($connection, $query);
            $ps_not_approved =  mysqli_num_rows($result);

            $query = "SELECT * FROM pet_sitter WHERE status = 1";
            $result = mysqli_query($connection, $query);
            $dc_approved =  mysqli_num_rows($result);

            $query = "SELECT * FROM pet_sitter WHERE status = 0";
            $result = mysqli_query($connection, $query);
            $dc_not_approved =  mysqli_num_rows($result);

            $query = "SELECT * FROM vet_clinic WHERE status = 1";
            $result = mysqli_query($connection, $query);
            $vc_approved =  mysqli_num_rows($result);

            $query = "SELECT * FROM vet_clinic WHERE status = 0";
            $result = mysqli_query($connection, $query);
            $vc_not_approved =  mysqli_num_rows($result);

            $query = "SELECT * FROM customer";
            $result = mysqli_query($connection, $query);
            $customer =  mysqli_num_rows($result);
        ?>
        var posted = <?php echo (int)$posted; ?>;
        var not_posted = <?php echo (int)$not_posted; ?>;

        var ps_approved = <?php echo (int)$ps_approved; ?>;
        var ps_not_approved = <?php echo (int)$ps_not_approved; ?>;

        var dc_approved = <?php echo (int)$dc_approved; ?>;
        var dc_not_approved = <?php echo (int)$dc_not_approved; ?>;

        var vc_approved = <?php echo (int)$vc_approved; ?>;
        var vc_not_approved = <?php echo (int)$vc_not_approved; ?>;

        var customer = <?php echo (int)$customer; ?>;
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['', 'Done', 'Not Done'],
                ['Blog Posts', posted, not_posted],
                ['Pet Shops', ps_approved, ps_not_approved],
                ['Pet Sitters', dc_approved, dc_not_approved],
                ['Vet Clinics', vc_approved, vc_not_approved],
                ['Customers', customer, 0]
            ]);

            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

    <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
</div>


