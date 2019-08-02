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
            <a href="<?php _e( do_shortcode( '[orbit_author_link]' ) );?>"><?php _e( do_shortcode( '[orbit_avatar size=100]' ) );?></a>
            <div class="orbit-author-meta">
              <h3><a href="<?php _e( do_shortcode( '[orbit_author_link]' ) );?>"><?php _e( do_shortcode( '[orbit_author]' ) );?></a></h3>
              <p><?php _e( get_user_meta( $post->post_author, 'description', true ) );?></p>
              <?php

                $user_links = array(
                  'user_url'          => '<i class="fa fa-globe"></i>&nbsp;Website',
                  'tsf_facebook_page' => '<i class="fab fa-facebook"></i>&nbsp;Facebook'
                );

                _e( "<ul class='list-inline text-muted small'>" );
                foreach ( $user_links as $key => $label ) {
                  $link = get_the_author_meta( $key );
                  if( $link ){
                    _e( "<li><a href='".$link."'>" . $label . "</a></li>" );
                  }
                }
                _e( "</ul>" );

              ?>


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
        <div class="entry-post-nav">
          <?php the_post_navigation(
  					array(
  						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
  							'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
  							'<span class="post-title">%title</span>',
  						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
  							'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
  							'<span class="post-title">%title</span>',
  					)
  				); ?>
        </div>
      </article>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php get_footer();?>
