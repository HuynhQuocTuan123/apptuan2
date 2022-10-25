<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="header">
  <a style="color: #ffffff;text-decoration: none;" href="index.php">FREE SHIPPING WITH INTERNAL ORDER > 300K CZK
    - REFUND IN 30 DAYS - QUALITY GUARANTEE</a>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">

  <div class="container">
    <a class="navbar-brand" href="?page=home">
      <img src="images/logo.png" class="logo-top" alt="">
    </a>
    <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="?page=home">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=history">Order history</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=introduce">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=contact">CONTACT</a>
        </li>
        <?php
        if (isset($_SESSION["admin"]) && $_SESSION["admin"] != 0) {
        ?>
          <li class="nav-item lisanpham">
            <a class="nav-link" href="?page=categories_management">MANAGEMENT
              <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="sub_menu">
              <li class="">
                <a href="?page=category_management" title="Categories management">
                  Categories
                </a>
              </li>
              <li class="">
                <a href="?page=product_management" title="Products management">
                  Products
                </a>
              </li>
              <li class="">
                <a href="?page=order_management" title="Oders management">
                  Orders
                </a>
              </li>
              <li class="">
                <a href="?page=user_management" title="Oders management">
                  User
                </a>
              </li>
            </ul>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
    <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
      <div class="uk-offcanvas-bar" style="    background: white;
        width: 350px;">

        <button class="uk-offcanvas-close" style="color:#272727" type="button" uk-close></button>

        <h3 style="font-size: 14px;
            color: #272727;
            text-transform: uppercase;
            margin: 3px 0 30px 0;
            font-weight: 500; letter-spacing: 2px;">SEARCH</h3>
        <div class="search-box wpo-wrapper-search">
          <form action="?page=search" class="searchform searchform-categoris ultimate-search" method="POST">
            <div class="wpo-search-inner" style="display:inline">
              <input type="hidden" name="type" value="product">
              <input required="" id="inputSearchAuto" name="txtSearch" maxlength="40" autocomplete="off" class="searchinput input-search search-input" type="text" size="20" placeholder="Tìm kiếm sản phẩm..." style="color: black;">
            </div>
            <button type="submit" class="btn-search btn" id="search-header-btn" name="btnSearch">
              <i style="font-weight:bold" class="fas fa-search"></i>
            </button>
          </form>
          <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
            <div class="resultsContent">

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="icon-ol">
      <?php
      if (isset($_SESSION["us"]) && $_SESSION["us"] != "") {
      ?>
        <a style="color: #272727" href="?page=update_acc&&id=<?php echo $_SESSION['us'] ?>"> Hi!<?php echo $_SESSION['us'] ?></a>
        <a style="color: #272727" href="?page=logout">
          <i class="glyphicon glyphicon-log-out"></i>
        </a>
      <?php
      } else {
      ?>
        <a style="color: #272727" href="?page=signin">
          <i class="fas fa-user-alt"></i>
        </a>
      <?php
      }
      ?>

      <a href="#" class="" uk-toggle="target: #offcanvas-flip">
        <i class="fas fa-search" style="color: black"></i>
      </a>

      <a style="color: #272727" href="?page=view_cart" uk-toggle="target: #offcanvas-flip2">
        <i class="fas fa-shopping-cart"></i>
      </a>
      <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
  </div>

</nav>