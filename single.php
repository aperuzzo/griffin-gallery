<?php get_header(); ?>

  <div class="row">
  	<div class="col-sm-8">
  		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	    
  	      <h1><?php the_title(); ?></h1> 
  	      <?php the_content(); ?>

          <hr>
          <?php comments_template(); ?>
  	  
  	    <?php endwhile; else: ?>
  	      <p><?php _e('Sorry, this page does not exist.'); ?></p>
  	    <?php endif; ?>
  	</div>
  	<div class="col-sm-4">
  		<?php get_sidebar(); ?>	
  	</div>
</div><!-- end row -->

<?php get_footer(); ?>