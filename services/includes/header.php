<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../admin/includes/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Services</title>
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/style.css">
    <style>
		#map {
			height: 400px;
			width: 100%;
		}
	</style>
</head>

<body>
    <div class="main-wrapper">