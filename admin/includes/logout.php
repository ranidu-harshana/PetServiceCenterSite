<?php
	session_start();

	$_SESSION['admin_id'] = null;
	$_SESSION['name'] = null;

	// session_destroy();
	header("Location: ../../index.php");
?>