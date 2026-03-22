
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <?php
                            // Query the "page section" post
                            $args = array(
                                'post_type' => 'page-section',
                                'name'      => 'footer-about', // The slug of the post
                            );
                            $page_section_query = new WP_Query($args);

                            // var_dump($page_section_query);

                            if ($page_section_query->have_posts()) {
                                while ($page_section_query->have_posts()) {
                                    $page_section_query->the_post();

                                    // Display custom fields
                                    $main_title = get_field('main_title');
                                    $intro_text = get_field('intro_text');
                                    $logo = get_field('logo');
                                    $facebook = get_field('facebook');
                                    $twitter = get_field('twitter');
                                    $linkedin = get_field('linkedin');
                                    $address = get_field('address');
                                    $phone = get_field('phone');
                                    $email = get_field('email');
                                    
                    ?>
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo esc_html($address); ?></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?php echo esc_html($phone); ?></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo esc_html($email); ?></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="<?php echo esc_html($twitter); ?>"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo esc_html($facebook); ?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="<?php echo esc_html($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <?php
                        }
                            wp_reset_postdata();
                        } else {
                            echo '<p>No content found.</p>';
                        }
                    ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
					<?php wp_nav_menu( array('menu' => 'footer-column-1',
                                     //'items_wrap' => '%3$s',
                                     'menu_class'=> 'list-unstyled footer-menu',
                                     'container'  => '',
                                     'walker' => new nav_menu_dropdown())); ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>

					<?php wp_nav_menu( array('menu' => 'footer-column-2',
                                     //'items_wrap' => '%3$s',
                                     'menu_class'=> 'list-unstyled footer-menu',
                                     'container'  => '',
                                     'walker' => new nav_menu_dropdown())); ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Subscribe for our Newsletter</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <?php echo do_shortcode('[contact-form-7 id="d312aaa" title="Subscription Form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        Copyright Reserved to  © <?php echo date("Y"); ?> <span class="company">Concept254 Media</span> All rights reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/wow/wow.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/easing/easing.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/main.js"></script>
</body>

</html>