<?php
include 'Connections.php';
if(!isset($_SESSION['cEmail']) & empty($_SESSION['cEmail'])){
  header('location: signin.php?message=2');
}
	$cusID = $_SESSION['customerid'];
  $cart = $_SESSION['cart'];
	$smg = "";

if(isset($_POST) & !empty($_POST)){
	if($_POST['payment'] == true){
	$cusID = ($_SESSION['customerid']);
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

	$sql = "SELECT * FROM bookivia_address WHERE cAccount_ID = $cusID";
	$res = mysqli_query($db, $sql);
	$r = mysqli_fetch_assoc($res);
	$count = mysqli_num_rows($res);
	if($count == 1)
  {
	   //update data in bookivia address.
	   	$usql = "UPDATE bookivia_address SET Phone_Number = '$phone', mAddress1 = '$mAddress1', mAddress2 = '$mAddress2',
	    mCountry = '$mCountry', mState = '$mState', mCity = '$mCity', mZip_Code = '$mPostal', bAddress1 = '$bAddress1',
	    bAddress2 = '$bAddress2', bCountry = '$bCountry', bState = '$bState', bCity = '$bCity', bZip_Code = '$bPostal'
	    WHERE cAccount_ID = $cusID";
      $ures = mysqli_query($db, $usql)  or die(mysqli_error($db));
      if($ures)
      {
        $total = 0;
        foreach ($cart as $key => $value)
        {
          $ordsql = "SELECT * FROM bookivia_books WHERE Book_ISBN=$key";
          $ordres = mysqli_query($db, $ordsql);
          $ordr = mysqli_fetch_assoc($ordres);
          $total = $total + ($ordr['Book_Price']*$value['quantity']);
        }

        echo $iosql = "INSERT INTO order_table (cAccount_ID, Total_Price, Shipping_Status, Payment_Status, Status)
        VALUES ('$cusID', '$total', 'Processing', 'Processed.', 'Order Placed.')";
        $iores = mysqli_query($db, $iosql) or die(mysqli_error($db));
        header('location: dash-payment-order.php');
      }
      if($iores)
      {
        //echo "Order inserted. Insert order items.";
        $orderid = mysqli_insert_id($db);

        foreach ($cart as $key => $value) {
          $ordsql = "SELECT * FROM bookivia_books WHERE Book_ISBN=$key";
          $ordres = mysqli_query($db, $ordsql);
          $ordr = mysqli_fetch_assoc($ordres);

          $pid = $ordr['Book_ISBN'];
          $productprice = $ordr['Book_Price'];
          $productquant = $value['quantity'];

          $orditmsql = "INSERT INTO order_details (Product_Quantity, Product_Price, Book_ISBN, Order_ID)
          VALUES ('$productquant', '$productprice', '$pid', '$orderid')";
          $orditmres = mysqli_query($db, $orditmsql) or die(mysqli_error($db));
          }
      }
      unset($_SESSION['cart']);
      header('location: dash-payment-order.php');
	  }
    else{
	  //insert data in usersmeta.
	$isql = "INSERT INTO bookivia_address (cAccount_ID, Phone_Number, mAddress1, mAddress2, mCountry, mState, mCity, mZip_Code, bAddress1,
	bAddress2, bCountry, bState, bCity, bZip_Code) VALUES ('$cusID', '$phone', '$mAddress1', '$mAddress2', '$mCountry', '$mState', '$mCity',
     '$mPostal', '$bAddress1', '$bAddress2', '$bCountry', '$bState', '$bCity', '$bPostal')";
     $ires = mysqli_query($db, $isql) or die(mysqli_error($db));
     if($ires)
     {

       $total = 0;
       foreach ($cart as $key => $value)
       {
         $ordsql = "SELECT * FROM bookivia_books WHERE Book_ISBN=$key";
         $ordres = mysqli_query($db, $ordsql);
         $ordr = mysqli_fetch_assoc($ordres);
         $total = $total + ($ordr['Book_Price']*$value['quantity']);
       }

       echo $iosql = "INSERT INTO order_table (cAccount_ID, Total_Price, Shipping_Status, Payment_Status, Status)
       VALUES ('$cusID', '$total', 'Processing', 'Processed.', 'Order Placed.')";
       $iores = mysqli_query($db, $iosql) or die(mysqli_error($db));
     }
     if($iores)
     {
       //echo "Order inserted. Insert order items.";
       $orderid = mysqli_insert_id($db);

       foreach ($cart as $key => $value) {
         $ordsql = "SELECT * FROM bookivia_books WHERE Book_ISBN=$key";
         $ordres = mysqli_query($db, $ordsql);
         $ordr = mysqli_fetch_assoc($ordres);

         $pid = $ordr['Book_ISBN'];
         $productprice = $ordr['Book_Price'];
         $productquant = $value['quantity'];

         $orditmsql = "INSERT INTO order_details (Product_Quantity, Product_Price, Book_ISBN, Order_ID)
         VALUES ('$productquant', '$productprice', '$pid', '$orderid')";
         $orditmres = mysqli_query($db, $orditmsql) or die(mysqli_error($db));
         /*$orditmr = mysqli_fetch_assoc($orditmres);
         if($orditmres){
           echo "Order item inserted. Redirected to account. <br>";
         }*/
         }
     }
     unset($_SESSION['cart']);
     header("dashboard.php");
	}
}else{
	$smg = "Unable to process information. Missing payment.";
}
}
$sql = "SELECT * FROM bookivia_address WHERE cAccount_ID = $cusID";
$res = mysqli_query($db, $sql);
$r = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
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
 <?php $_SESSION['customerid']; ?>
 <?php $_SESSION['cEmail']; ?>

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

																	<a href="checkout.php">Checkout</a></li>
													</ul>
											</div>
									</div>
							</div>
					</div>
			</div>
			<!--====== End - Section 1 ======-->

        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="checkout-f">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
																<form class="checkout-f__delivery" method="post">
																	<?php $usql ?>
																	<div class="gl-tag btn--e-brand-shadow" role="alert"> <?php echo
															 		$smg; ?> </div>
																		<div class="u-s-m-b-30">
																					<div class="u-s-m-b-30">
																						<label class="gl-label" for="billing-city">PHONE NUMBER *</label>
																						<input class="input-text input-text--primary-style" type="text" id="mailing-address1" name="Phone_Number"
																						value="<?php if(!empty($r['Phone_Number'])) {echo $r['Phone_Number']; }elseif(isset($phone)){ echo $phone; } ?>"></div>
																						<h1 class="dash__h1 u-s-m-b-14">User Mailing Address</h1>
																						<div class="gl-inline">
																							<div class="u-s-m-b-30">
																								<label class="gl-label" for="billing-city">ADDRESS 1*</label>
																								<input class="input-text input-text--primary-style" type="text" id="mailing-address1" name="mAddress1"
																								value="<?php if(!empty($r['mAddress1'])) {echo $r['mAddress1']; }elseif(isset($mAddress1)){ echo $mAddress1; } ?>"></div>
																								<div class="u-s-m-b-30">
																								<label class="gl-label" for="billing-city">ADDRESS 2*</label>
																								<input class="input-text input-text--primary-style" type="text" id="mailing-address2" name="mAddress2"
																								value="<?php if(!empty($r['mAddress2'])) {echo $r['mAddress2']; }elseif(isset($mAddress2)){ echo $mAddress2; } ?>"></div>
																					</div>
																						<div class="gl-inline">
																								<div class="u-s-m-b-30">

																										<!--====== Select Box ======-->

																										<label class="gl-label" for="address-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="address-mcountry" name="mCountry">
																												<option selected value="<?php if(!empty($r['mCountry'])) {echo $r['mCountry']; }elseif(isset($mCountry)){ echo $mCountry; } ?>"><?php if(!empty($r['mCountry'])) {echo $r['mCountry']; }?> </option>
																												<option value="United States">United States</option>
																										</select>
																										<!--====== End - Select Box ======-->
																								</div>
																								<div class="u-s-m-b-30">

																										<!--====== Select Box ======-->

																										<label class="gl-label" for="address-state">STATE *</label><select class="select-box select-box--primary-style" id="address-mstate" name="mState">
																											<option selected value="<?php if(!empty($r['mState'])) {echo $r['mState']; }elseif(isset($mState)){ echo $mState; } ?>"><?php if(!empty($r['mState'])) {echo $r['mState']; }?></option>
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
																											<option value="Mississipii">Mississippi</option>
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

																										<input class="input-text input-text--primary-style" type="text" id="address-city" name="mCity"
																										value="<?php if(!empty($r['mCity'])) {echo $r['mCity']; }elseif(isset($mCity)){ echo $mCity; } ?>"></div>
																								<div class="u-s-m-b-30">

																										<label class="gl-label" for="address-street">ZIP/POSTAL CODE *</label>

																										<input class="input-text input-text--primary-style" type="text" id="address-postal" name="mZip_Code"
																										value="<?php if(!empty($r['mZip_Code'])) {echo $r['mZip_Code']; }elseif(isset($mPostal)){ echo $mPostal; } ?>"></div>
																						</div>
																						<h1 class="dash__h1 u-s-m-b-14">User Billing Address</h1>
																						<div class="gl-inline">
																							<div class="u-s-m-b-30">
																								<label class="gl-label" for="billing-city">ADDRESS 1*</label>
																								<input class="input-text input-text--primary-style" type="text" id="bAddress1" name="bAddress1"
																								value="<?php if(!empty($r['bAddress1'])) {echo $r['bAddress1']; }elseif(isset($bAddress1)){ echo $bAddress1; } ?>"></div>
																								<div class="u-s-m-b-30">
																									<label class="gl-label" for="billing-city">ADDRESS 2*</label>
																									<input class="input-text input-text--primary-style" type="text" id="bAddress2" name="bAddress2"
																									value="<?php if(!empty($r['bAddress2'])) {echo $r['bAddress2']; }elseif(isset($bAddress2)){ echo $bAddress2; } ?>"></div>
																					</div>
																						<div class="gl-inline">
																								<div class="u-s-m-b-30">

																										<!--====== Select Box ======-->

																										<label class="gl-label" for="billing-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="billing-bcountry" name="bCountry">
																												<option selected value="<?php if(!empty($r['bCountry'])) {echo $r['bCountry']; }elseif(isset($bCountry)){ echo $bCountry; } ?>"><?php if(!empty($r['bCountry'])) {echo $r['bCountry']; } ?></option>
																												<option value="United States">United States</option>
																										</select>
																										<!--====== End - Select Box ======-->
																								</div>
																								<div class="u-s-m-b-30">

																										<!--====== Select Box ======-->

																										<label class="gl-label" for="address-bstate">STATE *</label><select class="select-box select-box--primary-style" id="address-bstate" name="bState">
																											<option selected value="<?php if(!empty($r['bState'])) {echo $r['bState']; }elseif(isset($bState)){ echo $bState; } ?>"><?php if(!empty($r['bState'])) {echo $r['bState']; } ?></option>
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
																											<option value="Mississipii">Mississippi</option>
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

																										<label class="gl-label" for="billing-city">CITY *</label>

																										<input class="input-text input-text--primary-style" type="text" id="billing-bcity" name="bCity"
																										value="<?php if(!empty($r['bCity'])) {echo $r['bCity']; }elseif(isset($bCity)){ echo $bCity; } ?>"></div>
																								<div class="u-s-m-b-30">

																										<label class="gl-label" for="billing-street">ZIP/POSTAL CODE *</label>

																										<input class="input-text input-text--primary-style" type="text" id="billing-bpostal" name="bZip_Code"
																										value="<?php if(!empty($r['bZip_Code'])) {echo $r['bZip_Code']; }elseif(isset($bPostal)){ echo $bPostal; } ?>"></div>
																						</div>
																						<div class="o-summary__section u-s-m-b-30">
																								<div class="o-summary__box">
																										<h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
																										<div class="u-s-m-b-10">

																														<!--====== Radio Box ======-->
																												<div class="radio-box">

																														<input type="radio" id="pay-pal" name="payment">
																														<div class="radio-box__state radio-box__state--primary">

																														<label class="radio-box__label" for="pay-pal">Pay Pal</label></div>
																												</div>
																														<!--====== End - Radio Box ======-->

																												<span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span>
																									</div>
																						</div>
																				</div>
																				<button class="btn btn--e-transparent-brand-b-2" type="submit">SAVE & PLACE ORDER</button>
																		</div>
																</form>
                            </div>
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                                <!--====== Order Summary ======-->
                                <div class="o-summary">
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__item-wrap gl-scroll">
                                          <?php
                                            $tot = 0;
                                            foreach ($cart as $key => $value) {
                                            $navcartsql = "SELECT * FROM bookivia_books WHERE Book_ISBN=$key";
                                            $navcartres = mysqli_query($db, $navcartsql);
                                            $navcartr = mysqli_fetch_assoc($navcartres);
                                            ?>
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">

                                                        <img class="u-img-fluid" src="admin/<?php echo $navcartr['Book_Image']; ?>" alt=""></div>
                                                    <div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                <a href="products.php?id=<?php echo $navcartr['Book_ISBN']; ?>"><?php echo $navcartr['Book_Title']; ?></a></span>

                                                        <span class="o-card__quantity"><?php echo $value['quantity']; ?> x</span>

                                                        <span class="o-card__price">$<?php echo $navcartr['Book_Price']; ?></span></div>
                                                </div>
                                                <a class="o-card__del far fa-trash-alt" href="deletecart.php?id=<?php echo $key; ?>"></a>
                                                <?php
                                                  $tot = $tot + ($navcartr['Book_Price']*$value['quantity']);
                                                ?>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <table class="o-summary__table">
                                                <tbody>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td>$<?php echo $tot; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <!--====== End - Order Summary ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
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
