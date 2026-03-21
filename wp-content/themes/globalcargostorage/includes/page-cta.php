<?php
    // Query the "CTA Section" post
    $args = array(
        'post_type' => 'CTA-section',
        'name'      => 'service-cta', // The slug of the post
    );
    $CTA_section_query = new WP_Query($args);

    // var_dump($CTA_section_query);

    if ($CTA_section_query->have_posts()) {
        while ($CTA_section_query->have_posts()) {
            $CTA_section_query->the_post();

            // Display custom fields
            $main_title = get_field('main_title');
            $sub_title = get_field('sub_title');
            $intro_text = get_field('intro_text');
            $link_text = get_field('link_text');
            $link = get_field('link');
            $background_image = get_field('background_image');
?>
    <section class="section cta-page" style="background: url(<?php echo esc_html($background_image['url']); ?>) no-repeat; background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="cta-content">
                        <div class="divider mb-4"></div>
                        <?php if ($main_title) { ?>
                            <h2 class="mb-5 text-lg text-white"><?php echo esc_html($main_title); ?></h2>
                            <?php } ?>
                        <?php if ($link) { ?>
                            <a href="<?php echo esc_html($link); ?>" class="btn btn-main-2 btn-round-full"><?php echo esc_html($link_text); ?><i class="icofont-simple-right  ml-2"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    }
        wp_reset_postdata();
    } else {
        echo '<p>No content found.</p>';
    }
?>