<?php _e( do_shortcode( '[orbit_thumbnail_bg size="full"]' ) );?>
<div class="orbit-post-content">
  <div class="orbit-author">
    <a href="<?php the_permalink();?>"><?php _e( do_shortcode( '[orbit_avatar]' ) );?></a>
    <div class="orbit-author-meta">
      <?php the_author_link();?>
      <br><?php _e( do_shortcode( '[orbit_date]' ) );?>
    </div>
  </div>
  <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
  <div class="post-excerpt"><?php _e( do_shortcode( '[orbit_excerpt]' ) );?></div>
  <a class="orbit-read-more" href="<?php the_permalink();?>">Continue reading</a>
</div>
