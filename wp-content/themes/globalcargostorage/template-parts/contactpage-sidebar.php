    			<div class="col-md-12">
    			<h3 class="branch-title"> Branches </h3>
    			<div class="branches">
    			<ul>
    			<?php 
                    $query = new wp_query(
                                array(
                                    'post_type' => 'store',
                                    'posts_per_page' => -1,
                                    'orderby'   => 'post_date', 
                                    'order'     => 'DESC'
                                )
                            );

                    $postcount = 0;

                    if ($query->have_posts() ) {
                        while($query->have_posts()) {
                            $query->the_post();
                            $custom = get_post_custom();
                            // var_dump($custom);

                            if(!$custom['wpcf-distributor'][0]){
                ?>
                <li>
				      <a  href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>" class="store-link branch-link">
				        <?php the_title();?>
				      </a>
				</li>
				<?php 
                        }

                    $postcount++; }
                  } wp_reset_query();

                ?>
                </ul>

				</div>
                
                <h3> Distributors </h3>

                <div class="distributors branches">
                    <ul>
                        <?php

                            $query = new wp_query(
                                array(
                                    'post_type' => 'store',
                                    'posts_per_page' => -1,
                                    'orderby'   => 'post_date', 
                                    'order'     => 'DESC'
                                )
                            );

                            if ($query->have_posts() ) {
                                while($query->have_posts()) {
                                    $query->the_post();
                                    $custom = get_post_custom();
                                    // var_dump($custom);

                            if($custom['wpcf-distributor'][0]){
                        ?>

                        <li>
                              <a  href="<?php the_permalink(); ?>" rel="<?php the_ID(); ?>" class="store-link branch-link">
                                <?php the_title();?>
                              </a>
                        </li>
                        <?php 
                                    }

                                }
                          } wp_reset_query();

                        ?>
                    </ul>
                </div>
                </div>