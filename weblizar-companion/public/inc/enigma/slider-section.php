<?php

defined('ABSPATH') or die();

class wl_companion_sliders_enigma {

    public static function wl_companion_sliders_enigma_html() {
        // Get the slider animation type from theme customization
        $slider_anim = get_theme_mod('slider_anim');
        $slider_class = ($slider_anim == 'fadeIn') ? 'fadein' : 'slide';
        
        // Retrieve custom slider data from the theme customizer
        $name_arr = unserialize(get_theme_mod('enigma_slider_data'));
        
        // Check if custom slider data exists
        if (!empty($name_arr)) { ?>

            <div id="myCarousel" class="carousel <?php echo esc_attr($slider_class); ?>" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $j = 1;
                    foreach ($name_arr as $key => $value) {
                        ?>
                        <div class="carousel-item <?php echo ($j == 1) ? 'active' : ''; ?>">
                            <img src="<?php echo esc_url($value['slider_image']); ?>" class="img-responsive" alt="<?php echo esc_attr($value['slider_name']); ?>">
                            <div class="container">
                                <div class="carousel-caption">
                                    <div class="carousel-text">
                                        <?php
                                        // Set animation types for title and description
                                        $animate_type_title = get_theme_mod('animate_type_title', 'bounceInRight');
                                        if (!empty($value['slider_name'])) { ?>
                                            <h1 class="animated <?php echo esc_attr($animate_type_title); ?>">
                                                <?php echo esc_html($value['slider_name']); ?>
                                            </h1>
                                        <?php }
                                        
                                        // Handle slider description
                                        $animate_type_desc = get_theme_mod('animate_type_desc', 'bounceInLeft');
                                        if (!empty($value['slider_desc'])) { ?>
                                            <ul class="list-unstyled carousel-list">
                                                <li class="animated <?php echo esc_attr($animate_type_desc); ?>">
                                                    <?php echo esc_html($value['slider_desc']); ?>
                                                </li>
                                            </ul>
                                        <?php }
                                        
                                        // Handle button link and text
                                        if (!empty($value['slider_link'])) { ?>
                                            <a class="enigma_blog_read_btn animated bounceInUp" href="<?php echo esc_url($value['slider_link']); ?>" role="button">
                                                <?php echo esc_html($value['slider_text']); ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                    $j++;
                    } ?>
                </div>
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < $j - 1; $i++) { ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo esc_attr($i); ?>" <?php echo ($i == 0) ? 'class="active"' : ''; ?>></li>
                    <?php } ?>
                </ol>
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                <div class="enigma_slider_shadow"></div>
            </div>

        <?php 
        } else { 
            // Fallback default slider data (if no custom data exists)
            $slider_data = array(
                array(
                    'slider_name' => 'Welcome to Enigma Theme',
                    'slider_desc' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore.',
                    'slider_image' => get_template_directory_uri() . '/images/slider1.jpg',
                    'slider_text' => 'View More',
                    'slider_link' => '#'
                ),
                array(
                    'slider_name' => 'Another Slide Example',
                    'slider_desc' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.',
                    'slider_image' => get_template_directory_uri() . '/images/slider2.jpg',
                    'slider_text' => 'Explore Now',
                    'slider_link' => '#'
                )
            );
            ?>

            <div id="myCarousel" class="carousel <?php echo esc_attr($slider_class); ?>" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $j = 1;
                    foreach ($slider_data as $key => $value) { ?>
                        <div class="carousel-item <?php echo ($j == 1) ? 'active' : ''; ?>">
                            <img src="<?php echo esc_url($value['slider_image']); ?>" class="img-responsive" alt="<?php echo esc_attr($value['slider_name']); ?>">
                            <div class="container">
                                <div class="carousel-caption">
                                    <div class="carousel-text">
                                        <?php
                                        $animate_type_title = get_theme_mod('animate_type_title', 'bounceInRight');
                                        if (!empty($value['slider_name'])) { ?>
                                            <h1 class="animated <?php echo esc_attr($animate_type_title); ?>">
                                                <?php echo esc_html($value['slider_name']); ?>
                                            </h1>
                                        <?php }
                                        
                                        $animate_type_desc = get_theme_mod('animate_type_desc', 'bounceInLeft');
                                        if (!empty($value['slider_desc'])) { ?>
                                            <ul class="list-unstyled carousel-list">
                                                <li class="animated <?php echo esc_attr($animate_type_desc); ?>">
                                                    <?php echo esc_html($value['slider_desc']); ?>
                                                </li>
                                            </ul>
                                        <?php }
                                        
                                        if (!empty($value['slider_link'])) { ?>
                                            <a class="enigma_blog_read_btn animated bounceInUp" href="<?php echo esc_url($value['slider_link']); ?>" role="button">
                                                <?php echo esc_html($value['slider_text']); ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $j++; } ?>
                </div>
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < $j - 1; $i++) { ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo esc_attr($i); ?>" <?php echo ($i == 0) ? 'class="active"' : ''; ?>></li>
                    <?php } ?>
                </ol>
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                <div class="enigma_slider_shadow"></div>
            </div>

        <?php }
    }
}
?>
