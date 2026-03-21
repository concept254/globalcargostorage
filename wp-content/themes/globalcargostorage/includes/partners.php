<section class="section clients">
		<?php
				// Query the "page section" post
				$args = array(
					'post_type' => 'page-section',
					'name'      => 'partners', // The slug of the post
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
		<div class="row clients-logo">
			<?php
				// Query the "Partners" post
				$args = array(
					'post_type' => 'partner',
				);
				$partner_query = new WP_Query($args);

				// var_dump($partner_query);

				if ($partner_query->have_posts()) {
					while ($partner_query->have_posts()) {
						$partner_query->the_post();

						// Display custom fields
						$company = get_field('company');
						$logo = get_field('logo');
			?>
			<div class="col-lg-2">
				<div class="client-thumb">
					<img src="<?php echo esc_html($logo['url']); ?>" alt="<?php echo esc_html($company); ?>" class="img-fluid">
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