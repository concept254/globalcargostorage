<div class="container-xxl">
    <div class="container pb-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-secondary text-uppercase">Our Services</h6>
            <h1 class="mb-5">Explore Our Services</h1>
        </div>
        <div class="row g-4">
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
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item p-4">
                    <div class="overflow-hidden mb-4">
                        <img class="img-fluid" src="<?php echo esc_html($thumbnail['url']); ?>" alt="">
                    </div>
                    <h4 class="mb-3"><?php echo esc_html($main_title); ?></h4>
                    <p><?php echo esc_html($intro_text); ?></p>
                    <a class="btn-slide mt-2" href="<?php the_permalink(); ?>"><i class="fa fa-arrow-right"></i><span>Read More</span></a>
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