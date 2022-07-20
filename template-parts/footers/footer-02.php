<?php

    $facebook = get_field( 'facebook', 'option' );
    $twitter = get_field( 'twitter', 'option' );
    $youtube = get_field( 'youtube', 'option' );
    $instagram = get_field( 'instagram', 'option' );
    $linkedin = get_field( 'linkedin', 'option' );
    $company_name = get_field( 'company_name', 'option' );
    $company_address = get_field( 'company_address', 'option' );
    $company_contact = get_field( 'company_contact', 'option' );
    $company_email = get_field( 'company_email', 'option' );

    $footer_section_width = get_field( 'footer_section_width', 'option' );
    
    if( have_rows('custom_footer', 'option') ) {
        while( have_rows('custom_footer', 'option') ) {
            the_row();
            $footer_widget_01 = get_sub_field( 'footer_widget_01', 'option' );
            $footer_widget_02 = get_sub_field( 'footer_widget_02', 'option' );
            $footer_widget_03 = get_sub_field( 'footer_widget_03', 'option' );
            $footer_widget_04 = get_sub_field( 'footer_widget_04', 'option' );
            $copyright_widget = get_sub_field( 'copyright_widget', 'option' );

            if( have_rows('footer_background_primary_settings', 'option') ) {
                while( have_rows('footer_background_primary_settings', 'option') ) {
                    the_row();
                    $footer_primary_background = get_sub_field( 'footer_primary_background', 'option' );
                    $footer_primary_background_color = get_sub_field( 'footer_primary_background_color', 'option' );
                    $footer_primary_background_image = get_sub_field( 'footer_primary_background_image', 'option' );
                } 
            }
        } 
    } 

    if( have_rows('logo', 'option') ) {
        while( have_rows('logo', 'option') ) {
            the_row();
            $logo_colored = get_sub_field( 'logo_colored', 'option' );

            if( $logo_colored ) {
                $logo_colored_url = $logo_colored['url'];
                $logo_colored_size = $logo_colored['sizes']['theme-small'];
                $logo_colored_width = $logo_colored['sizes']['theme-small-width'];
                $logo_colored_height = $logo_colored['sizes']['theme-small-height'];
                $logo_colored_alt = $logo_colored['alt'];
            }
        } 
    }
?>   
    
    <footer id="footer-02" class="global-footer"
        style="
            <?php if( $footer_primary_background=='color' && $footer_primary_background_color ) { echo 'background-color:' . $footer_primary_background_color . ';'; } ?>
            <?php if( $footer_primary_background=='image' ) { echo 'background-image:url(' . $footer_primary_background_image . '); background-size:cover; background-position:center; background-repeat:no-repeat;'; } ?>
        "
    >
        <div class="global-footer__wrapper">
            <?php if( $footer_widget_01 ): ?> 
                <div class="global-footer__row-01 mobile-spacer">
                    
                    <div class="global-footer__row-01__wrapper<?php if( !$footer_section_width ) { echo ' content-limit'; } ?>">
                        <?php if( is_active_sidebar('footer-widget-01') ): ?>
                            <ul class="site-widget footer-widget-01">
                                <?php dynamic_sidebar('footer-widget-01'); ?>
                            </ul>
                        <?php else: ?>
                            <div class="subscription-wrapper">
                                <?php echo do_shortcode( '[contact-form-7 id="808" title="Subscription Form"]' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
            <?php endif; ?> 

            <?php if( $footer_widget_02 || $footer_widget_03 || $footer_widget_04  ): ?> 
                <div class="global-footer__row-02 mobile-spacer">
                    <div class="global-footer__row-02__wrapper<?php if( !$footer_section_width ) { echo ' content-limit'; } ?>">
                        
                        <?php if( $footer_widget_02 ): ?>   

                            <?php if( is_active_sidebar('footer-widget-02') ): ?>
                                <ul class="site-widget footer-widget-02">
                                    <?php dynamic_sidebar('footer-widget-02'); ?>
                                </ul>
                            <?php else: ?>
                                <div class="global-footer__row-02__col-01">
                                    <img
                                        class="footer-logo"
                                        src="<?php echo $logo_colored_size; ?>"
                                        width="<?php echo $logo_colored_width; ?>"
                                        alt="<?php echo $company_name; ?> logo"
                                        loading="lazy"
                                    >
                                </div>
                            <?php endif; ?>

                        <?php endif; ?> 

                        <?php if( $footer_widget_03 ): ?>   

                            <?php if( is_active_sidebar('footer-widget-03') ): ?>
                                <ul class="site-widget footer-widget-03">
                                    <?php dynamic_sidebar('footer-widget-03'); ?>
                                </ul>
                            <?php else: ?>
                                <div class="global-footer__row-02__col-02">
                                    <div class="quick-links">
                                        <h3>Quick links</h3>
                                        <?php footerMenu(); ?>
                                    </div>

                                    <div class="contact-info">
                                        <h3>Contact us</h3>
                                        <?php if( $company_address ) { echo '<p>' . $company_address . '</p>'; } ?>
                                        <?php if( $company_contact ) { echo '<p>' . $company_contact . '</p>'; } ?>
                                        <?php if( $company_email ) { echo '<p><a href="mailto:' . $company_email . '">' . $company_email . '</a></p>'; } ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php endif; ?> 

                        <?php if( $footer_widget_04 ): ?>   

                            <?php if( is_active_sidebar('footer-widget-04') ): ?>
                                <ul class="site-widget footer-widget-04">
                                    <?php dynamic_sidebar('footer-widget-04'); ?>
                                </ul>
                            <?php else: ?>
                                <div class="global-footer__row-02__col-03">
                                    <div class="global-footer__row-02__col-03__wrapper">
                                        <h3>Follow Us</h3>

                                        <ul class="social-media-icons">
                                            <?php if( $facebook ): ?>
                                                <li>
                                                    <a href="<?php echo $facebook; ?>" target="blank">
                                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            <?php endif;?>

                                            <?php if( $instagram ): ?>
                                                <li>
                                                    <a href="<?php echo $instagram; ?>" target="blank">
                                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            <?php endif;?>

                                            <?php if( $twitter ): ?>
                                                <li>
                                                    <a href="<?php echo $twitter; ?>" target="blank">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            <?php endif;?>

                                            <?php if( $youtube ): ?>
                                                <li>
                                                    <a href="<?php echo $youtube; ?>" target="blank">
                                                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            <?php endif;?>

                                            <?php if( $linkedin ): ?>
                                                <li>
                                                    <a href="<?php echo $linkedin; ?>" target="blank">
                                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            <?php endif;?>
                                        </ul>
                                    </div>
                                    
                                </div>
                            <?php endif; ?>

                        <?php endif; ?> 
                        
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if( $copyright_widget ): ?>   
                <div class="global-footer__row-03">
                    <div class="global-footer__row-01__wrapper<?php if( !$footer_section_width ) { echo ' content-limit'; } ?>">
                        
                        <?php if( is_active_sidebar('copyright-widget') ): ?>
                            <ul class="site-widget copyright-widget">
                                <?php dynamic_sidebar('copyright-widget'); ?>
                            </ul>
                        <?php else: ?>
                            <div class="copyright-wrapper">
                                <span>Copyright <?php the_time('Y'); ?>. <?php echo $company_name; ?>. All Rights Reserved.</span> 
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?> 
        </div>
    </footer>