<!DOCTYPE html>
<html lang="en">

<head>
    <title>Real-estate Admin</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Samrach">
    <link rel="shortcut icon" href="../images/Logo.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

    <!-- Battambong font embed -->
    <link id="theme-style" rel="stylesheet" href="assets/fonts/battambong_regular/battambong_font.css">

    <!-- JQuery -->
    <script defer src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>

</head>

<body class="app">
    <header class="app-header fixed-top">
        <!-- header inner -->
        <?php require_once 'pages/header/header-inner.php'; ?>
        <!-- end of header inner -->
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>

            <!-- left bar -->
            <?php require_once 'pages/left-side-bar/leftbar.php'; ?>
            <!-- end of left bar -->

        </div><!--//app-sidepanel-->
    </header><!--//app-header-->