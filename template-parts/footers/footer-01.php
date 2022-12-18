<?php
    $facebook = get_field( 'facebook', 'option' );
    $twitter = get_field( 'twitter', 'option' );
    $youtube = get_field( 'youtube', 'option' );
    $instagram = get_field( 'instagram', 'option' );
    $linkedin = get_field( 'linkedin', 'option' );
    $company_name = get_field( 'company_name', 'option' );

    $footer_section_width = get_field( 'footer_section_width', 'option' );
    
    if( have_rows('custom_footer', 'option') ) {
        while( have_rows('custom_footer', 'option') ) {
            the_row();
            $footer_widget_01 = get_sub_field( 'footer_widget_01', 'option' );
            $footer_widget_02 = get_sub_field( 'footer_widget_02', 'option' );
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
?>  
    
    <footer id="footer-01" class="global-footer mobile-spacer"
        style="
            <?php if( $footer_primary_background=='color' && $footer_primary_background_color ) echo 'background-color:' . esc_attr($footer_primary_background_color) . ';'; ?>
            <?php if( $footer_primary_background=='image' ) echo 'background-image:url(' . esc_url($footer_primary_background_image) . '); background-size:cover; background-position:center; background-repeat:no-repeat;'; ?>
        "
    >
        <div class="global-footer__wrapper<?php if( !$footer_section_width ) echo ' content-limit'; ?>">

            <?php if( $footer_widget_01 ): ?>   

                <?php if( is_active_sidebar('footer-widget-01') ): ?>
                    <ul class="site-widget footer-widget-01">
                        <?php dynamic_sidebar('footer-widget-01'); ?>
                    </ul>
                <?php else: ?>
                    <div class="subscription-wrapper" style="<?php if( $accent_color ) echo 'background:' . esc_attr($accent_color) . ';'; ?>">
                        <?php echo do_shortcode( '[contact-form-7 id="808" title="Subscription Form"]' ); ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?> 


            <?php if( $footer_widget_02 ): ?>   

                <?php if( is_active_sidebar('footer-widget-02') ): ?>
                    <ul class="site-widget footer-widget-02">
                        <?php dynamic_sidebar('footer-widget-02'); ?>
                    </ul>
                <?php else: ?>
                    <div class="socialmedia-wrapper">

                        <div class="socialmedia-icons">
                            <?php if( $facebook ): ?>
                                <a href="<?php echo $facebook; ?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <?php endif; ?>

                            <?php if( $twitter ): ?>
                                <a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <?php endif; ?>

                            <?php if( $instagram ): ?>
                                <a href="<?php echo $instagram; ?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            <?php endif; ?>

                            <?php if( $youtube ): ?>
                                <a href="<?php echo $youtube; ?>" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                            <?php endif; ?>

                            <?php if( $linkedin ): ?>
                                <a href="<?php echo $linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                            <?php endif; ?>
                        </div>  

                    </div>
                <?php endif; ?>

            <?php endif; ?> 

            <?php if( $copyright_widget ): ?>   

                <?php if( is_active_sidebar('copyright-widget') ): ?>
                    <ul class="site-widget copyright-widget">
                        <?php dynamic_sidebar('copyright-widget'); ?>
                    </ul>
                <?php else: ?>
                    <div class="copyright-wrapper">
                        <span>Copyright <?php the_time('Y'); ?>. <?php echo esc_html($company_name); ?>. All Rights Reserved.</span> 
                    </div>
                <?php endif; ?>

            <?php endif; ?> 
        </div>
    </footer>