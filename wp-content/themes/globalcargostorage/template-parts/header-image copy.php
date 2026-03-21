	<?php if ( get_post_meta( get_the_ID(), 'wpcf-header-image', true ) ) : ?>


		<?php if (is_page('news')) { ?>
			 <?php get_template_part( 'template-parts/news', 'feature' ); ?>
		<?php } else {?>

		<!-- default header-type -->
		<div class="header-image">

	        <img class="thumb" 
	        		src="<?php echo esc_url( get_post_meta( get_the_ID(), 'wpcf-header-image', true ) ); ?>" 
	        		alt="<?php the_title_attribute(); ?>" 
	        />
	        
	        <div class="header-image-title"><h1><?php the_title(); ?></h1></div>

	        <div class="tag-line"><?php echo $custom['wpcf-tag-line'][0]; ?></div>

	    </div>

		<?php } ?>
		

	<?php endif; ?>