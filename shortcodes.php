<?php
// Component Description Shortcode
//// Manually pass in PostID

function component_description_shortcode($atts) {

	// Attributes
	$atts = shortcode_atts (
		array(
			'id' => '',
		),
		$atts,
		'component_description'
	);
  
  // Return only if shortcode has PostID attribute
  if (isset($atts['id'])) {

    $post_id = $atts['id'];
    
    //Variables
    $component_description_content = get_field('component_description', $post_id);
    
    return $component_description_content;
  }
}
add_shortcode('component_description', 'component_description_shortcode');
