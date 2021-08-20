<?php
require_once 'connections.php';

if(!isset($_SESSION['cart']) & empty($_SESSION['cart'])){
  header('location: index.php');
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

                                    <a href="cart.php">Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                            <div class="table-responsive">
                              <table class="table-p">
                                  <tbody>

                                  <!--====== Row ======-->
                                  <tr>
                                      <td>
                                          <div class="table-p__box">
                                              <div class="table-p__price">
                                                <span class="table-p__price">Image</span>
                                              </div>
                                          </div>
                                      </td>
                                      <td>

                                                <span class="table-p__price">Title</span>

                                      </td>
                                      <td>
                                        <td>
                                          <span class="table-p__price" type="hidden"></span>
                                        </td>
                                        <td>
                                          <span class="table-p__price"></span>
                                        </td>
                                        <td>
                                          <span class="table-p__price"></span>
                                        </td>
                                        <td>
                                          <span class="table-p__price">Price</span>
                                        </td>
                                        </td>
                                      <td>
                                        <span class="table-p__price">Quantity</span></td>
                                      <td>
                                        <span class="table-p__price">Remove</span></td>
                                      <td>
                                          <span class="table-p__price">Total</span></td>
                                  </tr>
                                  <!--====== End - Row ======-->
                                  </tbody>
                              </table>
                                <table class="table-p">
                                    <tbody>
                                      <?php
                                        $total = 0;
                                        foreach ($cart as $key => $value) {
                                        //echo $key . " : " . $value['quantity'] ."<br>";
                                        $cartsql = "SELECT * FROM bookivia_books WHERE Book_ISBN=$key";
                                        $cartres = mysqli_query($db, $cartsql);
                                        $cartr = mysqli_fetch_assoc($cartres);
                                        $total = $total + ($cartr['Book_Price']*$value['quantity']);
                                        ?>
                                    <!--====== Row ======-->
                                    <tr>
                                        <td>
                                            <div class="table-p__box">
                                                <div class="table-p__img-wrap">

                                                    <img class="u-img-fluid" src="admin/<?php echo $cartr['Book_Image']; ?>" alt=""></div>
                                                <div class="table-p__info">
                                                  <span class="table-p__name">
                                                    <a href="products.php?id=<?php echo $cartr['Book_ISBN']; ?>"><?php echo $cartr['Book_Title']; ?></a></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                          <div class="table-p__info">
                                            <span class="table-p__price">$<?php echo $cartr['Book_Price']; ?></span>
                                          </div>
                                        </td>
                                        <td>
                                            <div class="table-p__input-counter-wrap">

                                                <!--====== Input Counter ======-->
                                                <div class="input-counter">

                                                    <span class="input-counter__minus fas fa-minus"></span>

                                                    <input class="input-counter__text input-counter--text-primary-style" type="text" value="<?php echo $value['quantity']; ?>"  data-min="1" data-max="100" name="Book_Quant">

                                                    <span class="input-counter__plus fas fa-plus"></span></div>
                                                <!--====== End - Input Counter ======-->
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-p__del-wrap">

                                                <a class="far fa-trash-alt table-p__delete-link" href="deletecart.php?id=<?php echo $key; ?>"></a></div>
                                        </td>
                                        <td>

                                            <span class="table-p__price">$<?php echo $cartr['Book_Price']*$value['quantity']; ?></span></td>

                                    </tr>
                                    <!--====== End - Row ======-->
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>

                        <div class="u-s-m-b-15">
                          <div class="table-p">
                            <table>
                              <tbody>
                                <tr>
                                  <td><span class="table-p__price">Cart subtotal:</span></td>
                                  <td><span class="table-p__price">$ <?php echo $total; ?></span></td>
                                </tr>
                                <tr>
                                  <td><span class="table-p__price">Shipping:</span></td>
                                  <td><span class="table-p__price">FREE</span></td>
                                </tr>
                                <tr>
                                  <td><span class="table-p__price">Cart Total</span></td>
                                  <td><span class="table-p__price">$ <?php echo $total; ?></span></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="route-box">
                                <div class="route-box__g1">

                                    <a class="route-box__link" href="shop.php"><i class="fas fa-long-arrow-alt-left"></i>

                                        <span>CONTINUE SHOPPING</span></a></div>
                                <div class="route-box__g2">
                                  <a class="route-box__link" href="cart.php"><i class="fas fa-sync"></i>

                                      <span>UPDATE CART</span></a>

                                    <a class="route-box__link" href="checkout.php"><i class="fas fa-shopping-cart"></i>
                                        <span>CHECKOUT</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->

    </div>
    <!--====== End - Section 3 ======-->
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
