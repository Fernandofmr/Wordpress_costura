<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bubble
 * @license GPL 2.0 
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	if ( is_single() && has_post_thumbnail() && get_theme_mod( 'post_featured_image', true ) ) : ?>
		<div class="entry-thumbnail">
			<?php if ( get_theme_mod( 'post_categories', true ) ) bubble_entry_thumbnail_meta(); ?>
			<?php the_post_thumbnail(); ?>
		</div>
	<?php elseif ( ! is_single() && has_post_thumbnail() && get_theme_mod( 'archive_featured_image', true ) ) : ?>
		<div class="entry-thumbnail">
			<?php if ( get_theme_mod( 'post_categories', true ) ) bubble_entry_thumbnail_meta(); ?>
			<a href="<?php the_permalink(); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Open post', 'bubble' ); ?></span>
				<span class="overlay"></span>
				<span class="icon-add">
					<?php bubble_display_icon( 'add' ); ?>
				</span>
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>

		<?php 
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php bubble_post_meta(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->	

	<div class="entry-content">
		<?php
			if ( is_single() || get_theme_mod( 'archive_post_content' ) == 'full' ) {
				the_content();
			} else {
				bubble_excerpt();
			}
		
			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bubble' ) . '</span>',
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<?php bubble_entry_footer(); ?>
</article><!-- #post-## -->
