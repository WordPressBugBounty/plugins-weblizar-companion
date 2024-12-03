<?php

defined('ABSPATH') or die();

class wl_companion_services_enigma_parallax {

    public static function wl_companion_services_enigma_parallax_html() {
        ?>
        <!-- Service Section -->
        <div class="clearfix"></div>
        <div id="service" class="service__section"></div>
        <div class="enigma_service">
            <?php if (!empty(get_theme_mod('home_service_heading'))) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="enigma_heading_title">
                                <h3><?php echo esc_html(get_theme_mod('home_service_heading', 'Our Services')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php 
            // Fetch serialized data for custom services, or use defaults if empty
            $name_arr = unserialize(get_theme_mod('enigma_service_data'));

            // Default services if no custom data is available
            if (empty($name_arr)) {
                $name_arr = array(
                    array(
                        'service_name' => 'Lorem Ipsum Service 1',
                        'service_link' => '#',
                        'service_icon' => 'fa fa-headphones',
                        'service_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    ),
                    array(
                        'service_name' => 'Lorem Ipsum Service 2',
                        'service_link' => '#',
                        'service_icon' => 'fa fa-mobile',
                        'service_desc' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    ),
                    array(
                        'service_name' => 'Lorem Ipsum Service 3',
                        'service_link' => '#',
                        'service_icon' => 'fa fa-users',
                        'service_desc' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.',
                    ),
                );
            }

            ?>
            
            <div class="container">
                <div class="row isotope" id="isotope-service-container">
                    <?php 
                    // Loop through services (either custom or default)
                    foreach ($name_arr as $i => $service) {
                        $service_icon = !empty($service['service_icon']) ? $service['service_icon'] : ''; 
                        $service_link = !empty($service['service_link']) ? $service['service_link'] : '#';
                        $service_name = !empty($service['service_name']) ? $service['service_name'] : 'Service ' . ($i + 1);
                        $service_desc = !empty($service['service_desc']) ? $service['service_desc'] : '';
                        ?>
                        <div class="col-md-4 service">
                            <div class="enigma_service_area appear-animation bounceIn appear-animation-visible">
                                <?php if (!empty($service_icon)) { ?>
                                    <a href="<?php echo esc_url($service_link); ?>">
                                        <div class="enigma_service_iocn pull-left">
                                            <i class="<?php echo esc_attr($service_icon); ?>"></i>
                                        </div>
                                    </a>
                                <?php } ?>
                                <div class="enigma_service_detail media-body">
                                    <h3 class="head_<?php echo esc_attr($i + 1); ?>">
                                        <a href="<?php echo esc_url($service_link); ?>">
                                            <?php echo esc_html($service_name); ?>
                                        </a>
                                    </h3>
                                    <?php if (!empty($service_desc)) { ?>
                                        <p><?php echo esc_html($service_desc); ?></p>
                                    <?php } ?>
                                    <?php if (!empty($service_link)) { ?>
                                        <a class="ser-link" href="<?php echo esc_url($service_link); ?>">
                                            <?php esc_html_e('Read More', 'enigma-parallax'); ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- /Service Section -->
        <?php
    }
}
?>
