<?php
/**
 * Template part for displaying gallery format posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bubble
 * @license GPL 2.0 
 */

$content = bubble_strip_gallery( get_the_content() );
$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );

$post_class = ( is_singular() ) ? 'entry' : 'archive-entry';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

	<?php if ( bubble_get_gallery() ) : ?>
		<?php $gallery = bubble_get_gallery(); ?>
		<div class="flexslider gallery-format-slider">
			<ul class="slides">
				<?php foreach ( $gallery['src'] as $image ) : ?>
					<li class="gallery-format-slide">
						<img src="<?php echo $image; ?>">
					</li>
				<?php endforeach; ?>
			</ul>
			<ul class="flex-direction-nav">
				<li class="flex-nav-prev">
					<a class="flex-prev" href="#"><?php bubble_display_icon( 'left-arrow' ); ?></a>
				</li>
				<li class="flex-nav-next">
					<a class="flex-next" href="#"><?php bubble_display_icon( 'right-arrow' ); ?></a>
				</li>
			</ul>
		</div>
	<?php elseif ( has_post_thumbnail() && get_theme_mod( 'post_featured_image', true ) ) : ?>
		<div class="entry-thumbnail">
			<?php if ( is_singular() ) : ?>
				<?php the_post_thumbnail(); ?>
			<?php else : ?>
				<a href="<?php the_permalink() ?>">
					<?php the_post_thumbnail() ?>
				</a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>
		<div class="entry-meta">
			<?php bubble_post_meta(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_single() || get_theme_mod( 'archive_post_content' ) == 'full' ) {
			echo $content;
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
