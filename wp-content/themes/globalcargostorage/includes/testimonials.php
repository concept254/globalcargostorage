<section class="section testimonial-2 gray-bg">
		<?php
				// Query the "page section" post
				$args = array(
					'post_type' => 'page-section',
					'name'      => 'testimonials', // The slug of the post
				);
				$page_section_query = new WP_Query($args);

				// var_dump($page_section_query);

				if ($page_section_query->have_posts()) {
					while ($page_section_query->have_posts()) {
						$page_section_query->the_post();

						// Display custom fields
						$main_title = get_field('main_title');
						$intro_text = get_field('intro_text');
		?>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="section-title text-center">
							<h2><?php echo esc_html($main_title); ?></h2>
							<div class="divider mx-auto my-4"></div>
							<p><?php echo esc_html($intro_text); ?></p>
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
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
					<?php
								// Query the "Testimonials" post
								$args = array(
									'post_type' => 'testimonial',
								);
								$testimonial_query = new WP_Query($args);

								// var_dump($testimonial_query);

								if ($testimonial_query->have_posts()) {
									while ($testimonial_query->have_posts()) {
										$testimonial_query->the_post();

										// Display custom fields
										$main_title = get_field('main_title');
										$client_name = get_field('client_name');
										$image = get_field('image');
										$message = get_field('message');
					?>
						<div class="testimonial-block style-2  gray-bg">
							<i class="icofont-quote-right"></i>

							<div class="testimonial-thumb">
								<img src="<?php echo esc_html($image['url']); ?>" alt="" class="img-fluid">
							</div>

							<div class="client-info ">
								<h4><?php echo esc_html($main_title); ?>!</h4>
								<span><?php echo esc_html($client_name); ?></span>
								<p>
									<?php echo esc_html($message); ?>
								</p>
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
</section>