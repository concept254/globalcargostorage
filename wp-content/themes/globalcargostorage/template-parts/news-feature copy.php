<div class="header-image">
			<!-- news header mod -->
			<div class="container">
				<div class="col-md-8">
						<h1 class="news-page-title"> <i class="fa fa-newspaper-o"></i><?php the_title(); ?> </h1>
					<!-- news slider -->
					<div class="news-slider">

						<div id="newsCarousel" class="carousel slide">

						    <div class="carousel-inner">
						    <?php
 								query_posts("posts_per_page=5&cat=1"); /*1, 2*/
 								$postcount = 0;
									if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						      <div class="item <?php if($postcount == 0) { echo "active"; } ?>">
						        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						        <div class="carousel-caption">
						          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						          <div class="intro-text"><?php the_excerpt(); ?></div>
						        </div>
						      </div>

						    <?php 
						    	$postcount++;  
						    	endwhile; 
						    ?> 

						    <?php rewind_posts(); ?>

						    </div>

							<?php
 								query_posts("posts_per_page=5&cat=1"); /*1, 2*/
 								$postcount = 0;
							?>
				            <!-- Indicators -->
					        <ol class="carousel-indicators">
						        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						            <li 
						            	data-target="#newsCarousel" 
						            	data-slide-to="<?php echo $count; ?>" 
						            	class="<?php if($postcount == 0) { echo "active"; } ?>">
						            </li>
						        <?php 
							    	$postcount++;  
							    	endwhile; 
							    ?>  
					        </ol>
        
						    <a class="left carousel-control" href="#newsCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						    <a class="right carousel-control" href="#newsCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
						</div>
					        
					</div>
				</div>

				<div class="col-md-4">
					<!-- Popular/recent -->
					<h3 class="recent-news-title"> Popular </h3>
					<div class="recent-news">
			          <?php
			            $popularpost = new WP_Query( array( 
			            						'post_type' => 'post',
			            						'posts_per_page' => 3,
			            						// 'meta_key' => 'wpb_post_views_count',
			            						// 'orderby' => 'meta_value_num',
			            						// 'order' => 'DESC' 
			            						));
											while ( $popularpost->have_posts() ) : $popularpost->the_post();
			              ?>

			                <div class="media">
			                  <a class="recent-news-thumb pull-left" href="<?php echo get_permalink(); ?>">
			                    <!--
			                      <img class="media-object" data-src="holder.js/64x64"> 
			                    -->
			                    <?php the_post_thumbnail('thumbnail'); ?>
			                  </a>

			                  <div class="media-body">
			                    <h4 class="media-heading"><a href="<?php echo get_permalink(); ?>" class="news-title"><?php the_title(); ?></a></h4>
			                        <div class="date-posted">
				                      <?php the_time('F j, Y'); ?>  | <a href="<?php echo get_permalink(); ?>#disqus_thread" class="comment_count"> Comments </a>
				                    </div>
								<div class="media-content">
			                      <?php the_excerpt(); ?>
			                    </div>

								<!-- 			                    
								<div class="social-links">
			                      <ul>
                          			  <li><div class="fb-share-button" data-href="<?php echo get_permalink(); ?>" data-layout="button_count"></div></li>
			                          <li><a href="#" class="twitter"></a></li>
			                          <li><a href="#" class="googleplus"></a></li>
			                      </ul>
			                    </div>
			                    -->

			                  </div>
			                </div>

			             <?php 
			                 endwhile;
			          	?>
					</div>
				</div>
			</div>
</div>
</div>