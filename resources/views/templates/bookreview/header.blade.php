<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE Compatbility Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- First Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Categories</title>
    <!-- My Css Files -->

    {{ Html::style('/templates/bookreviewing/assets/css/bootstrap.css') }}
    {{ Html::style('/templates/bookreviewing/assets/css/normalize.css') }}
    {{ Html::style('/templates/bookreviewing/assets/css/style.css') }}
    {{ Html::style('/templates/bookreviewing/assets/css/default_theme.css') }}
    <!-- Fonts Library -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,800'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Libre+Franklin:100,200,300,500&subset=latin,latin-ext'>
    <!-- Font Awesome Iconc Library -->
    {{ Html::style('/templates/bookreviewing/assets/css/font-awesome.min.css') }}

    <!--[if lt IE 9]>
    {{ Html::script('/templates/bookreviewing/assets/js/html5shiv.min.js') }}
    {{ Html::script('/templates/bookreviewing/assets/js/respond.min.js') }}
       <![endif]-->
</head>
<body>
<!--START MENU SECTION-->
<div class="menu">
    <div class="container">
        <div class="menu-section">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Reading</a>
            </div>
            <!--START SEARCH BAR -->
            <div class="search-bar">
                <input type="text" placeholder="Search"/>
            </div>
            <div class="search">
                <div class="search-open"><i class="fa fa-search" aria-hidden="true"></i></div>
                <div class="search-exit"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            <!--END SEARCH BAR -->
            <!--START SHOPPING CAT ICON -->
            <div class="shopping-icon">
                <ul>
                    <li><a href="#" id="cart"><i class="fa fa-shopping-cart"></i><span class="badge">3</span></a></li>
                </ul>
            </div>
            <div class="shopping-cart">
                <!--START shopping-cart-header -->
                <div class="shopping-cart-header">
                    <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
                    <div class="shopping-cart-total">
                        <span class="lighter-text">Total:</span>
                        <span class="main-color-text">$2,229.97</span>
                    </div>
                </div>
                <!--END shopping-cart-header -->
                <ul class="shopping-cart-items">
                    <li class="clearfix">
                        <img src="http://via.placeholder.com/100x100" alt="item1"/>
                        <a href="#"></a>
                        <span class="item-name">Design & Web design</span>
                        <span class="item-price">$849.99</span>
                        <span class="item-quantity">Quantity: 01</span>
                    </li>
                    <li class="clearfix">
                        <img src="http://via.placeholder.com/100x100" alt="item2"/>
                        <span class="item-name">Nature Package</span>
                        <span class="item-price">$1,249.99</span>
                        <span class="item-quantity">Quantity: 01</span>
                    </li>
                    <li class="clearfix">
                        <img src="http://via.placeholder.com/100x100" alt="item3"/>
                        <span class="item-name">Design & Web design</span>
                        <span class="item-price">$129.99</span>
                        <span class="item-quantity">Quantity: 01</span>
                    </li>
                </ul>
                <div class="shopping-buttons">
                    <a class="btn btn-lg home-page-view-cart-btn" href="cart.html">view cart</a>
                    <a class="btn btn-lg home-page-checkout-btn" href="checkout.html">Checkout</a>
                </div>
            </div>
            <!--END SHOPPING CAT ICON -->
            <!--START MENU TOGGLE ICON-->
            <div class="menu-toggle">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
            <nav>
                <ul class="hidden">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="categories.html">Categories</a></li>
                    <li><a href="books.html">Our Books</a></li>
                    <li><a href="authors.html">Authors</a></li>
                    <li><a href="customer-account.html">Sign In</a></li>
                    <li><a href="store-pages.html">Store's All Pages</a></li>
                </ul>
            </nav>
            <!--END MENU TOGGLE ICON-->
        </div>
    </div>
</div>
<!--END MENU SECTION-->
<!--START CATEGORIES-PAGE-BACKGROUND SECTION -->
<div class="categories-page-background pages-background">
    <h1>Categories</h1>
</div>
<!--END CATEGORIES-PAGE-BACKGROUND SECTION -->
<!-- Start Tool Box SECTION -->
<div class="option-box">
    <div class="color-option">
        <h2>Color Selector</h2>
        <ul class="list-unstyled">
            <li data-value="assets/css/default_theme.css"></li>
            <li data-value="assets/css/emerald_theme.css"></li>
            <li data-value="assets/css/turquoise_theme.css"></li>
            <li data-value="assets/css/sunflower_theme.css"></li>
            <li data-value="assets/css/orange_theme.css"></li>
            <li data-value="assets/css/carrot_theme.css"></li>
            <li data-value="assets/css/alizarin_theme.css"></li>
            <li data-value="assets/css/concrete_theme.css"></li>
            <li data-value="assets/css/amethyst_theme.css"></li>
            <li data-value="assets/css/wetasphalt_theme.css"></li>
            <li data-value="assets/css/sienna_theme.css"></li>
            <li data-value="assets/css/hotpink_theme.css"></li>
            <li data-value="assets/css/darkgoldenrod_theme.css"></li>
            <li data-value="assets/css/lightskyblue_theme.css"></li>
            <li data-value="assets/css/black_theme.css"></li>
        </ul>
    </div>
    <i class="fa fa-gear fa-2x gear-check"></i>
</div>
