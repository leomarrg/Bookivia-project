<?php
include 'Connections.php';
if(!isset($_SESSION['cEmail']) & empty($_SESSION['cEmail'])){
  header('location: signin.php');
}

if(isset($_POST) & !empty($_POST))
{
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];
  $sql = "SELECT * FROM bookivia_customers WHERE cEmail='$email'";
  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
  $r = mysqli_fetch_assoc($result);
  $accID = $r['cAccount_ID'];
  $pcsql = "SELECT * FROM payment_type WHERE pEmail = '$email'";
  $pcres = mysqli_query($db, $pcsql) or die(mysqli_error($db));
  $pcr = mysqli_fetch_assoc($pcres);
  $paymail = $pcr['pEmail'];
  if($r['cStatus'] == 'Unavailable'){
    header("location: dash-payment-order.php?message=3");
  }
  else{
    if(password_verify($password, $r['cPassword'])){
      if($email == $_SESSION['cEmail']){
        if($email == $paymail) {
          header("location: dashboard.php?message=2");
        }else{
          $psql = "INSERT INTO payment_type (pEmail, cAccount_ID) VALUES ('$email', '$accID')";
          $psqlres = mysqli_query($db, $psql) or die(mysqli_error($db));
          header("location: dashboard.php?message=1");
        }
      }
      else{
        header("location: dash-payment-order.php?message=1");
      }
    }else{
      header("location: dash-payment-order.php?message=1");
    }
  }
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
      <header class="header--style-1 header--box-shadow">

        <!--====== Nav 1 ======-->
        <nav class="primary-nav primary-nav-wrapper--border">
            <div class="container">

                <!--====== Primary Nav ======-->
                <div class="primary-nav">

                    <!--====== Main Logo ======-->

                    <a class="main-logo" href="index.php">

                        <img src="images/logo/logo-1.png" alt="">
                      <img src="images/logo/PayPal.jpg" alt=""></a>
                    <!--====== End - Main Logo ======-->
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

            <!--====== End - Section 1 ======-->

            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row row--center">
                            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                                <div class="l-f-o">
                                    <div class="l-f-o__pad-box">
                                        <h1 class="gl-h1">LOG IN</h1>
                                        <form class="l-f-o__form" method="post">
                                          <div class="gl-s-api">
                                            <?php if(isset($_GET['message'])){
                                               if($_GET['message'] == 1){
                                                 ?> <div class="gl-tag btn--e-brand-shadow" role="alert"> <?php echo
                                              "Invalid Login Credentials"; ?> </div>
                                            <?php }
                                       elseif($_GET['message'] == 3){
                                         ?> <div class="gl-tag btn--e-brand-shadow" role="alert"> <?php echo
                                      "Your account is currently Unavailable. Please try again later."; ?> </div>
                                    <?php } } ?>
                                          </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="login-email">E-MAIL *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="login-email" placeholder="Enter E-mail" name="email"></div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="login-password">PASSWORD *</label>

                                                <input class="input-text input-text--primary-style" type="password" id="login-password" placeholder="Enter Password" name="password"></div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <button class="btn btn--e-transparent-brand-b-2" data-modal="modal" type="submit">LOGIN/SAVE</button></div>
                                            </div>
                                        </form>
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

        <!--====== Main Footer ======-->
        <footer>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">

                                    <span>Copyright © 2021</span>

                                    <a href="index.php">Bookivia</a>

                                    <span>All Right Reserved</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
