<?php 


/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function gridos_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_category( 'events', $field->object_id ) ) {
		return false;
	}
	return true;
}

function gridos_hide_if_no_cats2( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_category( 'news', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_action( 'cmb2_admin_init', 'gridos_metaboxes' );

/**
 * Define the metabox and field configurations.
 */
function gridos_metaboxes() {
    
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_gridos_';

    /**
     * Initiate the metabox
    */
    
    require_once GRIDOS_INCLUDES_DIR . '/metabox/page_options.php';
    require_once GRIDOS_INCLUDES_DIR . '/metabox/project_options.php';
    require_once GRIDOS_INCLUDES_DIR . '/metabox/user_options.php';

}


?>