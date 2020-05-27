<?php



add_theme_support( 'post-thumbnails' );

//Constant changes all the js and css version on the go
define( 'CHURCHBUZZ_VERSION', '1.1.13' );


//Load child stylesheet after parent stylesheet
add_action('wp_enqueue_scripts', function(){

  // LOAD THE CHILD THEME CSS
  wp_enqueue_style( 'churchbuzz', get_stylesheet_directory_uri() .'/assets/css/style.css', array( 'sp-core-style' ), CHURCHBUZZ_VERSION );

  // VALIDATION ON THE FORM
  //wp_enqueue_script( 'soah-main', get_stylesheet_directory_uri().'/assets/js/form.js', array(), CHURCHBUZZ_VERSION, true );

});

// Exclude pages & cafe from WordPress Search
add_filter( 'pre_get_posts', function( $query ){
  if ( !$query->is_admin && $query->is_main_query() && $query->is_search ) {
    $query->set( 'post_type', array( 'post' ) );
	}
	return $query;
} );


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
		'supports'	=> array( 'title', 'editor', 'author', 'excerpt' )
	);

  $post_types['churches'] = array(
		'slug' 		=> 'churches',
		'labels'	=> array(
			'name' 					=> 'Churches',
			'singular_name' => 'Church',
		),
    'menu_icon'	=> 'dashicons-art',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'thumbnail' )
	);

  $post_types['videos'] = array(
		'slug' 		=> 'videos',
		'labels'	=> array(
			'name' 					=> 'Videos',
			'singular_name' => 'Video',
      'add_new'       => 'Add New Video',
      'edit_item'			=> 'Edit Video',
      'add_new_item'  => 'Add New Video',
      'all_items'     => 'All Videos'
		),
    'menu_icon'	=> 'dashicons-video-alt3',
		'public'		=> true,
		'supports'	=> array( 'title', 'editor', 'thumbnail','comments','excerpt' )
	);

	return $post_types;
} );

add_filter( 'orbit_taxonomy_vars', function( $taxonomies ){

	$taxonomies['church-type']	= array(
		'label'			=> 'Church Type',
		'slug' 			=> 'church-type',
		'post_types'	=> array( 'churches' )
	);

	$taxonomies['location']	= array(
		'label'			=> 'Location',
		'slug' 			=> 'location',
		'post_types'	=> array( 'churches' )
	);

  $taxonomies['video-category']	= array(
		'label'			=> 'Video Category',
		'slug' 			=> 'video-category',
		'post_types'	=> array( 'videos' )
	);

	return $taxonomies;

} );

add_filter( 'orbit_meta_box_vars', function( $meta_box ){
	$meta_box['churches'] = array(
		array(
			'id'			=> 'churches-meta-fields',
			'title'		=> 'Additional Fields',
			'fields'	=> array(
				'website' => array(
					'type' => 'text',
					'text' => 'Website'
				),
				'address' => array(
					'type' => 'textarea',
					'text' => 'Address'
				),
				'map' => array(
					'type' => 'textarea',
					'text' => 'Map'
				),
			)
		)
	);
  $meta_box['videos'] = array(
    array(
      'id'			=> 'video-metafields',
      'title'		=> 'Additional Information',
      'fields'	=> array(
        'video_url'	=> array(
          'type' => 'text',
          'text' => 'Youtube Video Url'
        ),
      )
    )
  );
	return $meta_box;
});

add_shortcode( 'cb_locations', function( $atts ){

  $atts = shortcode_atts( array(
    'number'  => 0
    ), $atts, 'cb_locations'
  );

  ob_start();

  $terms = get_terms( array(
    'taxonomy'    => 'location',
    'hide_empty'  => false,
    'parent'      => 0,
    'number'      => $atts['number']
  ) );

  cb_city_guides_html( $terms );

  return ob_get_clean();

} );

// Get a list taxonomies on the search box
function cb_get_terms_by_search( $search_text, $taxonomy = 'location' ){
  $args = array(
      'taxonomy'      => array( $taxonomy ),
      'orderby'       => 'id',
      'order'         => 'ASC',
      'hide_empty'    => true,
      'fields'        => 'all',
      'name__like'    => $search_text
  );
  $terms = get_terms( $args );
  return $terms;
}

add_shortcode( 'cb_section_heading', function( $atts ){
  ob_start();
  _e( "<h2 class='section-heading'>" . $atts['title'] . "</h2>" );
  return ob_get_clean();
} );

function cb_city_guides_html( $terms ){
  if( count( $terms ) ){
    _e( '<ul class="list-unstyled cb-churches">' );
    foreach( $terms as $term ){
      _e( '<li class="sp-post">' );
      include( 'partials/location-grid.php' );
      _e( '</li>' );
    }
    _e( '</ul>' );
  }
}

add_shortcode( 'cb_searchform', function( $atts ){
  ob_start();
  include('partials/searchform.php');
  return ob_get_clean();
} );

/*

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
  <div class="row" style="margin-top:50px;">
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
*/
