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
			'default-color' => 'eeeeee',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-header', apply_filters( 'materialism_custom_header_args', array(
			'default-text-color' => '000000',
			'wp-head-callback'   => 'materialism_header_style',
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'materialism_setup' );

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

	wp_enqueue_style( 'materialism-style', get_stylesheet_uri() );
	wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium' );
	wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
	wp_enqueue_style( 'material-design-lite-style', 'https://storage.googleapis.com/code.getmdl.io/1.0.6/material.grey-amber.min.css', array(), '1.0.6' );
	wp_enqueue_script( 'material-design-lite-script', 'https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js', array( 'jquery' ), '1.0.6', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'materialism_scripts' );


if ( ! function_exists( 'materialism_header_style' ) ) :

	function materialism_header_style() {

		$header_text_color = get_header_textcolor();
		$header_image      = get_header_image();

		if ( HEADER_TEXTCOLOR === $header_text_color ) {
			return;
		}

		?>
		<style type="text/css">

			.materialism-header,
			.materialism-header a {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}

			.materialism-header {
				background-image: url(<?php echo esc_url( $header_image ); ?>);
				background-repeat: no-repeat;
				background-color: transparent;
				background-position: 50% 50%;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}

			<?php
			if ( ! display_header_text() ) :
			?>
			.materialism-header {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php else: ?>

			<?php endif; ?>
		</style>
		<?php
	}
endif; // materialism_header_style
