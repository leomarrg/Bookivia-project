<?php
require_once '../connections.php';
	if(isset($_SESSION['aEmail']) & !empty($_SESSION['aEmail']))
  {
		header('location: dashboard_admin.php');
	}
	if(isset($_POST) & !empty($_POST))
	{
	  $email = mysqli_real_escape_string($db, $_POST['aEmail']);
	  $password = md5($_POST['aPassword']);
	  $sql = "SELECT * FROM admin WHERE aEmail = '$email' AND aPassword = '$password'";
	  $result = mysqli_query($db, $sql) or die(mysqli_error($db));
	  $count = mysqli_num_rows($result);
	  if ($count == 1)
	  {
	    $_SESSION['aEmail'] = $email;
	    header("location: dashboard_admin.php");
	  }
	  else
	  {
	  $fsmg1 = "Invalid Login";
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
    <link href="../images/favicon.png" rel="shortcut icon">
    <title>Bookivia - Admin</title>

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
      <header class="header--style-1">
          <!--====== Nav 1 ======-->
          <nav class="primary-nav primary-nav-wrapper--border">
              <div class="container">
                  <!--====== Primary Nav ======-->
                  <div class="primary-nav">
                      <!--====== Main Logo ======-->
                      <a class="main-logo">
                          <img src="../images/logo/logo-1.png" alt=""></a>
                      <!--====== End - Main Logo ======-->
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
            <div class="u-s-p-y-26">

            </div>
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
                                        <h1 class="gl-h1">ADMIN LOG IN</h1>
                                        <!--- ---------------------------------------- LOG IN STARTS HERE ---------------------------------------- --->
                                        <form class="l-f-o__form" method="post" action="Login.php">
                                            <div class="gl-s-api">
                                            </div>
                                            <div class="u-s-m-b-30">
                                              <?php if(isset($fsmg1)){ ?> <div class="manage-o__badge badge--processing" role="alert"> <?php echo
                                                $fsmg1; ?> </div><?php } ?>
                                                <label class="gl-label" for="login-aEmail">E-MAIL *</label>

                                                <input class="input-text input-text--primary-style" type="email" name="aEmail" id="login-aEmail" placeholder="Enter E-mail"></div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="login-aPassword">PASSWORD *</label>

                                                <input class="input-text input-text--primary-style" type="password" name="aPassword" id="login-aPassword" placeholder="Enter Password"></div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <button class="btn btn--e-transparent-brand-b-2" type="submit" name="login_admin">LOGIN</button></div>
                                            </div>
                                        </form>

                                        <!--- ---------------------------------------- LOG IN ENDS HERE ---------------------------------------- --->
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
        <footer>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">

                                    <span>Copyright © 2021</span>

                                    <span>Bookivia</span>

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
