<?php

defined( 'ABSPATH' ) or die();

/**
 *  Team Section 
 */
class wl_team_customizer_new {
	
	public static function wl_enigma_team_customizer_new( $wp_customize ) {

		$wp_customize->add_section(
	        'team_sec',
	        array(
	            'title' 		  => __('Team Options',WL_COMPANION_DOMAIN),
				'panel'			  => 'enigma_theme_option',
	            'description' 	  => __('Here you can add you Team',WL_COMPANION_DOMAIN),
				'capability'	  => 'edit_theme_options',
	            'priority' 		  => 38,
				'active_callback' => 'is_front_page',
	        )
	    );

	    $wp_customize->add_setting(
		'team_home',
		array(
			'type'              => 'theme_mod',
			'default'           => 1,
			'sanitize_callback' =>'enigma_sanitize_checkbox',
			'capability'        => 'edit_theme_options'
		)
		);
		$wp_customize->add_control( 'team_home', array(
			'label'        => __( 'Enable Team Section on Home', WL_COMPANION_DOMAIN ),
			'type'=>'checkbox',
			'section'    => 'team_sec',
			'settings'   => 'team_home'
		) );

	    $wp_customize->add_setting(
			'home_team_heading',
			array(
				'type'              => 'theme_mod',
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'enigma_sanitize_text'
			)
		);
		$wp_customize->add_control( 'home_team_heading', array(
			'label'    => 'Team section title',
			'type'     => 'text',
			'section'  => 'team_sec',
			'settings' => 'home_team_heading'
		) );

		$wp_customize->selective_refresh->add_partial( 'home_team_heading', array(
				'selector' => '.enigma_service .enigma_heading_title h3',
			) );

		require( WL_COMPANION_PLUGIN_DIR_PATH . 'admin/inc/controllers/enigma/functions/team-functions.php' );
		if ( class_exists( 'enigma_Customizer_team_fields') ) {

			// logo height width //
			$wp_customize->add_setting(
				'enigma_teams',
				array(
					'type'              => 'theme_mod',
					'default'           => 90,
					'sanitize_callback' => 'enigma_sanitize_text',
					'capability'        => 'edit_theme_options',
				)
			);

			$wp_customize->add_control( new enigma_Customizer_team_fields( $wp_customize, 'team_arr', array(
			'type'        => 'text',
			'section'     => 'team_sec',
			'settings'    => 'enigma_teams',
			'label'       => __( 'Team', WL_COMPANION_DOMAIN ),
			'description' => __( 'Here you can add all your Team members.', WL_COMPANION_DOMAIN ),
			)));
		}

		$wp_customize->add_setting(
			'enigma_team_data',
			array(
				'type'              => 'theme_mod',
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'enigma_sanitize_text'
			)
		);
		$wp_customize->add_control( 'enigma_team_data', array(
			'label'    => '',
			'type'     =>'hidden',
			'section'  => 'team_sec',
			'settings' => 'enigma_team_data'
		) );


	}
}

?>