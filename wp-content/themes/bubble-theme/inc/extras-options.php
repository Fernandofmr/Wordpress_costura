<?php
/**
 * Options for Bubble's Extras framework.
 *
 * @package bubble
 * @license GPL 2.0 
 */

/**
 * Page Settings options.
 *
 * @package bubble
 * @license GPL 2.0 
 */

/**
 * Setup Page Settings.
 */
function bubble_page_settings( $settings, $type, $id ) {

	$settings['layout'] = array(
		'type'    => 'select',
		'label'   => esc_html__( 'Page Layout', 'bubble' ),
		'options' => array(
			'default'               => esc_html__( 'Default', 'bubble' ),
			'no-sidebar'            => esc_html__( 'No Sidebar', 'bubble' ),
			'full-width-no-sidebar' => esc_html__( 'Full Width, No Sidebar', 'bubble' ),
			'constrained'           => esc_html__( 'Constrained', 'bubble' ),
			'stripped'              => esc_html__( 'Stripped', 'bubble' ),
		),
	);

	$settings['overlap'] = array(
		'type'    => 'select',
		'label'   => esc_html__( 'Header Overlap', 'bubble' ),
		'options' => array(
			'disabled' => esc_html__( 'Disabled', 'bubble' ),
			'enabled'  => esc_html__( 'Enabled', 'bubble' ),
			'light'    => esc_html__( 'Enabled - Light Text', 'bubble' ),
			'dark'     => esc_html__( 'Enabled - Dark Text', 'bubble' ),
		),
	);

	$settings['header_margin'] = array(
		'type'           => 'checkbox',
		'label'          => esc_html__( 'Header Bottom Margin', 'bubble' ),
		'checkbox_label' => esc_html__( 'Enable', 'bubble' ),
		'description'    => esc_html__( 'Display the margin below the header.', 'bubble' )
	);

	$settings['page_title'] = array(
		'type'           => 'checkbox',
		'label'          => esc_html__( 'Page Title', 'bubble' ),
		'checkbox_label' => esc_html__( 'Enable', 'bubble' ),
		'description'    => esc_html__( 'Display the page title.', 'bubble' )
	);

	$settings['footer_margin'] = array(
		'type'           => 'checkbox',
		'label'          => esc_html__( 'Footer Top Margin', 'bubble' ),
		'checkbox_label' => esc_html__( 'Enable', 'bubble' ),
		'description'    => esc_html__( 'Display the margin above the footer.', 'bubble' )
	);

	$settings['footer_widgets'] = array(
		'type'           => 'checkbox',
		'label'          => esc_html__( 'Footer Widgets', 'bubble' ),
		'checkbox_label' => esc_html__( 'Enable', 'bubble' ),
		'description'    => esc_html__( 'Display the footer widgets.', 'bubble' )
	);

	return $settings;
}
add_action( 'bubble_page_settings', 'bubble_page_settings', 10, 3 );

/**
 * Add the defaults.
 */
function bubble_setup_page_setting_defaults( $defaults, $type, $id ) {
	$defaults['layout']         = 'default';
	$defaults['overlap']        = 'disabled';
	$defaults['page_title']     = true;
	$defaults['header_margin']  = true;
	$defaults['footer_margin']  = true;
	$defaults['footer_widgets'] = true;

	return $defaults;
}
add_filter( 'bubble_page_settings_defaults', 'bubble_setup_page_setting_defaults', 10, 3 );

/**
 * Adds the theme about page options.
 */
function bubble_about_page( $about ) {

	$about['documentation_url'] = 'https://bubblethemes.com/documentation/bubble-wordpress-theme/';

	$about['premium_url'] = 'https://bubblethemes.com/themes/bubble/';

	$about['review'] = true;

	$about['no_video'] = true;

	$about['video_url'] = 'https://bubblethemes.com/themes/bubble/';

	$about['description'] = esc_html__( 'Lead the way with Bubble. It\'s fast loading, responsive, lightweight and flexible design is perfectly suited for building dynamic pages with SiteOrigin\'s Page Builder and selling with WooCommerce.', 'bubble' );

	$about['sections'] = array(
		'customize',
		'woocommerce',
		'page-builder',
		'support',
		'github',
	);

	return $about;
}
add_filter( 'bubble_about_page', 'bubble_about_page' );
