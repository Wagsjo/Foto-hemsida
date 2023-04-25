<?php
add_action( 'bb_before_section', 'section_wrap_start' );
function section_wrap_start($post_id){

	$section_width = get_sub_field('section_width', $post_id);
	$section_content_width = get_sub_field('section_content_width', $post_id);
 	$background_color = get_sub_field('section_background_color', $post_id);

	if( $section_width == 'fullwidth' ){
		echo "<section class='content-container' style='background-color: $background_color;'>";
	} else {
		echo "<section class='content-container'>";
	}

	if( $section_content_width != 'fullwidth' ){
		echo "<div class='content-inner-container'>";
		echo "<div class='content-wrapper'>";
  	}
}

add_action( 'bb_after_section', 'section_wrap_end' );
function section_wrap_end( $post_id ){
	global $post;
	$section_width = get_sub_field('section_width', $post_id);

	if( $section_width != 'fullwidth' ){
		echo "</div>";
		echo "</div>";
	}
	echo "</section>";
}

function bb_section_classes($post_id){
	$classes = [
		"bb-section",
		"gap-" . get_sub_field('column_gap', $post_id),
		"gap-mobile-" . get_sub_field('column_gap_mobile', $post_id),
		"pt-" . get_sub_field('section_padding_top', $post_id),
		"pb-" .get_sub_field('section_padding_bottom', $post_id),
		"pt-mobile" . get_sub_field('section_padding_top_mobile', $post_id),
		"pb-mobile" . get_sub_field('section_padding_bottom_mobile', $post_id),
	];

	if( get_sub_field('section_hide', $post_id) ){
		$classes[] = "section-hide";
	}
	if( get_sub_field('section_hide_mobile', $post_id) ){
		$classes[] = "mobile-section-hide";
	}
	if( get_sub_field('section_reverse_column_order', $post_id) ){
		$classes[] = "col-reverse";
	}

	echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
}

function bb_section_style($post_id){

	$background_color = get_sub_field('section_background_color', $post_id);
	$font_color = get_sub_field('section_font_color', $post_id);
	$section_background_image = get_sub_field('section_background_image', $post_id);
	$section_min_height_boolean = get_sub_field('section_min_height_boolean', $post_id);
	if ( $section_min_height_boolean ) {
	  $section_min_height = get_sub_field('section_min_height', $post_id);
	  $section_content_vertical = get_sub_field('section_content_vertical', $post_id);
	}

	// $section_min_height_boolean_mobile = get_sub_field('section_min_height_boolean_mobile', $post_id);
	// if ( $section_min_height_boolean_mobile ) {
	//   $section_min_height_mobile = get_sub_field('section_min_height_mobile', $post_id);
	//   $section_content_vertical_mobile = get_sub_field('section_content_vertical_mobile', $post_id);
	// }

	$style = [
		"background-color: $background_color;",
		"color: $font_color;",
	];

	if( $section_background_image ){
		$style[] = "background-image: url('$section_background_image');";
	}
	if( $section_min_height_boolean ){
		$style[] = "min-height: $section_min_height" . "px;";
		$style[] = "display: flex;";
		$style[] = "align-items: $section_content_vertical;";
	}

	echo 'style="' . esc_attr( implode( ' ', $style ) ) . '"';
}
