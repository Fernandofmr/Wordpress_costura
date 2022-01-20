<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bubble
 * @license GPL 2.0 
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) return;
if ( bubble_page_setting( 'layout' ) != 'default' ) return;
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-main' ); ?>
</aside><!-- #secondary -->
