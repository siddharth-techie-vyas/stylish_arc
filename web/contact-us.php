 <!-- main-content -->
        <div class="main-content">

            <!-- map -->
            <!-- <div class="wrap-map">
                
            </div> -->
            
            <div class="page-title relative">
            <div class="paralaximg" data-parallax="scroll" data-image-src="<?php echo $base_url.'assets/images/bg-texture.jpg';?>">
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="title">Contact Us</h3>
                            <ul class="breadcrumb">
                                <li><a href="<?php echo $base_url;?>">Homepage</a></li>
                                <li>Pages</li>
                                <li>Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.page-title -->

        
            <section class="flat-spacing">
                <div class="container">
                    <div class="contact-us-content">
                        <div class="row">
                            <div class="col-lg-4 mb-lg-30">
                                <h4 class="mb_30 wow fadeInUp"><?php echo $company[0]['cname'];?></h4>
                                <div class="mb_28">
                                    <h6 class="mb_8">Phone:</h6>
                                    <p class="text-body-default"><?php echo $company[0]['phone'];?></p>
                                </div>
                                <div class="mb_28">
                                    <h6 class="mb_8">Email:</h6>
                                    <p class="text-body-default"><?php echo $company[0]['email'];?></p>
                                </div>
                                <div class="mb_28">
                                    <h6 class="mb_8">Address:</h6>
                                    <p class="text-body-default"><?php echo $company[0]['address'];?></p>
                                </div>
                                <div>
                                    <h6 class="mb_8">Open Time:</h6>
                                    <p class="text-body-default mb_4 open-time">
                                        <span>Mon - Sat:</span>
                                        7:30am - 8:00pm PST

                                    </p>
                                    <p class="text-body-default open-time">
                                        <span>Sunday:</span>
                                        9:00am - 5:00pm PST
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-7 offset-lg-1">
                                <h4 class="mb_7 wow fadeInUp">Get In Touch</h4>
                                <p class="text_secondary mb_24 wow fadeInUp" data-wow-delay="0.1s">Use the form below to get in touch with the sales team
                                </p>
                                <form id="contactform" action="./contact/contact-process.php" method="post"
                                    class="form-leave-comment">
                                    <div class="wrap">
                                        <div class="cols">
                                            <fieldset class="">
                                                <input class="" type="text" placeholder="Your Name*" name="name"
                                                    id="name" tabindex="2" value="" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="">
                                                <input class="" type="email" placeholder="Your Email*" name="email"
                                                    id="email" tabindex="2" value="" aria-required="true" required="">
                                            </fieldset>
                                        </div>
                                        <div class="cols">
                                            <fieldset class="">
                                                <input class="" type="number" placeholder="Phone*" name="phone"
                                                    id="phone" tabindex="2" value="" aria-required="true" required="">
                                            </fieldset>
                                            <fieldset class="">
                                                <input class="" type="number" placeholder="Order Numbers*"
                                                    name="order-numbers" id="order-numbers" tabindex="2" value=""
                                                    aria-required="true" required="">
                                            </fieldset>
                                        </div>
                                        <fieldset class="">
                                            <textarea name="message" id="message" rows="4" placeholder="Your Message*"
                                                tabindex="2" aria-required="true" required=""></textarea>
                                        </fieldset>
                                    </div>

                                    <div class="button-submit send-wrap">
                                        <button class="tf-btn btn-onsurface" type="submit">
                                            Send Message <i class="icon-arrow-up-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- main-content -->