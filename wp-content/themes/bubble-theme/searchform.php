<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<label for='s' class='screen-reader-text'><?php esc_html_e( 'Search for:', 'bubble' ); ?></label>
	<input type="search" name="s" placeholder="<?php esc_attr_e( 'Search', 'bubble') ?>" value="<?php echo get_search_query(); ?>" />
	<button type="submit">
		<label class="screen-reader-text"><?php esc_html_e( 'Search', 'bubble' ); ?></label>
		<?php bubble_display_icon( 'search' ); ?>
	</button>
</form>
