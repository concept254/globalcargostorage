    <div class="project-meganenu filter">
        <!-- Project filters -->
        <div class="level1-btns">
          <div class="btn-group btn-group-justified" role="group" aria-label=""> 
            <div class="btn-group" role="group"> 
              <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                  View by Application
                <span class="caret">
                </span> 
              </a> 
              <ul class="dropdown-menu"> 
                  <?php 
                    wp_reset_query();
                    
                        $current_page = get_post_type_archive_link( 'project' );
                        
                      $sql = " SELECT DISTINCT meta_value FROM wp_postmeta WHERE meta_key = 'wpcf-application' ";
                       $applications = $wpdb->get_results($sql);

                       foreach ($applications as $menu_item) {
                        ?>
                          <li>
                            <a href="<?php echo upsert_query_var($current_page, 'application', $menu_item->meta_value); ?>"> <?php echo $menu_item->meta_value; ?></a>
                          </li>
                  <?php
                       }
                  ?>

                  <?php  if(isset($_GET['application'])) { ?>
                    <li> <a href="/beka/?page_id=24"> All Projects </a> </li>
                  <?php } ?>
              </ul>
            </div>
            <div class="btn-group" role="group"> 
              <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                  View by product
                <span class="caret">
                </span> 
              </a> 
              <ul class="dropdown-menu"> 
                  <?php
                    $products_linked = $wpdb->get_col("SELECT DISTINCT p2p_from FROM $wpdb->p2p" );

                    $postIds = array();
                    foreach ($products_linked as $product_linked) {
                      $postIds[] = $product_linked;
                    }

                    $args = array(
                      'post_type' => 'product',
                      'post__in' => $postIds
                      );

                    $loop = new WP_Query( $args );

                    if ( $loop->have_posts() ) {
                      while ( $loop->have_posts() ) : $loop->the_post();
                  ?>

                    <li><a href="<?php echo upsert_query_var($current_page, 'productID', $post->ID); ?>" > <?php the_title(); ?></a></li>

                  <?php  endwhile; } ?>
                <?php  if(isset($_GET['productID'])) { ?>
                  <li> <a href="/beka/?page_id=24"> All Projects </a> </li>
                <?php } ?>
              </ul> 
            </div> 
          </div>
        </div>
    </div>