

        <!-- .page-title -->
        <div class="page-title relative">
            <div class="paralaximg" data-parallax="scroll" data-image-src="<?php echo $base_url;?>assets/images/page-title-9.jpg">
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="title">Shop</h3>
                            <ul class="breadcrumb">
                                <li><a href="<?php echo $base_url;?>">Homepage</a></li>
                                <li>Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.page-title -->

        <!-- Section product -->
        <section class="flat-spacing">
            <div class="container">
                <div class="tf-shop-control">
                    <!-- <div class="tf-control-filter">
                        <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="filterShop"
                            class="tf-btn-filter"><span class="icon icon-filter"></span><span
                                class="text">Filters</span></a>
                        <div class="d-none d-lg-flex shop-sale-text">
                            <i class="icon icon-checkcircle"></i>
                            <p class="text-caption-1">Shop sale items only</p>
                        </div>
                    </div> 
                    <ul class="tf-control-layout">
                        <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                            <div class="item">
                                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                                    <rect x="7.5" y="3.5" width="12" height="5" rx="2.5" stroke="#181818" />
                                    <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                                    <rect x="7.5" y="11.5" width="12" height="5" rx="2.5" stroke="#181818" />
                                </svg>
                            </div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                            <div class="item">
                                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="6" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="14" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="6" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="14" cy="14" r="2.5" stroke="#181818" />
                                </svg>
                            </div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3" data-value-layout="tf-col-3">
                            <div class="item">
                                <svg class="icon" width="22" height="20" viewBox="0 0 22 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="11" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="19" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="11" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="19" cy="14" r="2.5" stroke="#181818" />
                                </svg>
                            </div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4 active" data-value-layout="tf-col-4">
                            <div class="item">
                                <svg class="icon" width="30" height="20" viewBox="0 0 30 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="11" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="19" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="27" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="11" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="19" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="27" cy="14" r="2.5" stroke="#181818" />
                                </svg>
                            </div>
                        </li>
                    </ul>-->
                    <div class="tf-control-sorting">
                        <p class="d-none d-lg-block text-caption-1">Sort by:</p>
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value">Best Selling</span>
                                <span class="icon icon-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="select-item" data-sort-value="best-selling">
                                    <span class="text-value-item">Best selling</span>
                                </div>
                                <div class="select-item" data-sort-value="a-z">
                                    <span class="text-value-item">Alphabetically, A-Z</span>
                                </div>
                                <div class="select-item" data-sort-value="z-a">
                                    <span class="text-value-item">Alphabetically, Z-A</span>
                                </div>
                                <div class="select-item" data-sort-value="price-low-high">
                                    <span class="text-value-item">Price, low to high</span>
                                </div>
                                <div class="select-item" data-sort-value="price-high-low">
                                    <span class="text-value-item">Price, high to low</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-control-shop">
                    <!-- <div class="meta-filter-shop">
                        <div id="product-count-grid" class="count-text"></div>
                        <div id="product-count-list" class="count-text"></div>
                        <div id="applied-filters"></div>
                        <button id="remove-all" class="remove-all-filters text-btn-uppercase"
                            style="display: none;">REMOVE ALL <i class="icon icon-close"></i></button>
                    </div> -->

                    

                    <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout">
                        <!-- card product 1 -->
                         <?php 
                        $grid=$product->get_product_grid($_GET['id']);
                        if($grid){
                        foreach($grid as $row2=>$v){
                        ?>
                        <div class="card-product style-1 grid" data-availability="Out of stock" data-brand="adidas">
                            <div class="card-product-wrapper">
                                <a href="<?php echo $base_url.'index.php?action=dashboard&page=product-detail&product_id='.$v['id'].'&product-name='.$v['product_name'];?>" class="image-wrap">
                                    <?php if(file_exists($base_url.'assets/images/'.$v['picture'])){?>
                                    <img class="lazyload img-product" data-src="<?php echo $base_url.'assets/images/'.$v['picture']; ?>"
                                        src="<?php echo $base_url.'assets/images/'.$v['picture']; ?>" alt="image-product">
                                    <img class="lazyload img-hover" data-src="<?php echo $base_url.'assets/images/'.$v['picture']; ?>"
                                        src="<?php echo $base_url.'assets/images/'.$v['picture']; ?>" alt="image-product">
                                    <?php }else{?>
                                        <img class="lazyload img-product" data-src="<?php echo $base_url.'assets/images/no-image.png'; ?>"
                                        src="<?php echo $base_url.'assets/images/no-image.png'; ?>" alt="image-product">
                                    <?php }?>         
                                </a>
                                <div class="list-product-btn">
                                    <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                        <span class="icon icon-heart"></span>
                                        <span class="tooltip">Wishlist</span>
                                    </a>
                                    <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare">
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
                                </div>
                            </div>
                            <div class="card-product-info ">
                                <a href="<?php echo $base_url.'index.php?action=dashboard&page=product-detail&product_id='.$v['id'].'&product-name='.$v['product_name'];?>" class="title link"><?php echo $v['product_name'];?></a>
                                <div class="price text-body-default ">
                                    <!-- <span class="text-caption-1 old-price"><?php echo $v['inr'];?></span> -->
                                    <span class="current-price"><i class="fa fa-inr"></i> <?php echo $v['inr'];?></span>
                                </div>
                                <!-- <ul class="list-color-product">
                                    <li class="list-color-item color-swatch active">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue"></span>
                                        <img class="lazyload" data-src="images/shop/product-1.2.jpg"
                                            src="images/shop/product-1.2.jpg" alt="image-product">
                                    </li>
                                    <li class="list-color-item color-swatch">
                                        <span class="d-none text-capitalize color-filter">Light Blue</span>
                                        <span class="swatch-value bg-light-blue-2"></span>
                                        <img class="lazyload" data-src="images/shop/product-1.3.jpg"
                                            src="images/shop/product-1.3.jpg" alt="image-product">
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                        <?php }}else{include('404.php');}?>
                        
                        <!-- pagination -->
                        <ul class="wg-pagination justify-content-center">
                            <li><a href="#" class="pagination-item text-button">1</a></li>
                            <li class="active">
                                <div class="pagination-item text-button">2</div>
                            </li>
                            <li><a href="#" class="pagination-item text-button">3</a></li>
                            <li><a href="#" class="pagination-item text-button"><i class="icon-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section product -->
