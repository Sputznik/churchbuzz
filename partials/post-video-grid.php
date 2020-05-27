<?php
	global $post;
	$thumbnail = get_stylesheet_directory_uri().'/assets/images/default-image.png';
	if (has_post_thumbnail( $post->ID ) ){
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' )[0];
	}
?>
<a class="post-video" href="<?php the_permalink();?>">
	<div class="video-thumb" style="background-image: url( <?php _e( $thumbnail );?> );">
	  <div class="video-desc">
			<span class="play-btn"><i class="fa fa-play-circle-o"></i></span>
	    <div class="title"><?php the_title();?></div>
	  </div>
	</div>
</a>
