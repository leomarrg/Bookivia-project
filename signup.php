<?php include('Connections.php');
if(isset($_SESSION['cEmail']) & !empty($_SESSION['cEmail']))
{
  header('location: index.php');
}?>
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

                                        <a href="signup.php">Signup</a></li>
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
                                    <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row row--center">
                            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                                <div class="l-f-o">
                                    <div class="l-f-o__pad-box">
                                        <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                        <form class="l-f-o__form" method="post" action="registerproc.php">
                                          <?php if(isset($_GET['message'])){
                                             if($_GET['message'] == 1){
                                               ?> <div class="gl-tag btn--e-brand-shadow" role="alert"> <?php echo
                                            "Unable to register user."; ?> </div>
                                          <?php } } ?>
                                            <!--- ------------------------------------------ REGISTER STARTS HERE -------------------------------------------------------- --->

                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-fname">FIRST NAME *</label>

                                                <input class="input-text input-text--primary-style" type="text" name="first_name" value="" id="reg-fname" placeholder="First Name"></div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-lname">LAST NAME *</label>

                                                <input class="input-text input-text--primary-style" type="text" name="last_name" value="" id="reg-lname" placeholder="Last Name">
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-email">E-MAIL *</label>

                                                <input class="input-text input-text--primary-style" type="email" name="email" value="" id="reg-email" placeholder="Enter E-mail"></div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-password">PASSWORD *</label>

                                                <input class="input-text input-text--primary-style" type="password" name="password" id="reg-password" placeholder="Enter Password"></div>

                                                <input class="input-text input-text--primary-style" type="hidden" name="status" value="Available">
                                                <!--- MAILING ADDRESS ----------------------------
                                                <h1 class="gl-h1">MAILING ADDRESS</h1>
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-street">PHONE NUMBER *</label>

                                                    <input class="input-text input-text--primary-style" type="text" id="reg-phone" name="phone"></div>

                                                <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-password">ADDRESS #1 *</label>

                                                <input class="input-text input-text--primary-style" type="address1" name="maddress1" id="reg-maddress1" placeholder="Enter Address"></div>

                                                <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-password">ADDRESS #2 *</label>

                                                <input class="input-text input-text--primary-style" type="address2" name="maddress2" id="reg-maddress2" name placeholder="Enter Address"></div>

                                                <div class="gl-inline">
                                                <div class="u-s-m-b-30">
                                                    <!--====== Select Box ======

                                                    <label class="gl-label" for="address-country">COUNTRY *</label>
                                                    <select class="select-box select-box--primary-style" id="reg-mcountry" name="mcountry">
                                                        <option selected value="">Choose Country</option>
                                                        <option value="us">United States (US)</option>
                                                    </select>
                                                    <!--====== End - Select Box ======
                                                  </div>
                                                  <div class="u-s-m-b-30">

                                                        <!--====== Select Box ======

                                                        <label class="gl-label" for="address-state">STATE/PROVINCE *</label>
                                                        <select class="select-box select-box--primary-style" id="reg-mstate" name="mstate">
                                                            <option selected value="">Choose State/Province</option>
                                                            <option value="al">Alabama</option>
                                                            <option value="ak">Alaska</option>
                                                            <option value="az">Arizona</option>
                                                            <option value="ar">Arkansas</option>
                                                            <option value="cf">California</option>
                                                            <option value="cl">Colorado</option>
                                                            <option value="ct">Connecticut</option>
                                                            <option value="dl">Delaware</option>
                                                            <option value="dc">District of Columbia (Washington DC)</option>
                                                            <option value="fl">Florida</option>
                                                            <option value="ga">Georgia</option>
                                                            <option value="hi">Hawaii</option>
                                                            <option value="id">Idaho</option>
                                                            <option value="il">Illinois</option>
                                                            <option value="in">Indiana</option>
                                                            <option value="ia">Iowa</option>
                                                            <option value="ks">Kansas</option>
                                                            <option value="ky">Kentucky</option>
                                                            <option value="la">Louisiana</option>
                                                            <option value="me">Maine</option>
                                                            <option value="md">Maryland</option>
                                                            <option value="ma">Massachusetts</option>
                                                            <option value="mi">Michigan</option>
                                                            <option value="mn">Minnesota</option>
                                                            <option value="ms">Mississippi</option>
                                                            <option value="mo">Missouri</option>
                                                            <option value="mt">Montana</option>
                                                            <option value="ne">Nebraska</option>
                                                            <option value="nv">Nevada</option>
                                                            <option value="nh">New Hampshire</option>
                                                            <option value="nj">New Jersey</option>
                                                            <option value="nw">New Mexico</option>
                                                            <option value="ny">New York</option>
                                                            <option value="nc">North Carolina</option>
                                                            <option value="nd">North Dakota</option>
                                                            <option value="oh">Ohio</option>
                                                            <option value="ok">Oklahoma</option>
                                                            <option value="or">Oregon</option>
                                                            <option value="pa">Pennsylvania</option>
                                                            <option value="pr">Puerto Rico</option>
                                                            <option value="ri">Rhode Island</option>
                                                            <option value="sc">South Carolina</option>
                                                            <option value="sd">South Dakota</option>
                                                            <option value="tn">tennessee</option>
                                                            <option value="tx">Texas</option>
                                                            <option value="ut">Utah</option>
                                                            <option value="vt">Vermont</option>
                                                            <option value="va">Virginia</option>
                                                            <option value="wa">Washington</option>
                                                            <option value="wv">West Virginia</option>
                                                            <option value="wi">Wisconsin</option>
                                                            <option value="wy">Wyoming</option>
                                                        </select>
                                                        <!--====== End - Select Box ======
                                                  </div>
                                                </div>

                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-city">TOWN/CITY *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="reg-mcity" name="mcity"></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-street">ZIP/POSTAL CODE *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="reg-mpostal" name='mpostal'></div>
                                                </div>

                                                <!--------------------------- ENDING MAILING ADDRESS -----------------------

                                                    <h1 class="gl-h1">BILLING ADDRESS</h1>

                                                    <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="reg-password">ADDRESS #1 *</label>

                                                    <input class="input-text input-text--primary-style" type="baddress1" id="reg-baddress1" name="baddress1"></div>

                                                    <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="reg-password">ADDRESS #2 *</label>

                                                    <input class="input-text input-text--primary-style" type="baddress2" id="reg-baddress2" name="baddress2"></div>

                                                    <div class="gl-inline">
                                                    <div class="u-s-m-b-30">
                                                        <!--====== Select Box ======

                                                        <label class="gl-label" for="address-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="reg-bcountry" name="bcountry">
                                                            <option selected value="">Choose Country</option>
                                                            <option value="us">United States (US)</option>
                                                        </select>
                                                        <!--====== End - Select Box ======
                                                      </div>
                                                      <div class="u-s-m-b-30">

                                                            <!--====== Select Box ======

                                                            <label class="gl-label" for="address-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" id="reg-bstate" name="bstate">
                                                                <option selected value="">Choose State/Province</option>
                                                                <option value="al">Alabama</option>
                                                                <option value="ak">Alaska</option>
                                                                <option value="az">Arizona</option>
                                                                <option value="ar">Arkansas</option>
                                                                <option value="cf">California</option>
                                                                <option value="cl">Colorado</option>
                                                                <option value="ct">Connecticut</option>
                                                                <option value="dl">Delaware</option>
                                                                <option value="dc">District of Columbia (Washington DC)</option>
                                                                <option value="fl">Florida</option>
                                                                <option value="ga">Georgia</option>
                                                                <option value="hi">Hawaii</option>
                                                                <option value="id">Idaho</option>
                                                                <option value="il">Illinois</option>
                                                                <option value="in">Indiana</option>
                                                                <option value="ia">Iowa</option>
                                                                <option value="ks">Kansas</option>
                                                                <option value="ky">Kentucky</option>
                                                                <option value="la">Louisiana</option>
                                                                <option value="me">Maine</option>
                                                                <option value="md">Maryland</option>
                                                                <option value="ma">Massachusetts</option>
                                                                <option value="mi">Michigan</option>
                                                                <option value="mn">Minnesota</option>
                                                                <option value="ms">Mississippi</option>
                                                                <option value="mo">Missouri</option>
                                                                <option value="mt">Montana</option>
                                                                <option value="ne">Nebraska</option>
                                                                <option value="nv">Nevada</option>
                                                                <option value="nh">New Hampshire</option>
                                                                <option value="nj">New Jersey</option>
                                                                <option value="nw">New Mexico</option>
                                                                <option value="ny">New York</option>
                                                                <option value="nc">North Carolina</option>
                                                                <option value="nd">North Dakota</option>
                                                                <option value="oh">Ohio</option>
                                                                <option value="ok">Oklahoma</option>
                                                                <option value="or">Oregon</option>
                                                                <option value="pa">Pennsylvania</option>
                                                                <option value="pr">Puerto Rico</option>
                                                                <option value="ri">Rhode Island</option>
                                                                <option value="sc">South Carolina</option>
                                                                <option value="sd">South Dakota</option>
                                                                <option value="tn">tennessee</option>
                                                                <option value="tx">Texas</option>
                                                                <option value="ut">Utah</option>
                                                                <option value="vt">Vermont</option>
                                                                <option value="va">Virginia</option>
                                                                <option value="wa">Washington</option>
                                                                <option value="wv">West Virginia</option>
                                                                <option value="wi">Wisconsin</option>
                                                                <option value="wy">Wyoming</option>
                                                            </select>
                                                            <!--====== End - Select Box ======
                                                      </div>
                                                    </div>

                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="address-city">TOWN/CITY *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="reg-bcity" name="bcity"></div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="address-street">ZIP/POSTAL CODE *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="reg-bpostal" name="bpostal"></div>
                                                    </div> -->
                                            <div class="u-s-m-b-15">

                                                <button class="btn btn--e-transparent-brand-b-2" type="submit" name="reg_user">CREATE</button></div>

                                            <a class="gl-link" href="index.php">Return to Store</a>
                                        </form>
                                        <!--- ------------------------------------------ REGISTER ENDS HERE -------------------------------------------------------->
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
