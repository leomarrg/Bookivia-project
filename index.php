<?php
include 'Connections.php';
$total = null;
$value = null;
?>

<!DOCTYPE html>
<html lang="en">
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
    <!--====== App Content ======-->
    <div class="app-content">
        <!--====== Primary Slider ======-->
        <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
            <div class="owl-carousel primary-style-1" id="hero-slider">
                <div class="hero-slide hero-slide--1">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content slider-content--animation">

                                    <span class="content-span-1 u-c-white">Latest Update</span>

                                    <span class="content-span-2 u-c-white">More Hardcover books</span>

                                    <span class="content-span-3 u-c-white">Find books on best prices, Also Discover most selling products of hardcover books</span>

                                    <a class="shop-now-link btn--e-brand" href="shop.php">SHOP NOW</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide hero-slide--2">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content slider-content--animation">

                                    <span class="content-span-1 u-c-white">Find More Books</span>

                                    <span class="content-span-2 u-c-white">Audiobooks available.</span>

                                    <span class="content-span-3 u-c-white">Find Audiobooks on best prices,</span>

                                    <span class="content-span-4 u-c-white">with new stocks</span>

                                    <a class="shop-now-link btn--e-brand" href="shop.php">SHOP NOW</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide hero-slide--3">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content slider-content--animation">

                                    <span class="content-span-1 u-c-white">Discover More</span>

                                    <span class="content-span-2 u-c-white">Books of different genres</span>

                                    <span class="content-span-3 u-c-white">Horror, History, Sci-Fi</span>

                                    <span class="content-span-4 u-c-white">And more!</span>

                                    <a class="shop-now-link btn--e-brand" href="shop.php">SHOP NOW</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Primary Slider ======-->


        <!--====== Section 1 ======-->
        <div class="u-s-p-y-15">
        <!--====== End - App Content ======-->
        <!--====== Main Footer ======-->
    </div>
    <?php include 'footer.php'; ?>
    <!--====== End - Main App ======-->
    <!--====== Modal Section ======-->
  </div>
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
</html>
