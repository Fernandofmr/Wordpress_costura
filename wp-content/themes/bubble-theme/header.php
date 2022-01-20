<?php
/**
 * The theme header.
 *
 * This is the template that displays all of the <head> section and everything up until <div class="bubble-container">.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bubble
 * @license GPL 2.0 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
do_action( 'bubble_body_top' );
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bubble' ); ?></a>

		<?php if ( class_exists( 'Woocommerce' ) && is_store_notice_showing() ) : ?>
			<div id="topbar">
				<?php bubble_woocommerce_demo_store(); ?>
			</div><!-- #topbar -->
		<?php endif; ?>

		<?php do_action( 'bubble_header_before' ); ?>

		<header id="masthead" class="site-header<?php if ( get_theme_mod( 'header_layout' ) == 'centered' ) echo ' centered'; if ( get_theme_mod( 'sticky_header', true ) ) echo ' sticky'; if ( get_theme_mod( 'tagline' ) && get_bloginfo( 'description' ) ) echo ' tagline'; if ( get_theme_mod( 'mobile_menu', true ) ) echo ' mobile-menu'; ?>" <?php if ( get_theme_mod( 'sticky_header_scaling' ) ) echo 'data-scale-logo="true"' ?> >

			<div class="bubble-container">

					<?php if ( function_exists( 'bubble_premium_setup' ) && is_active_sidebar( 'sidebar-bubble-header' ) ) : ?>
						<?php $bubble_header_sidebars = wp_get_sidebars_widgets(); ?>
						<div class="widgets widgets-<?php echo count( $bubble_header_sidebars['sidebar-bubble-header'] ) ?>" aria-label="<?php esc_attr_e( 'Header Widgets', 'bubble' ); ?>">
							<?php dynamic_sidebar( 'sidebar-bubble-header' ); ?>
						</div>
					<?php else : ?>

					<div class="site-header-inner">

						<div class="site-branding">
							<?php bubble_display_logo(); ?>
						</div><!-- .site-branding -->

						<nav id="site-navigation" class="main-navigation">

							<?php if ( bubble_page_setting( 'layout' ) !== 'stripped' ) : ?>

								<?php $mega_menu_active = function_exists( 'ubermenu' ) || function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'menu-1' ); ?>

								<?php if ( get_theme_mod( 'mobile_menu', true ) && ! $mega_menu_active ) : ?>
									<a href="#menu" id="mobile-menu-button">
										<?php bubble_display_icon( 'menu' ); ?>
										<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'bubble' ); ?></span>
									</a>
								<?php endif; ?>
							
								<?php if ( get_theme_mod( 'header_menu', true ) ) : ?>

									<?php do_action( 'bubble_menu_before' ); ?>

									<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

									<?php do_action( 'bubble_menu_after' ); ?>
								
								<?php endif; ?>

								<?php if ( function_exists( 'is_woocommerce' ) && get_theme_mod( 'mini_cart', false ) && ! $mega_menu_active ) bubble_mini_cart(); ?>

								<?php if ( get_theme_mod( 'menu_search', true ) && ! $mega_menu_active ) : ?>
									<button class="search-icon">
										<label class="screen-reader-text"><?php esc_html_e( 'Open search bar', 'bubble' ); ?></label>
										<?php bubble_display_icon( 'search' ); ?>
									</button>
								<?php endif; ?>

							<?php endif; ?>

							<?php if ( bubble_page_setting( 'layout' ) == 'stripped' ) : ?>
								<ul>
									<li>
										<a href="" class="stripped-backlink" onclick="window.history.go( -1 ); return false;">
											<?php esc_html_e( 'Go back', 'bubble' ); ?>
										</a>
									</li>
								</ul>
							<?php endif; ?>

						</nav><!-- #site-navigation -->

						<?php if ( get_theme_mod( 'menu_search', true ) ) : ?>
							<div id="header-search">
								<div class="bubble-container">
									<label for='s' class='screen-reader-text'><?php esc_html_e( 'Search for:', 'bubble' ); ?></label>
									<?php get_search_form(); ?>
									<a id="close-search">
										<span class="screen-reader-text"><?php esc_html_e( 'Close search bar', 'bubble' ); ?></span>
										<?php bubble_display_icon( 'close' ); ?>
									</a>
								</div>
							</div><!-- #header-search -->
						<?php endif; ?>

					</div><!-- .site-header-inner -->

				<?php endif; // is_active_sidebar ?>
		
			</div><!-- .bubble-container -->
		
		</header><!-- #masthead -->

		<?php do_action( 'bubble_content_before' ); ?>

		<div id="content" class="site-content">

			<div class="bubble-container">

				<?php do_action( 'bubble_content_top' ); ?>
