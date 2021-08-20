<?php
include 'Connections.php';
if(!isset($_SESSION['cEmail']) & empty($_SESSION['cEmail'])){
  header('location: signin.php');
}
$cusID = $_SESSION['customerid'];
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

                                        <a href="dash-my-order.php">My Account</a></li>
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

                                                  <a href="dashboard.php">Dashboard</a></li>
                                              <li>

                                                  <a href="dash-my-profile.php">My Profile</a></li>
                                              <li>

                                                  <a href="dash-address.php">Address</a></li>
                                              <li>

                                                  <a class="dash-active" href="dash-my-order.php">My Orders</a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

                                            <span class="dash__text u-s-m-b-30">Here you can see all products that have been ordered.</span>
                                            <?php
                                            $ordsql = "SELECT * FROM order_table WHERE cAccount_ID = '$cusID'";
                                            $ordres = mysqli_query($db, $ordsql);
                                            while($ordr = mysqli_fetch_assoc($ordres)){
                                                ?>
                                            <div class="m-order__list">
                                                <div class="m-order__get">
                                                    <div class="manage-o__header u-s-m-b-30">
                                                      <div class="manage-o__text-2 u-c-secondary">Order #<?php echo $ordr['Order_ID']; ?></div>
                                                      <div class="manage-o__text u-c-silver">Placed on <?php echo $ordr['Order_Date']; ?></div>
                                                      <div class="dash__link dash__link--brand">

                                                        <a href="dash-manage-order.php?id=<?php echo $ordr['Order_ID']; ?>">VIEW DETAILS</a></div>
                                                        <div class="dash__link dash__link--brand">
                                                        <a href="invoice.php?id=<?php echo $ordr['Order_ID']; ?>">VIEW INVOICE</a></div>
                                                          <div>
                                                              <span>Shipping: <?php echo $ordr['Shipping_Status']; ?></span>
                                                              <span>  |  </span>
                                                              <span>Payment: <?php echo $ordr['Payment_Status']; ?></span></div>
                                                        <div class="dash-l-r">
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $oid = $ordr['Order_ID'];
                                                    $pdsql = "SELECT * FROM order_details WHERE Order_ID = '$oid'";
                                                    $pdres = mysqli_query($db, $pdsql);
                                                    while($pdr = mysqli_fetch_assoc($pdres)){

                                                          $pdISBN = $pdr['Book_ISBN'];
                                                          $prodsql = "SELECT * FROM bookivia_books WHERE Book_ISBN = '$pdISBN'";
                                                          $prodres = mysqli_query($db, $prodsql);
                                                          $prodr = mysqli_fetch_assoc($prodres);
                                                          ?>
                                                    <div class="dash-l-r">
                                                        <div class="description__container">
                                                            <div class="description__img-wrap">

                                                                <img class="u-img-fluid" src="admin/<?php echo $prodr['Book_Image']; ?>" alt=""></div>
                                                            <div class="description-title">ISBN: <?php echo $prodr['Book_ISBN']; ?></div>
                                                            <div class="description-title"> - <?php echo $prodr['Book_Title']; ?></div>
                                                        </div>
                                                        <div class="description__info-wrap">
                                                            <div>

                                                                <span class="manage-o__text-2 u-c-silver">Quantity:

                                                                    <span class="manage-o__text-2 u-c-secondary"><?php echo $pdr['Product_Quantity']; ?></span></span></div>
                                                            <div>

                                                                <span class="manage-o__text-2 u-c-silver">Total:

                                                                    <span class="manage-o__text-2 u-c-secondary">$<?php echo $pdr['Product_Price']; ?></span></span></div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                          <?php } ?>
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
