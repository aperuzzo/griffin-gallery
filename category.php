<?php get_header(); ?>
  
  <div class="row">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
    <div class="col-sm-4 thin-border">
      <h1><?php the_title(); ?></h1> 
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    </div>    
  <?php endwhile; ?>
  </div>
          
  <!-- adding comments --> 
  <div class="row"> 
      <?php
      $wp_query->is_single = true;
      comments_template();
      $wp_query->is_single = false;
      ?>
  </div><!-- end row -->
        
    
  <?php else : ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
  
<!-- adding an aside to display an explanation of category content or bio -->
  <div class="row">

    <?php
 
    $args = array( 
      'post_type' => 'artist',
      'category_name' => get_query_var('category_name') 
      );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
      
      echo '<p>';
      echo the_content();
      echo '</p>';
    endwhile;
    ?>
    <?php wp_reset_postdata(); ?>
  </div><!-- end row --> 


<?php get_footer(); ?>