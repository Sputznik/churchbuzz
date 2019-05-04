<?php global $orbit_templates;?>
<ul class="users-grid list-unstyled">
<?php foreach ( $this->query->results as $user ):$orbit_templates->set_user( $user );?>
	<li>
    <a href="<?php _e( do_shortcode( '[orbit_user field=url]' ) );?>">
      <?php _e( do_shortcode( '[orbit_user field=avatar avatar_size=100]' ) );?>
      <div class='orbit-user-name'><?php _e( do_shortcode( '[orbit_user field=name]' ) );?></div>
      <?php $desc = do_shortcode( '[orbit_user field=description]' ); ?>
      <?php if( $desc ):?>
      <div class='orbit-user-desc'><?php _e( $desc );?></div>
    <?php endif;?>
    </a>
  </li>
<?php endforeach;?>
</ul>
