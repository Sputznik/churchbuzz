<?php

class CBT_TAXONOMY_LOCATION {

    public function __construct() {

      if( is_admin() ) {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueueMediaScript' ) );

        // ADD CUSTOM FIELDS
        add_action( 'location_add_form_fields', array( $this, 'locationCreateScreen' ), 10, 1 );
        add_action( 'location_edit_form_fields', array( $this, 'locationEditScreen' ), 10, 2  );

        // SAVE CUSTOM FIELDS
        add_action( 'created_location', array( $this, 'saveLocationField' ), 10, 1 );
        add_action( 'edited_location', array( $this, 'updateLocationField' ), 10, 1 );
      }

    }

    // ENQUEUE ADMIN SCRIPTS
    public function enqueueMediaScript( $hook ){
      if( $hook == 'term.php' || $hook == 'edit-tags.php'){
        wp_enqueue_media();
        wp_enqueue_script( 'cbt-tax-location-image', get_stylesheet_directory_uri().'/assets/js/cbt-tax-location.js', array('jquery'), CHURCHBUZZ_VERSION, true );
      }
    }

    // RENDER FIELD IN LOCATION CREATE SCREEN
    public function locationCreateScreen( $taxonomy ){ ?>
      <div class="form-field" style="margin-top:35px">
        <div id="preview-location-image" style="padding:0px 16px 10px 0px;"></div>
        <p>
          <a href="#" data-behaviour="cbt-taxonomy-image" class="button button-secondary"><?php _e('Set Featured Image'); ?></a>
          &nbsp; &nbsp;
          <a href="#" class="cbt-remove-location-image" style="display:none;color:#b32d2e;"><?php _e('Remove Featured Image'); ?></a>
        </p>
        <input type="hidden" name="cbt_location_image" id="cbt-location-image" value="" />
      </div> <?php
    }


    // RENDER FIELD IN LOCATION EDIT SCREEN
    public function locationEditScreen( $term, $taxonomy ){ ?>
      <tr class="form-field term-group-wrap">
        <th scope="row">
          <label for="cbt-location-image">Featured Image</label>
        </th>
        <td>
          <?php $image_url = get_term_meta( $term->term_id, 'cbt_location_image', true ); ?>
          <div id="preview-location-image">
            <?php if( $image_url ) : ?>
              <img src="<?php _e( $image_url );?>" alt="featured-img" style="max-width:100%">
            <?php endif; ?>
          </div>
          <p>
            <a href="#" data-behaviour="cbt-taxonomy-image" class="button button-secondary"><?php _e('Set Featured Image'); ?></a>
            &nbsp; &nbsp;
            <a href="#" class="cbt-remove-location-image" style="color:#b32d2e;<?php $image_url ? '' : _e('display:none');?>"><?php _e('Remove Featured Image'); ?></a>
            <input type="hidden" name="cbt_location_image" id="cbt-location-image" value="<?php $image_url ? _e($image_url) : '';?>" />
          </p>
        </td>
      </tr> <?php
    }

    public function saveLocationField( $term_id ){
      if( isset( $_POST['cbt_location_image'] ) && '' !== $_POST['cbt_location_image'] ){
        $image_url = $_POST['cbt_location_image'];
        add_term_meta( $term_id, 'cbt_location_image', $image_url, true);
      }
    }

    public function updateLocationField( $term_id ){
      if( isset( $_POST['cbt_location_image'] ) && '' !== $_POST['cbt_location_image'] ){
        $image_url = $_POST['cbt_location_image'];
        update_term_meta( $term_id, 'cbt_location_image', $image_url );
      } else {
        update_term_meta( $term_id, 'cbt_location_image', '' );
      }
    }
}

new CBT_TAXONOMY_LOCATION;
