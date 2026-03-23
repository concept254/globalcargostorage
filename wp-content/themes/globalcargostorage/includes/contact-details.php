<?php
    // Query the "website contacts" post
    $args = array(
        'post_type' => 'contact',
        'name'      => 'website-contacts', // The slug of the post
    );
    $contact_query = new WP_Query($args);

    // var_dump($contact_query);

    if ($contact_query->have_posts()) {
        while ($contact_query->have_posts()) {
            $contact_query->the_post();

            // Display custom fields
            $contact_phone = get_field('telephone_number');
            $contact_email = get_field('email_address');
            $contact_address = get_field('address');
?>
    <section class="section contact-info pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-block mb-4 mb-lg-0">
                        <i class="icofont-live-support"></i>
                        <h6 class="text-secondary text-uppercase">Call Us</h6>
                        <?php
                            if ($contact_email) {
                                echo esc_html($contact_phone);
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-block mb-4 mb-lg-0">
                        <i class="icofont-support-faq"></i>
                        <h6 class="text-secondary text-uppercase">Email Us</h6>
                        <?php
                            if ($contact_email) {
                                echo esc_html($contact_email);
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-block mb-4 mb-lg-0">
                        <i class="icofont-location-pin"></i>
                        <h6 class="text-secondary text-uppercase">Operating Hours</h6>
                        <b>Monday - Friday<b> 9:00 - 17:00
                        <?php
                            // if ($contact_address) {
                            //     echo esc_html($contact_address);
                            // }
                        ?>
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