<?php 
if ( ! function_exists( 'wright_market_solutions_support' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */

	function wright_market_solutions_support() {
		load_theme_textdomain( 'wright-market-solutions', get_template_directory() . '/languages' );
		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for post thumbnails
		add_theme_support( 'post-thumbnails' );

	}

endif;
add_action( 'after_setup_theme', 'wright_market_solutions_support' );

if ( ! function_exists( 'wright_market_solutions_enqueue_scripts_and_styles' ) ) :
	/**
	 * Enqueue styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function wright_market_solutions_enqueue_scripts_and_styles() {
		$min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
		$version = wp_get_theme()->get('version');
		$template_dir = get_template_directory_uri();
		$template_assets_dir = $template_dir . '/assets';

		// Styles
		$styles = array(
			'wright-market-solutions-style'         => array(get_stylesheet_uri(), array(), $version),
			'wright-market-solutions-custom-css'    => array($template_assets_dir . '/css/custom.css', array(), $version),
			'wright-market-solutions-fontawesome'   => array($template_assets_dir . '/css/font-awesome/css/all.css', array(), "5.15.3"),
			'wright-market-solutions-animate'       => array($template_assets_dir . '/css/animate' . $min . '.css', array(), '3.7.0'),
			'wright-market-solutions-bootstrap'       => array('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2')
		);

		// Scripts
		$scripts = array(
			'wright-market-solutions-typed'  => array($template_assets_dir . '/js/typed.min.js', array('jquery'), '2.0.9', true),
			'wright-market-solutions-custom'  => array($template_assets_dir . '/js/custom.js', array('jquery'), '1.0.0', true),
			'wright-market-solutions-wow-js'        => array($template_assets_dir . '/js/wow' . $min . '.js', array(), '1.1.2', true),
		);

		// Enqueue Styles
		foreach ($styles as $handle => $data) {
			list($src, $deps, $ver) = $data;
			wp_enqueue_style($handle, $src, $deps, $ver);
		}

		// Enqueue Scripts
		foreach ($scripts as $handle => $data) {
			list($src, $deps, $ver, $in_footer) = $data;
			wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
		}
	}

endif;

add_action('wp_enqueue_scripts', 'wright_market_solutions_enqueue_scripts_and_styles');


/* PreLoader */

add_action( 'wp_body_open', 'wright_market_solutions_preloader' );

/**
 * Adds the Preloader
 *
 * @since  1.0
 *
 * @package Wright Market Solutions WordPress Theme
 */
 function wright_market_solutions_preloader() {

 	?>
 	<div id="loader-wrapper">
 		<div id="loader"></div>
 	</div>
 	<?php
 }



function enqueue_dashicons() {
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'enqueue_dashicons');


require get_theme_file_path( '/inc/tgm-plugin/tgmpa-hook.php' );


