<?php

defined( 'ABSPATH' ) or die();

/**
 *  General options
 */
class wl_blog_customizer {
	
	public static function wl_mediapulse_blog_customizer( $wp_customize ) {
		 /* Blog Option */
    $wp_customize->add_section( 'blog_section', array(
	    'title'      => __( 'Home Blog Options', WL_COMPANION_DOMAIN),
	    'panel'      => 'mediapulse_theme_option',
	    'capability' => 'edit_theme_options',
	    'priority'   => 40
    ) );

    $wp_customize->add_setting(
	    'blog_home',
	    array(
		    'default'           => 1,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'mediapulse_sanitize_checkbox',
		    'capability'        => 'edit_theme_options'
	    )
    );

    $wp_customize->add_control( 'blog_home', array(
	    'label'    => __( 'Enable Blog on Home', WL_COMPANION_DOMAIN),
	    'type'     => 'checkbox',
	    'section'  => 'blog_section',
	    'settings' => 'blog_home'
    ) );

    $wp_customize->add_setting(
	    'blog_title',
	    array(
		    'type'              => 'theme_mod',
		    'default'           => __( 'Latest News', WL_COMPANION_DOMAIN ),
		    'sanitize_callback' => 'mediapulse_sanitize_text',
		    'capability'        => 'edit_theme_options',
	    )
    );

    

    
  

    
	
	$wp_customize->add_setting( 'excerpt_len', array(
	    'type' => 'theme_mod',
            'default' => __( '300', WL_COMPANION_DOMAIN ),
            'sanitize_callback' => 'mediapulse_sanitize_text',
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_control( 'excerpt_len', array(
	    'label'       => __( 'Excerpt length', WL_COMPANION_DOMAIN ),
	    'description' => 'Excerpt length',
	    'type'        => 'text',
	    'section'     => 'blog_section',
	    'settings'    => 'excerpt_len',
    ) );

    
	}

}

?>