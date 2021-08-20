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

      <!--====== Main Header ======-->
  <?php include 'header.php'; ?>
      <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Section 1 ======-->
            <div class="u-s-p-y-90">
                <div class="container">

                  <!-- products AND filters -->
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="shop-w-master">
                                <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                                    <span>FILTERS</span></h1>
                                <div class="shop-w-master__sidebar">
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                          <form name="Genre_Filter" class="shop-w__form-p" method="post">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">Genre</h1>

                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-category" name="Genre">
                                                <ul class="shop-w___list gl--scroll">
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="History-sel2" name="Genre_Filter" value="History">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="History-sel2">History</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="Drawing-sel2" name="Genre_Filter" value="Drawing">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="Drawing-sel2">Drawing</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="fashion-sel2" name="Genre_Filter" value="Fashion">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="fashion-sel2">Fashion</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="sculpture-sel2" name="Genre_Filter" value="Sculptures">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="sculpture-sel2">Sculpture</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="painting-sel2" name="Genre_Filter" value="Painting">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="painting-sel2">Painting</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="Horror-sel2" name="Genre_Filter" value="Horror">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="Horror-sel2">Horror</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="SciFi-sel2" name="Genre_Filter" value="Sci-Fi">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="SciFi-sel2">Science Fiction</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <li>

                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">

                                                            <input type="checkbox" id="biography-sel2" name="Genre_Filter" value="Biography">
                                                            <div class="check-box__state check-box__state--primary">

                                                                <label class="check-box__label" for="biography-sel2">Biography</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                </ul>
                                                <button class="btn btn--e-transparent-brand-b-2" type="submit" name="Genre">Filter Genre</button>
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">Format</h1>
                                                <form class="shop-w__form-p" name="Format_Filter" method="post">
                                                  <span class="fas fa-minus shop-w__toggle" data-target="#s-audiobook" data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-audiobook">
                                                <ul class="shop-w___list gl--scroll">
                                                    <li>
                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">
                                                            <input type="checkbox" id="Hardc-sel" name="Format_Filter" value="Hardcover">
                                                            <div class="check-box__state check-box__state--primary">
                                                                <label class="check-box__label" for="Hardcover-sel">Hardcover</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <li>
                                                        <!--====== Check Box ======-->
                                                        <div class="check-box">
                                                            <input type="checkbox" id="Audio-sel" name="Format_Filter" value="Audiobook">
                                                            <div class="check-box__state check-box__state--primary">
                                                            <label class="check-box__label" for="Audiobook-sel">Audiobook</label></div>
                                                        </div>
                                                        <!--====== End - Check Box ======-->
                                                    </li>
                                                    <div>
                                                        <button class="btn btn--e-transparent-brand-b-2" type="submit" name="Genre">Filter Format</button></div>
                                                      </form>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <div class="shop-w shop-w--style">
                                            <div class="shop-w__intro-wrap">
                                                <h1 class="shop-w__h">PRICE</h1>
                                                <span class="fas fa-minus shop-w__toggle" data-target="#s-price" data-toggle="collapse"></span>
                                            </div>
                                            <div class="shop-w__wrap collapse show" id="s-price">
                                                <form class="shop-w__form-p" name="price_Filter" method="post">
                                                    <div class="shop-w__form-p-wrap">
                                                        <div>
                                                            <label for="price-min"></label>

                                                            <input class="input-text input-text--primary-style" type="text" id="price-min" name="Price_Filter1" placeholder="Min"></div>
                                                        <div>
                                                            <label for="price-max"></label>

                                                            <input class="input-text input-text--primary-style" type="text" id="price-max" name="Price_Filter2" placeholder="Max"></div>
                                                        <div>
                                                            <button class="btn btn--icon fas fa-angle-right btn--e-transparent-platinum-b-2" type="submit"></button></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="shop-p">
                                <div class="shop-p__toolbar u-s-m-b-30">
                                    <div class="shop-p__tool-style">
                                        <form name = "sort" action = "Shop.php" method = "post">
                                            <div class="tool-style__form-wrap">
                                                <div class="u-s-m-b-8"><select name="order" class="select-box select-box--transparent-b-2">
                                                        <option value="" selected>Sort By:</option>
                                                        <option value="ASC">Sort By: Lowest Price</option>
                                                        <option value="DESC">Sort By: Highest Price</option>
                                                    </select>
                                                  <input class="btn btn--e-transparent-brand-b-2" type="submit" value="- SORT - "></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="shop-p__collection">
                                    <div class="row is-grid-active">
                                      <!-- Products -->
                                      <?php
                                        $sql = "SELECT * FROM bookivia_books";
                                        if(isset($_GET['id']) & !empty($_GET['id'])){
                                          $id = $_GET['id'];
                                          $sql .= " WHERE Book_Genre = $id";
                                        }
                                        if (isset($_POST['order'])) {
                                        $sort = $_POST['order'];
                                        $sql = "SELECT * FROM bookivia_books ORDER BY Book_Price $sort ";
                                        }

                                        if (isset($_POST['Genre_Filter'])) {
                                        $Genre = $_POST['Genre_Filter'];
                                        $sql = "SELECT * FROM bookivia_books WHERE Book_Genre = '$Genre'";
                                        }

                                        if (isset($_POST['Format_Filter'])) {
                                        $Format = $_POST['Format_Filter'];
                                        $sql = "SELECT * FROM bookivia_books WHERE Book_Format = '$Format'";
                                        }
                                        
                                        if(isset($_POST['Price_Filter1']) || isset($_POST['Price_Filter2'])) {
                                        $Price1 = $_POST['Price_Filter1'];
                                        $Price2 = $_POST['Price_Filter2'];
                                        $sql = "SELECT * FROM bookivia_books WHERE Book_Price BETWEEN '$Price1' AND '$Price2'";
                                        }
                                        $res = mysqli_query($db, $sql);
                                        while($r = mysqli_fetch_assoc($res)){
                                        ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product-m">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="products.php?id=<?php echo $r['Book_ISBN'] ?>">

                                                        <img class="aspect__img" src="admin/<?php echo $r['Book_Image']; ?>" alt=""></a>
                                                    <div class="product-m__add-cart">

                                                        <a class="btn--e-brand" data-modal="modal" href="addtocart.php?id=<?php echo $r['Book_ISBN'] ?>">Add to Cart</a></div>
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a href="products.php?id=<?php echo $r['Book_ISBN'] ?>"><?php echo $r['Book_Genre']; ?></a></div>
                                                    <div class="product-m__name">

                                                        <a href="products.php?id=<?php echo $r['Book_ISBN'] ?>"><?php echo $r['Book_Title']; ?></a></div>
                                                        <div class="product-m__Format"><?php echo $r['Book_Format']; ?></div>
                                                    <div class="product-m__price"><?php echo $r['Book_Price']; ?></div>
                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">
                                                            <span><?php echo $r['Book_Author']; ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      <?php } ?>
                                      <!-- end of products -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- end of products AND filters -->
            </div>
            <!--====== End - Section 1 ======-->
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
