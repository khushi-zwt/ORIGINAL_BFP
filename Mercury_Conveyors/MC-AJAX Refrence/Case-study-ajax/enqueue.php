<?php 
// Load CSS.
function load_css() {
  
  // Custom CSS
  wp_enqueue_style("style",get_template_directory_uri()."/app/css/style.css");

  // Third Party CSS
  wp_enqueue_style("select2css",get_template_directory_uri()."/resources/select2.min.css");
}
add_action("wp_enqueue_scripts","load_css");

// Load javascript.
function load_js() {
  wp_deregister_script('jquery');

  // Third Party JS Libraries
  wp_enqueue_script("jquery",get_template_directory_uri()."/resources/jquery.min.js",array(),null,true);

  wp_enqueue_script("select2",get_template_directory_uri()."/resources/select2.min.js",array(),null,true);

  // Custom JS
  wp_register_script("script",get_template_directory_uri()."/script.js",array("jquery"),null,true);
  wp_enqueue_script("script");
}
add_action("wp_enqueue_scripts","load_js");

/**
 * Register css block wise
 */
add_action( 'wp_enqueue_scripts', 'register_acf_block_styles' );
function register_acf_block_styles() : void {
  if( has_block( 'acf/hero-banner' ) ) {
    wp_enqueue_style( 'hero-banner', get_theme_file_uri( '/app/css/blocks/home-banner.css' ), '1.0', 'all' );
  }
  if( has_block( 'acf/content' ) ) {
    wp_enqueue_style( 'content', get_theme_file_uri( '/app/css/blocks/content.css' ), '1.0', 'all' );
  }
  if( has_block( 'acf/product-slider' ) ) {
    wp_enqueue_style( 'product-slider', get_theme_file_uri( '/app/css/blocks/product-slider.css' ), '1.0', 'all' );
  }
  if( has_block( 'acf/fifty-fifty-image-with-title-content' ) ) {
    wp_enqueue_style( 'fifty-fifty-image-with-title-content', get_theme_file_uri( '/app/css/blocks/fifty-fifty-image-with-title-content.css' ), '1.0', 'all' );
  }
  if( has_block( 'acf/get-in-touch-section' ) ) {
    wp_enqueue_style( 'get-in-touch-section', get_theme_file_uri( '/app/css/blocks/get-in-touch-section.css' ), '1.0', 'all' );
  }
  if( has_block( 'acf/conveyor-care-section' ) ) {
    wp_enqueue_style( 'conveyor-care-section', get_theme_file_uri( '/app/css/blocks/conveyor-care-section.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/meet-the-team') ) {
    wp_enqueue_style( 'meet-the-team', get_theme_file_uri( '/app/css/blocks/meet-the-team.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/optional-extras' ) ) {
    wp_enqueue_style( 'optional-extras', get_theme_file_uri( '/app/css/blocks/optional-extras.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/fifty-fifty-black-bg-section' ) ) {
    wp_enqueue_style( 'fifty-fifty-black-bg-section', get_theme_file_uri( '/app/css/blocks/fifty-fifty-black-bg-section.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/order-form' ) ) {
    wp_enqueue_style( 'order-form', get_theme_file_uri( '/app/css/blocks/order-form.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/fifty-fifty-banner' ) ) {
    wp_enqueue_style( 'fifty-fifty-banner', get_theme_file_uri( '/app/css/blocks/fifty-fifty-banner.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/brand-and-model' ) ) {
    wp_enqueue_style( 'brand-and-model', get_theme_file_uri( '/app/css/blocks/brand-and-model.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/how-can-we-help' ) ) {
    wp_enqueue_style( 'how-can-we-help', get_theme_file_uri( '/app/css/blocks/how-can-we-help.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/directors' ) ) {
    wp_enqueue_style( 'directors', get_theme_file_uri( '/app/css/blocks/directors.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/site-address' ) ) {
    wp_enqueue_style( 'site-address', get_theme_file_uri( '/app/css/blocks/site-address.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/banner-image-only' ) ) {
    wp_enqueue_style( 'banner-image-only', get_theme_file_uri( '/app/css/blocks/banner-image-only.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/blog' ) ) {
    wp_enqueue_style( 'blog', get_theme_file_uri( '/app/css/blocks/blog.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/case-study' ) ) {
    wp_enqueue_style( 'case-study', get_theme_file_uri( '/app/css/blocks/case-study.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/product-banner' ) ) {
    wp_enqueue_style( 'product-banner', get_theme_file_uri( '/app/css/blocks/product-banner.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/product-description' ) ) {
    wp_enqueue_style( 'product-description', get_theme_file_uri( '/app/css/blocks/product-description.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/about-mcs-banner' ) ) {
    wp_enqueue_style( 'about-mcs-banner', get_theme_file_uri( '/app/css/blocks/about-mcs-banner.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/about-content-block' ) ) {
    wp_enqueue_style( 'about-content-block', get_theme_file_uri( '/app/css/blocks/about-content-block.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/three-round-block' ) ) {
    wp_enqueue_style( 'three-round-block', get_theme_file_uri( '/app/css/blocks/three-round-block.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/contact-page-banner' ) ) {
    wp_enqueue_style( 'contact-page-banner', get_theme_file_uri( '/app/css/blocks/contact-page-banner.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/contact-form-block' ) ) {
    wp_enqueue_style( 'contact-form-block', get_theme_file_uri( '/app/css/blocks/contact-form-block.css' ), '1.0', 'all' );
  }

  if( has_block( 'acf/blog-listing' ) ) {
    wp_enqueue_style( 'blog-listing', get_theme_file_uri( '/app/css/blocks/blog-listing.css' ), '1.0', 'all' );
  }
}


/**
 * Blog [Load more] Script Enqueue
 */
function blog_load_more_scriptes() {

	$blog_load_more_scripts_variable = array(
		'ajax_url'			    => admin_url( 'admin-ajax.php' ),
		'ajax_nonce'		    => wp_create_nonce('blog-load-more-nonce'),
		'posts_per_page'	    => 4
	);
	wp_localize_script( 'script', 'blog_ajax_variable', $blog_load_more_scripts_variable );
  
	wp_enqueue_script( 'script' );
  }
  add_action( 'wp_enqueue_scripts', 'blog_load_more_scriptes' );


  /**
 * Case Study [Load more] Script Enqueue
 */
function cs_load_more_scriptes() {

	$cs_load_more_scripts_variable = array(
		'ajax_url'			    => admin_url( 'admin-ajax.php' ),
		'ajax_nonce'		    => wp_create_nonce('cs-load-more-nonce'),
		'posts_per_page'	    => 3
	);
	wp_localize_script( 'script', 'cs_ajax_variable', $cs_load_more_scripts_variable );
  
	wp_enqueue_script( 'script' );
  }
  add_action( 'wp_enqueue_scripts', 'cs_load_more_scriptes' );
