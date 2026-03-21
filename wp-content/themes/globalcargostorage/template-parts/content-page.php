<?php
	/**
	 * The template part for displaying single p
	 *
	 */
	$sub_title = get_field('sub_title');
	$intro_text = get_field('intro_text');
	$feature_services = get_field('feature_services');
	$partners = get_field('partners');
	$testimonials = get_field('testimonials');
	$page_cta = get_field('page_cta');
	$services = get_field('services');
	$news_articles = get_field('news_articles');
	$contact_details = get_field('contact_details');
	$faqs = get_field('faqs');
	$howitworks = get_field('how_it_works');
	$no_content = get_field('no_content');
?>

<?php if ($intro_text) { ?>
	<section class="section about-page">
		<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<?php if ($sub_title) { ?>
							<h2 class="title-color"><?php echo esc_html($sub_title); ?></h2>
						<?php } ?>	
					</div>
					<div class="col-lg-8">
						<?php if ($intro_text) { ?>
							<p><?php echo esc_html($intro_text); ?></p>
							<img src="images/about/sign.png" alt="" class="img-fluid">
						<?php } ?>
					</div>
				</div>
		</div>
	</section>
<?php } ?>

<?php if ($howitworks) {
	require get_template_directory() . '/includes/how-it-works.php';
} ?>

<?php if ($feature_services) { 
	require get_template_directory() . '/includes/featured-services.php';
} ?>

<?php if ($services) { 
	require get_template_directory() . '/includes/services-list.php';
} ?>

<?php if ($contact_details) { 
	require get_template_directory() . '/includes/contact-details.php';
	require get_template_directory() . '/includes/contact-form.php';
}else{ ?>
	<section class="section about-page py-5">
		<div class="container">
			<?php if($news_articles){ 
				require get_template_directory() . '/includes/news-articles.php';
			}else{ ?>
			<div class="row">
				<div class="col-lg-12">
						<?php
							if (has_post_thumbnail()) {
								$thumbnail_id = get_post_thumbnail_id();
								$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full', true);
								$thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
						?>
							<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>"  class="img-fluid" width="100%">
						<?php

							}
						?>
				</div>
			</div>
				<?php if (!$no_content) { ?>
					<div class="row">
						<div class="col-lg-8">
							<div class="department-content mt-5">
								<h3 class="text-md"><?php the_title(); ?></h3>
								<div class="divider my-4"></div>
									
									<!-- Show content -->
									<?php the_content(); ?>
										<div id="main">
											<!-- condition forn accordion -->
											<?php if ($faqs) { 
												require get_template_directory() . '/includes/faqs.php';
											} ?>
										</div>
								</div>
							</div>
						<div class="col-lg-4">
							<div class="sidebar-widget schedule-widget mt-5">
								<h5 class="mb-4">Time Schedule</h5>
								<ul class="list-unstyled">
								<li class="d-flex justify-content-between align-items-center">
									<a href="#">Monday - Friday</a>
									<span>9:00 - 17:00</span>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<a href="#">Saturday</a>
									<span>9:00 - 16:00</span>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<a href="#">Sunday</a>
									<span>Closed</span>
								</li>
								</ul>

								<div class="sidebar-contatct-info mt-4">
									<p class="mb-0">Need Urgent Help?</p>
									<h3>+27 82 958 8473</h3>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<?php if ($page_cta) { 
	require get_template_directory() . '/includes/page-cta.php';
} ?>
<?php if ($testimonials) { 
	require get_template_directory() . '/includes/testimonials.php';
} ?>
<?php if ($partners) { 
	// require get_template_directory() . '/includes/enroll-form.php';
	require get_template_directory() . '/includes/partners.php';
} ?>
