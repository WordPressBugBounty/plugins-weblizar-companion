<?php

defined( 'ABSPATH' ) or die();

class wl_companion_about_enigma{
    public static function wl_companion_about_enigma_html() {
        $theme_name = wl_companion_helper::wl_get_theme_name();
   
    ?>
	<!-- about section -->
	
	
	
	
	<section class="about_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6 px-0">
        <div class="img_container">
          <div class="img-box">
		  <a href="<?php the_permalink(); ?>">
					<?php if(get_theme_mod('About_Image')) { ?>
                    <img src="<?php echo esc_url(get_theme_mod('About_Image')); ?>">
					<?php } else { ?>
					<img src="<?php echo (has_post_thumbnail()) ? esc_url(the_post_thumbnail_url('medium')) : esc_url(get_template_directory_uri()) . '/images/about-us.jpg'; ?>">
					<?php } ?>
			</a>
		  </div>
        </div>
      </div>
      <div class="col-md-6 px-0">
        <div class="detail-box">
          <div class="heading_container">
            <h2><?php echo get_theme_mod( 'about_title' ,'We Are the Best Digital Agency' ); ?></h2>
          </div>
         <?php if(get_theme_mod( 'about_txt' )) { ?>
                            <p><?php echo get_theme_mod( 'about_txt' ); ?></p>
							<?php } else { ?>
							<p><?php esc_html_e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem Ipsum is simply dummy text of the printing and typesetting industry.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem Ipsum is simply dummy text of the printing and typesetting industry.','guardian'); ?></p>
							<?php } ?>
          <div class="btn-box"><a href="<?php echo esc_url(get_theme_mod('about_link','#')); ?>">
		  <?php esc_html_e('Read More','guardian'); ?>
		  </a></div>
        </div>
      </div>
    </div>
  </div>
</section>
	

	<?php }
} ?>