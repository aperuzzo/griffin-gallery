<?php get_header(); ?>
<!-- adding an aside to display an explanation of category content or bio -->
  <div class="row">
    <?php
 
    $args = array( 
      'post_type' => 'artist',
      'category_name' => get_query_var('category_name') 
      );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
      
      echo '<h1>';
      echo the_title();
      echo '</h1>';
      echo '<p>';
      echo the_content();
      echo '</p>';
    endwhile;
    ?>
    <?php wp_reset_postdata(); ?>
  </div><!-- end row --> 
  
  <div class="row">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    

    <div class="col-sm-4 thin-border">
      <h2><?php the_title(); ?></h2> 
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
  



<?php get_footer(); ?>