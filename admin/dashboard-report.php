<?php
  include "consulta.php";
  require_once '../connections.php';
	if(!isset($_SESSION['aEmail']) & empty($_SESSION['aEmail'])){
		header('location: login.php');
	}
  $fechaI = "";
  $fechaF = "";
  $categoria = "";

  if( isset($_POST["funcion"]) ){
    $funcion = $_POST["funcion"];


    switch ($funcion) {
        case 1:
            $fechaI = $_POST["fechaInicio"];
            $fechaF = $_POST["fechaFin"];
          break;
        case 2:
            $fechaI = $_POST["fechaInicio"];
            $fechaF = $_POST["fechaFin"];
          break;
        case 3:
            $categoria = $_POST["categoria"];
          break;
        case 4:
            $categoria = $_POST["categoria"];
        break;
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
    <title>Reports - Bookivia</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="../css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="../css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="../css/app.css">

    <!--=======Charts alligment========-->
    <link rel = "stylesheet" href = "../css/charts-allign.css">
</head>
<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="../images/preloader.png" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">
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
    <!--===''=== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

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
                          <div id = container name = "sales-report=table">
                            <div class="col-lg-16 col-md-25">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-50">
                                  <div class="col-lg-18 col-md-25">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-50">
                                      <div class="dash__pad-2">
                                          <div class="dash__address-header">
                                            <h1 class="dash__h1">SALES REPORT</h1>
                                          </div>
                                      </div>

                                            <div class="col-lg-18 col-md-25">

                                                    <div class="dash__pad-2">
                                                        <div class="dash__address-header">
                                                            <h2 class="dash__h1">SELECT DAY-WEEK-MONTH FOR SALES REPORT</h2>

                                                    </div>
                                                </div>

                                               <div class="col-lg-18 col-md-25">

                                                        <div class="dash__pad-2">
                                                            <div class="dash__address-header">


                                                <form method = "POST" action="#">
                                                  From: <input type= "date" name = "fechaInicio">
                                                  To: <input type= "date" name = "fechaFin">
                                                  <input type="submit" value="Submit">
                                                  <input type="hidden" name="funcion" value="1"/>
                                                </form>

                                                </div>
                                            </div>

                                            <table class="dash__table-2">
                                                <thead>
                                                    <tr>

                                                        <th>Order ID</th>
                                                        <th>Sales</th>
                                                        <th>Total</th>

                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                                      //require("consulta.php");
                                                      if( isset($_POST["funcion"]) ){
                                                        $data = array();
                                                        $data = buscarFechas($fechaI,$fechaF);
                                                        //$resultQuery = mysqli_query($connect,$queryDates);
                                                        $total = 0;



                                                        foreach($data AS $row => $valor ){
                                                          echo "<tr>
                                                                  <td>".$valor["idOrden"]."</td>
                                                                  <td>".$valor["cantidadOrden"]."</td>
                                                                  <td>".$valor["precioOrden"]."</td>
                                                                </tr>";
                                                        }

                                                      }

                                                    ?>

                                                </tbody>
                                            </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--Revenue table-->
                        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-50">
                            <div class="dash__pad-2">
                                <div class="dash__address-header">
                                    <h1 class="dash__h1">Revenue Report</h1>
                                </div>
                            </div>
                          <div class="col-lg-18 col-md-25">
                            <div class="dash__pad-2">
                              <div class="dash__address-header">
                                <h2 class="dash__h1">SELECT DAY-WEEK-MONTH FOR REVENUE REPORT</h2>
                              </div>
                            </div>
                            <div class="col-lg-18 col-md-25">
                              <div class="dash__pad-2">
                                <div class="dash__address-header">
                                  <form method = "POST" action="#">
                                        From: <input type= "date" name = "fechaInicio">
                                        To: <input type= "date" name = "fechaFin">
                                       <input type="submit" value="Submit">
                                        <input type="hidden" name="funcion" value="2"/>
                                  </form>
                                </div>
                              </div>
                              <table class="dash__table-2">
                                  <thead>
                                      <tr>
                                          <th>Revenue</th>
                                          <th>Cost</th>
                                          <th>Profit</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      if( isset($_POST["funcion"]) ){
                                        $data = array();
                                        $data = buscarFechasPorRev($fechaI,$fechaF);
                                        //$resultQuery = mysqli_query($connect,$queryDates);
                                        $total = 0;
                                        foreach($data AS $row => $valor ){
                                          echo "<tr>
                                                  <td>".$valor["revenue"]."</td>
                                                  <td>".$valor["cost"]."</td>
                                                  <td>".$valor["profit"]."</td>
                                                </tr>";
                                        }
                                      }
                                     ?>
                                </tbody>
                              </table>
                           </div>
                          </div>
                        </div>
                      <!--End of First Revenue table-->
                      <!--sales report by category-->
                      <div class="col-lg-16 col-md-25">
                          <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-50">
                            <div class="col-lg-18 col-md-25">
                              <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-50">
                                <div class="dash__pad-2">
                                  <div class="dash__address-header">
                                    <h1 class="dash__h1">SALES REPORT</h1>
                                  </div>
                                </div>
                                <div class="col-lg-18 col-md-25">
                                  <div class="dash__pad-2">
                                    <div class="dash__address-header">
                                      <h2 class="dash__h1">SELECT CATEGORY FOR SALES REPORT</h2>
                                    </div>
                                  </div>
                                  <div class="col-lg-18 col-md-25">
                                    <div class="dash__pad-2">
                                      <div class="dash__address-header">
                                          <form method = "POST" action="#">
                                              Categories: <select name="categoria">
                                                <option selected="selected">Select Category</option>
                                                <option value = "Horror"> Horror </option>
                                                <option value = "History"> History </option>
                                              </select>
                                              <br><br>
                                                <input type="submit" name = "submit" value="Submit" />
                                                <input type="hidden" name="funcion" value="3"/>
                                          </form>
                                          <br/>
                                            <?php
                                            ?>
                                    </div>
                                  </div>
                                      <table class="dash__table-2">
                                        <thead>
                                          <tr>
                                            <th>Order ID</th>
                                            <th>Sales</th>
                                            <th>Total</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if( isset($_POST["funcion"]) ){
                                                  $data = array();
                                                  $data = buscarCategoria($categoria);
                                                  $total = 0;
                                                  foreach($data AS $row => $valor ){
                                                    echo "<tr>
                                                            <td>".$valor["ordenID"]."</td>
                                                            <td>".$valor["unidades"]."</td>
                                                            <td>".$valor["total"]."</td>
                                                          </tr>";
                                                }
                                              }
                                            ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- revenue report table -->
                        <div class="col-lg-16 col-md-25">
                          <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-50">
                            <div class="col-lg-18 col-md-25">
                              <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-50">
                                <div class="dash__pad-2">
                                  <div class="dash__address-header">
                                    <h1 class="dash__h1">REVENUE REPORT</h1>
                                  </div>
                                </div>
                                <div class="col-lg-18 col-md-25">
                                  <div class="dash__pad-2">
                                    <div class="dash__address-header">
                                      <h2 class="dash__h1">SELECT CATEGORY FOR REVENUE REPORT</h2>
                                    </div>
                                  </div>
                                  <div class="col-lg-18 col-md-25">
                                    <div class="dash__pad-2">
                                      <div class="dash__address-header">
                                        <form method = "POST" action="#">
                                          Categories: <select name="categoria">
                                            <option selected="selected">Select Category</option>
                                            <option value = "Horror"> Horror </option>
                                            <option value = "History"> History </option>
                                            </select>
                                            <input type="hidden" name="funcion" value="4"/>
                                            <br><br>
                                            <input type="submit" name = "submit" value="Submit" />
                                        </form>
                                        <br/>
                                        <?php
                                        ?>
                                      </div>
                                    </div>
                                    <table class="dash__table-2">
                                    <thead>
                                    <tr>
                                    <th>Revenue</th>
                                    <th>Cost</th>
                                    <th>Profit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if( isset($_POST["funcion"]) ){
                                    $data = array();
                                    $data = buscarCategoriaPorRev($categoria);
                                    $total = 0;
                                    foreach($data AS $row => $valor ){
                                    echo "<tr>
                                    <td>".$valor["revenue"]."</td>
                                    <td>".$valor["cost"]."</td>
                                    <td>".$valor["profit"]."</td>
                                    </tr>";
                                    }
                                  }
                                  ?>
                                  </tbody>
                                  </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--End of category revenue report-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
              <!--End SALES-->
        </div>
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
    <script src="../js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="../js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="../js/app.js"></script>
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/js/demo_1/dashboard.js"></script>
    <script src="../assets/js/shared/misc.js"></script>
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
