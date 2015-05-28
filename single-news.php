<?php get_header(); ?>

  <div class="row">
  	<div class="col-sm-8">
  		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  	     
  	      <h1><?php the_title(); ?> <span class="mini-h1">in 
            <?php 
              $category = get_the_category(); 
              if($category[0]){
              echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
              }
            ?>
          </span></h1> 
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