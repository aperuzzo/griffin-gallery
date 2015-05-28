<?php 

function wpbootstrap_scripts_with_jquery()
{
	// Register the javascript for bootstrap
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

//add responsive image class for bootstrap
function img_responsive($content){
    return str_replace('<img class="','<img class="img-responsive ',$content);
}
add_filter('the_content','img_responsive');

// adding a sidebar
if ( function_exists('register_sidebar-1') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

// this is to add .svg to the upload options for images
add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {

	// add the file extension to the array

	$existing_mimes['svg'] = 'mime/type';

        // call the modified list of extensions

	return $existing_mimes;
}

// this is to add a featured image for posts
if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-thumbnail', 275, 200, true ); // default Post Thumbnail dimensions (cropped)

}

//create custom post types: artist and artwork
add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'artist',
    array(
      'labels' => array(
        'name' => __( 'Artists' ),
        'singular_name' => __( 'Artist' )
      ),
      'supports' => array(
      	'title',
		'editor',
		'author',
		'thumbnail',
		'excerpt',
		'trackbacks',
		'custom-fields',
		'comments',
		'revisions',
      ),
      'taxonomies' => array('category'),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'artist'),
    )
  );
  
}

//breadcrumb
function the_breadcrumb() {
    echo 'Back to ';
    if (is_category() || is_single()) {
      the_category('title_li=');
    } 
  
}



?>