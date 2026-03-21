<?php get_header(); ?>

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative mb-5">
			<?php
				// Query the "website contacts" post
				$args = array(
					'post_type' => 'slideshows',
				);
				$slideshow_query = new WP_Query($args);

				// var_dump($slideshow_query);

				if ($slideshow_query->have_posts()) {
					while ($slideshow_query->have_posts()) {
						$slideshow_query->the_post();

						// Display custom fields
						$subheading = get_field('subheading');
						$main_heading = get_field('main_heading');
						$intro_text = get_field('intro_text');
						$link = get_field('link');
						$link_text = get_field('link_text');
						$link2 = get_field('link2');
						$link2_text = get_field('link2_text');
						$slide_image = get_field('slide_image');

						// var_dump($slide_image);
			?>
            <div class="owl-carousel-item position-relative">
                <div class="carousel-img-wrapper">
					<img src="<?php echo esc_url($slide_image['url']); ?>" alt="">
				</div>
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
								<?php if ($subheading) { ?>
                                	<h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php echo esc_html($subheading); ?></h5>
								<?php } ?>
								<?php if ($main_heading) { ?>
									<h1 class="display-3 text-white animated slideInDown mb-4"><?php echo esc_html($main_heading); ?></h1>
								<?php } ?>
								<?php if ($intro_text) { ?>
                                	<p class="fs-5 fw-medium text-white mb-4 pb-2"><?php echo esc_html($intro_text); ?></p>
								<?php } ?>
								<?php if ($link && $link_text) { ?>
									<a href="<?php echo esc_url($link); ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php echo esc_html($link_text); ?></a>
                                <?php } ?>
								<?php if ($link2 && $link2_text) { ?>
									<a href="<?php echo esc_url($link2); ?>" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight"><?php echo esc_html($link2_text); ?></a>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php
				}
					wp_reset_postdata();
				} else {
					echo '<p>No content found.</p>';
				}
			?>
        </div>
    </div>
    <!-- Carousel End -->

	<?php
			// Query the "page section" post
			$args = array(
				'post_type' => 'page-section',
				'name'      => 'home-about', // The slug of the post
			);
			$page_section_query = new WP_Query($args);

			// var_dump($page_section_query);

			if ($page_section_query->have_posts()) {
				while ($page_section_query->have_posts()) {
					$page_section_query->the_post();

					// Display custom fields
					$main_title = get_field('main_title');
					$intro_text = get_field('intro_text');
					$link = get_field('link');
					$link_text = get_field('link_text');
					$image_1 = get_field('image_1');
					$image_2 = get_field('image_2');
					$image_3 = get_field('image_3');
	?>
    <!-- About Start -->
    <div class="container-fluid overflow-hidden px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
						<?php if ($image_3) { ?>
							<img class="position-absolute img-fluid w-100 h-100" src="<?php echo esc_html($image_1['url']); ?>" alt="" class="img-fluid">
						<?php } ?>
                    </div>
                </div>
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3">About Us</h6>
                    <h1 class="mb-5"><?php echo esc_html($main_title); ?></h1>
					<?php if ($intro_text) { ?>
						<p class="mt-4 mb-5"><?php echo esc_html($intro_text); ?></p>
					<?php } ?>
                    <div class="row g-4 mb-5">
						<?php
							// Query the "Features" post
							$args = array(
								'post_type' => 'feature','posts_per_page' => 2,
							);
							$feature_query = new WP_Query($args);

							// var_dump($feature_query);

							if ($feature_query->have_posts()) {
								while ($feature_query->have_posts()) {
									$feature_query->the_post();

									// Display custom fields
									$sub_title = get_field('sub_title');
									$header = get_field('header');
									$icon = get_field('icon');
									$link = get_field('link');
									$link_text = get_field('link_text');
									$description = get_field('description');
						?>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <i class="<?php echo esc_html($icon); ?> fa-3x text-primary mb-3"></i>
                            <h5><?php echo esc_html($header); ?></h5>
                            <p class="m-0"><?php echo esc_html($description); ?></p>
                        </div>
						<?php
							}
								wp_reset_postdata();
							} else {
								echo '<p>No content found.</p>';
							}
						?>
                    </div>
                    <a href="" class="btn btn-primary py-3 px-5">Explore More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
	<?php
			}
				wp_reset_postdata();
			} else {
				echo '<p>No content found.</p>';
			}
	?>

    <!-- Service Start -->
    <div class="container-xxl">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Our Services</h6>
                <h1 class="mb-5">Explore Our Services</h1>
            </div>
            <div class="row g-4">
				<?php
						// Query the "service" post
						$args = array(
							'post_type' => 'service',
						);
						$service_query = new WP_Query($args);

						// var_dump($service_query);

						if ($service_query->have_posts()) {
							while ($service_query->have_posts()) {
								$service_query->the_post();

								// Display custom fields
								$main_title = get_field('main_title');
								$intro_text = get_field('intro_text');
								$icon = get_field('icon');
								$feature_image = get_field('feature_image');
				?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="<?php echo esc_html($feature_image['url']); ?>" alt="">
                        </div>
                        <h4 class="mb-3">
							<?php echo esc_html($main_title); ?>
						</h4>
                        <p><?php echo esc_html($intro_text); ?></p>
                        <a class="btn-slide mt-2" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
                    </div>
                </div>
				<?php
					}
						wp_reset_postdata();
					} else {
						echo '<p>No content found.</p>';
					}
				?>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid overflow-hidden px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Our Features</h6>
                    <h1 class="mb-5">We Are Trusted Logistics Company Since 1990</h1>
					<?php
						// Query the "Features" post
						$args = array(
							'post_type' => 'feature','posts_per_page' => 3,
						);
						$feature_query = new WP_Query($args);

						// var_dump($feature_query);

						if ($feature_query->have_posts()) {
							while ($feature_query->have_posts()) {
								$feature_query->the_post();

								// Display custom fields
								$sub_title = get_field('sub_title');
								$header = get_field('header');
								$icon = get_field('icon');
								$link = get_field('link');
								$link_text = get_field('link_text');
								$description = get_field('description');
					?>
						<div class="d-flex mb-5 wow fadeInUp" data-wow-delay="0.3s">
							<i class="<?php echo esc_html($icon); ?>"></i>
							<div class="ms-4">
								<h5><?php echo esc_html($header); ?></h5>
								<p class="mb-0"><?php echo esc_html($description); ?></p>
							</div>
						</div>
					<?php
						}
							wp_reset_postdata();
						} else {
							echo '<p>No content found.</p>';
						}
					?>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="<?php echo get_stylesheet_directory_uri() ?>/img/feature.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Quote Start -->
    <div class="container-xxl">
        <div class="container pt-5">
            <div class="row g-5 align-items-center">
				<?php
						// Query the "page section" post
						$args = array(
							'post_type' => 'page-section',
							'name'      => 'book-appointment', // The slug of the post
						);
						$page_section_query = new WP_Query($args);

						// var_dump($page_section_query);

						if ($page_section_query->have_posts()) {
							while ($page_section_query->have_posts()) {
								$page_section_query->the_post();

								// Display custom fields
								$main_title = get_field('main_title');
								$intro_text = get_field('intro_text');
								$contact_number = get_field('contact_number');
								$link = get_field('link');
								$link_text = get_field('link_text');
								$image_1 = get_field('image_1');
								$contact_form = get_field('contact_form');
				?>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Get A Quote</h6>
                    <h1 class="mb-5"><?php echo esc_html($main_title); ?></h1>
                    <p class="mb-5"><?php echo esc_html($intro_text); ?></p>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-headphones fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                        <div class="ps-4">
                            <h6>Call for any query!</h6>
                            <h3 class="text-primary m-0"><?php echo esc_html($contact_number); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="bg-light text-center p-5 wow fadeIn" data-wow-delay="0.5s">
                        <?php echo apply_shortcodes( '[contact-form-7 id="b211f99" title="Book Appointment"]' ); ?>
                    </div>
                </div>
				<?php
					}
						wp_reset_postdata();
					} else {
						echo '<p>No content found.</p>';
					}
				?>
            </div>
        </div>
    </div>
    <!-- Quote End -->


<?php get_footer(); ?>