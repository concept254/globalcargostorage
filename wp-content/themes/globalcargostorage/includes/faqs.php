<div class="accordion" id="faq">
    <?php
            // Query the "faq section" post
            $args = array(
                'post_type' => 'faq'
            );
            $page_section_query = new WP_Query($args);

            $postcount = 0;

            // var_dump($page_section_query);

            if ($page_section_query->have_posts()) {
                while ($page_section_query->have_posts()) {
                    $page_section_query->the_post();

                    // Display custom fields
                    $faq_question = get_field('question');
                    $faq_answer = get_field('answer');
    ?>				
        <div class="card">
            <div class="card-header" id="faqhead<?php echo $postcount; ?>">
                <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq<?php echo $postcount; ?>"
                aria-expanded="true" aria-controls="faq<?php echo $postcount; ?>"><?php echo esc_html($faq_question); ?></a>
            </div>

            <div id="faq<?php echo $postcount; ?>" class="collapse" aria-labelledby="faqhead<?php echo $postcount; ?>" data-parent="#faq">
                <div class="card-body">
                    <?php echo esc_html($faq_answer); ?>
                </div>
            </div>
        </div>
    <?php
        $postcount++; }
            wp_reset_postdata();
        } else {
            echo '<p>No content found.</p>';
        }
    ?>
</div> 