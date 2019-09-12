<?php get_header();?>
<?php $term = $wp_query->get_queried_object();$image_url = apply_filters( 'taxonomy-images-queried-term-image-url', '', array( 'image_size' => 'full' ) );?>
<div class='overlay-header'>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h1><?php the_archive_title();?></h1>
      </div>
    </div>
  </div>
</div>
<?php if ( have_posts() ) : ?>
<div class="container" style="padding: 50px 15px;">
  <div class="row">
    <div class="col-sm-12">
      <ul class="list-unstyled cb-churches">
        <?php while ( have_posts() ) : the_post(); ?>
        <li class="sp-post">
          <?php get_template_part( 'partials/post', 'church'); ?>
        </li>
        <?php endwhile;?>
      </ul>
    </div>
  </div>
</div>
<?php endif; ?>
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
<?php get_footer();?>
<style>
  .tax-location .header3{ min-height: 50px; }
</style>
