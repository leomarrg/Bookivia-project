<?php
  require_once '../connections.php';
	if(!isset($_SESSION['aEmail']) & empty($_SESSION['aEmail'])){
		header('location: login.php');
	}

  if(isset($_GET) & !empty($_GET)){
    $id = $_GET['id'];
  }else{
    header('location:dashboard_products_inventory.php');
  }

  if(isset($_POST) & !empty($_POST)){
  $ISBN = mysqli_real_escape_string($db, $_POST['book_ISBN']);
  $Title = mysqli_real_escape_string($db, $_POST['book_Title']);
  $Author = mysqli_real_escape_string($db, $_POST['book_Author']);
  $Edition = mysqli_real_escape_string($db, $_POST['book_Edition']);
  $Published_Date = mysqli_real_escape_string($db, $_POST['book_Published_Date']);
  $Genre = mysqli_real_escape_string($db, $_POST['book_Genre']);
  $Format = mysqli_real_escape_string($db, $_POST['book_Format']);
  $Editorial = mysqli_real_escape_string($db, $_POST['book_Editorial']);
  $Status = mysqli_real_escape_string($db, $_POST['book_Status']);
  $Price = mysqli_real_escape_string($db, $_POST['book_Price']);
  $Cost = mysqli_real_escape_string($db, $_POST['book_Cost']);
  $Quantity = mysqli_real_escape_string($db, $_POST['book_Quantity']);

  if(isset($_FILES) & !empty($_FILES)){
    $name = $_FILES['book_Image']['name'];
    $size = $_FILES['book_Image']['size'];
    $type = $_FILES['book_Image']['type'];
    $tmp_name = $_FILES['book_Image']['tmp_name'];

    $max_size = 100000000;
    $extension = substr($name, strpos($name, '.') + 1);

    if(isset($name) & !empty($name)){
      if(($extension == "jpg" || $extension == "jpeg" ) && $type == "image/jpeg" && $size <= $max_size){
        $location = "uploads/";
        $filepath = $location.$name;
        if(move_uploaded_file($tmp_name, $location.$name)){
          echo "Uploaded successsfully";
        }else{
          echo "failed to upload";
        }
      }else{
        echo "Only JPG files are allowed and less than 1mb";
      }
      }else{
        echo "Please select a file";
      }
    } else{
      $filepath = $_POST['filepath'];
    }

  $sql = "UPDATE bookivia_books SET Book_Title = '$Title', Book_Author = '$Author', Book_Edition = '$Edition',
  Book_Published_Date = '$Published_Date', Book_Genre = '$Genre', Book_Format = '$Format',
  Book_Editorial = '$Editorial', Book_Status = '$Status', Book_Price = '$Price', Book_Cost = '$Cost', Book_Image = '$filepath', Book_Quantity = '$Quantity'
  WHERE Book_ISBN = $id";
  $res = mysqli_query($db, $sql);
  if($res){
  echo "Product information updated successfully.";
  header('location: dashboard_products_inventory.php');
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
    <link href="../images/favicon.png" rel="shortcut icon">
    <title>Edit Products - Bookivia</title>

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

                                                    <a class="dash-active" href="dashboard_products_inventory.php">Inventory</a></li>
                                                <li>

                                                    <a href="dashboard-report.php">Report</a></li>
                                                <li>

                                                    <a href="dashboard_admin_acc.php">Admin Accounts</a></li>
                                                <li>

                                                    <a href="dashboard_customers_acc.php">Customer Accounts</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Dashboard Features ======-->
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                          <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                            <?php if(isset($smg)){ ?> <div class="gl-tag btn--e-brand-shadow" role="alert"> <?php echo
                                              $smg; ?> </div><?php } ?>

                                            </div>
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Product</h1>

                                            <span class="dash__text u-s-m-b-30">Edit product specifications.</span>
                                            <?php
	                                             $sql = "SELECT * FROM bookivia_books WHERE book_ISBN = $id";
                                               $res = mysqli_query($db, $sql);
                                               $r = mysqli_fetch_assoc($res);
                                            ?>
                                            <form method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                              <input type="hidden" name="filepath" value="<?php echo $r['Book_Image']; ?>">
                                                <div class="col-lg-12">
                                                  <div class="u-s-m-b-30">

                                                      <label class="gl-label" for="reg-fname">ISBN *</label>

                                                      <input class="input-text input-text--primary-style" type="text" id="book_ISBN" name="book_ISBN" value=<?php echo $r['Book_ISBN']; ?>></div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-fname">PRODUCT NAME (BOOK TITLE) *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="book_Title" name="book_Title" value=<?php echo $r['Book_Title']; ?>></div>
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-lname">AUTHOR *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="book_Author" name="book_Author" value=<?php echo $r['Book_Author']; ?>></div>
                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-fname">EDITION *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="book_Edition" name="book_Edition" value=<?php echo $r['Book_Edition']; ?>></div>
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-fname">PUBLISHED DATE (YYYY/MM/DD) *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="book_Published_Date" name="book_Published_Date" value=<?php echo $r['Book_Published_Date']; ?>></div>
                                                        </div>
                                                        <div class="gl-inline">
                                                          <div class="u-s-m-b-12">
                                                              <label class="gl-label" for="style">GENRE *</label><select class="select-box select-box--primary-style u-w-100" id="book_Genre" name="book_Genre" value=<?php echo $r['Book_Genre']; ?>>
                                                                  <option selected><?php echo $r['Book_Genre']; ?></option>
                                                                  <option value="History">History</option>
                                                                  <option value="Art">Art</option>
                                                                  <option value="Sculptures">Sculptures</option>
                                                                  <option value="Horror">Horror</option>
                                                                  <option value="Biography">Biography</option>
                                                                  <option value="Sci-Fi">Sci-Fi</option>
                                                                  <option value="Fashion">Fashion</option>
                                                                  <option value="Painting">Painting</option>
                                                              </select>
                                                        </div>
                                                        <div class="gl-inline">
                                                        </div>
                                                        </div>
                                                        <div class="gl-inline">

                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="style">FORMAT *</label><select class="select-box select-box--primary-style u-w-100" id="book_Format" name="book_Format">
                                                                    <option selected><?php echo $r['Book_Format']; ?></option>
                                                                    <option value="Hardcover">Hardcover</option>
                                                                    <option value="Audiobook">Audiobook</option>
                                                                </select></div>
                                                                <div class="u-s-m-b-30">

                                                                    <label class="gl-label" for="reg-editr">EDITOR *</label>

                                                                    <input class="input-text input-text--primary-style" type="text" id="book_Editorial" name="book_Editorial" value=<?php echo $r['Book_Editorial']; ?>></div>
                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="style">STATUS *</label><select class="select-box select-box--primary-style u-w-100" id="book_Status" name="book_Status">
                                                                <div class="u-s-m-b-30">
                                                                        <option selected><?php echo $r['Book_Status']; ?></option>
                                                                        <option value="Available">Available</option>
                                                                        <option value="Unavailable">Unavailable</option>
                                                                        <option value="Out of Stock">Out of Stock</option>
                                                                    </select></div>

                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-cost">COST *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="book_Cost" name="book_Cost" value=<?php echo $r['Book_Cost']; ?>></div>
                                                        </div>
                                                      <div class="gl-inline">
                                                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                                          <label class="gl-label" for="productimage">PRODUCT IMAGE *</label>
                                                          <?php if(isset($r['Book_Image']) & !empty($r['Book_Image'])) { ?>
                                                          <img src="<?php echo $r['Book_Image'] ?>" width="100px" height="100">
                                                          <a href="delprodimg.php?id=<?php echo $r['Book_ISBN']; ?>">Delete Image</a>
                                                          <?php }else{ ?>
                                                          <input type="file" name="book_Image" id="book_Image">
                                                          <p class="help-block">Only jpg/jpeg are allowed.</p>
                                                        <?php } ?>
                                                        </div>
                                                        <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="productimage">PRODUCT AMOUNT *</label>
                                                          <div class="table-p__input-counter-wrap">

                                                            <!--====== Input Counter ======-->
                                                            <div class="input-counter">

                                                                <span class="input-counter__minus fas fa-minus"></span>

                                                                <input class="input-counter__text input-counter--text-primary-style" type="text" name="book_Quantity" value=<?php echo $r['Book_Quantity']; ?> data-min="1" data-max="1000">

                                                                <span class="input-counter__plus fas fa-plus"></span></div>
                                                            <!--====== End - Input Counter ======-->
                                                          </div>
                                                        </div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="reg-cost">PRICE *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="book_Price" name="book_Price" value=<?php echo $r['Book_Price']; ?>></div>
                                                      </div>
                                                        <button class="btn btn--e-brand-b-2" type="submit" name="addproduct">SAVE</button>
                                                </div>
                                            </div>
                                          </form>
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
