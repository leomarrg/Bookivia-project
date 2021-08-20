<?php
include 'Connections.php';
if(!isset($_SESSION['cEmail']) & empty($_SESSION['cEmail'])){
  header('location: signin.php');
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/favicon.png" rel="shortcut icon">
    <title>Bookivia - Books of every genre, for everyone</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <!--====== Main Header ======-->
  <?php include 'header.php'; ?>
        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="breadcrumb">
                            <div class="breadcrumb__wrap">
                                <ul class="breadcrumb__list">
                                    <li class="has-separator">

                                        <a href="index.php">Home</a></li>
                                    <li class="is-marked">

                                        <a href="dashboard.php">My Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="dash">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-12">

                                  <!--====== Dashboard Features ======-->
                                  <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                      <div class="dash__pad-1">

                                          <span class="dash__text u-s-m-b-16">Dashboard options</span>
                                          <ul class="dash__f-list">
                                              <li>

                                                  <a class="dash-active" href="dashboard.php">Dashboard</a></li>
                                              <li>

                                                  <a href="dash-my-profile.php">My Profile</a></li>
                                              <li>

                                                  <a href="dash-address.php">Address</a></li>
                                              <li>

                                                  <a href="dash-my-order.php">My Orders</a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <!--====== End - Dashboard Features ======-->

                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>

                                            <span class="dash__text u-s-m-b-30">From this dashboard, you can see your orders, edit or view information. Select a link below to view or edit information.</span>
                                            <div class="gl-s-api">
                                              <?php if(isset($_GET['message'])){
                                                 if($_GET['message'] == 1){
                                                   ?> <div class="gl-tag btn--e-brand-shadow" role="alert"> <?php echo
                                                "Your order has been placed. Invoice available on your My-order page."; ?> </div>
                                              <?php }
                                              elseif($_GET['message'] == 2){
                                                   ?> <div class="gl-tag btn--e-brand-shadow" role="alert"> <?php echo
                                                "Your order has been placed. Paypal information already confirmed."; ?> </div>
                                              <?php } } ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                        <div class="dash__pad-3">
                                                            <h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>
                                                            <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                                <a href="dash-my-profile.php">View</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                        <div class="dash__pad-3">
                                                            <h2 class="dash__h2 u-s-m-b-8">ADDRESS</h2>

                                                            <span class="dash__text-2 u-s-m-b-8">Default Shipping Address</span>
                                                            <div class="dash__link dash__link--secondary u-s-m-b-8">
                                                                <a href="dash-address.php">View</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                        <div class="dash__pad-3">
                                                            <h2 class="dash__h2 u-s-m-b-8">ORDERS</h2>

                                                            <span class="dash__text-2 u-s-m-b-8">Your orders</span>
                                                            <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                                <a href="dash-my-order.php">View</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
  <?php include 'footer.php'; ?>
    </div>
    <!--====== End - Main App ======-->

    <!--====== Vendor Js ======-->
    <script src="js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="js/app.js"></script>

    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
</body>
</html>
