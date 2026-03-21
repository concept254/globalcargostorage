<?php
	/**
	 * The template part for displaying single posts
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
?>

<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
					<div class="col-lg-12 mb-5">
						<div class="single-blog-item">
							<?php
								if (has_post_thumbnail()) {
									$thumbnail_id = get_post_thumbnail_id();
									$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full', true);
									$thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
							?>
								<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>"  class="img-fluid"  width="100%">
							<?php

								}
							?>
							<div class="blog-item-content mt-5">
								<div class="blog-item-meta mb-3">
									<!-- <span class="text-color-2 text-capitalize mr-3"><i class="icofont-book-mark mr-2"></i> Equipment</span>
									<span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>5 Comments</span> -->
									<span class="text-black text-capitalize mr-3 small"><i class="icofont-calendar mr-2"></i>Updated on  <?php the_time('F j, Y'); ?></span>
								</div>
								<h2 class="mb-4 text-md"><?php the_title(); ?></h2>
								<div class="test">
									<?php the_content(); ?>
								</div>
								<div class="mt-5 clearfix">
									<!-- <ul class="float-left list-inline tag-option"> 
										<li class="list-inline-item"><a href="#">Advancher</a></li>
										<li class="list-inline-item"><a href="#">Landscape</a></li>
										<li class="list-inline-item"><a href="#">Travel</a></li>
									</ul>
									<ul class="float-right list-inline">
										<li class="list-inline-item"> Share: </li>
										<li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-facebook" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-twitter" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-pinterest" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a href="#" target="_blank"><i class="icofont-linkedin" aria-hidden="true"></i></a></li>
									</ul> -->
								</div>
							</div>
						</div>
					</div>

			</div>
        </div>
        <div class="col-lg-4">
            <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
				<?php //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('single post sidebar') ) : endif; ?>
				<div class="sidebar-widget schedule-widget mb-3">
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
				<a href="/contact-us/" class="btn btn-main w-100">Enroll Now</a>

				<div class="sidebar-adsence single">

				</div>
			</div>
         </div>   
    </div>
 </div>
</section>