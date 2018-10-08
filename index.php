<?php
// ob_start();
session_start();
require './classes/application.php';
$obj_app = new Application();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Maverick Apps</title>

        <!-- core CSS -->
        <link href="assets/front_end_assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/animate.min.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/prettyPhoto.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/main.css" rel="stylesheet">
        <link href="assets/front_end_assets/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="assets/front_end_assets/js/html5shiv.js"></script>
        <script src="assets/front_end_assets/js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="assets/front_end_assets/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/front_end_assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/front_end_assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/front_end_assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/front_end_assets/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body class="homepage">
        <!--header starts-->
        <?php include './include/header.php'; ?>
        <!--/header-->

        <!--home content-->
        <?php
        if (isset($check)) {
            if ($check == 'contact') {
                include 'pages/contact_us_content.php';
            } elseif ($check == 'about-us') {
                include 'pages/about_us_content.php';
            }
        } else {
            include './pages/home_content.php';
        }
        ?>

        <!--footer starts-->
        <?php include './include/footer.php'; ?>
        <!--/#footer-->

        <script src="assets/front_end_assets/js/jquery.js"></script>
        <script src="assets/front_end_assets/js/bootstrap.min.js"></script>
        <script src="assets/front_end_assets/js/jquery.prettyPhoto.js"></script>
        <script src="assets/front_end_assets/js/jquery.isotope.min.js"></script>
        <script src="assets/front_end_assets/js/main.js"></script>
        <script src="assets/front_end_assets/js/wow.min.js"></script>
    </body>
</html>