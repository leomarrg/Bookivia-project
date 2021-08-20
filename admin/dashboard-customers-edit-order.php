<?php
  require_once '../connections.php';
	if(!isset($_SESSION['aEmail']) & empty($_SESSION['aEmail'])){
		header('location: login.php');
	}
  if(isset($_GET) & !empty($_GET)){
    $id = $_GET['id'];
  }else{
    header('location:dashboard_customers_acc.php');
  }

  if(isset($_POST) & !empty($_POST)){
    $ARR = mysqli_real_escape_string($db, $_POST['Arr_Date']);
    $ShipStat = mysqli_real_escape_string($db, $_POST['Ship_Status']);
      $sql = "UPDATE order_table SET Arrival_Date = '$ARR', Shipping_Status = '$ShipStat'
      WHERE Order_ID = $id";
      $res = mysqli_query($db, $sql);
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
    <link href="../images/favicon.png" rel="shortcut icon">
    <title>Edit Order - Bookivia</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="../css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="../css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="../css/app.css">
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="../images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

      <!--====== Main Header ======-->
      <header class="header--style-1 header--box-shadow">

        <!--====== Nav 1 ======-->
        <nav class="primary-nav primary-nav-wrapper--border">
            <div class="container">

                <!--====== Primary Nav ======-->
                <div class="primary-nav">

                    <!--====== Main Logo ======-->

                    <a class="main-logo" href="dashboard_admin.php">

                        <img src="images/logo/logo-1.png" alt=""></a>
                    <!--====== End - Main Logo ======-->

                    <!--====== Dropdown Main plugin ======-->
                    <div class="menu-init" id="navigation">

                        <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button>

                        <!--====== Menu ======-->
                        <div class="ah-lg-mode">

                            <span class="ah-close">✕ Close</span>

                            <!--====== List ======-->
                            <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                      <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">

                                          <a><a href="dashboard_admin.php"><i class="far fa-user-circle"></i></a>

                                          <!--====== Dropdown ======-->

                                          <span class="js-menu-toggle"></span>
                                          <ul style="width:120px">
                                              <li>
                                                  <a href="logout.php"><i class="fas fa-lock-open u-s-m-r-6"></i>

                                                      <span>Log out</span></a></li>
                                          </ul>
                                          <!--====== End - Dropdown ======-->
                                      </li>
                              </ul>
                            </ul>
                            <!--====== End - List ======-->
                        </div>
                        <!--====== End - Menu ======-->
                    </div>
                    <!--====== End - Dropdown Main plugin ======-->
                </div>
                <!--====== End - Primary Nav ======-->
            </div>
        </nav>
        <!--====== End - Nav 1 ======-->

    </header>
    <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">
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

                                            <span class="dash__text u-s-m-b-16">Hello, Admin</span>
                                            <ul class="dash__f-list">
                                                <li>

                                                    <a href="dashboard_admin.php">Backend Menu</a></li>
                                                <li>

                                                    <a href="dashboard_products_inventory.php">Inventory</a></li>
                                                <li>

                                                    <a href="dashboard-report.php">Report</a></li>
                                                <li>

                                                    <a href="dashboard_admin_acc.php">Admin Accounts</a></li>
                                                <li>

                                                    <a class="dash-active" href="dashboard_customers_acc.php">Customer Accounts</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <?php
                                $ordsql = "SELECT * FROM order_table WHERE Order_ID = '$id'";
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
                                                        <div class="manage-o__text u-c-secondary">Arriving on <?php echo $ordr['Arrival_Date']; ?></div>
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
                                            <div class="manage-o__header u-s-m-b-30">
                                                    <a class="address-book-edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#Change-Order-status">Update status</a>
                                                    <a class="address-book-edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#Change-Order_Arr_Date">Update Arrival Date</a>
                                            </div>
                                            <div class="manage-o__icon"><i class="fas fa-truck u-s-m-r-5"></i>

                                                <span class="manage-o__text"><?php echo $ordr['Shipping_Status']; ?></span></div>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                          <?php
                                          $orditmsql = "SELECT * FROM order_details WHERE Order_ID = '$id'";
                                          $orditmres = mysqli_query($db, $orditmsql);
                                          while($orditmr = mysqli_fetch_assoc($orditmres)){
                                            $pdISBN = $orditmr['Book_ISBN'];
                                            $prodsql = "SELECT * FROM bookivia_books WHERE Book_ISBN = '$pdISBN'";
                                            $prodres = mysqli_query($db, $prodsql);
                                            $prodr = mysqli_fetch_assoc($prodres);
                                            ?>
                                            <div class="manage-o">
                                                <div class="manage-o__description">
                                                    <div class="description__container">
                                                        <div class="description__img-wrap">

                                                            <img class="u-img-fluid" src="<?php echo $prodr['Book_Image']; ?>" alt=""></div>
                                                        <div class="description-title"><?php echo $prodr['Book_Title']; ?></div>
                                                    </div>
                                                    <div class="description__info-wrap">
                                                        <div>

                                                            <span class="manage-o__text-2 u-c-silver">Quantity:

                                                                <span class="manage-o__text-2 u-c-secondary"><?php echo $orditmr['Product_Quantity']; ?></span></span></div>
                                                        <div>

                                                            <span class="manage-o__text-2 u-c-silver">Total:

                                                                <span class="manage-o__text-2 u-c-secondary">$<?php echo $orditmr['Product_Price']*$orditmr['Product_Quantity']; ?></span></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                          <?php } ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 u-c-secondary">Total</div>
                                                        <div class="manage-o__text-2 u-c-secondary">$<?php echo $ordr['Total_Price']; ?></div>
                                                    </div>

                                                    <span class="dash__text-2">Paid through PayPal.</span>
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
        <footer>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">

                                    <span>Copyright © 2021</span>

                                    <a href="dashboard_admin.php">Bookivia</a>

                                    <span>All Right Reserved</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--====== End - Main App ======-->
  </div>
  <!--====== End - Main App ======-->

      <!--====== Modal Section ======-->
      <!--====== Add to Cart Modal ======-->
      <div class="modal fade" id="Change-Order-status">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content modal-radius modal-shadow">

                  <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                  <div class="modal-body">

                          <div class="u-s-m-b-30">
                              <div class="shop-w shop-w--style">
                                <form method="POST">
                                <h1 class="shop-w__h">ORDER ID: #<?php echo $ordr['Order_ID']; ?></h1>
                                  <div class="shop-w__intro-wrap">
                                      <h1 class="shop-w__h">ORDER SHIPPING STATUS:</h1>
                                  </div>
                                  <select class="select-box select-box--primary-style u-w-100" id="book_Status" name="Ship_Status">
                                  <div class="u-s-m-b-30">
                                          <option selected><?php echo $ordr['Shipping_Status']; ?></option>
                                          <option value="Processing">Processing</option>
                                          <option value="Shipped">Shipped</option>
                                          <option value="Delivered">Delivered</option>
                                      </select></div>
                                  <button class="btn btn--e-brand-b-2" type="submit" name="Update-ARR">UPDATE</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--====== End - Add to Cart Modal ======-->
      <!--====== Add to Cart Modal ======-->
      <div class="modal fade" id="Change-Order_Arr_Date">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content modal-radius modal-shadow">

                  <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                  <div class="modal-body">

                          <div class="u-s-m-b-30">
                              <div class="shop-w shop-w--style">
                                <h1 class="shop-w__h">Arrival Date:</h1>
                                  <div class="shop-w__intro-wrap">
                                    <h1 class="shop-w__h">Use YYYY-MM-DD</h1>
                                    <input class="input-text input-text--primary-style" type="text" id="Arr_Date" name="Arr_Date" value="<?php echo $ordr['Arrival_Date']; ?>">
                                  </div>
                                  <button class="btn btn--e-brand-b-2" type="submit" name="Update-ARR">UPDATE</button>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--====== End - Add to Cart Modal ======-->
      <!--====== End - Modal Section ======-->
  </div>

    <!--====== Vendor Js ======-->
    <script src="../js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="../js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="../js/app.js"></script>

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
