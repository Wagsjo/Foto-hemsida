<form action="<?php echo site_url(); ?>" class="search-form" method="get">
	<label for="s" class="screen-reader-text"><?php _e( 'Search for:', 'backbone' ); ?></label>
	<input type="search" class="search-input" name="s" value="<?php echo esc_attr( get_query_var( 's' ) ); ?>" />
	<button type="submit" class="search-submit">a</button>
</form>
