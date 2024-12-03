<?php

defined('ABSPATH') or die();

class wl_companion_teams {

    public static function wl_companion_teams_html() {
        ?>
        <!-- Team Section -->
        
        <div id="team" class="team__section"></div>
        <div class="enigma_team_section">
            <!-- Display custom title if set in the theme customizer -->
            <?php if (!empty(get_theme_mod('team_title'))) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="enigma_heading_title">
                                <h3><?php echo esc_html(get_theme_mod('team_title', 'Our Team')); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <!-- Default Title if not set in the customizer -->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="enigma_heading_title">
                                <h3>Our Team</h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php
        // Fetch team data from the theme customizer, or use default data if not set
        $team_data = get_theme_mod('enigma_team_data') ? unserialize(get_theme_mod('enigma_team_data')) : false;

        if (!$team_data) {
            // Default team data
            $team_data = array(
                array(
                    'team_name' => 'Mike Hardson',
                    'team_image' => get_template_directory_uri() . '/images/team5.jpg',
                    'team_designation' => 'Business Plan Expert',
                    'team_text' => 'https://www.facebook.com/mike.hardson',
                    'team_link' => 'https://twitter.com/mikehardson',
                    'team_ldn_link' => 'https://linkedin.com/in/mikehardson'
                ),
                array(
                    'team_name' => 'Maria Rosi',
                    'team_image' => get_template_directory_uri() . '/images/team6.jpg',
                    'team_designation' => 'SEO Specialist',
                    'team_text' => 'https://www.facebook.com/maria.rosi',
                    'team_link' => 'https://twitter.com/mariarosi',
                    'team_ldn_link' => 'https://linkedin.com/in/mariarosi'
                ),
                array(
                    'team_name' => 'John Doe',
                    'team_image' => get_template_directory_uri() . '/images/team7.jpg',
                    'team_designation' => 'Web Developer',
                    'team_text' => 'https://www.facebook.com/john.doe',
                    'team_link' => 'https://twitter.com/johndoe',
                    'team_ldn_link' => 'https://linkedin.com/in/johndoe'
                ),
                array(
                    'team_name' => 'Jane Smith',
                    'team_image' => get_template_directory_uri() . '/images/team8.jpg',
                    'team_designation' => 'PHP Developer',
                    'team_text' => 'https://www.facebook.com/jane.smith',
                    'team_link' => 'https://twitter.com/janesmith',
                    'team_ldn_link' => 'https://linkedin.com/in/janesmith'
                ),
            );
        }

        // Display team members
        if ($team_data) { ?>
            <div class="container scrollimation scale-in">
                <div class="row">
                    <?php foreach ($team_data as $member) { 
                        // Image fallback
                        $image = !empty($member['team_image']) ? esc_url($member['team_image']) : 'default-image-path.jpg';
                    ?>
                        <div class="col-md-3 service scrollimation scale-in d2 pull-left in mb-5">
                            <img class="img-circle rounded-circle img-responsive" src="<?php echo $image; ?>" height="261px" width="276px">

                            <?php if (!empty($member['team_designation'])) { ?>
                                <div class="pos"><?php echo esc_html($member['team_designation']); ?></div>
                            <?php } ?>

                            <div class="caption">
                                <h3 class="team_name"><?php echo esc_html($member['team_name']); ?></h3>
                                <div class="team_social">
                                    <?php
                                    // Display social links if available
                                    foreach (['team_text' => 'fab fa-facebook-f', 'team_link' => 'fab fa-twitter', 'team_ldn_link' => 'fab fa-linkedin-in'] as $key => $icon) {
                                        if (!empty($member[$key])) { ?>
                                            <a href="<?php echo esc_url($member[$key]); ?>"><i class="<?php echo esc_attr($icon); ?>"></i></a>
                                        <?php }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } else { ?>
            <!-- Fallback to individual customizer fields for each team member -->
            <div class="container scrollimation scale-in">
                <div class="row">
                    <?php for ($i = 1; $i <= 4; $i++) {
                        $img = get_theme_mod('team_' . $i . '_img') ?: 'default-image-path.jpg';
                        $name = get_theme_mod('team_name_' . $i) ?: 'Team Member ' . $i;
                        $designation = get_theme_mod('team_post_' . $i);
                        $fb_link = get_theme_mod('team_fb_' . $i);
                        $twitter_link = get_theme_mod('team_twitter_' . $i);
                        $linkedin_link = get_theme_mod('team_linkedin_' . $i);
                    ?>
                        <div class="col-md-3 service scrollimation scale-in d2 pull-left in mb-5">
                            <img class="img-circle rounded-circle img-responsive" src="<?php echo esc_url($img); ?>" height="261px" width="276px">

                            <?php if (!empty($designation)) { ?>
                                <div class="pos"><?php echo esc_html($designation); ?></div>
                            <?php } ?>

                            <div class="caption">
                                <h3 class="team_<?php echo esc_attr($i); ?>"><?php echo esc_html($name); ?></h3>
                                <div class="team_social">
                                    <?php 
                                    // Display individual social links
                                    if (!empty($fb_link)) { ?>
                                        <a href="<?php echo esc_url($fb_link); ?>"><i class="fab fa-facebook-f"></i></a>
                                    <?php }
                                    if (!empty($twitter_link)) { ?>
                                        <a href="<?php echo esc_url($twitter_link); ?>"><i class="fab fa-twitter"></i></a>
                                    <?php }
                                    if (!empty($linkedin_link)) { ?>
                                        <a href="<?php echo esc_url($linkedin_link); ?>"><i class="fab fa-linkedin-in"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div> <!-- container div end here -->
    <?php
    }
}
?>
