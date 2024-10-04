<?php

defined('ABSPATH') or die();


class wl_companion_team_enigma {

    public static function wl_companion_team_enigma_html() {
        $theme_name = wl_companion_helper::wl_get_theme_name();
?>
<!-- testimonial section -->
        <div class="enigma_service <?php if ($theme_name == 'Oculis') { ?>service2<?php } ?>">
            <?php
            $home_team_heading = get_theme_mod('home_team_heading', 'Our Team');
            if (!empty($home_team_heading)) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="enigma_heading_title">
                                <h3><?php echo get_theme_mod('home_team_heading', 'Our Team'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
			<?php
            $name_arr = unserialize(get_theme_mod('enigma_team_data'));
			//var_dump($name_arr);
			?>
        <section class="testimonial-box-area section-bg">
        <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="our-team">
                <div class="pic">
                    <img src="images/img-1.jpg">
                </div>
                <h3 class="title">Williamson</h3>
                <span class="post">Web Developer</span>
                <ul class="social">
                    <li><a href="#" class="fab fa-facebook"></a></li>
                    <li><a href="#" class="fab fa-twitter"></a></li>
                    <li><a href="#" class="fab fa-google-plus"></a></li>
                    <li><a href="#" class="fab fa-linkedin"></a></li>
                </ul>
            </div>
        </div>
 
        <div class="col-md-3 col-sm-6">
            <div class="our-team">
                <div class="pic">
                    <img src="images/img-2.jpg">
                </div>
                <h3 class="title">Kristiana</h3>
                <span class="post">Web Designer</span>
                <ul class="social">
                    <li><a href="#" class="fab fa-facebook"></a></li>
                    <li><a href="#" class="fab fa-twitter"></a></li>
                    <li><a href="#" class="fab fa-google-plus"></a></li>
                    <li><a href="#" class="fab fa-linkedin"></a></li>
                </ul>
            </div>
        </div>
    </div>
       
    </section>
<?php
} }
?>