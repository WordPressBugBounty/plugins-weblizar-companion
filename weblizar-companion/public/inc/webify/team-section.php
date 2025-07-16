<?php

defined( 'ABSPATH' ) or die();

class wl_companion_teams_webify {
    
    public static function wl_companion_team_webify_html() { ?>
    
        <!--Team Section-->
        <div class="enigma_team_section">
            <?php
           $enigma_team_title = get_theme_mod('enigma_team_title', 'Our Team');
            if ( !empty($enigma_team_title )) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="enigma_heading_title">
                                <h3><?php echo get_theme_mod( 'enigma_team_title', 'Our Team' ); ?></h3>   
                            </div>
                        </div>
                    </div>
                </div> <?php 
            } ?>
            <div class="container">
                <div class="row">

                    <?php 
                    if ( ! empty ( get_theme_mod('enigma_team_data' ) ) ) {
                        $name_arr = unserialize(get_theme_mod( 'enigma_team_data'));
                        foreach ( $name_arr as $key => $value ) { ?>

                            <!--column-->
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 service"> 
                                <div class="enigma_team_wrapper">
                                    <div class="enigma_team_showcase">
                                        <img class="enigma_img_responsive" src="<?php echo esc_url( $value['team_image'] ); ?>">
                                    </div>
                                    <div class="enigma_team_caption">
                                        <h3>
                                            <?php if ( ! empty ( $value['team_name'] ) ) {  esc_html_e( $value['team_name'] ,WL_COMPANION_DOMAIN); } ?>
                                        </h3>
                                        <small><?php if ( ! empty ( $value['team_designation'] ) ) {  esc_html_e( $value['team_designation'],WL_COMPANION_DOMAIN ); } ?></small>   
                                        <div class="enigma_team_showcase_overlay">
                                            <div class="enigma_team_showcase_overlay_inner ">
                                                <div class="enigma_team_showcase_icons">
                                                    <a href="<?php echo esc_url( esc_attr( $value['fb_link'] ) ); ?>"><i class="fab fa-facebook"></i></a>
                                                    <a href="<?php echo esc_url( esc_attr( $value['twitter_link'] ) ); ?>"><i class="fab fa-twitter"></i></a>
                                                    <a href="<?php echo esc_url( esc_attr( $value['insta_link'] ) ); ?>"><i class="fab fa-instagram"></i></a>
                                                    <a href="<?php echo esc_url( esc_attr( $value['google_plus_link'] ) ); ?>"><i class="fab fa-google-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <!--column--><?php 
                        } 
                    } ?>
                        </div>
                </div><!-- row end--->  
            </div>
        </div> 
        
    <?php 
    }
} ?>