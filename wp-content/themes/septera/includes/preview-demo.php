<?php
/**
 * Add random images to demo preview
 *
 * @package Septera
 */

 /**
  * Returns the URL to a random image
  */
function septera_get_preview_demo_img_src( $i = 0 ) {

	if ( 10 == $i ) {
		return '';
	}

    $location = '/resources/images/preview/';
	$path = get_template_directory() . $location ;

	// Build or re-build the global demo img array
	if ( ! isset( $GLOBALS['preview_demo_img'] ) || empty( $GLOBALS['preview_demo_img'] ) ) {
		$imgs = array();
		$candidates = array();

		if ( is_dir( $path ) ) {
			$imgs = scandir( $path );
		}

		if ( ! $imgs || empty( $imgs ) ) {
			return array();
		}

		foreach ( $imgs as $img ) {
			if ( '.' === $img[0] || is_dir( $path . $img ) ) {
				continue;
			}
			$candidates[] = $img;
		}
		$GLOBALS['preview_demo_img'] = $candidates;
	}

	$candidates = $GLOBALS['preview_demo_img'];
	// get a random image name
	$rand_key = array_rand( $candidates );
	$img_name = $candidates[ $rand_key ];

	// if file does not exist, reset the global and recursively call it again
	if ( ! file_exists( $path . $img_name ) ) {
		unset( $GLOBALS['preview_demo_img'] );
		$i++;
		return septera_get_preview_demo_img_src( $i );
	}

	// unset all sizes of the img found and update the global
	$new_candidates = $candidates;
	foreach ( $candidates as $_key => $_img ) {
		if ( substr( $_img , 0, strlen( "{$img_name}" ) ) === "{$img_name}" ) {
			unset( $new_candidates[ $_key ] );
		}
	}
	$GLOBALS['preview_demo_img'] = $new_candidates;
	return get_template_directory_uri() . $location . $img_name;
}

/**
 * Filter thumbnail image
 *
 * @param string $input Post thumbnail.
 */
function septera_the_post_thumbnail( $input ) {
	if ( empty( $input ) ) {
		$placeholder = septera_get_preview_demo_img_src();
		return $placeholder;
	}
	return $input;
}

if ( septera_ispreview_demo() ) { add_filter( 'septera_preview_img_src', 'septera_the_post_thumbnail' ); }

function septera_ispreview_demo() {
	$big_theme = wp_get_theme();
	$theme_name = $big_theme ->get( 'TextDomain' );
	$active_theme = septera_get_raw_option( 'template' );
	//return apply_filters( 'septera_ispreview_demo', ( $active_theme != strtolower( $theme_name ) && ! is_child_theme() ) );
    return true;
}

/**
 * All options or a single option val
 *
 * @param string $opt_name Option name.
 *
 * @return bool|mixed
 */
function septera_get_raw_option( $opt_name ) {
	$alloptions = wp_cache_get( 'alloptions', 'options' );
	$alloptions = maybe_unserialize( $alloptions );
	return isset( $alloptions[ $opt_name ] ) ? maybe_unserialize( $alloptions[ $opt_name ] ) : false;
}

/* FIN */
