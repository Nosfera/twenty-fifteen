<?php
add_editor_style( 'editor-style.css' );
// Add Google fonts to editor
add_action( 'after_setup_theme', 'leaven_editor_fonts' );
function leaven_editor_fonts() {
	$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700|Lora:400italic,700italic' );
	add_editor_style( $font_url );
}

// Adds the style dropdown to the top menu in the editor.
add_filter( 'mce_buttons', 'leaven_mce_editor_buttons' );
function leaven_mce_editor_buttons( $buttons ) {
	$buttons[] = 'styleselect';
	return $buttons;
}
// Adds the style dropdown to the second row of buttons in the editor.
//add_filter( 'mce_buttons_2', 'leaven_mce_editor_buttons_second' );
function leaven_mce_editor_buttons_second( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}

add_filter( 'tiny_mce_before_init', 'leaven_modify_mce_styles' );

function leaven_modify_mce_styles( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		array(
			'title'    => __( 'Button', 'leaven' ),
			'selector' => 'a',
			'classes'  => 'button',
		),
		array(
			'title'   => __( 'Notice', 'leaven' ),
			'block'   => 'div',
			'classes' => 'notice',
		),
		array(
			'title'   => __( 'Bild info', 'leaven' ),
			'block'   => 'div',
			'classes' => 'bild_info',
		),
		array(
			'title'    => __( 'Disclaimer', 'leaven' ),
			'selector' => 'p',
			'classes'  => 'disclaimer',
		),
	);
	$init_array['style_formats'] = wp_json_encode( $style_formats );
	return $init_array;
}
?>