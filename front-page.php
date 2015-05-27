<?php get_header(); ?>

<div class="jumbotron">
<h1>Hello, world!</h1>
This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.

<a class="btn btn-primary btn-large">Learn more »</a>
</div>
<div class="row">
  <?php query_posts('showposts=3');
	if ( have_posts()) : while (have_posts()) : the_post();?>
	<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>">
		<div class="col-sm-4">
			<h3><?php the_title(); ?></h3>
			<p><?php the_excerpt(); ?></p>
		</div>
	</a>
	
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  	<?php endif; ?>


<?php get_footer(); ?>