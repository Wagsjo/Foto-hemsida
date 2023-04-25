<?php

function bb_column_classes($post_id){
	$classes = [
		"bb-column",
		"width-" . get_sub_field('column_width', $post_id),
		"width-mobile-" . get_sub_field('column_width_mobile', $post_id),
		"padding-" . get_sub_field('column_padding', $post_id),
		"padding-mobile-" .get_sub_field('column_padding_mobile', $post_id),
		"align-" . get_sub_field('column_content_vertical', $post_id),
		"align-mobile-" . get_sub_field('column_content_vertical_mobile', $post_id),
		"justify-" . get_sub_field('column_content_horizontal', $post_id),
		"justify-mobile-" . get_sub_field('column_content_horizontal_mobile', $post_id),
	];

	if( get_sub_field('column_hide', $post_id) ){
		$classes[] = "column-hide";
	}
	if( get_sub_field('column_hide_mobile', $post_id) ){
		$classes[] = "column-hide-mobile";
	}

	echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
}

function bb_column_style($post_id){

	$background_color = get_sub_field('column_background_color', $post_id);
	$font_color = get_sub_field('column_font_color', $post_id);
	$column_background_image = get_sub_field('column_background_image', $post_id);
	$column_min_height_boolean = get_sub_field('column_min_height_boolean', $post_id);
	$column_content_vertical =get_sub_field('column_content_vertical', $post_id);
	if ( $column_min_height_boolean ) {
	  $column_min_height = get_sub_field('column_min_height', $post_id);
	}

	$style = [
		"background-color: $background_color;",
		"color: $font_color;",
	];

	if( $column_background_image ){
		$style[] = "background-image: url('$column_background_image');";
	}
	if( $column_min_height_boolean ){
		$style[] = "min-height: $column_min_height" . "px;";
		$style[] = "display: flex;";
		$style[] = "align-items: $column_content_vertical;";
	}

	echo 'style="' . esc_attr( implode( ' ', $style ) ) . '"';
}

function bb_column_link_classes($post_id){
	$classes = [
		"bb-column",
		"width-" . get_sub_field('column_width', $post_id),
		"width-mobile-" . get_sub_field('column_width_mobile', $post_id),
	];

	echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
}

function bb_column_link_style($post_id){

	$column_min_height_boolean = get_sub_field('column_min_height_boolean', $post_id);
	$column_min_height = get_sub_field('column_min_height', $post_id);

	$style = [];

	if( $column_min_height_boolean ){
		$style[] = "min-height: $column_min_height" . "px;";
	}

	echo 'style="' . esc_attr( implode( ' ', $style ) ) . '"';
}

?>
