<?php
add_action( 'customize_register', 'eidboiler_register_theme_customizer' );
function eidboiler_register_theme_customizer( $wp_customize ) {
	// Create custom panel.
	$wp_customize->add_panel( 'hero_unit', array(
		'priority'       => 70,
		'theme_supports' => '',
		'title'          => __( 'Hero Unit', 'eidboiler' ),
		'description'    => __( 'Set hero image, copy, and CTA.', 'eidboiler' ),
	) );
	// Add sections.
	$wp_customize->add_section( 'hero_background' , array(
		'title'      => __( 'Hero Background','eidboiler' ),
		'panel'      => 'hero_unit',
		'priority'   => 20,
	) );
  $wp_customize->add_section( 'hero_copy' , array(
		'title'      => __( 'Hero Copy','eidboiler' ),
		'panel'      => 'hero_unit',
		'priority'   => 30,
	) );
  $wp_customize->add_section( 'cta_copy' , array(
		'title'      => __( 'CTA Copy','eidboiler' ),
		'panel'      => 'hero_unit',
		'priority'   => 40,
	) );
	// Add settings.
	$wp_customize->add_setting( 'hero_bg', array(
		'default'     => get_stylesheet_directory_uri() . '/images/hero-bg.jpg',
	) );
  $wp_customize->add_setting( 'hero_txt', array(
		'default'     => 'I am your hero copy.',
	) );
  $wp_customize->add_setting( 'btn_txt', array(
		'default'     => 'Click Me',
	) );
  $wp_customize->add_setting( 'btn_link', array(
		'default'     => get_bloginfo('url') . '/about',
	) );
	// Add controls.
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'hero_background_image', array(
			  'label'      => __( 'Add Hero Background Here, the width should be approx 1400px', 'eidboiler' ),
			  'section'    => 'hero_background',
			  'settings'   => 'hero_bg',
			  )
	) );
  $wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, 'hero_copy', array(
			  'label'      => __( 'Text on the image)', 'eidboiler' ),
			  'section'    => 'hero_copy',
        'settings'   => 'hero_txt',
			  )
	) );
  $wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, 'cta_copy', array(
			  'label'      => __( 'Button text', 'eidboiler' ),
			  'section'    => 'cta_copy',
        'settings'   => 'btn_txt',
			  )
	) );
  $wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, 'cta_link', array(
			  'label'      => __( 'Enter the link URL', 'eidboiler' ),
			  'section'    => 'cta_copy',
        'settings'   => 'btn_link',
			  )
	) );
}
add_action( 'wp_enqueue_scripts', 'eidboiler_css' );
function eidboiler_css() {
	wp_enqueue_style( 'eidboiler', get_stylesheet_directory_uri() . '/style.css' );
	$handle = 'eidboiler';
	$css = '';
	$hero_bg_image = get_theme_mod( 'hero_bg' );
	$css .= ( !empty($hero_bg_image) ) ? sprintf('
	.hero {
		background: url(%s) no-repeat center;
		background-size: cover;
	}
	', $hero_bg_image ) : '';
	if ( $css ) {
		wp_add_inline_style( $handle  , $css );
	}
}
function eidboiler_hero_copy() {
  $hero_copy = get_theme_mod( 'hero_txt' );
  echo $hero_copy;
}
function eidboiler_cta_copy() {
  $cta_copy = get_theme_mod( 'btn_txt' );
  echo $cta_copy;
}
function eidboiler_cta_url() {
  $cta_url = get_theme_mod( 'btn_link' );
  echo $cta_url;
}
