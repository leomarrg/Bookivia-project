<?php
include 'Connections.php';
if(!isset($_SESSION['cEmail']) & empty($_SESSION['cEmail'])){
  header('location: signin.php');
}
  $smg = "";
	$cusID = $_SESSION['customerid'];
  $cEmail = $_SESSION['cEmail'];

  if(isset($_POST) & !empty($_POST)){
  $fName = mysqli_real_escape_string($db, $_POST['cFirstName']);
  $lName = mysqli_real_escape_string($db, $_POST['cLastName']);
  $password = password_hash($_POST['cPassword'], PASSWORD_DEFAULT);

  $sql = "UPDATE bookivia_customers SET cFirstName = '$fName', cLastName = '$lName', cPassword = '$password'
  WHERE cAccount_ID = $cusID";
  $res = mysqli_query($db, $sql);
  if($res){
  $smg = "Your information has been updated.";
  }else{
  $smg = "Unable to edit.";
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

                                        <a href="dash-edit-profile.php">My Account</a></li>
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

                                                  <a class="dash-active" href="dash-my-profile.php">My Profile</a></li>
                                              <li>

                                                  <a href="dash-address.php">Address</a></li>
                                              <li>

                                                  <a href="dash-my-order.php">My Orders</a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <!--====== End - Dashboard Features ======-->
                                </div>
                                <?php
                                $custsql = "SELECT * FROM bookivia_customers WHERE cEmail = '$cEmail'";
                                $custres = mysqli_query($db, $custsql);
                                $custr = mysqli_fetch_assoc($custres);
                                ?>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

                                            <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>
                                            <?php if(isset($smg)){ ?> <div class="gl-tag btn--e-brand-shadow" role="alert"> <?php echo
                                              $smg; ?> </div><?php } ?>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="dash-edit-p" method="post">
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-fname">FIRST NAME *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-fname" name="cFirstName" placeholder="<?php echo $custr['cFirstName']; ?>"></div>
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-lname">LAST NAME *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-lname" name="cLastName" placeholder="<?php echo $custr['cLastName']; ?>"></div>
                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                                                <span class="dash__text"><?php echo $custr['cEmail']; ?></span>
                                                            </div>
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="password">PASSWORD *</label>

                                                                <input class="input-text input-text--primary-style" type="password" id="password" name="cPassword" placeholder="********"></div>
                                                        </div>
                                                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                                    </form>
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
