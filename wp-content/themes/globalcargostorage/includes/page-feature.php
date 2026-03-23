   
   	<?php
			// Query the "page section" post
			$args = array(
				'post_type' => 'page-section',
				'name'      => 'about-feature', // The slug of the post
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
   
   <!-- Feature Start -->
    <div class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3"><?php echo esc_html($main_title); ?></h6>
                    <h1 class="mb-5"><?php echo esc_html($sub_title); ?></h1>
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
                        <img class="position-absolute img-fluid w-100 h-100" src="<?php echo esc_html($image_1['url']); ?>" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->
    <?php
        }
            wp_reset_postdata();
        } else {
            echo '<p>No content found.</p>';
        }
	?>