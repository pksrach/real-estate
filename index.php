<!-- Header -->
<?php require 'pages/header/header.php'; ?>
<!-- End of header -->


<!-- Homepage -->
<?php
if (isset($_GET['p'])) {
  include "pages/" . $_GET['p'] . ".php";
} else {
  include 'pages/homepage.php';
}
?>
<!-- End of homepage -->


<!-- Footer -->
<?php include 'pages\footer\footer.php'; ?>
<!-- End of footer -->