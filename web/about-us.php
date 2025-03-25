<?php $aboutus=$admin->get_website_config('aboutus');?>
<!-- .page-title -->
        <div class="page-title relative">
            <div class="paralaximg" data-parallax="scroll" data-image-src="<?php echo $base_url.'assets/images/bg-texture.jpg';?>">
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="title">About Us</h3>
                            <ul class="breadcrumb">
                                <li><a href="<?php echo $base_url;?>">Homepage</a></li>
                                <li>Pages</li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.page-title -->

        <!-- .about-us-main -->
        <section class="flat-spacing-2 about-us-main pb-0">
            <div class="container">
                <div class="row justify-center">
                    <div class="col-lg-8">
                        <div class="heading-section text-center spacing-2">
                            <h1 class="wow fadeInUp">We Are <?php echo $company[0]['cname'];?></h1>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                <?php echo $aboutus[0]['value1'];?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="img-wrap">
                            <img class="lazyload effect-paralax " src="images/section/section-about.jpg"
                                data-src="images/section/section-about.jpg" alt="">
                        </div>
                        <div class="main-content">
                            <div class="left">
                                <h3 class="mb_11 wow fadeInUp">Our Mission</h3>
                                <p class="text_secondary text-body-1 wow fadeInUp" data-wow-delay="0.1s"><?php echo $aboutus[0]['value2'];?></p>
                            </div>
                            <div class="right">
                                <h3 class="mb_11 wow fadeInUp">Our Vision</h3>
                                <p class="text_secondary text-body-1 wow fadeInUp" data-wow-delay="0.1s"><?php echo $aboutus[0]['value3'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="img-wrap">
                        <h3>Sustainability</h3>
                    <?php echo $aboutus[0]['value4'];?>
                    </div>
                    </div>
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
        </section><!-- /.about-us-main -->

        <!-- .about-us -->
        <section class="flat-spacing-2 about-us">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img-style ">
                            <img class="lazyload " src="<?php echo $base_url.'assets/images/aboutus.webp';?>" alt="img_box-about">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box-about">
                            <div class="heading-section spacing-3">
                                <h3 class="wow fadeInUp">Concept & Inspiration</h3>
                                <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                <ul>
                                <li>Rooted in Jodhpur’s rich artisanal heritage, our designs celebrate traditional woodworking techniques while incorporating contemporary styles.</li>
                                <li>We take inspiration from nature, culture, and global design trends, ensuring our collections resonate with diverse interior themes.</li>
                                <li>Every design is developed with a focus on balance, ergonomics, and space optimization to enhance modern living.</li>
                                </ul>
                                </p>
                            </div>

                            <div class="heading-section spacing-3">
                                <h3 class="wow fadeInUp">Development Process</h3>
                                <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                <ul>
                                <li>Ideation & Sketching – Our design team conceptualizes new pieces through research, sketches, and digital renderings.</li>
                                <li>Material Selection – We carefully choose high-quality, sustainable wood, metals, and upholstery to ensure durability and aesthetic appeal.</li>
                                <li>Prototype Creation – Skilled artisans craft prototypes, refining details through multiple iterations.</li>
                                <li>Testing & Quality Checks – Each piece undergoes rigorous testing for strength, finish, and usability before production.</li>
                                <li>Final Production – Once perfected, the designs are crafted with precision, using a mix of traditional and modern techniques.</li>
                                </ul>
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- .about-us -->

        <!-- .testimonials -->
        
        