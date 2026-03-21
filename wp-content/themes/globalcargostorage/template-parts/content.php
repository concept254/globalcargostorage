<div class="media">
  <a class="news-archive-thumb pull-left" href="<?php echo get_permalink(); ?>">
    <!--
      <img class="media-object" data-src="holder.js/64x64"> 
    -->
    <?php the_post_thumbnail('thumbnail'); ?>
  </a>

  <div class="media-body">
    <h4 class="media-heading"><a href="<?php echo get_permalink(); ?>" class="news-title"><?php the_title(); ?></a></h4>
    <div class="post-date">
      <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> by <?php the_author() ?>
    </div>
    <div class="media-content">
      <?php the_excerpt(); ?>
    </div>
    <div class="social-links">
      <ul>
          <li><div class="fb-share-button" data-href="<?php echo get_permalink(); ?>" data-layout="button_count"></div></li>
          <li><a href="#" class="twitter"></a></li>
          <li><a href="#" class="googleplus"></a></li>
      </ul>
    </div>
  </div>
</div>
