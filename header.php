
<!--====== Main Header ======-->
<header class="header--style-1">
    <!--====== Nav 1 ======-->
    <nav class="primary-nav primary-nav-wrapper--border">
        <div class="container">
            <!--====== Primary Nav ======-->
            <div class="primary-nav">
                <!--====== Main Logo ======-->
                <a class="main-logo" href="index.php">
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
                          <?php if(isset($_SESSION['cEmail']) & !empty($_SESSION['cEmail'])) { ?>
                            <li>
                                <a href="dashboard.php"><i class="fas fa-user-cog" data-tooltip="tooltip" data-placement="left"></i></a></li>
                          <?php } ?>
                                  <?php if(!isset($_SESSION['cEmail']) & empty($_SESSION['cEmail'])) { ?>
                                    <li>
                                  <a href="signup.php"><i class="fas fa-user-plus u-s-m-r-6" data-tooltip="tooltip" data-placement="left" title="Sign up"></i></a></li>
                                  <?php } ?>
                                  <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">
                                      <a><i class="far fa-user-circle"></i></a>
                                      <!--====== Dropdown ======-->
                                      <span class="js-menu-toggle"></span>
                                      <ul style="width:120px">
                                        <?php if(!isset($_SESSION['cEmail']) & empty($_SESSION['cEmail'])) { ?>
                                          <li>
                                              <a href="signin.php"><i class="fas fa-lock u-s-m-r-6"></i>
                                                  <span>Signin</span></a></li>
                                        <?php }else{ ?>
                                          <li>
                                              <a href="logout.php"><i class="fas fa-lock-open u-s-m-r-6"></i>
                                              <span>Log out</span></a></li>
                                      <?php } ?>

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
    <!--====== Nav 2 ======-->
    <nav class="secondary-nav-wrapper">
        <div class="container">
            <!--====== Secondary Nav ======-->
            <div class="secondary-nav">
                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation1">
                    <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>
                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">
                        <span class="ah-close">✕ Close</span>
                        <!--====== List ======-->
                        <ul class="ah-list">
                            <li class="has-dropdown">
                                <span class="mega-text">Menu</span>
                                <!--====== Mega Menu ======-->
                                <span class="js-menu-toggle"></span>
                                <div class="mega-menu">
                                    <div class="mega-menu-wrap">
                                        <div class="mega-menu-list">
                                            <ul>
                                                <li class="js-active">
                                                    <a href="Shop.php"><i class="fas fa-book-reader"></i>
                                                        <span>All</span></a>
                                                    <span class="js-menu-toggle js-toggle-mark"></span></li>
                                            </ul>
                                        </div>
                                        <!--====== Electronics ======-->
                                        <div class="mega-menu-content js-active">
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                              <div class="col-lg-3">
                                                  <ul class="mega-list-title">
                                                          <h3>Genres</h3>
                                                      <li class="mega-list-title">
                                                          <a href="Shop.php?id='Fashion'"><i class="fas fa-mitten"></i>
                                                          <span>Fashion</span></a></li>
                                                      <li class="mega-list-title">
                                                          <a href="Shop.php?id='Sculptures'"><i class="fas fa-monument"></i>
                                                            <span>Sculpture</span></a></li>
                                                      <li class="mega-list-title">
                                                          <a href="Shop.php?id='History'"><i class="fas fa-landmark"></i>
                                                            <span>History</span></a></li>
                                                      <li class="mega-list-title">
                                                          <a href="Shop.php?id='Painting'"><i class="fas fa-palette"></i>
                                                            <span>Painting</span></a></li>
                                                      <li>
                                                          <li class="mega-list-title">
                                                          <a href="Shop.php?id='Horror'"><i class="fas fa-ghost"></i>
                                                            <span>Horror</span></a></li>
                                                      <li class="mega-list-title">
                                                          <a href="Shop.php?id='Sci-Fi'"><i class="fas fa-space-shuttle"></i>
                                                            <span>Science Fiction</span></a></li>
                                                      <li class="mega-list-title">
                                                          <a href="Shop.php?id='Biography'"><i class="fas fa-user-secret"></i>
                                                            <span>Biography</span></a></li>
                                                  </ul>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== End - Mega Menu Row ======-->
                                            <br>
                                            <!--====== Mega Menu Row ======-->
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <ul>
                                                        <li class="mega-list-title">
                                                    </ul>
                                                </div>
                                                <div class="col-lg-9 mega-image">
                                                    <div class="mega-banner">
                                                        <a class="u-d-block" href="Shop.php">
                                                            </a></div>
                                                </div>
                                            </div>
                                            <!--====== End - Mega Menu Row ======-->
                                        </div>
                                        <!--====== End - Electronics ======-->
                                </div>
                                <!--====== End - Mega Menu ======-->
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation2">
                    <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog" type="button"></button>
                </div>
                <!--====== End - Dropdown Main plugin ======-->
                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation3">
                    <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button>
                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">
                      <span class="ah-close">✕ Close</span>
                      <!--====== List ======-->
                      <?php if(isset($_SESSION['cart'])){ ?>
                      <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                        <li class="has-dropdown">
                          <?php $cart = $_SESSION['cart']; ?>
                          <a class="mini-cart-shop-link" href="cart.php"><i class="fas fa-shopping-cart"></i>
                            <span class="total-item-round"><?php echo count($cart); ?></span></a>
                            <!--====== Dropdown ======-->
                            <span class="js-menu-toggle"></span>
                            <div class="mini-cart">
                              <!--====== Mini Product Container ======-->
                              <div class="mini-product-container gl-scroll u-s-m-b-15">
                                <!--====== Card for mini cart ======-->
                                <?php
                                  $total = 0;
                                  foreach ($cart as $key => $value) {
                                  $navcartsql = "SELECT * FROM bookivia_books WHERE Book_ISBN=$key";
                                  $navcartres = mysqli_query($db, $navcartsql);
                                  $navcartr = mysqli_fetch_assoc($navcartres);
                                  ?>
                                <div class="card-mini-product">
                                  <div class="mini-product">

                                    <div class="mini-product__image-wrapper">
                                    <a class="mini-product__link" href="products.php?id=<?php echo $navcartr['Book_ISBN']; ?>">
                                    <img class="u-img-fluid" src="admin/<?php echo $navcartr['Book_Image']; ?>" alt=""></a></div>
                                    <div class="mini-product__info-wrapper">
                                    <span class="mini-product__name">
                                    <a href="products.php?id=<?php echo $navcartr['Book_ISBN']; ?>"><?php echo $navcartr['Book_Title']; ?></a></span>
                                    <span class="mini-product__quantity"><?php echo $value['quantity']; ?> x</span>
                                    <span class="mini-product__price">$<?php echo $navcartr['Book_Price']; ?></span></div>

                                  </div>
                                  <a class="mini-product__delete-link far fa-trash-alt" href="deletecart.php?id=<?php echo $key; ?>"></a>
                                  <?php
                                    $total = $total + ($navcartr['Book_Price']*$value['quantity']);
                                  ?>
                                </div>
                                <?php
                                }
                                ?>
                                          <!--====== End - Card for mini cart ======-->
                                          <!--====== Mini Product Statistics ======-->
                                          <div class="mini-product-stat">
                                            <div class="mini-total">
                                              <span class="subtotal-text">SUBTOTAL</span>
                                              <span class="subtotal-value">$<?php echo $total; ?></span></div>
                                              <div class="mini-action">
                                                <a class="mini-link btn--e-brand-b-2" href="checkout.php">PROCEED TO CHECKOUT</a>
                                                <a class="mini-link btn--e-transparent-secondary-b-2" href="cart.php">VIEW CART</a></div>
                                          </div>
                                          <!--====== End - Mini Product Statistics ======-->
                                        </div>
                                        <!--====== End - Dropdown ======-->
                                      </li>
                                    </ul>
                                  <?php } ?>
                                    <!--====== End - List ======-->
                                  </div>
                                  <!--====== End - Menu ======-->
                                </div>
                                <!--====== End - Dropdown Main plugin ======-->
                              </div>
                              <!--====== End - Secondary Nav ======-->
                            </div>
                          </nav>
                          <!--====== End - Nav 2 ======-->
                        </header>
                        <!--====== End - Main Header ======-->
