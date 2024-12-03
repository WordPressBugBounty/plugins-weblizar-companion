<?php

defined('ABSPATH') or die();

class wl_companion_portfolios_enigma {

    public static function wl_companion_portfolios_enigma_html() {
        $theme_name = wl_companion_helper::wl_get_theme_name();

        // Fetch the portfolio section heading
        $port_heading = get_theme_mod('port_heading', 'Recent Works');

        // Portfolio data - first attempt to get data from theme settings
        $portfolio_items = get_theme_mod('enigma_portfolio_data');

        // If portfolio data is not available, fallback to hardcoded portfolio items
        if (empty($portfolio_items)) {
            $portfolio_items = [
                [
                    'portfolio_name' => 'Project 1',
                    'portfolio_image' => get_template_directory_uri() . '/images/portfolio1.jpg',
                    'portfolio_link' => 'link_to_project_1',
                    'portfolio_description' => 'Description of Project 1.',
                    'portfolio_category' => 'Web Design',
                ],
                [
                    'portfolio_name' => 'Project 2',
                    'portfolio_image' => get_template_directory_uri() . '/images/portfolio2.jpg',
                    'portfolio_link' => 'link_to_project_2',
                    'portfolio_description' => 'Description of Project 2.',
                    'portfolio_category' => 'Graphic Design',
                ],
                [
                    'portfolio_name' => 'Project 3',
                    'portfolio_image' => get_template_directory_uri() . '/images/portfolio3.jpg',
                    'portfolio_link' => 'link_to_project_3',
                    'portfolio_description' => 'Description of Project 3.',
                    'portfolio_category' => 'Web Design',
                ],
                [
                    'portfolio_name' => 'Project 4',
                    'portfolio_image' => get_template_directory_uri() . '/images/portfolio4.jpg',
                    'portfolio_link' => 'link_to_project_4',
                    'portfolio_description' => 'Description of Project 4.',
                    'portfolio_category' => 'Web Design',
                ],
            ];
        } else {
            // Assuming $portfolio_items is serialized data, so unserialize it
            $portfolio_items = unserialize($portfolio_items);
        }

        ?>

        <!-- portfolio section -->
        <div class="enigma_project_section <?php echo ($theme_name == 'Oculis') ? 'portfolio2' : ''; ?>">

            <?php if (!empty($port_heading)) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="enigma_heading_title">
                                <h3><?php echo esc_html($port_heading); ?> </h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($portfolio_items)) : ?>
                <div class="container">
                    <div class="row">
                        <div id="enigma_portfolio_section" class="enima_photo_gallery">
                            <?php foreach ($portfolio_items as $item) : ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1">
                                    <div class="img-wrapper">
                                        <div class="enigma_home_portfolio_showcase">
                                            <img class="enigma_img_responsive" alt="<?php echo esc_attr($item['portfolio_name']); ?>" src="<?php echo esc_url($item['portfolio_image']); ?>">
                                            <div class="enigma_home_portfolio_showcase_overlay">
                                                <div class="enigma_home_portfolio_showcase_overlay_inner">
                                                    <div class="enigma_home_portfolio_showcase_icons">
                                                        <a title="<?php echo esc_attr($item['portfolio_name']); ?>" href="<?php echo esc_url($item['portfolio_link']); ?>">
                                                            <i class="fa fa-link"></i>
                                                        </a>
                                                        <a class="photobox_a" href="<?php echo esc_url($item['portfolio_image']); ?>">
                                                            <i class="fa fa-search-plus"></i>
                                                            <img src="<?php echo esc_url($item['portfolio_image']); ?>" alt="<?php echo esc_attr($item['portfolio_name']); ?>" style="display:none !important; visibility:hidden;">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if (!empty($item['portfolio_name'])) : ?>
                                            <div class="enigma_home_portfolio_caption">
                                                <h3 class="port">
                                                    <a href="<?php echo esc_url($item['portfolio_link']); ?>"><?php echo esc_html($item['portfolio_name']); ?></a>
                                                </h3>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="enigma_portfolio_shadow"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <!-- Fallback to theme options if $portfolio_items is empty -->
                <div class="container">
                    <div class="row">
                        <div id="enigma_portfolio_section" class="enima_photo_gallery">
                            <?php for ($i = 1; $i <= 4; $i++) : 
                                $port_img = get_theme_mod('port_' . $i . '_img');
                                if (!empty($port_img)) : ?>
                                    <div class="col-lg-3 col-md-3 col-sm-6 pull-left scrollimation fade-right d1">
                                        <div class="img-wrapper">
                                            <div class="enigma_home_portfolio_showcase">
                                                <img class="enigma_img_responsive" alt="<?php echo esc_attr(get_theme_mod('port_' . $i . '_title')); ?>" src="<?php echo esc_url($port_img); ?>">
                                                <div class="enigma_home_portfolio_showcase_overlay">
                                                    <div class="enigma_home_portfolio_showcase_overlay_inner">
                                                        <div class="enigma_home_portfolio_showcase_icons">
                                                            <a title="<?php echo esc_attr(get_theme_mod('port_' . $i . '_title')); ?>" href="<?php echo esc_url(get_theme_mod('port_' . $i . '_link')); ?>">
                                                                <i class="fa fa-link"></i>
                                                            </a>
                                                            <a class="photobox_a" href="<?php echo esc_url($port_img); ?>">
                                                                <i class="fa fa-search-plus"></i>
                                                                <img src="<?php echo esc_url($port_img); ?>" alt="<?php echo esc_attr(get_theme_mod('port_' . $i . '_title')); ?>" style="display:none !important; visibility:hidden;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php $port_title = get_theme_mod('port_' . $i . '_title');
                                            if (!empty($port_title)) : ?>
                                                <div class="enigma_home_portfolio_caption">
                                                    <h3 class="port_<?php echo esc_attr($i); ?>">
                                                        <a href="<?php echo esc_url(get_theme_mod('port_' . $i . '_link')); ?>"><?php echo esc_html($port_title); ?></a>
                                                    </h3>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="enigma_portfolio_shadow"></div>
                                    </div>
                                <?php endif; 
                            endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
        <!-- /portfolio section -->

        <?php
    }
}
