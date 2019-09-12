<?php get_header();?>
<?php global $wp_query;?>
<div class="search-content">

  <div class="container">
    <?php echo do_shortcode( '[cb_searchform]' );?>
  </div>

  <?php $search_terms = cb_get_terms_by_search( get_search_query() ); if( is_array( $search_terms ) && count( $search_terms ) ):?>
  <div class="container term-results">
    <?php
      _e( do_shortcode( '[cb_section_heading title="Locations"]' ) );
      cb_city_guides_html( $search_terms );
    ?>
  </div>
  <?php endif;?>

  <?php
    if( term_exists( get_search_query(), 'location' ) ){
      $churches = do_shortcode( '[orbit_query pagination="1" posts_per_page="6" post_type="churches" style="churches" tax_query="location:'.get_search_query().'"]' );
    }
    else{
      $churches = do_shortcode( '[orbit_query pagination="1" posts_per_page="6" post_type="churches" style="churches" s="'.get_search_query().'"]' );
    }
  ?>
  <?php if( $churches ):?>
  <div class="container term-results">
    <div class='churches-results'>
      <?php _e( do_shortcode( '[cb_section_heading title="Churches"]' ) ); ?>
      <?php _e( $churches ); ?>
    </div>
  </div>
  <?php endif;?>

  <div class="articles-results">
    <div class="container">
  		<div class="row">
  			<div class="col-lg-12">
          <?php _e( do_shortcode( '[cb_section_heading title="Articles"]' ) );?>
          <?php if ( have_posts() ) : ?>
          <ul class="list-unstyled articles-grid articles-theme">
    				<?php while (have_posts()) : the_post(); ?>
    				<li class="orbit-article">
    					<?php get_template_part( "partials/content", "orbit" );?>
    				</li>
    				<?php endwhile;?>
    			</ul>
  				<?php
  					else :
  			 			printf( __('<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>') );
  					endif;
  				?>
  			</div>
  		</div>
  	</div>
  </div>
  <?php if ( have_posts() ): ?>
	<!-- Previous/next page navigation. -->
	<div class="container-fluid search-pagination">
		<div class="container text-center">
			<?php
				the_posts_pagination(
					array(
						'mid_size' 	=> 1,
						'prev_text' => __( '&laquo;' ),
						'next_text' => __( '&raquo;' ),
						'screen_reader_text' => __( ' ' ),
					)
				);
			?>
		</div>
	</div>
	<?php endif;?>
</div>
<?php get_footer();?>
