<?php get_header();?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <?php if (have_posts()) : while (have_posts()) : the_post(); global $post;?>
      <article class="<?php post_class();?>">
        <header class="entry-header"><h1 class="entry-title"><?php the_title();?></h1></header>
        <div class="entry-summary"><?php _e( do_shortcode( '[orbit_excerpt]' ) );?></div>
        <div class="post-thumbnail"><?php _e( do_shortcode( '[orbit_thumbnail size="full"]' ) );?></div>
        <div class="entry-content"><?php the_content(); ?></div>
        <div class="entry-author">
          <h1>About the author</h1>
          <div class="author-info">
            <a href="<?php the_permalink();?>"><?php _e( do_shortcode( '[orbit_avatar size=100]' ) );?></a>
            <div class="orbit-author-meta">
              <h3><a href="<?php the_permalink();?>"><?php _e( do_shortcode( '[orbit_author]' ) );?></a></h3>
              <p><?php _e( get_user_meta( $post->post_author, 'description', true ) );?></p>
            </div>
          </div>
        </div>
        <div class="entry-comments">
        <?php
          // If comments are open or we have at least one comment, load up the comment template.
  				if ( comments_open() || get_comments_number() ) {
            comments_template();
  				}
        ?>
        </div>

      </article>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php get_footer();?>
