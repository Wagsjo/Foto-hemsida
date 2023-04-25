<div class="meta">
	<p class="publish-date">
		<?php _e('Published', 'sceleton'); ?> <time datetime="<?php echo date( DATE_W3C, strtotime(get_the_time()) ); ?>" pubdate><?php echo get_the_time(); ?></time>
	</p>
	<p class="categories">
		<?php echo get_the_category_list(', '); ?>
	</p>
	<?php if ( comments_open() ): ?>
		<p class="comment-links">
			<?php comments_popup_link( __('No Comments', 'sceleton'), __('1 Comment', 'sceleton'), __('% Comments', 'sceleton'), 'comments-link', ''); ?>
		</p>
	<?php endif; ?>
</div>
