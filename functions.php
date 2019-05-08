<?php



add_theme_support( 'post-thumbnails' );

//Constant changes all the js and css version on the go
define( 'CHURCHBUZZ_VERSION', '1.0.4' );


//Load child stylesheet after parent stylesheet
add_action('wp_enqueue_scripts', function(){

  // LOAD THE CHILD THEME CSS
  wp_enqueue_style( 'churchbuzz', get_stylesheet_directory_uri() .'/assets/css/style.css', array( 'sp-core-style' ), CHURCHBUZZ_VERSION );

  // VALIDATION ON THE FORM
  //wp_enqueue_script( 'soah-main', get_stylesheet_directory_uri().'/assets/js/form.js', array(), CHURCHBUZZ_VERSION, true );

});



//Add google crimson text font
add_filter( 'sp_list_google_fonts', function( $fonts ){

  $fonts[] = array(
    'slug'	=> 'crimson',
    'name'	=> 'Crimson Text',
    'url'	  => 'Crimson+Text'
  );

} );

add_filter( 'orbit_post_type_vars', function( $post_types ){

	$post_types['commentaries'] = array(
		'slug' 		=> 'commentaries',
		'labels'	=> array(
			'name' 					=> 'Commentaries',
			'singular_name' => 'Commentary',
		),
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'author' )
	);

	return $post_types;
} );
