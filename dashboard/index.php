<?php require_once "../includes/header.php"; ?>
<div class="wrapper dashboard">
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
            <a href="#">
                <img src="../assets/logo/logo.png" alt="company__logo">
            </a>
        </div>
        <!-- menu__ul -->
        <ul class="menu__ul">
            <li>
                <a href="dashboard.html" class="links link1">
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
                        <a href="supplier.html" class="drop__menu__li--links">Suppliers</a>
                    </li>
                    <li class="drop__menu__li">
                        <a href="clients.html" class="drop__menu__li--links">Clients</a>
                    </li>
                    <li class="drop__menu__li">
                        <a href="category.html" class="drop__menu__li--links">Category</a>
                    </li>
                    <li class="drop__menu__li">
                        <a href="sub_category.html" class="drop__menu__li--links">Sub_Category</a>
                    </li>
                    <li class="drop__menu__li">
                        <a href="brands.html" class="drop__menu__li--links">Brands</a>
                    </li>
                    <li class="drop__menu__li">
                        <a href="products.html" class="drop__menu__li--links">Products</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="stock.html" class="links link4">
                    <span class="menu__icons">
                        <i class="fas fa-cubes"></i>
                    </span>
                    <!-- content -->
                    <span class="menu__contents">
                        Stock
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
                        <a href="#" class="drop__menu__li--links">Purchase Requisition</a>
                    </li>
                    <li class="drop__menu__li">
                        <a href="#" class="drop__menu__li--links">Purchase Entry</a>
                    </li>
                    <li class="drop__menu__li">
                        <a href="#" class="drop__menu__li--links">Purchase Requisition Update</a>
                    </li>
                    <li class="drop__menu__li">
                        <a href="#" class="drop__menu__li--links">Purchase Entry Update</a>
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
                        <a href="#" class="drop__menu__li--links">Supplier List</a>
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
    <!-- main content -->
    <main id="main" class="main">
        <div class="container">
            <div class="box__container">
                <div class="boxs box1">
                    <p>Today Purchase</p>
                    <div>1000</div>
                </div>
                <div class="boxs box2">
                    <p>This Month Total Purchase</p>
                    <div>1000</div>
                </div>
                <div class="boxs box3">
                    <p>Today Sales</p>
                    <div>1000</div>
                </div>
                <div class="boxs box4">
                    <p>This Month Total Sales</p>
                    <div>1000</div>
                </div>
                <div class="boxs box5">
                    <p>Today Sales Service</p>
                    <div>1000</div>
                </div>
                <div class="boxs box6">
                    <p>This Month Total Sales Services</p>
                    <div>1000</div>
                </div>
                <div class="boxs box7">
                    <p>Today Expences</p>
                    <div>1000</div>
                </div>
                <div class="boxs box8">
                    <p>This Month Total Expences</p>
                    <div>1000</div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php require_once '../includes/footer.php'; ?>
