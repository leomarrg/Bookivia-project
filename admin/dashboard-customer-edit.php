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

  $smg = "";

  if(isset($_POST) & !empty($_POST)){
  $fName = mysqli_real_escape_string($db, $_POST['cFirstName']);
  $lName = mysqli_real_escape_string($db, $_POST['cLastName']);
  $status = mysqli_real_escape_string($db, $_POST['cStatus']);
  //User Address data (bookivia_address table)
  $phone = filter_var($_POST['Phone_Number'], FILTER_SANITIZE_NUMBER_INT);
	$mAddress1 = filter_var($_POST['mAddress1'], FILTER_SANITIZE_STRING);
	$mAddress2 = filter_var($_POST['mAddress2'], FILTER_SANITIZE_STRING);
	$mCountry = filter_var($_POST['mCountry'], FILTER_SANITIZE_STRING);
	$mState = filter_var($_POST['mState'], FILTER_SANITIZE_STRING);
	$mCity = filter_var($_POST['mCity'], FILTER_SANITIZE_STRING);
	$mPostal = filter_var($_POST['mZip_Code'], FILTER_SANITIZE_NUMBER_INT);
	$bAddress1 = filter_var($_POST['bAddress1'], FILTER_SANITIZE_STRING);
	$bAddress2 = filter_var($_POST['bAddress2'], FILTER_SANITIZE_STRING);
	$bCountry = filter_var($_POST['bCountry'], FILTER_SANITIZE_STRING);
	$bState = filter_var($_POST['bState'], FILTER_SANITIZE_STRING);
	$bCity = filter_var($_POST['bCity'], FILTER_SANITIZE_STRING);
	$bPostal = filter_var($_POST['bZip_Code'], FILTER_SANITIZE_NUMBER_INT);

  $upcsql = "UPDATE bookivia_customers SET cFirstName = '$fName', cLastName = '$lName', cStatus = '$status'
  WHERE cAccount_ID = $id";
  $res = mysqli_query($db, $upcsql) or die(mysqli_error($db));

  $upasql = "UPDATE bookivia_address SET Phone_Number = '$phone', mAddress1 = '$mAddress1', mAddress2 = '$mAddress2',
  mCountry = '$mCountry', mState = '$mState', mCity = '$mCity', mZip_Code = '$mPostal', bAddress1 = '$bAddress1',
  bAddress2 = '$bAddress2', bCountry = '$bCountry', bState = '$bState', bCity = '$bCity', bZip_Code = '$bPostal'
  WHERE cAccount_ID = $id";
  $res2 = mysqli_query($db, $upasql) or die(mysqli_error($db));
  if($res & $res2)
  {
    $smg = "Updated successfully.";
  }else{
    $smg = "Failed to update.";
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
    <title>Edit customer - Bookivia</title>

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

            <!--====== End - Section 1 ======-->
          </div>

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
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Customer Account</h1>

                                            <span class="dash__text u-s-m-b-30">Below you can edit the user's respective information.</span>

                                              <!--<div class="gl-tag btn--e-brand-shadow" role="alert"><? echo $smg; ?></div>-->

                                            <form class="dash-customer-manipulation" method="post">
                                              <?php
  	                                             $sql = "SELECT * FROM bookivia_customers WHERE cAccount_ID = $id";
                                                 $res = mysqli_query($db, $sql);
                                                 $r = mysqli_fetch_assoc($res);
                                                 $asql = "SELECT * FROM bookivia_address WHERE cAccount_ID = $id";
                                                 $resasql = mysqli_query($db, $asql);
                                                 $rasql = mysqli_fetch_assoc($resasql);
                                              ?>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="user-edit-fname">CUSTOMER ID *</label>
                                                        <span class="manage-o__badge badge--processing"><?php echo $r['cAccount_ID']; ?></span>
                                                        <class="input-text input-text--primary-style" type="text" id="cust-nID"></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="user-edit-lname">FIRST NAME *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="cust-fname" name="cFirstName" value="<?php echo $r['cFirstName']; ?>"></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="user-edit-lname">LAST NAME *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="cust-lname" name="cLastName" value="<?php echo $r['cLastName']; ?>"></div>

                                                </div>
                                                <div class="gl-inline">
                                                  <div class="u-s-m-b-30">

                                                      <label class="gl-label" for="address-phone">EMAIL ADDRESS *</label>

                                                      <span><?php echo $r['cEmail']; ?></span></div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="address-street">PASSWORD *</label>

                                                            <span class="manage-o__badge badge--shipped">***********</span></div>
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="style">STATUS *</label><select class="select-box select-box--primary-style u-w-100" id="book_Format" name="cStatus">
                                                                    <option selected><?php echo $r['cStatus']; ?></option>
                                                                    <option value="Available">Available</option>
                                                                    <option value="Unavailable">Unavailable</option>
                                                                </select></div>
                                                </div>
                                                <h1 class="dash__h1 u-s-m-b-14">User Mailing Address</h1>
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="address-street">PHONE *</label>

                                                    <input class="input-text input-text--primary-style" type="text" id="cust-phone" name="Phone_Number" value="<?php echo $rasql['Phone_Number']; ?>"></div>
                                                    <div class="gl-inline">
                                                      <div class="u-s-m-b-30">

                                                          <label class="gl-label" for="billing-city">MAILING ADDRESS 1*</label>

                                                          <input class="input-text input-text--primary-style" type="text" id="billing-city" name="mAddress1" value="<?php echo $rasql['mAddress1']; ?>"></div>
                                                      <div class="u-s-m-b-30">

                                                          <label class="gl-label" for="billing-city">MAILING ADDRESS 2*</label>

                                                          <input class="input-text input-text--primary-style" type="text" id="billing-city" name="mAddress2" value="<?php echo $rasql['mAddress2']; ?>"></div>
                                                    </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <!--====== Select Box ======-->

                                                        <label class="gl-label" for="address-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="address-country" name="mCountry">
                                                            <option value="<?php echo $rasql['mCountry']; ?>"><?php echo $rasql['mCountry']; ?></option>
                                                        </select>
                                                        <!--====== End - Select Box ======-->
                                                    </div>
                                                    <div class="u-s-m-b-30">

                                                        <!--====== Select Box ======-->

                                                        <label class="gl-label" for="address-state">STATE *</label><select class="select-box select-box--primary-style" id="address-state" name="mState">
                                                          <option selected value="<?php echo $rasql['mState']; ?>"><?php echo $rasql['mState']; ?></option>
                                                          <option value="Alabama">Alabama</option>
                                                          <option value="Alaska">Alaska</option>
                                                          <option value="Arizona">Arizona</option>
                                                          <option value="Arkansas">Arkansas</option>
                                                          <option value="California">California</option>
                                                          <option value="Colorado">Colorado</option>
                                                          <option value="Connecticut">Connecticut</option>
                                                          <option value="Delaware">Delaware</option>
                                                          <option value="Florida">Florida</option>
                                                          <option value="Georgia">Georgia</option>
                                                          <option value="Hawaii">Hawaii</option>
                                                          <option value="Idaho">Idaho</option>
                                                          <option value="Illinois">Illinois</option>
                                                          <option value="Indiana">Indiana</option>
                                                          <option value="Iowa">Iowa</option>
                                                          <option value="Kansas">Kansas</option>
                                                          <option value="Kentucky">Kentucky</option>
                                                          <option value="Louisiana">Louisiana</option>
                                                          <option value="Maine">Maine</option>
                                                          <option value="Maryland">Maryland</option>
                                                          <option value="Massachusetts">Massachusetts</option>
                                                          <option value="Michigan">Michigan</option>
                                                          <option value="Minnesota">Minnesota</option>
                                                          <option value="Mississippi">Mississippi</option>
                                                          <option value="Missouri">Missouri</option>
                                                          <option value="Montana">Montana</option>
                                                          <option value="Nebraska">Nebraska</option>
                                                          <option value="Nevada">Nevada</option>
                                                          <option value="New Hampshire">New Hampshire</option>
                                                          <option value="New Jersey">New Jersey</option>
                                                          <option value="New Mexico">New Mexico</option>
                                                          <option value="New York">New York</option>
                                                          <option value="North Carolina">North Carolina</option>
                                                          <option value="North Dakota">North Dakota</option>
                                                          <option value="Ohio">Ohio</option>
                                                          <option value="Oklahoma">Oklahoma</option>
                                                          <option value="Oregon">Oregon</option>
                                                          <option value="Pennsylvania">Pennsylvania</option>
                                                          <option value="Puerto Rico">Puerto Rico</option>
                                                          <option value="Rhode Island">Rhode Island</option>
                                                          <option value="South Carolina">South Carolina</option>
                                                          <option value="South Dakota">South Dakota</option>
                                                          <option value="Tennesse">Tennesse</option>
                                                          <option value="Texas">Texas</option>
                                                          <option value="Utah">Utah</option>
                                                          <option value="Vermont">Vermont</option>
                                                          <option value="Virginia">Virginia</option>
                                                          <option value="Washington">Washington</option>
                                                          <option value="West Virginia">West Virginia</option>
                                                          <option value="Wisconsin">Wisconsin</option>
                                                          <option value="Wyoming">Wyoming</option>
                                                      </select>
                                                        <!--====== End - Select Box ======-->
                                                    </div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-city">CITY *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="address-city" name="mCity" value="<?php echo $rasql['mCity']; ?>"></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-street">ZIP *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="address-postal" name="mZip_Code" value="<?php echo $rasql['mZip_Code']; ?>"></div>
                                                </div>
                                                <h1 class="dash__h1 u-s-m-b-14">User Billing Address</h1>
                                                <div class="gl-inline">
                                                  <div class="u-s-m-b-30">

                                                      <label class="gl-label" for="billing-city">BILING ADDRESS 1*</label>

                                                      <input class="input-text input-text--primary-style" type="text" id="billing-city" name="bAddress1" value="<?php echo $rasql['bAddress1']; ?>"></div>
                                                  <div class="u-s-m-b-30">

                                                      <label class="gl-label" for="billing-city">BILLING ADDRESS 2*</label>

                                                      <input class="input-text input-text--primary-style" type="text" id="billing-city" name="bAddress2" value="<?php echo $rasql['bAddress2']; ?>"></div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <!--====== Select Box ======-->

                                                        <label class="gl-label" for="billing-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="billing-country" name="bCountry" value="<?php echo $rasql['bCountry']; ?>">
                                                            <option value="<?php echo $rasql['bCountry']; ?>"><?php echo $rasql['bCountry']; ?></option>
                                                        </select>
                                                        <!--====== End - Select Box ======-->
                                                    </div>
                                                    <div class="u-s-m-b-30">

                                                        <!--====== Select Box ======-->

                                                        <label class="gl-label" for="billing-state">STATE *</label><select class="select-box select-box--primary-style" id="billing-state" name="bState">
                                                          <option selected value="<?php echo $rasql['bState']; ?>"><?php echo $rasql['bState']; ?></option>
                                                          <option value="Alabama">Alabama</option>
                                                          <option value="Alaska">Alaska</option>
                                                          <option value="Arizona">Arizona</option>
                                                          <option value="Arkansas">Arkansas</option>
                                                          <option value="California">California</option>
                                                          <option value="Colorado">Colorado</option>
                                                          <option value="Connecticut">Connecticut</option>
                                                          <option value="Delaware">Delaware</option>
                                                          <option value="Florida">Florida</option>
                                                          <option value="Georgia">Georgia</option>
                                                          <option value="Hawaii">Hawaii</option>
                                                          <option value="Idaho">Idaho</option>
                                                          <option value="Illinois">Illinois</option>
                                                          <option value="Indiana">Indiana</option>
                                                          <option value="Iowa">Iowa</option>
                                                          <option value="Kansas">Kansas</option>
                                                          <option value="Kentucky">Kentucky</option>
                                                          <option value="Louisiana">Louisiana</option>
                                                          <option value="Maine">Maine</option>
                                                          <option value="Maryland">Maryland</option>
                                                          <option value="Massachusetts">Massachusetts</option>
                                                          <option value="Michigan">Michigan</option>
                                                          <option value="Minnesota">Minnesota</option>
                                                          <option value="Mississippi">Mississippi</option>
                                                          <option value="Missouri">Missouri</option>
                                                          <option value="Montana">Montana</option>
                                                          <option value="Nebraska">Nebraska</option>
                                                          <option value="Nevada">Nevada</option>
                                                          <option value="New Hampshire">New Hampshire</option>
                                                          <option value="New Jersey">New Jersey</option>
                                                          <option value="New Mexico">New Mexico</option>
                                                          <option value="New York">New York</option>
                                                          <option value="North Carolina">North Carolina</option>
                                                          <option value="North Dakota">North Dakota</option>
                                                          <option value="Ohio">Ohio</option>
                                                          <option value="Oklahoma">Oklahoma</option>
                                                          <option value="Oregon">Oregon</option>
                                                          <option value="Pennsylvania">Pennsylvania</option>
                                                          <option value="Puerto Rico">Puerto Rico</option>
                                                          <option value="Rhode Island">Rhode Island</option>
                                                          <option value="South Carolina">South Carolina</option>
                                                          <option value="South Dakota">South Dakota</option>
                                                          <option value="Tennesse">Tennesse</option>
                                                          <option value="Texas">Texas</option>
                                                          <option value="Utah">Utah</option>
                                                          <option value="Vermont">Vermont</option>
                                                          <option value="Virginia">Virginia</option>
                                                          <option value="Washington">Washington</option>
                                                          <option value="West Virginia">West Virginia</option>
                                                          <option value="Wisconsin">Wisconsin</option>
                                                          <option value="Wyoming">Wyoming</option>
                                                      </select>
                                                        <!--====== End - Select Box ======-->
                                                    </div>
                                                </div>
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-city">CITY *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="address-city" name="bCity" value="<?php echo $rasql['bCity']; ?>"></div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="address-street">ZIP *</label>

                                                        <input class="input-text input-text--primary-style" type="text" id="address-postal" name="bZip_Code" value="<?php echo $rasql['bZip_Code']; ?>"></div>
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
