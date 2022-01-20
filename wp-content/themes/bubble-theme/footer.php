<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bubble
 * @license GPL 2.0 
 */

$footer_widgets = is_active_sidebar( 'sidebar-footer' ) == true;
$footer_widgets_page_setting = bubble_page_setting( 'footer_widgets', true );

?>

		</div><!-- .bubble-container -->
	</div><!-- #content -->

	<?php do_action( 'bubble_footer_before' ); ?>

	<footer id="colophon" class="site-footer <?php if ( ! is_page() && $footer_widgets || is_page() && ( $footer_widgets && $footer_widgets_page_setting ) ) echo 'footer-active-sidebar'; if ( get_theme_mod( 'footer_layout' ) == 'full-width' ) echo ' full-width';  ?>">

		<?php do_action( 'bubble_footer_top' ); ?>

		<?php if ( $footer_widgets_page_setting ) : ?>
			<div class="bubble-container">
				<?php
					if ( is_active_sidebar( 'sidebar-footer' ) ) {
						$bubble_footer_sidebars = wp_get_sidebars_widgets();
						?>
						<div class="widgets widgets-<?php echo count( $bubble_footer_sidebars['sidebar-footer'] ) ?>" aria-label="<?php esc_attr_e( 'Footer Widgets', 'bubble' ); ?>">
							<?php dynamic_sidebar( 'sidebar-footer' ); ?>
						</div>
						<?php
					}
				?>
			</div><!-- .bubble-container -->
		<?php endif; ?>	

		<div class="bottom-bar">
			<div class="bubble-container">
				<div class="site-info text-center">
					<?php
					bubble_footer_text();

					$credit_text = apply_filters(
						'bubble_footer_credits',
						'<br><span>' . sprintf( esc_html__( 'Theme by %s', 'bubble' ), '<a href="https://bubblethemes.com/">Bubble</a>' ) . '</span>'
					);

					if ( function_exists( 'the_privacy_policy_link' ) && get_theme_mod( 'footer_privacy_policy_link', true ) ) {
						the_privacy_policy_link( '<span>', '</span>' );
					}

					if ( ! empty( $credit_text ) ) {
						echo wp_kses_post( $credit_text );
					}
					?>
				</div><!-- .site-info -->
				<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'container_class' => 'footer-menu', 'depth' => 1, 'fallback_cb' => '' ) ); ?>
			</div><!-- .bubble-container -->
		</div><!-- .bottom-bar -->

		<?php do_action( 'bubble_footer_bottom' ); ?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( get_theme_mod( 'scroll_to_top', true ) ) : ?>
	<div id="scroll-to-top">
		<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'bubble' ); ?></span>
		<?php bubble_display_icon( 'up-arrow' ); ?>
	</div>
<?php endif; ?>

<?php wp_footer(); ?>
<?php do_action( 'bubble_footer_after' ); ?>

<script  src="/wp-content/themes/little-bubble/js/functionsjs.js"></script>

</body>
</html>
