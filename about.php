<?php
include 'Connections.php';
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
      <?php include('header.php'); ?>

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

                                        <a href="about.php">About</a></li>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="about">
                                    <div class="about__container">
                                        <div class="about__info">
                                            <h2 class="about__h2">Welcome to Bookivia!</h2>
                                            <div class="about__p-wrap">
                                                <p class="about__p">Bookivia is a store where you can buy books either hardcover ones or audiobooks!.</p>
                                            </div>

                                            <a class="about__link btn--e-secondary" href="shop.php" target="_blank">Shop Now</a>
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


            <!--====== Section 3 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-46">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">Our Team Members</h1>
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
                            <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                                <div class="team-member u-h-100">
                                    <div class="team-member__wrap">
                                        <div class="aspect aspect--bg-grey-fb aspect--square">

                                            <img class="aspect__img team-member__img" src="images/about/member-1.jpg" alt=""></div>
                                        <div class="team-member__social-wrap">

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-member__info">

                                        <span class="team-member__name">Brian H. Montalvo</span>

                                        <span class="team-member__job-title">Full stack</span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                                <div class="team-member u-h-100">
                                    <div class="team-member__wrap">
                                        <div class="aspect aspect--bg-grey-fb aspect--square">

                                            <img class="aspect__img team-member__img" src="images/about/member-2.jpg" alt=""></div>
                                        <div class="team-member__social-wrap">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-member__info">

                                        <span class="team-member__name">Leomar Rodriguez</span>

                                        <span class="team-member__job-title">Full stack</span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                                <div class="team-member u-h-100">
                                    <div class="team-member__wrap">
                                        <div class="aspect aspect--bg-grey-fb aspect--square">

                                            <img class="aspect__img team-member__img" src="images/about/member-3.jpg" alt=""></div>
                                        <div class="team-member__social-wrap">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-member__info">

                                        <span class="team-member__name">Josue Felix</span>

                                        <span class="team-member__job-title">Back end</span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                                <div class="team-member u-h-100">
                                    <div class="team-member__wrap">
                                        <div class="aspect aspect--bg-grey-fb aspect--square">

                                            <img class="aspect__img team-member__img" src="images/about/member-4.jpg" alt=""></div>
                                        <div class="team-member__social-wrap">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-member__info">

                                        <span class="team-member__name">Jonathan Gonzalez</span>

                                        <span class="team-member__job-title">Front end</span></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                                <div class="team-member u-h-100">
                                    <div class="team-member__wrap">
                                        <div class="aspect aspect--bg-grey-fb aspect--square">

                                            <img class="aspect__img team-member__img" src="images/about/member-5.jpg" alt=""></div>
                                        <div class="team-member__social-wrap">

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-member__info">

                                        <span class="team-member__name">Iankarlo Davila</span>

                                        <span class="team-member__job-title">Back end</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 3 ======-->
            <div class="section__content">

        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        <?php include('footer.php'); ?>
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
