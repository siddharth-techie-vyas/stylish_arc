<!-- .silideshow -->
        <div class="tf-slideshow style-default slider-nav-sw">
            <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="2" data-tablet="2" data-mobile="1"
                data-centered="false" data-space="20" data-space-mb="0" data-loop="false" data-auto-play="false"
                data-pagination="1" data-pagination-md="2" data-pagination-lg="2">
                <div class="swiper-wrapper">
                   <!-------- slides ------->
                   <?php $slider=$admin->get_website_config('slider');
                   foreach($slider as $row=>$v){?>
                
                    <div class="swiper-slide">
                        <div class="wrap-slider slide-1">
                            <div class="img-style">
                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/'.$slider[$row]['value1'];?>"
                                    src="<?php echo $base_url.'assets/images/'.$slider[$row]['value1'];?>" alt="banner-cls">
                            </div>
                            <div class="box-content">
                                <div class="box-title">
                                    <h1 class="text-white"><?php echo $slider[$row]['value2'];?></h1>
                                    <p class="text-body-1 text-white"><?php echo $slider[$row]['value3'];?></p>
                                </div>
                                <a href="<?php echo $slider[$row]['value4'];?>" class="tf-btn btn-white ">Explore Collection <i class="icon-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                   <?php }?>
                </div>
                <div class="wrap-pagination">
                    <div class="container">
                        <div class="sw-dots sw-pagination-slider type-circle white-circle-line justify-content-center">
                        </div>
                    </div>
                </div>
                <!-- <div class="sw-button swiper-button-next  navigation-next-slider"></div>
                <div class="sw-button swiper-button-prev navigation-prev-slider"></div> -->
            </div>
        </div><!-- /.silideshow -->

        <!-- /.categories -->
        <!-- <section class="flat-spacing-2 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="text-center flat-spacing pt-0 line-bottom-container">
                            <div class="wrap-categories mb_28">
                                <?php 
                                $cat_sugg=$product->get_category_all();
                                foreach($cat_sugg as $row1=>$v){
                                
                                ?>
                                <h4 class="categories-item style-3 hover-cursor-img">
                                    <a href="#" class="link"><?php echo $cat_sugg[$row1]['cat'];?></a>
                                    <span class="hover-image">
                                        <img src="<?php echo $base_url.'assets/images/'.$cat_sugg[$row1]['image'];?>" alt="<?php echo $cat_sugg[$row1]['cat'];?>">
                                    </span>
                                </h4>
                                <?php }?>
                                
                            </div>
                            <a href="#" class="btn-line"><span>View All Categiories</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        
        <!-- /.categories -->

        <!-- .top--pick -->
        <section class="flat-spacing-5 pt-0" style="margin-top:10px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-section text-center">
                            <h3 class="wow fadeInUp">Our Picks For You</h3>
                            <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Fresh styles just in! Elevate your look.</p>
                        </div>
                        <div class="tf-grid-layout tf-col-2 lg-col-4 ">

                        <?php $random_pro=$admin->get_random_product();
                        if($random_pro){
                        foreach($random_pro as $row2=>$v){                           
                        ?>
                            <div class="card-product style-1 wow fadeInUp" data-wow-delay="0s">
                                <div class="card-product-wrapper">
                                    <a href="#" class="image-wrap">
                                        <?php if(!file_exists($base_url.'assets/images/'.$random_pro[$row2]['picture'])){?>
                                        <img class="lazyload img-product" data-src="<?php echo $base_url.'assets/images/'.$random_pro[$row2]['picture'];?>"
                                            src="<?php echo $base_url.'assets/images/'.$random_pro[$row1]['picture'];?>" alt="<?php echo $random_pro[$row2]['product_name'];?>">

                                        <img class="lazyload img-hover" data-src="<?php echo $base_url.'assets/images/'.$random_pro[$row2]['picture'];?>"
                                            src="<?php echo $base_url.'assets/images/'.$random_pro[$row1]['picture'];?>" alt="<?php echo $random_pro[$row2]['product_name'];?>">
                                            <?php } else{?>
                                                <img src="<?php echo $base_url.'assets/images/noimage_found.jpg';?>"/>
                                            <?php }?>


                                    </a>
                                    <!-- 
                                    to do
                                    <div class="list-product-btn">
                                        <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Wishlist</span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                            class="box-icon compare ">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                        <a href="#quickView" data-bs-toggle="modal"
                                            class="box-icon quickview tf-btn-loading">
                                            <span class="icon icon-eye"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div> 
                                    <div class="list-btn-main">
                                        <a href="#shoppingCart" data-bs-toggle="modal" class="btn-main-product">Add To
                                            cart</a>
                                    </div>-->
                                </div>
                                <div class="card-product-info ">
                                    <a href="product-detail.html" class=" text-title title link"><?php echo $random_pro[$row2]['product_name'];?></a>
                                    <div class="price text-body-default "><i class="fa fa-inr"></i> <?php echo $random_pro[$row2]['inr'];?></div>
                                    <!-- <ul class="list-color-product">
                                        <li class="list-color-item color-swatch active">
                                            <span class="d-none text-capitalize color-filter">Light Blue</span>
                                            <span class="swatch-value bg-light-blue"></span>
                                            <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>shop/product-1.2.jpg"
                                                src="<?php echo $base_url.'assets/images/';?>shop/product-1.2.jpg" alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="d-none text-capitalize color-filter">Light Blue</span>
                                            <span class="swatch-value bg-light-blue-2"></span>
                                            <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>shop/product-1.3.jpg"
                                                src="<?php echo $base_url.'assets/images/';?>shop/product-1.3.jpg" alt="image-product">
                                        </li>
                                    </ul> -->
                                </div>
                            </div>
                        <?php }}else{echo "<h5>No Products Found</h5>";}?>    
                            
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.top--pick -->

        <!-- .lookbook -->
        <section class="flat-spacing-3 bg_surface">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-section text-center">
                            <h3 class="wow fadeInUp">Start With These Curated Spaces</h3>
                            <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0s">Comfort and style meet to blissful perfection.
                                Discover handdy tips and styling inspiration</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper tf-sw-lookbook sw-lookbook-wrap" data-loop="true" data-preview="1.467"
                data-tablet="1.467" data-mobile="1" data-space-lg="20" data-space-md="20" data-space="10"
                data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="cls-lookbook">
                            <div class="img-style ">
                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>banner/banner-lookbook-1.jpg"
                                    src="<?php echo $base_url.'assets/images/';?>banner/banner-lookbook-1.jpg" alt="banner-cls">
                            </div>
                            <div class="lookbook-item  position1">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-1.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lookbook-item   position2">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-1.jpg"
                                                    src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-1.jpg" alt="banner-cls">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lookbook-item position3">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-3.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cls-lookbook">
                            <div class="img-style ">
                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>banner/banner-lookbook-2.jpg"
                                    src="<?php echo $base_url.'assets/images/';?>banner/banner-lookbook-2.jpg" alt="banner-cls">
                            </div>
                            <div class="lookbook-item  position1">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-1.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lookbook-item   position2">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-2.jpg"
                                                    src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-2.jpg" alt="banner-cls">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lookbook-item   position3">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-3.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="cls-lookbook">
                            <div class="img-style ">
                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>banner/banner-lookbook-3.jpg"
                                    src="<?php echo $base_url.'assets/images/';?>banner/banner-lookbook-3.jpg" alt="banner-cls">
                            </div>
                            <div class="lookbook-item  position1">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-1.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lookbook-item   position2">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-2.jpg"
                                                    src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-2.jpg" alt="banner-cls">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lookbook-item   position3">
                                <div class="dropup-center dropup">
                                    <div role="dialog" class="tf-pin-btn style-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="loobook-product">
                                            <div class="img-style">
                                                <img src="<?php echo $base_url.'assets/images/';?>gallery/lookbook-3.jpg" alt="img">
                                            </div>
                                            <div class="content">
                                                <div class="info">
                                                    <a href="product-detail.html"
                                                        class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                                    <div class="price text-button">$69.99</div>
                                                </div>
                                                <a href="#quickView" data-bs-toggle="modal" class="btn-lookbook btn-line">Quick
                                                    View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-lookbook sw-dots type-circle justify-content-center"></div>
            </div>
        </section><!-- .lookbook -->

        <!-- .top-sale -->
        <section class="flat-spacing-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-section style-2">
                            <div class="left">
                                <h3 class="wow fadeInUp">Shop Top Sellers</h3>
                                <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0s">Fresh styles just in! Elevate your look.</p>
                            </div>
                            <div class="right wow fadeInUp">
                                <a href="#" class="btn-line">
                                    <span>View All Products</span></a>
                            </div>
                        </div>
                        <div class="sw-button-over">
                            <div class="swiper tf-sw-collection" data-preview="4" data-tablet="3" data-mobile-sm="2"
                                data-mobile="1" data-space-lg="30" data-space-md="20" data-space="15" data-loop="false">
                                <div class="swiper-wrapper">

                                <?php $random_pro2=$admin->get_random_product();
                                        if($random_pro2){
                                            foreach($random_pro2 as $row3=>$value)
                                            {
                                            ?>
                                                <div class="swiper-slide">
                                                    <div class="card-product style-1 wow fadeInUp" data-wow-delay="0s">
                                                        <div class="card-product-wrapper">
                                                            <a href="product-detail.html" class="image-wrap">
                                                                <img class="lazyload img-product"
                                                                    data-src="<?php echo $base_url.'assets/images/'.$random_pro2[$row3]['picture'];?>"
                                                                    src="<?php echo $base_url.'assets/images/'.$random_pro2[$row3]['picture'];?>" alt="image-product">
                                                                <img class="lazyload img-hover"
                                                                    data-src="<?php echo $base_url.'assets/images/'.$random_pro2[$row3]['picture'];?>"
                                                                    src="<?php echo $base_url.'assets/images/'.$random_pro2[$row3]['picture'];?>" alt="image-product">
                                                            </a>
                                                            <!-- <div class="list-product-btn">
                                                                <a href="javascript:void(0);"
                                                                    class="box-icon wishlist btn-icon-action">
                                                                    <span class="icon icon-heart"></span>
                                                                    <span class="tooltip">Wishlist</span>
                                                                </a>
                                                                <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                                                    class="box-icon compare ">
                                                                    <span class="icon icon-compare"></span>
                                                                    <span class="tooltip">Compare</span>
                                                                </a>
                                                                <a href="#quickView" data-bs-toggle="modal"
                                                                    class="box-icon quickview tf-btn-loading">
                                                                    <span class="icon icon-eye"></span>
                                                                    <span class="tooltip">Quick View</span>
                                                                </a>
                                                            </div>
                                                            <div class="list-btn-main">
                                                                <a href="#shoppingCart" data-bs-toggle="modal"
                                                                    class="btn-main-product">Add To
                                                                    cart</a>
                                                            </div> -->
                                                        </div>
                                                        <div class="card-product-info ">
                                                            <a href="#" class=" text-title title link"><?php echo $random_pro2[$row3]['product_name'];?></a>
                                                            <div class="price text-body-default "><i class="fa fa-inr"></i> <?php echo $random_pro2[$row3]['inr'];?></div>
                                                            <ul class="list-color-product">
                                                                <li class="list-color-item color-swatch active">
                                                                    <span class="d-none text-capitalize color-filter"><?php echo $random_pro2[$row3]['color'];?></span>
                                                                    <!--<span class="swatch-value bg-light-blue"></span>
                                                                     <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>shop/product-9.2.jpg"
                                                                        src="<?php echo $base_url.'assets/images/';?>shop/product-9.2.jpg" alt="image-product"> -->
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }}?>
                                    </div>
                                </div>
                                <div class="wrap-pagination d-lg-none d-block">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div
                                                    class="sw-pagination-collection sw-dots  type-circle d-flex justify-content-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sw-button swiper-button-next nav-next-collection has-border d_lg_none "></div>
                            <div class="sw-button swiper-button-prev nav-prev-collection has-border d_lg_none "></div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- .top-sale -->

        <section class="flat-spacing-2 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tf-img-with-text">
                            <div class="banner-left">
                                <div class="heading-section ">
                                    <h3 class="wow fadeInUp">Discover Our Signature Interior Collections</h3>
                                    <p class="text-body-default wow fadeInUp" data-wow-delay="0.1s">Explore our carefully crafted furniture design
                                        collections, each tailored to bring elegance and functionality to your spaces.  
                                    </p>
                                </div>
                                <ul class="tab-banner" role="tablist">

                                    <?php 
                                    $collection_limit=$product->get_all_collection_limit(5);
                                    $c_counter=1;
                                    foreach($collection_limit as $cl => $v){
                                    ?>
                                    <li class="nav-tab-item wow fadeInUp">
                                        <a href="#tabBannerCls<?php echo $c_counter; ?>" class="nav-tab-link hover-cursor-img active " data-bs-toggle="tab"
                                            aria-selected="false" role="tab" tabindex="-1">
                                            <h5 class="title text-line-clamp-1"><?php echo $c_counter; ?>. <?php echo $collection_limit[$cl]['cat']; ?></h5>
                                            <div class="arr-link">
                                                <span class="text-btn-uppercase text-more">More</span>
                                                <i class="icon icon-arrow-up-right"></i>
                                            </div>
                                            <div class="hover-image">
                                                <img src="<?php echo $base_url.'assets/images/'.$collection_limit[$cl]['image'];?>" alt="Hover Image">
                                            </div>
                                        </a>
                                    </li>
                                <?php $c_counter++;}?>
                                </ul>
                                <div class="wow fadeInUp">
                                    <a href="#" class="btn-line">
                                        <span>Explore The Full Lookbook
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="banner-right flat-animate-tab">
                                <div class="tab-content ">
                                    <?php 
                                    $c1_counter=1;
                                    foreach($collection_limit as $cl2 => $v){?>
                                    
                                    <div class="tab-pane active show" id="tabBannerCls<?php echo $cl_counter;?>" role="tabpanel">
                                        <div class="collection-position hover-img">
                                            <div class="img-style ">
                                                <img style="max-height:600px;" class="lazyload effect-paralax"
                                                    data-src="<?php echo $base_url.'assets/images/'.$collection_limit[$cl2]['image'];?>"
                                                    src="<?php echo $base_url.'assets/images/'.$collection_limit[$cl2]['image'];?>" alt="<?php echo $collection_limit[$cl2]['cat'];?>">
                                            </div>
                                            <div class="content cls-content">
                                                <div class="cls-heading">
                                                    <p class="text_white"><?php echo $collection_limit[$cl2]['cat'];?></p>
                                                    <h3 class=""> <a href="#" class="link text_white">View</a></h3>
                                                </div>
                                                <a href="#" class="tf-btn btn-white  mx-auto">Explore
                                                    Collection <i class="icon-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $cl_counter++; }?>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.collections -->

        <section class="flat-spacing-2 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div dir="ltr" class="swiper tf-sw-iconbox" data-preview="4" data-tablet="3" data-mobile-sm="2"
                            data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                            data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="tf-box-icon">
                                        <div class="icon">
                                            <i class="icon-package"></i>
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Free & fast delivery</h5>
                                            <p>No extra costs, just the price you see.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tf-box-icon">
                                        <div class="icon">
                                            <i class="icon-arrow-down-left"></i>
                                        </div>
                                        <div class="content">
                                            <h5 class="title">14-Day Returns</h5>
                                            <p>Risk-free shopping with easy returns.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tf-box-icon">
                                        <div class="icon">
                                            <i class="icon-lifebuoy"></i>
                                        </div>
                                        <div class="content">
                                            <h5 class="title">24/7 Support</h5>
                                            <p>24/7 support, always here just for you</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tf-box-icon">
                                        <div class="icon">
                                            <i class="icon-sealpercent"></i>
                                        </div>
                                        <div class="content">
                                            <h5 class="title">Member Discounts</h5>
                                            <p>Special prices for our loyal customers.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sw-pagination-iconbox sw-dots type-circle d-flex justify-content-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- /.benefit -->

        <!-- .testimonials -->
        <section class="flat-spacing-4 section-testimonials fullright">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="col-12">
                            <div class="heading-section style-2 align-items-end">
                                <div class="left">
                                    <h3 class="wow fadeInUp">Customer Say!</h3>
                                    <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0s">Our customers adore our products, and we constantly aim to delight them.</p>
                                </div>
                                <div class="right md-none">
                                    <div class="wrap-button ">
                                        <div class="sw-button swiper-button-prev nav-prev-testimonial"></div>
                                        <div class="sw-button swiper-button-next nav-next-testimonial"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-full slider-layout-right">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper tf-sw-testimonial style-2" data-preview="2.44" data-wow-delay="0.1s"
                            data-tablet="1" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15">
                            <div class="swiper-wrapper">
                               
                                    <?php $testimonails=$admin->get_testimonials_limit(5);
                                    foreach($testimonails as $r=>$v){?>
                                <div class="swiper-slide">
                                    <div class="testimonial-item hover-img">
                                        <div class="content">
                                            <div class="content-top">
                                                <div class="list-star-default">
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                </div>
                                                <p class="text-secondary text-body-1">"Great experience shopping at
                                                    Oriya! The
                                                    office equipment I purchased is high-quality and the delivery was
                                                    super fast.
                                                    Will definitely return for future needs!"</p>
                                                <div class="box-author align-items-center d-flex gap-6">
                                                    <div class="text-title author"><a href="#" class="link">Sarah</a>
                                                    </div>
                                                    <svg class="icon" width="20" height="21" viewBox="0 0 20 21"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_15758_14563)">
                                                            <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549"
                                                                stroke="#3DAB25" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z"
                                                                stroke="#3DAB25" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath >
                                                                <rect width="20" height="20" fill="white"
                                                                    transform="translate(0 0.684082)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="box-product">
                                                <div class="product-img avt-62 round">
                                                    <?php 
                                                    $proone=$product->getone($testimonails[$r]['pid']);
                                                    if(!file_exists($base_url.'assets/images/'.$proone[0]['picture'])){?>
                                                        <img src="<?php echo $base_url.'assets/images/'.$proone[0]['picture'];?>" alt="stylish arc- customer testimonials - <?php echo $base_url.'assets/images/'.$proone[0]['product_name'];?>">
                                                        <?php } else{?>
                                                    <img src="<?php echo $base_url.'assets/images/noimage_found.jpg';?>"/>
                                                    <?php }?>
                                                </div>
                                                <div class="box-price">
                                                    <p class="text-title  text-line-clamp-1"> <a href="#"
                                                            class="link"><?php echo $proone[0]['product_name'];?></a></p>
                                                    <div class="text-button price"><i class="fa fa-inr"></i> <?php echo $proone[0]['usd'];?></div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    </div>
                                <?php }?>

                                  
                                
                                
                               
                            </div>
                            <div
                                class="sw-pagination-testimonial sw-dots d-block d-md-none type-circle d-flex justify-content-center">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.testimonials -->

        <!--<section class="flat-spacing-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-section text-center">
                            <h3 class="wow fadeInUp">News Insight</h3>
                            <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0s">Browse our Top Trending: the hottest picks loved
                                by all. </p>
                        </div>
                        <div class="swiper tf-sw-categories" data-preview="3" data-tablet="2" data-mobile="1"
                            data-space-lg="30" data-space-md="20" data-space="15" data-pagination="1"
                            data-pagination-md="2" data-pagination-lg="3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="blog-article-item hover-img wow fadeInUp" data-wow-delay="0s">
                                        <div class="article-thumb">
                                            <a href="blog-details.html">
                                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>section/news-insight-1.jpg"
                                                    src="<?php echo $base_url.'assets/images/';?>section/news-insight-1.jpg" alt="img-blog">
                                            </a>
                                            <div class="article-label">
                                                <a href="#" class="text-button-small">Guides</a>
                                            </div>
                                        </div>
                                        <div class="article-content">
                                            <ul class="meta">
                                                <li class="text-button-small"><a href="#" class="link">November 12, 2025</a></li>
                                                <li class="text-button-small">by<a href="#" class="link">Themesflat</a>
                                                </li>
                                            </ul>
                                            <h5 class="article-title">
                                                <a href="blog-details.html" class="line-clamp-2 link">How to Choose the
                                                    Perfect Office Furniture for Productivity.</a>
                                            </h5>
                                            <p class="article-description text_secondary text-body-default">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed
                                                vulputate
                                                massa.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="blog-article-item hover-img wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="article-thumb">
                                            <a href="blog-details.html">
                                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>section/news-insight-2.jpg"
                                                    src="<?php echo $base_url.'assets/images/';?>section/news-insight-2.jpg" alt="img-blog">
                                            </a>
                                            <div class="article-label">
                                                <a href="#" class="text-button-small">Tech</a>
                                            </div>
                                        </div>
                                        <div class="article-content">
                                            <ul class="meta">
                                                <li class="text-button-small"><a href="#" class="link">November 08, 2025</a></li>
                                                <li class="text-button-small">by<a href="#" class="link">Themesflat</a>
                                                </li>
                                            </ul>
                                            <h5 class="article-title">
                                                <a href="blog-details.html" class="line-clamp-2 link">Maximizing Small
                                                    Office Spaces with Smart Furniture Choices</a>
                                            </h5>
                                            <p class="article-description text_secondary text-body-default">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed
                                                vulputate
                                                massa.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="blog-article-item hover-img wow fadeInUp" data-wow-delay="0.2s">
                                        <div class="article-thumb">
                                            <a href="blog-details.html">
                                                <img class="lazyload" data-src="<?php echo $base_url.'assets/images/';?>section/news-insight-3.jpg"
                                                    src="<?php echo $base_url.'assets/images/';?>section/news-insight-3.jpg" alt="img-blog">
                                            </a>
                                            <div class="article-label">
                                                <a href="#" class="text-button-small">Workspace </a>
                                            </div>
                                        </div>
                                        <div class="article-content">
                                            <ul class="meta">
                                                <li class="text-button-small"><a href="#" class="link">November 02, 2025</a></li>
                                                <li class="text-button-small">by<a href="#" class="link">Themesflat</a>
                                                </li>
                                            </ul>
                                            <h5 class="article-title">
                                                <a href="blog-details.html" class="line-clamp-2 link">The Benefits of
                                                    Sustainable Office Furniture for Your Business</a>
                                            </h5>
                                            <p class="article-description text_secondary text-body-default">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed
                                                vulputate
                                                massa.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sw-pagination-categories sw-dots type-circle justify-content-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        
        <!-- news-insight -->

        <section class="flat-spacing-2 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="heading-section text-center">
                            <h3 class="wow fadeInUp">Shop Instagram</h3>
                            <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Elevate your wardrobe with fresh finds today!
                            </p>
                        </div>
                        <div class="swiper tf-sw-shop-gallery" data-preview="5" data-tablet="3" data-mobile="2"
                            data-space-lg="10" data-space-md="10" data-space="8" data-pagination="2"
                            data-pagination-md="3" data-pagination-lg="1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay="0s">
                                        <div class="img-style">
                                            <img class="lazyload img-hover" data-src="<?php echo $base_url.'assets/images/';?>gallery/gallery-1.jpg"
                                                src="<?php echo $base_url.'assets/images/';?>gallery/gallery-1.jpg" alt="image-gallery">
                                        </div>
                                        <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                                class="icon icon-eye"></span> <span class="tooltip">View
                                                Product</span></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="img-style">
                                            <img class="lazyload img-hover" data-src="<?php echo $base_url.'assets/images/';?>gallery/gallery-2.jpg"
                                                src="<?php echo $base_url.'assets/images/';?>gallery/gallery-2.jpg" alt="image-gallery">
                                        </div>
                                        <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                                class="icon icon-eye"></span> <span class="tooltip">View
                                                Product</span></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay="0.2s">
                                        <div class="img-style">
                                            <img class="lazyload img-hover" data-src="<?php echo $base_url.'assets/images/';?>gallery/gallery-3.jpg"
                                                src="<?php echo $base_url.'assets/images/';?>gallery/gallery-3.jpg" alt="image-gallery">
                                        </div>
                                        <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                                class="icon icon-eye"></span> <span class="tooltip">View
                                                Product</span></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay="0.3s">
                                        <div class="img-style">
                                            <img class="lazyload img-hover" data-src="<?php echo $base_url.'assets/images/';?>gallery/gallery-4.jpg"
                                                src="<?php echo $base_url.'assets/images/';?>gallery/gallery-4.jpg" alt="image-gallery">
                                        </div>
                                        <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                                class="icon icon-eye"></span> <span class="tooltip">View
                                                Product</span></a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="gallery-item hover-overlay hover-img wow fadeInUp" data-wow-delay="0.4s">
                                        <div class="img-style">
                                            <img class="lazyload img-hover" data-src="<?php echo $base_url.'assets/images/';?>gallery/gallery-5.jpg"
                                                src="<?php echo $base_url.'assets/images/';?>gallery/gallery-5.jpg" alt="image-gallery">
                                        </div>
                                        <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                                class="icon icon-eye"></span> <span class="tooltip">View
                                                Product</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="sw-pagination-gallery sw-dots type-circle justify-content-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.instagram -->
