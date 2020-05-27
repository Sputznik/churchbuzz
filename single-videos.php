<?php get_header();?>

<div class="container single-template-3">
  <div class="row">
    <div class="col-sm-12">
      <?php if (have_posts()) : while (have_posts()) : the_post(); global $post;?>
      <article <?php post_class();?>>
        <header class="entry-header"><h1 class="entry-title"><?php the_title();?></h1></header>
        <div class="author-snippet">
        	<div class="author-details">
            <a class="author-name" href="<?php _e( do_shortcode( '[orbit_author_link]' ) );?>">
              By <?php _e( do_shortcode( '[orbit_author]' ) );?>
            </a>
        	</div>
        	<div class="post-date"><?php _e( do_shortcode( '[orbit_date]' ) );?></div>
        </div>
        <div class="post-thumbnail">
          <?php
            $video_url = get_post_meta( $post->ID, 'video_url', true );
            $embed_url = str_replace( 'https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $video_url );
          ?>
          <div class='youtube-frame'>
            <iframe src="<?php _e( $embed_url );?>"></iframe>
          </div>
        </div>
        <!-- Youtube Video Section -->
        <div class="entry-content"><?php the_content(); ?></div>
        <?php get_template_part( 'partials/author', 'box');?>
        <?php get_template_part( 'partials/comments', 'box');?>
      </article>


      <!-- Similar Videos Section -->
      <?php
      $shortcode_str = '';
      $shortcode_str = do_shortcode("[orbit_related_query posts_per_page='3' style='video' taxonomy='video-category']");
      if( strlen( $shortcode_str ) > 0 ):?>
      	<div class="similar-videos">
      		<div class="container">
      			<div class="row">
      				<div class="col-sm-12">
      						<h2 class="text-center">Similar Videos</h2>
      						<?php echo $shortcode_str;?>
      				</div>
      			</div>
      		</div>
      	</div>
      	<?php endif;?>
      <!-- Similar Videos Section -->
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php get_footer();?>
