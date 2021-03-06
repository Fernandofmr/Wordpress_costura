<?php
/**
 * Defines Customizer options.
 *
 * @package bubble
 * @license GPL 2.0 
 */

function bubble_theme_options() {

	// Stores all the controls that will be added.
	$options = array();

	// Stores all the sections to be added.
	$sections = array();

	// Stores all the panels to be added.
	$panels = array();

	// Adds the sections to the $options array.
	$options['sections'] = $sections;

	// Theme Settings.
	$panel = 'theme_settings';

	$panels[] = array(
		'id'       => $panel,
		'title'    => esc_html__( 'Theme Settings', 'bubble' ),
		'priority' => '10',
	);

	// Header.
	$section = 'header';

	$sections[] = array(
		'id'       => $section,
		'title'    => esc_html__( 'Header', 'bubble' ),
		'priority' => '10',
		'panel'    => $panel,
	);

	$options['logo'] = array(
		'id'          => 'logo',
		'label'       => esc_html__( 'Logo', 'bubble' ),
		'section'     => $section,
		'type'        => 'media',
		'description' => esc_html__( 'A logo to be displayed instead of the site title.', 'bubble' ),
		'default'     => '',
		'mime_type'   => 'image',
		'priority'    => '10',
	);

	$options['tagline'] = array(
		'id'          => 'tagline',
		'label'       => esc_html__( 'Tagline', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the website tagline below the logo or site title.', 'bubble' ),
		'default'     => false,
		'priority'    => '20',
	);

	$options['header_layout'] = array(
		'id'          => 'header_layout',
		'label'       => esc_html__( 'Header Layout', 'bubble' ),
		'section'     => $section,
		'type'        => 'select',
		'choices' => array(
			'default'  => 'Default',
			'centered' => 'Centered',
		),
		'description' => esc_html__( 'Select the header layout.', 'bubble' ),
		'default'     => 'default',
		'priority'    => '30',
	);

	$options['sticky_header'] = array(
		'id'          => 'sticky_header',
		'label'       => esc_html__( 'Sticky Header', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Sticks the header to the top of the screen on scroll.', 'bubble' ),
		'default'     => true,
		'priority'    => '40',
	);

	$options['sticky_header_scaling'] = array(
		'id'          => 'sticky_header_scaling',
		'label'       => esc_html__( 'Sticky Header Scales Logo', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Scales the logo down as the header becomes sticky.', 'bubble' ),
		'default'     => false,
		'priority'    => '50',
	);

	// Navigation.
	$section = 'navigation';

	$sections[] = array(
		'id'       => $section,
		'title'    => esc_html__( 'Navigation', 'bubble' ),
		'priority' => '20',
		'panel'    => $panel,
	);

	$options['header_menu'] = array(
		'id'          => 'header_menu',
		'label'       => esc_html__( 'Header Menu', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the header menu.', 'bubble' ),
		'default'     => true,
		'priority'    => '10',
	);

	$options['mobile_menu'] = array(
		'id'          => 'mobile_menu',
		'label'       => esc_html__( 'Mobile Menu', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Use a mobile menu for small screen devices. Header Menu setting must be enabled.', 'bubble' ),
		'default'     => true,
		'priority'    => '20',
	);

	$options['menu_search'] = array(
		'id'          => 'menu_search',
		'label'       => esc_html__( 'Menu Search', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display a search icon in the main menu.', 'bubble' ),
		'default'     => true,
		'priority'    => '30',
	);

	$options['post_navigation'] = array(
		'id'          => 'post_navigation',
		'label'       => esc_html__( 'Post Navigation', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display next/previous navigation on single post pages.', 'bubble' ),
		'default'     => true,
		'priority'    => '40',
	);

	$options['scroll_to_top'] = array(
		'id'          => 'scroll_to_top',
		'label'       => esc_html__( 'Scroll to Top', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the scroll to top button.', 'bubble' ),
		'default'     => true,
		'priority'    => '50',
	);

	// Typography.
	$section = 'typography';

	$sections[] = array(
		'id'       => $section,
		'title'    => esc_html__( 'Typography', 'bubble' ),
		'priority' => '30',
		'panel'    => $panel,
	);

	$options['heading_font'] = array(
		'id'       => 'heading_font',
		'label'    => esc_html__( 'Heading Font', 'bubble' ),
		'section'  => $section,
		'type'     => 'select',
		'choices'  => customizer_library_get_font_choices(),
		'default'  => 'Montserrat',
		'priority' => '10',
	);

	$options['body_font'] = array(
		'id'       => 'body_font',
		'label'    => esc_html__( 'Body Font', 'bubble' ),
		'section'  => $section,
		'type'     => 'select',
		'choices'  => customizer_library_get_font_choices(),
		'default'  => 'Open Sans',
		'priority' => '20',
	);

	$options['accent_color'] = array(
		'id'       => 'accent_color',
		'label'    => esc_html__( 'Accent Color', 'bubble' ),
		'section'  => $section,
		'type'     => 'color',
		'default'  => '#4d8ffb',
		'priority' => '30',
	);

	$options['heading_color'] = array(
		'id'       => 'heading_color',
		'label'    => esc_html__( 'Heading Color', 'bubble' ),
		'section'  => $section,
		'type'     => 'color',
		'default'  => '#2d2d2d',
		'priority' => '40',
	);

	$options['text_color'] = array(
		'id'       => 'text_color',
		'label'    => esc_html__( 'Text Color', 'bubble' ),
		'section'  => $section,
		'type'     => 'color',
		'default'  => '#626262',
		'priority' => '50',
	);

	$options['secondary_text_color'] = array(
		'id'       => 'secondary_text_color',
		'label'    => esc_html__( 'Secondary Text Color', 'bubble' ),
		'section'  => $section,
		'type'     => 'color',
		'default'  => '#828282',
		'priority' => '60',
	);

	// Blog.
	$section = 'blog';

	$sections[] = array(
		'id'       => $section,
		'title'    => esc_html__( 'Blog', 'bubble' ),
		'priority' => '50',
		'panel'    => $panel,
	);

	$options['archive_featured_image'] = array(
		'id'          => 'archive_featured_image',
		'label'       => esc_html__( 'Archive Featured Image', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the featured image on blog and archive pages.', 'bubble' ),
		'default'     => true,
	);

	$options['archive_post_content'] = array(
		'id'      => 'archive_post_content',
		'label'   => esc_html__( 'Archive Post Content', 'bubble' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'full'    => 'Full Post Content',
			'excerpt' => 'Post Excerpt',
		),
		'description' => esc_html__( 'Choose how to display your post content on blog and archive pages. Select Full Post Content if using the "more" quicktag.', 'bubble' ),
		'default'     => 'full',
	);

	$options['read_more_text'] = array(
		'id'          => 'read_more_text',
		'label'       => esc_html__( 'Read More Text', 'bubble' ),
		'section'     => $section,
		'type'        => 'text',
		'description' => esc_html__( 'The link text displayed when posts are split using the "more" quicktag.', 'bubble' ),
		'default'     => esc_html__( 'Continue reading', 'bubble' ),
	);

	$options['excerpt_length'] = array(
		'id'          => 'excerpt_length',
		'label'       => esc_html__( 'Excerpt Length', 'bubble' ),
		'section'     => $section,
		'type'        => 'number',
		'description' => esc_html__( 'If no manual post excerpt is added one will be generated. How many words should it be?', 'bubble' ),
		'default'     => 55,
	);

	$options['excerpt_more'] = array(
		'id'          => 'excerpt_more',
		'label'       => esc_html__( 'Post Excerpt Read More Link', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the Read More link below the post excerpt.', 'bubble' ),
		'default'     => true,
	);

	$options['post_featured_image'] = array(
		'id'          => 'post_featured_image',
		'label'       => esc_html__( 'Post Featured Image', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the featured image on single post pages.', 'bubble' ),
		'default'     => true,
	);

	$options['post_date'] = array(
		'id'          => 'post_date',
		'label'       => esc_html__( 'Post Date', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the post date on blog, archive and single post pages.', 'bubble' ),
		'default'     => true,
	);

	$options['post_author'] = array(
		'id'          => 'post_author',
		'label'       => esc_html__( 'Post Author', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the post author on blog, archive and single post pages.', 'bubble' ),
		'default'     => true,
	);

	$options['post_categories'] = array(
		'id'          => 'post_categories',
		'label'       => esc_html__( 'Post Categories', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the post categories on blog, archive and single post pages.', 'bubble' ),
		'default'     => true,
	);

	$options['post_comment_count'] = array(
		'id'          => 'post_comment_count',
		'label'       => esc_html__( 'Post Comment Count', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the post comment count on blog, archive and single post pages.', 'bubble' ),
		'default'     => true,
	);

	$options['post_tags'] = array(
		'id'          => 'post_tags',
		'label'       => esc_html__( 'Post Tags', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the post tags on single post pages.', 'bubble' ),
		'default'     => true,
	);

	$options['post_author_box'] = array(
		'id'          => 'post_author_box',
		'label'       => esc_html__( 'Post Author Box', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the post author biographical info on single post pages.', 'bubble' ),
		'default'     => true,
	);

	$options['related_posts'] = array(
		'id'          => 'related_posts',
		'label'       => esc_html__( 'Related Posts', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display related posts on single post pages.', 'bubble' ),
		'default'     => true,
	);

	// Pages
	$section = 'pages';

	$sections[] = array(
		'id'       => $section,
		'title'    => esc_html__( 'Pages', 'bubble' ),
		'priority' => '55',
		'panel'    => $panel,
	);	

	$options['page_featured_image'] = array(
		'id'          => 'page_featured_image',
		'label'       => esc_html__( 'Featured Image', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the featured image on single pages.', 'bubble' ),
		'default'     => true,
	);

	// Sidebar.
	$section = 'sidebar';

	$sections[] = array(
		'id'       => $section,
		'title'    => esc_html__( 'Sidebar', 'bubble' ),
		'priority' => '60',
		'panel'    => $panel,
	);

	$options['sidebar_position'] = array(
		'id'      => 'sidebar_position',
		'label'   => esc_html__( 'Position', 'bubble' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'right' => 'Right',
			'left'  => 'Left',
		),
		'description' => esc_html__( 'Choose the sidebar position.', 'bubble' ),
		'default'     => 'right',
		'priority'    => '10',
	);

	// Footer.
	$section = 'footer';

	$sections[] = array(
		'id'       => $section,
		'title'    => esc_html__( 'Footer', 'bubble' ),
		'priority' => '70',
		'panel'    => $panel,
	);

	$options['footer_layout'] = array(
		'id'      => 'footer_layout',
		'label'   => esc_html__( 'Footer Layout', 'bubble' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => array(
			'default'    => 'Default',
			'full-width' => 'Full-Width',
		),
		'description' => esc_html__( 'Choose the footer layout.', 'bubble' ),
		'default'     => 'default',
		'priority'    => '10',
	);

	$options['footer_text'] = array(
		'id'          => 'footer_text',
		'label'       => esc_html__( 'Footer Text', 'bubble' ),
		'section'     => $section,
		'type'        => 'text',
		'description' => esc_html__( '{site-title} and {year} can be used to display your website title and the current year.', 'bubble' ),
		'default'     => esc_html__( 'Copyright &copy; {year} {sitename}.', 'bubble' ),
		'priority'    => '20',
	);

	$options['footer_privacy_policy_link'] = array(
		'id'          => 'footer_privacy_policy_link',
		'label'       => esc_html__( 'Privacy Policy Link', 'bubble' ),
		'section'     => $section,
		'type'        => 'checkbox',
		'description' => esc_html__( 'Display the Privacy Policy page link.', 'bubble' ),
		'default'     => true,
		'priority'    => '25',
	);

	// WooCommerce.
	if ( function_exists( 'is_woocommerce' ) ) {

		$section = 'woocommerce';

		$sections[] = array(
			'id'       => $section,
			'title'    => esc_html__( 'WooCommerce', 'bubble' ),
			'priority' => '80',
			'panel'    => $panel,
		);

		$options['archive_columns'] = array(
			'id'          => 'archive_columns',
			'label'       => esc_html__( 'Products Per Row', 'bubble' ),
			'section'     => $section,
			'type'        => 'range',
			'description' => esc_html__( 'Set the number of products per row on shop archive pages.', 'bubble' ),
			'input_attrs' => array(
				'min'  => 2,
				'max'  => 5,
				'step' => 1
			),
			'default'  => 3,
			'priority' => '10',
		);

		$options['woocommerce_sidebar_position'] = array(
			'id'      => 'woocommerce_sidebar_position',
			'label'   => esc_html__( 'Shop Sidebar Position', 'bubble' ),
			'section' => $section,
			'type'    => 'select',
			'choices' => array(
				'left'  => 'Left',
				'right' => 'Right',
			),
			'description' => esc_html__( 'Choose the shop sidebar position.', 'bubble' ),
			'default'     => 'left',
			'priority'    => '20',
		);

		$options['product_gallery'] = array(
			'id'      => 'product_gallery',
			'label'   => esc_html__( 'Product Gallery', 'bubble' ),
			'section' => $section,
			'type'    => 'select',
			'choices' => array(
				'slider'               => 'Gallery Slider',
				'slider_lightbox'      => 'Gallery Slider + Lightbox',
				'slider_zoom'          => 'Gallery Slider + Zoom',
				'slider_lightbox_zoom' => 'Gallery Slider + Lightbox + Zoom',
			),
			'default'  => 'slider_lightbox',
			'priority' => '30',
		);

		$options['mini_cart'] = array(
			'id'          => 'mini_cart',
			'label'       => esc_html__( 'Mini Cart', 'bubble' ),
			'section'     => $section,
			'type'        => 'checkbox',
			'description' => esc_html__( 'Display the WooCommerce mini cart in the header menu.', 'bubble' ),
			'default'     => false,
			'priority'    => '40',
		);

		$options['quick_view'] = array(
			'id'          => 'quick_view',
			'label'       => esc_html__( 'Quick View', 'bubble' ),
			'section'     => $section,
			'type'        => 'checkbox',
			'description' => esc_html__( 'Display a Quick View button on hover on product archive pages.', 'bubble' ),
			'default'     => true,
			'priority'    => '50',
		);

		$options['add_to_cart'] = array(
			'id'          => 'add_to_cart',
			'label'       => esc_html__( 'Add to Cart', 'bubble' ),
			'section'     => $section,
			'type'        => 'checkbox',
			'description' => esc_html__( 'Display an Add to Cart button on hover on product archive pages.', 'bubble' ),
			'default'     => true,
			'priority'    => '60',
		);
	}

	if ( ! function_exists( 'bubble_premium_setup' ) ) {

		$section = 'more_options';

		$sections[] = array(
			'id'       => $section,
			'title'    => esc_html__( 'More Options', 'bubble' ),
			'priority' => '90',
			'panel'    => $panel,
		);

		$options['bubble_premium'] = array(
			'id'      => 'bubble_premium',
			'label'   => esc_html__( 'Bubble Premium', 'bubble' ),
			'section' => $section,
			'type'    => 'content',
			'content' => '<p>' . esc_html__( 'Bubble Premium adds loads of extra customization settings and useful features. They\'ll save you time and make your site more professional.', 'bubble' ) . '</p> <p><a href="https://bubblethemes.com/themes/bubble" class="button-primary" target="_blank">' . esc_html__( 'Find Out More', 'bubble' ) . '</a><p>',
		);
	}

	// Adds the sections to the $options array.
	$options['sections'] = $sections;

	// Adds the panels to the $options array.
	$options['panels'] = $panels;

	// Adds a hook that can be used by child themes or plugins.
	$options = apply_filters( 'bubble_additional_options', $options );

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

}
add_action( 'init', 'bubble_theme_options' );
