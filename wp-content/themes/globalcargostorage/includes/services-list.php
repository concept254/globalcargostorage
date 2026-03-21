<section class="section service-2">
	<div class="container">
		<div class="row">
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
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="service-block mb-5">
                        <div class="" style="background:url(<?php echo esc_html($thumbnail['url']); ?>); background-size:cover; min-height:200px;"><img src="" alt="" class="img-fluid"></div>
                        <div class="content">
                            <h4 class="mt-4 mb-2 title-color"><?php echo esc_html($main_title); ?></h4>
                            <p class="mb-4"><?php echo esc_html($intro_text); ?></p>
							<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a></p>
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
</section>