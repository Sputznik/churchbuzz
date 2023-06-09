<?php if( count( $terms ) ):?>
  <ul class="list-unstyled cb-churches cb-location-grid">
    <?php foreach( $terms as $location ):  $location_image_url = get_term_meta( $location->term_id, 'cbt_location_image', true); ?>
      <?php if( !empty( $location_image_url ) ):?>
        <li class="sp-post cb-location-image"style="background-image:url('<?php _e( $location_image_url );?>');">
      <?php else:?>
        <li class="sp-post">
      <?php endif;?>
        <div class="sp-post-desc">
          <h3><?php _e( $location->name );?></h3>
        </div>
        <a href="<?php _e( get_term_link( $location ) );?>"></a>
        <?php if( !empty( $location_image_url ) ): ?>
          <div class="location-overlay"></div>
        <?php endif;?>
      </li>
    <?php endforeach;?>
  </ul>
<?php endif;?>
