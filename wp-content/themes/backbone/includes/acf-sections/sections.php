<?php
	global $post;
	if( isset( $args['option'] ) && $args['option'] == true ){
		$post_id = 'option';
		$option = true;
	} else {
		$post_id = $post->ID;
		$option = false;
	}
	
?>

<?php if( have_rows( 'sections', $post_id ) ): ?>
  <?php while ( have_rows( 'sections', $post_id ) ) : the_row(); ?>

	<?php
		$section_custom_id = get_sub_field('section_custom_id');
		$section_width_mobile = get_sub_field('section_width_mobile');
	?>

	<?php
		// Wrapping divs for section
	 	do_action( 'bb_before_section', $post_id );
	?>

	<?php
		// Section div
	?>
	<div <? bb_section_classes($post_id); ?>	<? bb_section_style($post_id); ?> <?= $section_custom_id ? "id='$section_custom_id'" : '' ?>>

		<?php if( have_rows( 'columns', $post_id ) ): ?>
		 <?php while ( have_rows( 'columns', $post_id ) ) : the_row(); ?>

		   <?php
		   locate_template(
		     array( 'includes/acf-sections/columns.php' ),
		     true,
		     false,
			  ['option'=>$option]
		   );
		   ?>

		 <?php endwhile; ?>
		<?php endif; ?>

	</div>

	<?php
		// Closing wrapping divs for section
		do_action( 'bb_after_section', $post_id );
	?>

  <?php endwhile; ?>
<?php endif; ?>
