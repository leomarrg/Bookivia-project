<?php
include 'Connections.php';
if(!isset($_SESSION['cEmail']) & empty($_SESSION['cEmail'])){
  header('location: signin.php');
}

if(isset($_GET['id']) & !empty($_GET['id'])){
$oid = $_GET['id'];
}else{
  header('location: dash-my-order.php');
}
$ordsql = "SELECT * FROM order_table WHERE Order_ID = '$oid'";
$ordres = mysqli_query($db, $ordsql);
$ordr = mysqli_fetch_assoc($ordres);
$cAccount = $ordr['cAccount_ID'];

$usql = "SELECT * FROM bookivia_customers WHERE cAccount_ID = '$cAccount'";
$ures = mysqli_query($db, $usql);
$ur = mysqli_fetch_assoc($ures);

$asql = "SELECT * FROM bookivia_address WHERE cAccount_ID = '$cAccount'";
$ares = mysqli_query($db, $asql);
$ar = mysqli_fetch_assoc($ares);
?>

<!DOCTYPE html>
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
<h1 class="display-4 mt-2 text-danger">Thank You!</h1>
<h2 class="text-success">---------Your Order Was Placed Successfully!--------</h2>

</body>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body class="config">
<header>
    <h1>Invoice</h1>
    <address>
        <p><?php echo $ur['cFirstName']; ?> <?php echo $ur['cLastName']; ?> </p>
        <p><?php echo $ar['mAddress1']; ?><br><?php echo $ar['mAddress2']; ?> <?php echo $ar['mState']; ?> <?php echo $ar['mCountry']; ?><br> <?php echo $ar['mZip_Code']; ?></p>
        <p><?php echo $ar['Phone_Number']; ?></p>
    </address>
</header>
<article>
    <h1>Recipient</h1>
    <table class="meta">
        <tr>
            <th><span>Invoice #</span></th>
            <td><span><?php echo $oid; ?></span></td>
        </tr>
        <tr>
            <th><span>Date</span></th>
            <td><span><?php echo $ordr['Order_Date']; ?></span></td>
        </tr>
    </table>

    <table>
        <thead>
        <tr>
            <th><span>Book</span></th>
            <th><span>Genre</span></th>
            <th><span>Price</span></th>
            <th><span>Quantity</span></th>
            <th><span>Total</span></th>
        </tr>
        </thead>
        <?php
        $pdsql = "SELECT * FROM order_details WHERE Order_ID = '$oid'";
        $pdres = mysqli_query($db, $pdsql);
        while($pdr = mysqli_fetch_assoc($pdres)){

              $pdISBN = $pdr['Book_ISBN'];
              $prodsql = "SELECT * FROM bookivia_books WHERE Book_ISBN = '$pdISBN'";
              $prodres = mysqli_query($db, $prodsql);
              $prodr = mysqli_fetch_assoc($prodres);
              ?>
        <tbody>
        <tr>
            <td><span><?php echo $prodr['Book_Title']; ?></span></td>
            <td><span><?php echo $prodr['Book_Genre']; ?></span></td>
            <td><span>$<?php echo $prodr['Book_Price']; ?></span></td>
            <td><span><?php echo $pdr['Product_Quantity']; ?></span></td>
            <td><span>$<?php echo $pdr['Product_Price']; ?></span><span></span></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
    <table>
        <tr>
            <th><span>Total</span></th>
            <td><span>$<?php echo $ordr['Total_Price']; ?></span></td>
        </tr>
        <tr>
            <th><span>Amount Paid</span></th>
            <td><span>$<?php echo $ordr['Total_Price']; ?></span></td>
        </tr>
    </table>
</article>
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
