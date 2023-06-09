/**
 * HANDLES TAXONOMY LOCATION FEATURED IMAGE EVENTS
 */
jQuery.fn.cbt_taxonomy_image = function() {

	return this.each(function() {

		var $el = jQuery(this),
				$preview_image 	= jQuery('#preview-location-image'),	// IMAGE PREVIEW CONTAINER
				$btn_remove_img = $el.next('.cbt-remove-location-image'),	// REMOVE IMAGE BUTTON
				$image = jQuery(document.createElement('img'));

		$image.attr('style', 'max-width:100%');

		$el.click(function(e){
			e.preventDefault();

			cbt_location_media = wp.media({
				title: 'Featured Image',
				button: {
					text: 'Select this image'
				},
				multiple: false
			}).on('select', function() {
				var attachment = cbt_location_media.state().get('selection').first().toJSON();

				jQuery('#cbt-location-image').val(attachment.url);	// HIDDEN INPUT FIELD

				$image.attr('src', attachment.url);
				$preview_image.show().html($image);
				$btn_remove_img.show();
			})
			.open();

		});

		$btn_remove_img.click(function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			jQuery('#cbt-location-image').val('');	// HIDDEN INPUT FIELD
			jQuery('#preview-location-image').hide();
			$btn_remove_img.hide();
		});
	});
};

jQuery( document ).ready( function(){
	jQuery('[data-behaviour~=cbt-taxonomy-image]').cbt_taxonomy_image();
} );
