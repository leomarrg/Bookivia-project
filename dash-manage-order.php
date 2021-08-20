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

                                        <a href="dash-manage-order.php">My Account</a></li>
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
                                <?php
                                if(isset($_GET['id']) & !empty($_GET['id'])){
                                $oid = $_GET['id'];
                                }else{
                                	header('location: dash-my-order.php');
                                }
                                $ordsql = "SELECT * FROM order_table WHERE Order_ID = '$oid'";
                                $ordres = mysqli_query($db, $ordsql);
                                $ordr = mysqli_fetch_assoc($ordres);
                                ?>
                                <div class="col-lg-9 col-md-12">
                                    <h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <div class="dash-l-r">
                                                <div>
                                                    <div class="manage-o__text-2 u-c-secondary">Order #<?php echo $ordr['Order_ID']; ?></div>
                                                    <div class="manage-o__text u-c-silver">Placed on <?php echo $ordr['Order_Date']; ?></div>
                                                </div>
                                                <div>
                                                    <div class="manage-o__text-2 u-c-silver">Total:

                                                        <span class="manage-o__text-2 u-c-secondary">$<?php echo $ordr['Total_Price']; ?></span></div>
                                                        <div class="manage-o__text u-c-silver">Arriving on <?php echo $ordr['Arrival_Date']; ?></div>
                                                </div>
                                            </div>
                                            <div class="manage-o__timeline">
                                              <?php if($ordr['Shipping_Status'] == 'Delivered' ){ ?>
                                                <div class="timeline-row">
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i timeline-l-i--finish">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Processing</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i timeline-l-i--finish">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Shipped</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 u-s-m-b-30">
                                                        <div class="timeline-step">
                                                            <div class="timeline-l-i timeline-l-i--finish">

                                                                <span class="timeline-circle"></span></div>

                                                            <span class="timeline-text">Delivered</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php  } ?>
                                            <?php if($ordr['Shipping_Status'] == 'Shipped' ){ ?>
                                              <div class="timeline-row">
                                                  <div class="col-lg-4 u-s-m-b-30">
                                                      <div class="timeline-step">
                                                          <div class="timeline-l-i timeline-l-i--finish">

                                                              <span class="timeline-circle"></span></div>

                                                          <span class="timeline-text">Processing</span>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-4 u-s-m-b-30">
                                                      <div class="timeline-step">
                                                          <div class="timeline-l-i timeline-l-i--finish">

                                                              <span class="timeline-circle"></span></div>

                                                          <span class="timeline-text">Shipped</span>
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-4 u-s-m-b-30">
                                                      <div class="timeline-step">
                                                          <div class="timeline-l-i timeline-l-i">

                                                              <span class="timeline-circle"></span></div>

                                                          <span class="timeline-text">Delivered</span>
                                                      </div>
                                                  </div>
                                              </div>
                                          <?php  } ?>
                                          <?php if($ordr['Shipping_Status'] == 'Processing' ){ ?>
                                            <div class="timeline-row">
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Processing</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Shipped</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i">

                                                            <span class="timeline-circle"></span></div>

                                                        <span class="timeline-text">Delivered</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $orditmsql = "SELECT * FROM order_details WHERE Order_ID = '$oid'";
                                    $orditmres = mysqli_query($db, $orditmsql);
                                    while($orditmr = mysqli_fetch_assoc($orditmres)){
                                      $pdISBN = $orditmr['Book_ISBN'];
                                      $prodsql = "SELECT * FROM bookivia_books WHERE Book_ISBN = '$pdISBN'";
                                      $prodres = mysqli_query($db, $prodsql);
                                      $prodr = mysqli_fetch_assoc($prodres);
                                      ?>
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <div class="manage-o">
                                                <div class="manage-o__description">
                                                    <div class="description__container">
                                                        <div class="description__img-wrap">

                                                            <img class="u-img-fluid" src="admin/<?php echo $prodr['Book_Image']; ?>" alt=""></div>
                                                        <div class="description-title"><?php echo $prodr['Book_Title']; ?></div>
                                                    </div>
                                                    <div class="description__info-wrap">
                                                        <div>

                                                            <span class="manage-o__text-2 u-c-silver">Quantity:

                                                                <span class="manage-o__text-2 u-c-secondary"><?php echo $orditmr['Product_Quantity']; ?></span></span></div>
                                                        <div>

                                                            <span class="manage-o__text-2 u-c-silver">Total:

                                                                <span class="manage-o__text-2 u-c-secondary">$<?php echo $orditmr['Product_Price']; ?></span></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  <?php } ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 u-c-secondary">Subtotal</div>
                                                        <div class="manage-o__text-2 u-c-secondary">$<?php echo $ordr['Total_Price']; ?></div>
                                                    </div>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 u-c-secondary">Total</div>
                                                        <div class="manage-o__text-2 u-c-secondary">$<?php echo $ordr['Total_Price']; ?></div>
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
