<?php
	session_start();

    $_SESSION['customer_id'] = null;
    $_SESSION['customer_name'] = null;

    $_SESSION['ps_id'] = null;
    $_SESSION['ps_name'] = null;

    $_SESSION['vc_id'] = null;
    $_SESSION['vc_name'] = null;

    $_SESSION['dc_id'] = null;
    $_SESSION['dc_name'] = null;

    // session_destroy();
	header("Location: ../index.php");
?>