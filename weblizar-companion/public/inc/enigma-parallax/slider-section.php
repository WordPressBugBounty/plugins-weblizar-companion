<?php

defined( 'ABSPATH' ) or die();

class wl_companion_sliders_enigma_parallax {

    public static function wl_companion_sliders_enigma_parallax_html() {
        // Get slider animation option
        $slider_anim = get_theme_mod('slider_anim');
        $slider_class = ($slider_anim == 'fadeIn') ? 'fadein' : 'slide';

        // Check which slider choice is set (carousel or swiper)
        if ( get_theme_mod( 'slider_choise', '1' ) == '1' ) {   
            ?>
            <div  id="slider"></div>
            <?php if ( ! empty ( get_theme_mod('enigma_slider_data' ) ) ) { ?>
                <!-- Carousel with custom data -->
                <div id="myCarousel" class="carousel <?php esc_attr_e($slider_class, WL_COMPANION_DOMAIN); ?>" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $j = 1;
                        $name_arr = unserialize(get_theme_mod( 'enigma_slider_data'));
                        foreach ( $name_arr as $key => $value ) {
                            if ( ! empty ( $value['slider_image']) ) { ?>
                                <div class="carousel-item <?php if ($j == 1) echo esc_attr("active"); ?>">
                                    <img src="<?php echo esc_url($value['slider_image']); ?>"
                                         class="img-responsive"
                                         alt="<?php echo esc_attr( ! empty ( $value['slider_name'] ) ? $value['slider_name'] : 'Slider Image' ); ?>">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <div class="carousel-text">
                                                <?php
                                                $animate_type_title = get_theme_mod('animate_type_title');
                                                if ( ! empty ( $value['slider_name'] ) ) { ?>
                                                    <h1 class="animated <?php echo !empty($animate_type_title) ? esc_attr($animate_type_title) : 'bounceInRight'; ?>"><?php esc_html_e( $value['slider_name'], WL_COMPANION_DOMAIN ); ?></h1>
                                                <?php }
                                                $animate_type_desc = get_theme_mod('animate_type_desc');
                                                if ( ! empty ( $value['slider_desc'] ) ) { ?>
                                                    <ul class="list-unstyled carousel-list">
                                                        <li class="animated <?php echo !empty($animate_type_desc) ? esc_attr($animate_type_desc) : 'bounceInLeft'; ?>"><?php esc_html_e($value['slider_desc'], WL_COMPANION_DOMAIN); ?></li>
                                                    </ul>
                                                <?php }
                                                if ( ! empty ( $value['slider_link'] ) ) { ?>
                                                    <a class="enigma_blog_read_btn animated bounceInUp" href="<?php echo esc_url($value['slider_link']); ?>" role="button">
                                                       <?php esc_html_e($value['slider_text'], WL_COMPANION_DOMAIN); ?> </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $j++;
                            }
                        } ?>
                    </div>
                    <ol class="carousel-indicators">
                        <?php for ($i = 0; $i<$j-1; $i++) { ?>
                            <li data-target="#myCarousel" data-slide-to="<?php esc_attr_e($i, WL_COMPANION_DOMAIN); ?>" <?php if ($i==0) { echo esc_attr('class="active"'); } ?> ></li>
                        <?php } ?>
                    </ol>
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next"><span class="carousel-control-next-icon"></span></a>
                    <div class="enigma_slider_shadow"></div>
                </div>
                <!-- End Carousel -->
            <?php 
            } else { 
                // Fallback default slider data (if no custom data exists)
                $slider_data = array(
                    array(
                        'slider_name' => 'Welcome to Enigma Parallax Theme',
                        'slider_desc' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.',
                        'slider_image' => get_template_directory_uri() . '/images/slider3.jpg',
                        'slider_text' => 'View More',
                        'slider_link' => '#'
                    ),
                    array(
                        'slider_name' => 'Another Slide Example',
                        'slider_desc' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.',
                        'slider_image' => get_template_directory_uri() . '/images/slider4.jpg',
                        'slider_text' => 'Explore Now',
                        'slider_link' => '#'
                    )
                );
                ?>
                <!-- Fallback Carousel -->
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $j = 1;
                        foreach ($slider_data as $slide) { ?>
                            <div class="carousel-item <?php echo $j == 1 ? 'active' : ''; ?>">
                                <img src="<?php echo esc_url($slide['slider_image']); ?>" class="img-responsive" alt="<?php esc_attr_e($slide['slider_name'], WL_COMPANION_DOMAIN); ?>">
                                <div class="container">
                                    <div class="carousel-caption">
									<div class="carousel-text">
                                        <h1 class="animated bounceInRight"><?php esc_html_e($slide['slider_name'], WL_COMPANION_DOMAIN); ?></h1>
                                        <ul class="list-unstyled carousel-list">
                                            <li class="animated bounceInLeft"><?php esc_html_e($slide['slider_desc'], WL_COMPANION_DOMAIN); ?></li>
                                        </ul>
                                        <a href="<?php echo esc_url($slide['slider_link']); ?>" class="enigma_blog_read_btn animated bounceInUp"><?php esc_html_e($slide['slider_text'], WL_COMPANION_DOMAIN); ?></a>
                                    </div>
								</div>
                                </div>
                            </div>
                        <?php $j++; } ?>
                    </div>
                    <ol class="carousel-indicators">
                        <?php for ($i = 0; $i < count($slider_data); $i++) { ?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active' : ''; ?>"></li>
                        <?php } ?>
                    </ol>
                    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                    <a class="carousel-control-next" href="#myCarousel" data-slide="next"><span class="carousel-control-next-icon"></span></a>
                    <div class="enigma_slider_shadow"></div>
                </div>
                <!-- End Fallback Carousel -->
            <?php  }  
        }
    }
}
?>
