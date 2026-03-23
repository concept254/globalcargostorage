	<?php
		// Display custom fields
		$feature_title = get_field('feature_title');
		$sub_title = get_field('sub_title');
		$intro_text = get_field('intro_text');
		$sub_text = get_field('sub_text');
		$feature_image = get_field('feature_image');
	?>
	<?php if ($feature_image) { ?>
		<!-- Page Header Start -->
		<div class="container-fluid page-header py-5" style="margin-bottom: 6rem;" style="background-image: url('<?php echo esc_html($feature_image['url']); ?>'); background-size: cover; position: relative; background-position: 50% -83.543px;">
			<div class="container py-5">
				<h1 class="display-3 text-white mb-3 animated slideInDown"><?php the_title(); ?></h1>
				<nav aria-label="breadcrumb animated slideInDown">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
						<li class="breadcrumb-item"><a class="text-white" href="#"><?php the_title(); ?></a></li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- Page Header End -->
	<?php } ?>