<?php
defined( 'ABSPATH' ) or die();

class wl_companion_testimonials_webify {
    
    public static function wl_companion_testimonial_webify_html() { ?>

        <!-- Testimonial section -->    
        <div class="enigma_testimonial_area">
            <?php
            $enigma_testimonial_title = get_theme_mod('enigma_testimonial_title', 'What Our Client Say');
            if ( !empty($enigma_testimonial_title )) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="enigma_heading_title">
                            <h3><?php echo get_theme_mod( 'enigma_testimonial_title', 'What Our Client Say' ); ?></h3>      
                        </div>
                    </div>
                </div>
            </div> <?php   
            } ?>

            <div class="container">
                <div  id="enigma_testimonial_section">

                    <?php 
                    if ( ! empty ( get_theme_mod('enigma_testimonial_data' ) ) ) {
                        $name_arr = unserialize(get_theme_mod( 'enigma_testimonial_data'));
                        foreach ( $name_arr as $key => $value ) { ?>

                            <div class="col-md-3 enigma_testimonial pull-left scrollimation scale-in d2">
                                <i class="fa fa-quote-left"></i>
                                <p><?php if ( ! empty ( $value['testimonial_desc'] ) ) { echo esc_textarea($value['testimonial_desc']); } ?></p>
                                <img src="<?php echo esc_url($value['testimonial_image']); ?>">
                                <h3> <?php echo esc_attr_e($value['testimonial_name']); ?> </h3>
                                <span>
                                    <?php echo esc_attr_e($value['testimonial_designation']); ?> 
                                </span>
                            </div> <?php 

                        } 
                    } ?>

                </div>
                <div class="row">
                    <div id="pager2" class="pager testi-pager"></div>
                </div>  
            </div>

        </div>
        <!-- /Testimonial  section --> <?php
    }
} ?>