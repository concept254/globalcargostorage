<section class="section service gray-bg pt-5 mt-0" style="margin-bottom:-100px;">
    <div class="container">
        <div class="row">
                <?php
                        // Query the "service" post
                        $args = array(
                            'post_type' => 'how-it-work',
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
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service-item mb-4">
                            <div class="icon d-flex align-items-center">
                                <i class="<?php echo esc_html($icon); ?> service-icon"></i>
                                <h4 class="mt-3 mb-3">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php echo esc_html($main_title); ?>
                                    </a>
                                </h4>
                            </div>
                            <div class="content">
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