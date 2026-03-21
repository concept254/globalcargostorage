<section class="fetaure-page pb-5 ">
		<div class="container"><div class="service-title pb-5"><h5 class="text-capitalize gold-text"> Services We Offer</h5></div>
			<div class="row services">
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
								$thumbnail = get_field('thumbnail');
				?>
					<div class="col-lg-3 col-md-6">
						<div class="about-block-item mb-5 mb-lg-0"><div style="background:url(<?php echo esc_html($thumbnail['url']); ?>); background-size:cover; min-height:150px;"><img src="" alt="" class="img-fluid"></div>
							<h4 class="mt-3 service-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="service-title"><?php echo esc_html($main_title); ?></a></h4>
							<p><?php echo esc_html($intro_text); ?></p>
							<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a></p>
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
	</section>