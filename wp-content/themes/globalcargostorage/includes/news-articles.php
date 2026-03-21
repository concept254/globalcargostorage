<div class="row">
    <div class="col-lg-8">
        <?php 

        $curpage = ( filter_input(INPUT_GET, 'paged') ) ? filter_input(INPUT_GET, 'paged') : 1;

            $query = new wp_query(
                        array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'orderby'   => 'post_date', 
                            'order'     => 'DESC',
                            'paged' => $curpage
                        )
                    );

            $pagecount = $query->max_num_pages;

            // if ($query->have_posts() ) {

                while($query->have_posts()) {
                    $query->the_post();
        ?>
        <div class="col-lg-12 mb-5">
		    <div class="single-blog-item">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <a class="news-archive-thumb pull-left" href="<?php echo get_permalink(); ?>">
                            <?php
                                if (has_post_thumbnail()) {
                                    $thumbnail_id = get_post_thumbnail_id();
                                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full', true);
                                    $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                            ?>
                                <img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>"  class="img-fluid" width="100%">
                            <?php

                                }
                            ?>
                        </a>
                    </div>

                    <div class="blog-item-content">
                        <div class="blog-item-meta mb-3 mt-4">
                            <span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>5 Comments</span>
                            <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-1"></i> <?php the_time('F j, Y'); ?></span>
                        </div> 

                        <h2 class="mt-3 mb-3"><a href="<?php echo get_permalink(); ?>" class=""><?php the_title(); ?></a></h2>
                        
                        <p class="mb-4"><?php the_excerpt(); ?></p>

                        <a href="<?php echo get_permalink(); ?>" class="btn btn-main btn-icon btn-round-full">Read More <i class="icofont-simple-right ml-2  "></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php 

        } wp_reset_query();

        ?>
    </div>
    <div class="col-lg-4">
        <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('single post sidebar') ) : endif; ?>
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
            <div class="sidebar-adsence">

            </div>
        </div>
    </div>
</div>