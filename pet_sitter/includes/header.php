<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("../admin/includes/db.php"); ?>
<?php
    if (!isset($_SESSION['dc_id'])) {
        header("Location: ../login_reg/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/style.css">

</head>

<body>
    <div class="main-wrapper">