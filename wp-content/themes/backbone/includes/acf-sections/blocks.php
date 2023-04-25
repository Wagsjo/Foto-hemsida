<?php
if( have_rows( 'block' ) ):
	while ( have_rows( 'block' ) ) : the_row();

		/* Wysiwyg */
		if( get_row_layout() == 'wysiwyg' ):
			locate_template( array( 'includes/acf-sections/blocks/wysiwyg.php' ), true, false );

		/* Image */
		elseif( get_row_layout() == 'images' ):
			locate_template( array( 'includes/acf-sections/blocks/images.php' ), true, false );

		/* Image slider */
		elseif( get_row_layout() == 'image_slider' ):
			locate_template( array( 'includes/acf-sections/blocks/image_slider.php' ), true, false ); 

		/* Buttonrow */
		elseif( get_row_layout() == 'buttonrow' ):
			locate_template( array( 'includes/acf-sections/blocks/buttonrow.php' ), true, false );

		/* Textrow */
		elseif( get_row_layout() == 'textrow' ):
			locate_template( array( 'includes/acf-sections/blocks/textrow.php' ), true, false );

		/* Footer Nav Menu */
		elseif( get_row_layout() == 'nav_menu' ):
			locate_template( array( 'includes/acf-sections/blocks/nav_menu.php' ), true, false );

		/* Footer Display Posts */
		elseif( get_row_layout() == 'display_posts' ):
			locate_template( array( 'includes/acf-sections/blocks/display_posts.php' ), true, false );

		/* Footer Social Media */
		elseif( get_row_layout() == 'social_media' ):
			locate_template( array( 'includes/acf-sections/blocks/social_media.php' ), true, false );


		endif;
	endwhile;
endif;
