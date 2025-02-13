<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <meta charset="utf-8">
    <title><?php echo $company[0]['cname'];?></title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="<?php echo $base_url.'assets/';?>fonts/fonts.css">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo $base_url.'assets/';?>fonts/font-icons.css">
    <link rel="stylesheet" href="<?php echo $base_url.'assets/';?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url.'assets/';?>css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo $base_url.'assets/';?>css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url.'assets/';?>css/styles.css?ver=<?php echo rand(0,999);?>" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="images/logo/favicon.png">

</head>

<!-- <body class="preload-wrapper"> -->
    <body>

    <button id="scroll-top">
        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_15741_24194)">
                <path
                    d="M3 11.9175L12 2.91748L21 11.9175H16.5V20.1675C16.5 20.3664 16.421 20.5572 16.2803 20.6978C16.1397 20.8385 15.9489 20.9175 15.75 20.9175H8.25C8.05109 20.9175 7.86032 20.8385 7.71967 20.6978C7.57902 20.5572 7.5 20.3664 7.5 20.1675V11.9175H3Z"
                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </g>
            <defs>
                <clipPath id="clip0_15741_24194">
                    <rect width="24" height="24" fill="white" transform="translate(0 0.66748)" />
                </clipPath>
            </defs>
        </svg>
    </button>

    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->

    <!-- #wrapper -->
    <div id="wrapper">

        <!-- topbar -->
        <div class="tf-topbar">
            <div class="container">
                <div class="tf-topbar_wrap d-flex align-items-center justify-content-center justify-content-xl-between">
                    <div class="topbar-left d-none d-xl-flex">

                    <a href="tel:+919214322143" class="text-white"> <img src="<?php echo $base.'assets/images/india.webp'; ?>" style="width:auto; height:20px;"> <span class="number-phone"><?php echo $company[0]['phone'];?></span></a>

                    </div>
                    <div class="topbar-center">
                        <p class="text-caption-1 text_white">Free shipping on all orders over <span
                                class="text_primary">$20.00</span></p>
                    </div>
                    <div class="topbar-right d-none d-xl-flex">
                        <a href="about.html" class="text_white text-caption-1 link">About</a>
                        <a href="contact.html" class="text_white text-caption-1 link">Contact</a>
                        <a href="store-list.html" class="text_white text-caption-1 link">Location</a>
                    </div>
                </div>
            </div>
        </div> <!-- /topbar -->


        <!-- Header -->
        <header id="header" class="header-default">
            
        
        
            <div class="main-header">
                <div class="container">
                    <div class="row wrapper-header align-items-center">
                        <div class="col-xl-5 d-none d-xl-block">
                            <div class="wrapper-header-left">
                                <form class="form-search" action="#">
                                    <fieldset class="text">
                                        <input type="text" placeholder="Searching..." class="" name="text" tabindex="0"
                                            value="" aria-required="true" required="">
                                    </fieldset>
                                    <button class="" type="submit">
                                        <i class="icon icon-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 col-4 d-xl-none">
                            <a href="#mobileMenu" class="mobile-menu" data-bs-toggle="offcanvas"
                                aria-controls="mobileMenu">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256">
                                    <path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="col-xl-2 col-md-4 col-4 text-center">
                            <a href="index_3997808.html" class="logo-header">
                                <img src="<?php echo $base_url.'assets/images/'.$company[0]['logo']; ?>" alt="logo" class="logo">
                            </a>
                        </div>
                        <div class="col-xl-5 col-md-4 col-4">
                            <ul class="nav-icon">
                                <li class="nav-account">
                                    <a href="login.html" class="nav-icon-item">
                                        <span class="icon icon-user"></span>
                                    </a>
                                </li>
                                <li class="nav-wishlist">
                                    <a href="wish-list.html" class="nav-icon-item">
                                        <span class="icon icon-heart"></span>
                                    </a>
                                </li>
                                <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal"
                                        class="nav-icon-item">
                                        <span class="icon icon-cart"></span>
                                        <span class="count-box text-button-small">1</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom d-none d-xl-block">
                <div class="container">
                    <div class="row wrapper-header align-items-center">
                        <div class="col-xl-3">
                            <div class="box-left">
                                <div class="tf-list-categories">
                                    <a href="#" class="categories-title">
                                        <span class="text text-button">Browse Collection</span>
                                        <span class="icon icon-down"></span>
                                    </a>
                                    <div class="list-categories-inner">
                                        <ul>
                                            <?php $collection=$product->get_collection_all();
                                            foreach($collection as $k=>$value){
                                            ?>
                                            <li class="sub-categories2">
                                                <a href="#" class="categories-item">
                                                    <span class="inner-left">
                                                        <?php echo $collection[$k]['cat'];?>
                                                    </span>
                                                    <i class="icon icon-right"></i>
                                                </a>
                                                <!-- <ul class="list-categories-inner">
                                                    <li>
                                                        <a href="#" class="categories-item">
                                                            <span class="inner-left">
                                                                <i class="icon icon-camera"></i>
                                                                Ergonomic Furniture
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="categories-item">
                                                            <span class="inner-left">
                                                                <i class="icon icon-camera"></i>
                                                                Ergonomic Furniture
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul> -->
                                            </li>
                                            <?php }?>
                                        </ul>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <nav class="box-navigation text-center">
                                <ul class="box-nav-ul">
                                    <li class="menu-item">
                                        <a href="<?php echo $base_url;?>" class="item-link active">HOME</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="item-link">SHOP<i class="icon icon-down"></i></a>
                                        <div class="sub-menu mega-menu mega-menu-1">
                                            <div class="container">
                                                <div class="row-demo-1">
                                                    <div class="mega-menu-list">

                                                    <?php $cat=$product->get_category_all();
                                                        foreach($cat as $k0=>$value){
                                                        ?>
                                                        
                                                        <div class="mega-menu-item">
                                                            <div class="menu-heading text-title"><?php echo $cat[$k0]['cat'];?></div>
                                                            <ul class="menu-list">
                                                                <?php 
                                                                $subcat = $product->get_subcategory_all($cat[$k0]['id']);
                                                                foreach($subcat as $k1=>$value){
                                                                ?>
                                                                <li><a href="shop-default.html" class="menu-link-text text_secondary link"><?php echo $subcat[$k1]['subcat'];?></a></li>
                                                                <?php }?>
                                                            </ul>
                                                        </div>
                                                        <?php }?>    
                                                        
                                                    </div>

                                                    <!-- <div class="collection-position style-2">
                                                        <div class="img-style ">
                                                            <img class="lazyload effect-paralax opacity-100"
                                                                data-src="images/banner/banner-1.jpg"
                                                                src="images/banner/banner-1.jpg" alt="banner-cls">
                                                        </div>

                                                        <div class="content cls-content">
                                                            <div class="cls-heading">
                                                                <h4 class="text_white">Elevate Your Office</h4>
                                                                <p class="text_white">Stylish office decor</p>
                                                            </div>
                                                            <a href="shop-default.html"
                                                                class="tf-btn btn-white ">Explore All Products <i
                                                                    class="icon-arrow-up-right"></i></a>
                                                        </div>
                                                    </div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                    <li class="menu-item position-relative">
                                        <a href="#" class="item-link">BLOGS<i class="icon icon-down"></i></a>
                                        <div class="sub-menu submenu-default">
                                            <ul class="menu-list">
                                                <li><a href="#" class="menu-link-text">Latest Blog</a></li>
                                                <li><a href="#" class="menu-link-text">Viewall</a></li>
                                                
                                            </ul>
                                        </div>
                                    </li>

                                    <li class="menu-item position-relative">
                                    <a href="<?php echo $base_url.'index.php?action=dashboard&page=';?>about-us" class="menu-link-text">About Us</a>
                                    </li>
                                    <li class="menu-item position-relative">
                                        <a href="#" class="item-link">Contact Us<i class="icon icon-down"></i></a>
                                        <div class="sub-menu submenu-default">
                                            <ul class="menu-list">
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=';?>faqs" class="menu-link-text">Faqs</a></li>
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=';?>store-list" class="menu-link-text">Store List</a></li>
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=';?>term-and-condition" class="menu-link-text">Term & Conditions</a></li>
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=';?>privacy-policy" class="menu-link-text">Privacy Policy</a></li>
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=';?>contact-us" class="menu-link-text">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </li>


                                </ul>
                            </nav>
                        </div>
                        <div class="col-xl-3">
                            <a href="tel:315-666-6688" class="box-right phone text-button"><span
                                    class="icon icon-phone"></span><span class="number-phone"><?php echo $company[0]['phone'];?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /Header -->
