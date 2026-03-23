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
	$page_feature = get_field('page_feature');
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
	<!-- About Start -->
    <div class="container-fluid overflow-hidden px-lg-0">
        <div class="container about px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
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
                <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3"><?php the_title(); ?></h6>
                    <h1 class="mb-2"><?php echo esc_html($sub_title); ?></h1>
                    <?php the_content(); ?>
                    <div class="row g-4 mb-2">
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
<?php } ?>

<?php if ($page_cta) { 
	require get_template_directory() . '/includes/page-cta.php';
} ?>
<?php if ($page_feature) { 
	require get_template_directory() . '/includes/page-feature.php';
} ?>
<?php if ($testimonials) { 
	require get_template_directory() . '/includes/testimonials.php';
} ?>
<?php if ($partners) {
	require get_template_directory() . '/includes/partners.php';
} ?>
