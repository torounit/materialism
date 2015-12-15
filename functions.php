<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package materialism
 */

if ( ! function_exists( 'materialism_setup' ) ) :

	function materialism_setup() {

		load_theme_textdomain( 'materialism', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'materialism' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		add_theme_support( 'custom-background', apply_filters( 'materialism_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );


	}
endif;
add_action( 'after_setup_theme', 'materialism_setup' );


add_filter( 'nav_menu_link_attributes', 'materialism_nav_menu_link_class', 10, 3 );

function materialism_nav_menu_link_class( $atts, $item, $args ) {
	if( ! empty( $args->link_class ) ) {
		$atts[ 'class' ] = $args->link_class;
	}

	return $atts;
}

/**
 * @global int $content_width
 */
function materialism_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'materialism_content_width', 640 );
}

add_action( 'after_setup_theme', 'materialism_content_width', 0 );

/**
 * Register widget area.
 */
function materialism_widgets_init() {
}

add_action( 'widgets_init', 'materialism_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialism_scripts() {

	wp_enqueue_style( 'materialism-style', get_stylesheet_uri(), array( 'material-design-lite-style' ) );
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium' );
	wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
	wp_enqueue_style( 'material-design-lite-style', 'https://storage.googleapis.com/code.getmdl.io/1.0.6/material.grey-blue.min.css', array( 'material-icons' ), '1.0.6' );
	wp_enqueue_script( 'material-design-lite-script', 'https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js', array( 'jquery' ), '1.0.6', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'materialism_scripts' );

