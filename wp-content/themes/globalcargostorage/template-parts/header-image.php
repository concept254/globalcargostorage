	<?php
		// Display custom fields
		$feature_title = get_field('feature_title');
		$sub_title = get_field('sub_title');
		$intro_text = get_field('intro_text');
		$sub_text = get_field('sub_text');
		$feature_image = get_field('feature_image');
	?>
	<?php if ($feature_image) { ?>
		<section class="page-title bg-1" style="background-image: url('<?php echo esc_html($feature_image['url']); ?>'); background-size: cover; position: relative; background-position: 50% -83.543px;">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
					<span class="text-white">Home / <?php the_title(); ?></span>
					<h1 class="text-capitalize mb-5 text-lg"><?php the_title(); ?></h1>

					<!-- <ul class="list-inline breadcumb-nav">
						<li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
						<li class="list-inline-item"><span class="text-white">/</span></li>
						<li class="list-inline-item"><a href="#" class="text-white-50">About Us</a></li>
					</ul> -->
					</div>
				</div>
				</div>
			</div>
		</section>
	<?php } ?>