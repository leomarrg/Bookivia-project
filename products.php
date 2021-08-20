<?php
require_once 'Connections.php';
if(isset($_GET['id']) & !empty($_GET['id'])){
$id = $_GET['id'];
$prodsql = "SELECT * FROM bookivia_books WHERE Book_ISBN = $id";
$prodres = mysqli_query($db, $prodsql);
$prodr = mysqli_fetch_assoc($prodres);
}else{
header('location:Shop.php');
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
  <?php include 'header.php'; ?>
  <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-t-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <!--====== Product Detail Zoom ======-->
                            <div class="pd u-s-m-b-30">
                                <div class="slider-fouc pd-wrap">
                                    <div id="pd-o-initiate">
                                        <div class="pd-o-img-wrap" data-src="admin/<?php echo $r['Book_Image']; ?>">
                                            <img class="u-img-fluid" src="admin/<?php echo $prodr['Book_Image']; ?>" data-zoom-image="admin/<?php echo $prodr['Book_Image']; ?>" alt=""></div>
                                    </div>

                                    <span class="pd-text">Click for larger zoom</span>
                                </div>
                                <div class="u-s-m-t-15">
                                    <div class="slider-fouc">
                                        <div id="pd-o-thumbnail">
                                            <div>
                                                <img class="u-img-fluid" src="admin/<?php echo $prodr['Book_Image']; ?>" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Product Detail Zoom ======-->
                        </div>
                        <div class="col-lg-7">

                            <!--====== Product Right Side Details ======-->
                            <div class="pd-detail">
                                <div>

                                    <span class="pd-detail__name"><?php echo $prodr['Book_Title']; ?> by <?php echo $prodr['Book_Author']; ?></span></div>
                                <div>
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__price">$<?php echo $prodr['Book_Price']; ?></span></div>
                                </div>
                                <div class="u-s-m-b-15">

                                </div>
                                <div class="u-s-m-b-120">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__stock"><?php echo $prodr['Book_Quantity']; ?> in Stock.</span>
                                </div>
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-25">
                                  <div>

                                      <span class="pd-detail__name">Book information</span></div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-ISBN">ISBN: <?php echo $prodr['Book_ISBN']; ?></span>
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-Title">Title: <?php echo $prodr['Book_Title']; ?></span>
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-Author">Author: <?php echo $prodr['Book_Author']; ?></span>
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-Title">Edition: <?php echo $prodr['Book_Edition']; ?></span>
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-Title">Published Date: <?php echo $prodr['Book_Published_Date']; ?></span>
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-Genre">Genre: <?php echo $prodr['Book_Genre']; ?></span>
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-Format">Format: <?php echo $prodr['Book_Format']; ?></span>
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-Editorial">Editorial: <?php echo $prodr['Book_Editorial']; ?></span>
                                  </div>
                                  <div class="u-s-m-b-15">
                                    <span class="pd-detail__preview-Status">Status: <?php echo $prodr['Book_Status']; ?></span>
                                  </div>
                                </div>
                                <div class="u-s-m-b-15">

                                </div>
                                <div class="u-s-m-b-15">
                                    <form class="pd-detail__form" method="get" action="addtocart.php">
                                        <div class="pd-detail-inline-2">
                                            <div class="u-s-m-b-15">
                                                <!--====== Input Counter ======-->
                                                <input class="input-text input-text--primary-style" type="hidden" name="id" value="<?php echo $prodr['Book_ISBN']; ?>"></div>
                                                <input class="input-text input-text--primary-style" type="text" name="quant" data-min="1" value="1"></div>
                                                <!--====== End - Input Counter ======-->
                                            </div>
                                            <div class="u-s-m-b-15">
                                          <button class="btn btn--e-brand-b-2" type="submit">ADD TO CART</button></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--====== End - Product Right Side Details ======-->
                        </div>
                    </div>
                </div>
            </div>

            <!--====== Product Detail Tab ======-->
            <div class="u-s-p-y-60">
              <ul class="nav pd-tab__list">
              </ul>
            </div>
            <!--====== End - Product Detail Tab ======-->
            <div class="u-s-p-b-1">
            </div>
            <!--====== End - Section 1 ======-->
        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        <?php include 'footer.php'; ?>
    </div>
    <!--====== End - Main App ======-->

        <!--====== Modal Section ======-->

        <!--====== Add to Cart Modal ======-->
        <div class="modal fade" id="add-to-cart">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-radius modal-shadow">

                    <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="success u-s-m-b-30">
                                    <div class="success__text-wrap"><i class="fas fa-check"></i>

                                        <span>Item is added successfully!</span></div>
                                    <div class="success__img-wrap">

                                        <img class="u-img-fluid" src="images/product/electronic/product1.jpg" alt=""></div>
                                    <div class="success__info-wrap">

                                        <span class="success__name">Beats Bomb Wireless Headphone</span>

                                        <span class="success__quantity">Quantity: 1</span>

                                        <span class="success__price">$170.00</span></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="s-option">

                                    <span class="s-option__text">1 item (s) in your cart</span>
                                    <div class="s-option__link-box">

                                        <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE SHOPPING</a>

                                        <a class="s-option__link btn--e-white-brand-shadow" href="cart.html">VIEW CART</a>

                                        <a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO CHECKOUT</a></div>
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
