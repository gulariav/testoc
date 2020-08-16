<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
	// OptionTree is not loaded yet, or this is not an admin request.
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() ) {
		return false;
	}

	// Get a copy of the saved settings array.
	$saved_settings = get_option( ot_settings_id(), array() );

	// Custom settings array that will eventually be passes to the OptionTree Settings API Class.
	$custom_settings = array(
		'contextual_help' => array(
			'sidebar' => '',
		),
		'sections'        => array(
			array(
				'id'    => 'header_settings',
				'title' => esc_html__( 'Header', 'testoc' ),
			),
			array(
				'id'    => 'hp_settings',
				'title' => esc_html__( 'Home Page', 'testoc' ),
			),
			array(
				'id'    => 'footer',
				'title' => esc_html__( 'Footer', 'testoc' ),
			),
		),
		'settings'        => array(
			array(
				'id'           => 'header_logo',
				'label'        => esc_html__( 'Header Logo', 'testoc' ),
				'desc'         => esc_html__( 'Recommanded, 150x60 px image', 'testoc' ),
				'std'          => '',
				'type'         => 'upload',
				'section'      => 'header_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'home_slider',
				'label'        => esc_html__( 'Main Slider', 'testoc' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'slider',
				'section'      => 'hp_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'hot_posts_heading',
				'label'        => esc_html__( 'Hot Posts Heading', 'testoc' ),
				'desc'         => esc_html__( 'Default: What\'s Hot', 'testoc' ),
				'std'          => '',
				'type'         => 'text',
				'section'      => 'hp_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'hot_posts',
				'label'        => esc_html__( 'Hot Posts', 'testoc' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'post-checkbox',
				'section'      => 'hp_settings',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
			array(
				'id'           => 'footer_copyright_text',
				'label'        => esc_html__( 'Footer copyright text', 'testoc' ),
				'desc'         => '',
				'std'          => '',
				'type'         => 'textarea',
				'section'      => 'footer',
				'rows'         => '',
				'post_type'    => '',
				'taxonomy'     => '',
				'min_max_step' => '',
				'class'        => '',
				'condition'    => '',
				'operator'     => 'and',
			),
		)
	);

	// Allow settings to be filtered before saving.
	$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

	// Settings are not the same update the DB.
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings ); 
	}

	// Lets OptionTree know the UI Builder is being overridden.
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
}
