<?php
session_start();
date_default_timezone_set("Asia/Phnom_Penh");
include_once '../config_db/config_db.php';
?>

<!-- Header -->
<?php require_once 'pages/header/header.php'; ?>
<!-- End of header -->


<!-- homepage -->
<?php
if (isset($_GET['pg'])) {
	include "pages/" . $_GET['pg'] . ".php";
} elseif (isset($_GET['pt'])) { // pt = propery type
	include "pages/property_type/" . $_GET['pt'] . ".php";
} elseif (isset($_GET['p'])) { // p = propery
	include "pages/property/" . $_GET['p'] . ".php";
} elseif (isset($_GET['agency'])) { // p = propery
	include "pages/agency/" . $_GET['agency'] . ".php";
} else {
	include 'pages/homepage.php';
}

?>
<!-- End of homepage -->

<!-- Footer -->
<?php include 'pages/footer/footer.php'; ?>
<!-- End of footer -->