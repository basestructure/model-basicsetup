<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Basic SASS' );
define( 'CHILD_THEME_URL', 'http://www.smarterwebpackages.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2.0' );

// ROBOTO, ROBOTO CONDENSED & LATO

//* Enqueue Roboto 100 300 400 500 700 900 & Roboto Condensed 300 400 700
add_action( 'wp_enqueue_scripts', 'gf_robotorobotocondensed' );
function gf_robotorobotocondensed() {
	wp_enqueue_style( 'google-font-roboto-robotocondensed', '//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Roboto+Condensed:300,400,700', array(), CHILD_THEME_VERSION );
}

//* Enqueue Lato 100 300 400 700 900
add_action( 'wp_enqueue_scripts', 'gf_lato' );
function gf_lato() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900', array(), CHILD_THEME_VERSION );
}

//* Enqueue Dancing Script 400 700
add_action( 'wp_enqueue_scripts', 'gf_dancingscript' );
function gf_dancingscript() {
	wp_enqueue_style( 'google-font-dancingscript', '//fonts.googleapis.com/css?family=Dancing+Script:400,700', array(), CHILD_THEME_VERSION );
}

//* Enqueue Material Icons 400 700
add_action( 'wp_enqueue_scripts', 'gf_materialicons' );
function gf_materialicons() {
	wp_enqueue_style( 'google-font-materialicons', '//fonts.googleapis.com/icon?family=Material+Icons', array(), CHILD_THEME_VERSION );
}

//* Remove p tags around images
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header', 'nav', 'subnav', 'site-inner', 'footer-widgets', 'footer'
) );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Customize the previous page link
add_filter ( 'genesis_prev_link_text' , 'sp_previous_page_link' );
function sp_previous_page_link ( $text ) {
    return 'Previous';
}

//* Customize the next page link
add_filter ( 'genesis_next_link_text' , 'sp_next_page_link' );
function sp_next_page_link ( $text ) {
    return 'Next';
}

//* Customize the entire footer | functions-sitefooter
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'spt_sitefooter' );
function spt_sitefooter() {
	?>
	<div class="siteby"><a href="http://smarterwebpackages.com/">SmarterWebPackages.com</a></div>
	<div class="copyright">© Copyright 2015 SmarterWebPackages.com · All Rights Reserved | <a href="http://smarterwebpackages.com/">Website</a></div>
	<?php
}