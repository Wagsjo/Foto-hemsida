<?php
	global $post;
	if( isset( $args['option'] ) && $args['option'] == true ){
		$post_id = 'option';
	} else {
		$post_id = $post->ID;
	}
?>

<?php 
  $column_custom_id = get_sub_field('column_custom_id');
  $column_clickable = get_sub_field('column_clickable');
  if ( $column_clickable ) {
		$column_link = get_sub_field('column_link', $post_id);
	}
?>
    
<?php 
  // Check if column contains buttons, if so it never adds clickable wrapper 
?>
<?php if ( have_rows( 'block' ) ): ?>
  <?php while ( have_rows( 'block' ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'buttonrow' ) { $column_clickable = false; } ?>
  <?php endwhile; ?>
<?php endif; ?>


<?php 
  // Clickable wrapper
?>
<?php if ( $column_clickable ) { ?> <a <?php bb_column_link_classes($post_id); ?> <?php bb_column_link_style($post_id); ?> href="<?= $column_link ?>"> <?php } ?>

  <?php 
    // Column div
  ?>  
  <div <? bb_column_classes($post_id); ?>	<? bb_column_style($post_id); ?> <?= $column_custom_id ? "id='$column_custom_id'" : '' ?>>

    <?php locate_template( array( 'includes/acf-sections/blocks.php' ), true, false ); ?>

  </div>

<?php if ( $column_clickable ) { ?> </a> <?php } ?>