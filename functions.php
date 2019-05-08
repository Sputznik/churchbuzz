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

add_action( 'widgets_init', function(){

  register_sidebar( array(
    'name' => 'Footer Sidebar 1',
    'id' => 'footer1-sidebar',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => 'Footer Sidebar 2',
    'id' => 'footer2-sidebar',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
  register_sidebar( array(
    'name' => 'Footer Sidebar 3',
    'id' => 'footer3-sidebar',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
});

add_action( 'sp_pre_footer', function(){
  ?>
  <div class="row">
    <div class="col-sm-4"><?php if( is_active_sidebar( 'footer1-sidebar' ) ){ dynamic_sidebar( 'footer1-sidebar' ); }?></div>
    <div class="col-sm-4"><?php if( is_active_sidebar( 'footer2-sidebar' ) ){ dynamic_sidebar( 'footer2-sidebar' ); }?></div>
    <div class="col-sm-4"><?php if( is_active_sidebar( 'footer3-sidebar' ) ){ dynamic_sidebar( 'footer3-sidebar' ); }?></div>
  </div>
  <div class="site-info">
    <span class="site-title"><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></span>
    <a href="https://sputznik.com">Designed by Sputznik</a>
  </div>
  <?php
} );
