<?php
/**
 * Banner
 *
 */
if ( ! function_exists( 'banner_shortcode' ) ) {

	function banner_shortcode( $atts, $content = null, $shortcodename = '' ) {
		extract( shortcode_atts(
			array(
				'img'          => '',
				'banner_link'  => '',
				'title'        => '',
				'text'         => '',
				'btn_text'     => '',
				'target'       => '',
				'custom_class' => ''
		), $atts ) );

		// Get the URL to the content area.
		$content_url = untrailingslashit( content_url() );

		// Find latest '/' in content URL.
		$last_slash_pos = strrpos( $content_url, '/' );

		// 'wp-content' or something else.
		$content_dir_name = substr( $content_url, $last_slash_pos - strlen( $content_url ) + 1 );

		$pos = strpos( $img, $content_dir_name );

		if ( false !== $pos ) {

			$img_new = substr( $img, $pos + strlen( $content_dir_name ), strlen( $img ) - $pos );
			$img     = $content_url . $img_new;

		}

		$output =  '<div class="banner-wrap ' . esc_attr( $custom_class ) . '">';
		if ( $img != "" ) {
			$output .= '<div class="featured-thumbnail">';
			if ( $banner_link != "" ) {
				$output .= '<a href="' . esc_url( $banner_link ) . '" title="' . esc_attr( $title ) . '"><img src="' . esc_url( $img ) . '" title="' . esc_attr( $title ) . '" alt="" /></a>';
			} else {
				$output .= '<img src="' . esc_url( $img ) . '" title="' . esc_attr( $title ) . '" alt="" />';
			}
			$output .= '</div>';
		}
		if ( $title != "" ) {
			$output .= '<h5>';
			$output .= $title;
			$output .= '</h5>';
		}
		if ( $text != "" ) {
			$output .= '<p>';
			$output .= $text;
			$output .= '</p>';
		}
		if ( $btn_text != "" ) {
			$output .=  '<div class="link-align banner-btn"><a href="' . esc_url( $banner_link ) . '" title="' . esc_attr( $btn_text ) . '" class="btn btn-link" target="' . esc_attr( $target ) . '">';
			$output .= $btn_text;
			$output .= '</a></div>';
		}
		$output .= '</div><!-- .banner-wrap (end) -->';

		$output = apply_filters( 'theme_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('banner', 'banner_shortcode');

} ?>