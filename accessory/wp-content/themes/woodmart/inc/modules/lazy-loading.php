<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );
}

/*==============================================
=            Lazy loading functions            =
==============================================*/


// **********************************************************************//
// Init lazy loading
// **********************************************************************// 
if( ! function_exists( 'woodmart_lazy_loading_init' ) ) {
	function woodmart_lazy_loading_init( $force_init = false ) {
		if ( ( ( ! woodmart_get_opt( 'lazy_loading' ) || is_admin() ) && ! $force_init ) ) {
			return;
		}

		// Used for product categories images for example.
		add_filter('woodmart_attachment', 'woodmart_lazy_attachment_replace', 10, 3);

		// Used for avatar images.
		add_filter( 'get_avatar', 'woodmart_lazy_avatar_image', 10 );

		// Used for instagram images.
		add_filter('woodmart_image', 'woodmart_lazy_image_standard', 10, 1);

		// Images generated by WPBakery functions
		add_filter('vc_wpb_getimagesize', 'woodmart_lazy_image', 10, 3);

		// Products, blog, a lot of other standard wordpress images
		add_filter('wp_get_attachment_image_attributes', 'woodmart_lazy_attributes', 10, 3);

		// Elementor.
		add_filter( 'elementor/image_size/get_attachment_image_html', 'woodmart_filter_elementor_images', 10, 4 );
	}

	add_action( 'init', 'woodmart_lazy_loading_init', 120 );
}

if ( ! function_exists( 'woodmart_filter_elementor_images' ) ) {
	/**
	 * Filters HTML <img> tag and adds lazy loading attributes. Used for elementor images.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html           Image html.
	 * @param array  $settings       Control settings.
	 * @param string $image_size_key Optional. Settings key for image size.
	 * @param string $image_key      Optional. Settings key for image..
	 *
	 * @return string|string[]|null
	 */
	function woodmart_filter_elementor_images( $html, $settings, $image_size_key, $image_key ) {
		if ( preg_match( "/src=['\"]data:image/is", $html ) ) {
			return $html;
		}

		$image         = $settings[ $image_key ];
		$image_sizes   = get_intermediate_image_sizes();
		$image_sizes[] = 'full';
		$size          = $settings[ $image_size_key . '_size' ];

		if ( $image['id'] && in_array( $size, $image_sizes ) ) { // phpcs:ignore
			return $html;
		}

		if ( $image['id'] ) {
			$lazy_image = woodmart_get_attachment_placeholder( $image['id'], $size );
		} else {
			$lazy_image = woodmart_lazy_get_default_preview();
		}

		woodmart_enqueue_js_script( 'lazy-loading' );

		return woodmart_lazy_replace_image( $html, $lazy_image );
	}
}

if( ! function_exists( 'woodmart_lazy_loading_rss_deinit' ) ) {
	function woodmart_lazy_loading_rss_deinit() {
		if ( is_feed() ) {
			woodmart_lazy_loading_deinit(true);
		}
	}

	add_action( 'wp', 'woodmart_lazy_loading_rss_deinit', 10 );
}

if ( ! function_exists( 'woodmart_lazy_loading_deinit' ) ) {
	function woodmart_lazy_loading_deinit( $force_deinit = false ) {
		if ( woodmart_get_opt( 'lazy_loading' ) && ! $force_deinit ) {
			return;
		}

		remove_action( 'woodmart_attachment', 'woodmart_lazy_attachment_replace', 10 );
		remove_action( 'get_avatar', 'woodmart_lazy_avatar_image', 10 );
		remove_action( 'woodmart_image', 'woodmart_lazy_image_standard', 10 );
		remove_action( 'vc_wpb_getimagesize', 'woodmart_lazy_image', 10 );
		remove_action( 'wp_get_attachment_image_attributes', 'woodmart_lazy_attributes', 10 );
		remove_action( 'elementor/image_size/get_attachment_image_html', 'woodmart_filter_elementor_images', 10 );
	}
}

/**
 * Fix Woocommerce email with lazy load
 */

if ( ! function_exists( 'woodmart_stop_lazy_loading_before_order_table' ) ) {
	function woodmart_stop_lazy_loading_before_order_table() {
		woodmart_lazy_loading_deinit( true );
	}

	add_action( 'woocommerce_email_before_order_table', 'woodmart_stop_lazy_loading_before_order_table', 20 );
	add_action( 'woocommerce_email_header', 'woodmart_stop_lazy_loading_before_order_table', 20 );
}

if ( ! function_exists( 'woodmart_start_lazy_loading_before_order_table' ) ) {
	function woodmart_start_lazy_loading_before_order_table() {
		woodmart_lazy_loading_init( true );
	}

	add_action( 'woocommerce_email_after_order_table', 'woodmart_start_lazy_loading_before_order_table', 20 );
	add_action( 'woocommerce_email_footer', 'woodmart_start_lazy_loading_before_order_table', 20 );
}

// **********************************************************************// 
// Filters HTML <img> tag and adds lazy loading attributes. Used for avatar images.
// **********************************************************************// 
if ( ! function_exists( 'woodmart_lazy_avatar_image' ) ) {
	function woodmart_lazy_avatar_image( $html ) {

		if ( preg_match( "/src=['\"]data:image/is", $html ) ) return $html;

		$uploaded = woodmart_get_opt( 'lazy_custom_placeholder' );

		if ( isset( $uploaded['url'] ) && $uploaded['url'] ) {
			$lazy_image = $uploaded['url'];
		} else {
			$lazy_image = woodmart_lazy_get_default_preview();
		}

		woodmart_enqueue_js_script( 'lazy-loading' );

		return woodmart_lazy_replace_image( $html, $lazy_image );
	}
}

// **********************************************************************// 
// Filters HTML <img> tag and adds lazy loading attributes. Used for product categories images for example.
// **********************************************************************// 
if( ! function_exists( 'woodmart_lazy_attachment_replace' ) ) {
	function woodmart_lazy_attachment_replace( $imgHTML, $attach_id, $size ) {

		if ( preg_match( "/src=['\"]data:image/is", $imgHTML ) ) return $imgHTML;

		if( $attach_id ) {
			$lazy_image = woodmart_get_attachment_placeholder( $attach_id, $size );
		} else {
			$lazy_image = woodmart_lazy_get_default_preview();
		}

		woodmart_enqueue_js_script( 'lazy-loading' );

		return  woodmart_lazy_replace_image( $imgHTML, $lazy_image );
	}
}


// **********************************************************************//
// Filters HTML <img> tag and adds lazy loading attributes. Used for instagram images.
// **********************************************************************// 
if( ! function_exists( 'woodmart_lazy_image_standard' ) ) {
	function woodmart_lazy_image_standard( $html ) {

		if ( preg_match( "/src=['\"]data:image/is", $html ) ) return $html;

		$lazy_image = woodmart_lazy_get_default_preview();

		woodmart_enqueue_js_script( 'lazy-loading' );

		return woodmart_lazy_replace_image( $html, $lazy_image );
	}

}


// **********************************************************************//
// Get default preview image.
// **********************************************************************// 
if( ! function_exists( 'woodmart_lazy_get_default_preview' ) ) {
	function woodmart_lazy_get_default_preview() {
		return WOODMART_IMAGES . '/lazy.png';
	}
}


// **********************************************************************//
// Filters WPBakery generated image. Needs an HTML, its ID, and params with image size.
// **********************************************************************// 
if( ! function_exists( 'woodmart_lazy_image' ) ) {
	function woodmart_lazy_image( $img, $attach_id, $params ) {

		$thumb_size = woodmart_get_image_size( $params['thumb_size'] );

		$imgHTML = $img['thumbnail'];

		if ( preg_match( "/src=['\"]data:image|wd-lazy-load/is", $imgHTML ) ) return $img;

		$lazy_image = woodmart_get_attachment_placeholder( $attach_id, $thumb_size );

		$img['thumbnail'] = woodmart_lazy_replace_image( $imgHTML, $lazy_image );

		woodmart_enqueue_js_script( 'lazy-loading' );

		return $img;
	}
}


// **********************************************************************//
// Filters <img> tag passed as an argument.
// **********************************************************************// 
if( ! function_exists( 'woodmart_lazy_replace_image' ) ) {
	function woodmart_lazy_replace_image( $html, $src ) {

		$class = woodmart_lazy_css_class();

		$new = preg_replace( '/<img(.*?)src=/is', '<img$1src="'.$src.'" data-wood-src=', $html );
		$new = preg_replace( '/<img(.*?)srcset=/is', '<img$1srcset="" data-srcset=', $new );


		if ( preg_match( '/class=["\']/i', $new ) ) {
			$new = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1' . $class . ' $2$1', $new );
		} else {
			$new = preg_replace( '/<img/is', '<img class="' . $class . '"', $new );
		}

		return $new;
	}
}


// **********************************************************************//
// Filters default WordPress images ATTRIBUTES array called by core API functions.
// **********************************************************************// 
if( ! function_exists( 'woodmart_lazy_attributes' ) ) {
	function woodmart_lazy_attributes($attr, $attachment, $size) {

		$attr['data-wood-src'] = $attr['src'];
		if( isset( $attr['srcset'] ) ) $attr['data-srcset'] = $attr['srcset'];

		if ( is_object( $attachment ) ) {
			$attr['src'] = woodmart_get_attachment_placeholder( $attachment->ID, $size );
		}

		$attr['srcset'] = '';

		$attr['class'] = $attr['class'] . ' ' . woodmart_lazy_css_class();

		woodmart_enqueue_js_script( 'lazy-loading' );

		return $attr;
	}
}


// **********************************************************************//
// Get lazy loading image CSS class
// **********************************************************************// 
if( ! function_exists( 'woodmart_lazy_css_class' ) ) {
	function woodmart_lazy_css_class() {
		$class = 'wd-lazy-load';
		$class .= woodmart_get_old_classes( ' woodmart-lazy-load' );

		$class .= ' wd-lazy-' . woodmart_get_opt( 'lazy_effect' );

		return $class;
	}
}


// **********************************************************************//
// Get placeholder image. Needs ID to genereate a blurred preview and size.
// **********************************************************************// 
if( ! function_exists( 'woodmart_get_attachment_placeholder' ) ) {
	function woodmart_get_attachment_placeholder( $id, $size ) {

		// Get size from array
		if( is_array( $size) ) {
			$width = $size[0];
			$height = $size[1];
		} else {
			// Take it from the original image
			$image = wp_get_attachment_image_src($id, $size);
			$width = $image[1];
			$height = $image[2];
		}

		if ( ! $height ) {
			$height = $width;
		}

		$placeholder_size = woodmart_get_placeholder_size( $width, $height );

		$uploaded = woodmart_get_opt('lazy_custom_placeholder');

		if( woodmart_get_opt( 'lazy_generate_previews' ) && function_exists( 'vc_get_image_by_size' ) ) {
			$img = vc_get_image_by_size( $id, $placeholder_size );
		} else if( ! empty( $uploaded ) && is_array( $uploaded ) && ! empty( $uploaded['url'] ) && ! empty( $uploaded['id'] ) ) {
			$img = $uploaded['url'];
			if( woodmart_get_opt( 'lazy_proprtion_size' ) && function_exists( 'vc_get_image_by_size' ) ) {
				$img = vc_get_image_by_size( $uploaded['id'], $width . 'x' . $height );
			}
		} else {
			return woodmart_lazy_get_default_preview();
		}

		if( woodmart_get_opt( 'lazy_base_64' ) ) $img = woodmart_encode_image($id, $img);

		return $img;
	}
}

// **********************************************************************//
// Encode small preview image to BASE 64
// **********************************************************************// 
if( ! function_exists( 'woodmart_encode_image' ) ) {
	function woodmart_encode_image( $id, $url ) {

		if( ! wp_attachment_is_image( $id ) || preg_match('/^data\:image/', $url ) ) return $url;

		$meta_key = '_base64_image.' . md5($url);

		$img_url = get_post_meta( $id, $meta_key, true );

		if( $img_url ) return $img_url;

		$image_path = preg_replace('/^.*?wp-content\/uploads\//i', '', $url);

		if( ( $uploads = wp_get_upload_dir() ) && ( false === $uploads['error'] ) && ( 0 !== strpos( $image_path, $uploads['basedir'] ) ) ) {
			if( false !== strpos( $image_path, 'wp-content/uploads' ) )
				$image_path = trailingslashit( $uploads['basedir'] . '/' . _wp_get_attachment_relative_path( $image_path ) ) . basename( $image_path );
			else
				$image_path = $uploads['basedir'] . '/' . $image_path;
		}

		$max_size = 150 * 1024; // MB

		if( file_exists( $image_path ) && ( ! $max_size || ( filesize( $image_path ) <= $max_size ) ) ) {
			$filetype = wp_check_filetype( $image_path );

			// Read image path, convert to base64 encoding
			if ( function_exists( 'woodmart_compress' ) && function_exists( 'woodmart_get_file' ) ) {
				$imageData = woodmart_compress( woodmart_get_file( $image_path ) );
			} else {
				$imageData = '';
			}

			// Format the image SRC:  data:{mime};base64,{data};
			$img_url = 'data:image/' . $filetype['ext'] . ';base64,' . $imageData;

			update_post_meta( $id, $meta_key, $img_url );

			return $img_url;
		}

		return $url;
	}
}


// **********************************************************************// 
// Generate placeholder preview small size.
// **********************************************************************// 
if( ! function_exists( 'woodmart_get_placeholder_size' ) ) {
	function woodmart_get_placeholder_size( $x0, $y0 ) {

		$x = $y = 10;

		if( $x0 < $y0) {
			$y = ($x * $y0) / $x0;
		}

		if( $x0 > $y0) {
			$x = ($y * $x0) / $y0;
		}

		$x = ceil( $x );
		$y = ceil( $y );

		return (int) $x . 'x' . (int) $y;
	}
}

/*=====  End of Lazy loading functions  ======*/
