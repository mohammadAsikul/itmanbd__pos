<?php
  session_start();
  include '../includes/config.php';
  $page = basename($_SERVER['PHP_SELF']);
  switch($page) {
    case "index.php" :
      $title_name = 'Dashboard';
      break;
    case "supplier.php" :
      $title_name = 'Supplier';
      break;
    case "client.php" :
      $title_name = 'Client';
      break;
    case 'purchase_order_entry.php':
        $title_name = 'Purchase Order';
        break;
    case 'category.php':
        $title_name ='Category';
        break;
    case 'sub_category.php':
        $title_name = "Sub Category";
        break;
    case 'brands.php':
        $title_name = "Brands";
        break;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title_name; ?></title>
    <!-- datatables cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.png" type="image/x-icon">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- boxicons css -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- external css -->
    <link rel="stylesheet" href="../scss/style.css">
    <!-- jQuery local file -->
    <script src="../js/jQuery-min.js"></script>
    <!-- font-awesome js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- datatables cdn js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- boxicons js -->
    <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script>
    <script src="../js/jAutoCalc.js"></script>
    <!-- jQuery UI cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="wrapper">
        <!-- header -->
        <header id="header" class="header">
            <div class="container header__container">
                <!-- bulk -->
                <div class="bulk"></div>
                <!-- login_user_profile -->
                <button id="user_profile_btn" class="user__profile--btn btn">
                    <span class="icons user__login--icon">
                        <i class="fas fa-user-cog"></i>
                    </span>
                    User Name
                </button>
            </div>
            <!-- profile__container -->
            <div class="profile__container">

            </div>
        </header>
        <!-- menu -->
        <nav id="menu" class="menu">
            <div class="btn toggle__btn--container">
                <!-- toggle btn -->
                <button id="toggle_btn" class="toggle__btn">
                    <div class="border__box border__box1"></div>
                    <div class="border__box border__box2"></div>
                    <div class="border__box border__box3"></div>
                    <!-- <div class="border__box border__box4"></div> -->
                </button>
            </div>
            <!-- logo section -->
            <div class="logo company__logo">
                <a href="../dashboard/">
                    <img src="../assets/logo/logo.png" alt="company__logo">
                </a>
            </div>
            <!-- menu__ul -->
            <ul class="menu__ul">
                <li>
                    <a href="../dashboard/" class="links link1">
                        <span class="menu__icons">
                            <i class="fas fa-tachometer-alt"></i>
                        </span>
                        <!-- content -->
                        <span class="menu__contents">
                            Dashboard
                        </span>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="drop__menu">
                        <!-- <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Stock Report</a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="#" class="links link2">
                        <span class="menu__icons">
                            <i class="fas fa-cog"></i>
                        </span>
                        <!-- content -->
                        <span class="menu__contents">
                            System
                        </span>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="drop__menu">
                        <!-- <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Stock Report</a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="#" class="links link3">
                        <span class="menu__icons">
                            <i class="fas fa-tools"></i>
                        </span>
                        <!-- content -->
                        <span class="menu__contents">
                            Setup
                        </span>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="drop__menu">
                        <li class="drop__menu__li">
                            <a href="../setup/supplier.php" class="drop__menu__li--links">Supplier</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="../setup/client.php" class="drop__menu__li--links">Clients</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="../setup/category.php" class="drop__menu__li--links">Category</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="../setup/sub_category.php" class="drop__menu__li--links">Sub_Category</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="../setup/brands.php" class="drop__menu__li--links">Brands</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="../setup/products.php" class="drop__menu__li--links">Products</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="links link5">
                        <span class="menu__icons">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <!-- content -->
                        <span class="menu__contents">
                            Purchase
                        </span>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="drop__menu">
                        <li class="drop__menu__li">
                            <a href="../purchase/purchase_order_entry.php" class="drop__menu__li--links">Purchase Order Entry</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="../purchase/purchase_order.php" class="drop__menu__li--links">Purchase Order</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="../purchase/purchase_entry.php" class="drop__menu__li--links">Purchase Entry</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="../purchase/purchase.php" class="drop__menu__li--links">Purchase</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="links link6">
                        <span class="menu__icons">
                            <i class="fas fa-cart-arrow-down"></i>
                        </span>
                        <!-- content -->
                        <span class="menu__contents">
                            Sales
                        </span>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="drop__menu">
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Sales Order</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Sales Entry</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Sales Order Update</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Sales Entry Update</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="links link7">
                        <span class="menu__icons">
                            <i class="fas fa-calculator"></i>
                        </span>
                        <!-- content -->
                        <span class="menu__contents">
                            Accounts
                        </span>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="drop__menu">
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Income Statement</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Expence Statement</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Cash Statement</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="links link7">
                        <span class="menu__icons">
                            <i class="fas fa-folder-open"></i>
                        </span>
                        <!-- content -->
                        <span class="menu__contents">
                            Reports
                        </span>
                    </a>
                    <!-- dropdown menu -->
                    <ul class="drop__menu">
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Stock Report</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">product List</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Client List</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Purchase Report</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Sales Report</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Income Report</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Expence Report</a>
                        </li>
                        <li class="drop__menu__li">
                            <a href="#" class="drop__menu__li--links">Cash Report</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
