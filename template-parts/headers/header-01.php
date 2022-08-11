<?php
    $facebook = get_field( 'facebook', 'option' );
    $twitter = get_field( 'twitter', 'option' );
    $youtube = get_field( 'youtube', 'option' );
    $instagram = get_field( 'instagram', 'option' );
    $linkedin = get_field( 'linkedin', 'option' );
    $company_name = get_field( 'company_name', 'option' );
    $search_object_shortcode = get_field( 'search_object_shortcode', 'option' );

    if( have_rows('header_settings', 'option') ) {
        while( have_rows('header_settings', 'option') ) {
            the_row();
            $header_logo = get_sub_field( 'header_logo', 'option' );
            $header_section_width = get_sub_field( 'header_section_width', 'option' );
            $sticky_header = get_sub_field( 'sticky_header', 'option' );
        } 
    } 

    if( have_rows('custom_header', 'option') ) {
        while( have_rows('custom_header', 'option') ) {
            the_row();
            $header_widget_01 = get_sub_field( 'header_widget_01', 'option' );

            if( have_rows('header_background_primary_settings', 'option') ) {
                while( have_rows('header_background_primary_settings', 'option') ) {
                    the_row();
                    $header_primary_background = get_sub_field( 'header_primary_background', 'option' );
                    $header_primary_background_color = get_sub_field( 'header_primary_background_color', 'option' );
                    $header_primary_background_image = get_sub_field( 'header_primary_background_image', 'option' );
                } 
            }
        } 
    }  

    if( have_rows('site_colors', 'option') ) {
        while( have_rows('site_colors', 'option') ) {
            the_row();
            $primary_color = get_sub_field( 'primary_color', 'option' );
        } 
    }

    if( have_rows('logo', 'option') ) {
        while( have_rows('logo', 'option') ) {
            the_row();
            $logo_colored = get_sub_field( 'logo_colored', 'option' );
            $logo_white = get_sub_field( 'logo_white', 'option' );

            if( $logo_colored ) {
                $logo_colored_url = $logo_colored['url'];
                $logo_colored_size = $logo_colored['sizes']['theme-small'];
                $logo_colored_width = $logo_colored['sizes']['theme-small-width'];
                $logo_colored_height = $logo_colored['sizes']['theme-small-height'];
                $logo_colored_alt = $logo_colored['alt'];
            }

            if( $logo_white ) {
                $logo_white_url = $logo_white['url'];
                $logo_white_size = $logo_white['sizes']['theme-small'];
                $logo_white_width = $logo_white['sizes']['theme-small-width'];
                $logo_white_height = $logo_white['sizes']['theme-small-height'];
                $logo_white_alt = $logo_white['alt'];
            }
        } 
    } 

    
?>
    
    <header id="header-01" class="header <?php if($sticky_header) { echo 'sticky'; } ?>"
        style="
            <?php if( $header_primary_background=='color' && $header_primary_background_color ) { echo 'background:' . $header_primary_background_color . ';'; } ?>
            <?php if( $header_primary_background=='image' ) { echo 'background-image:url(' . $header_primary_background_image . '); background-size:cover; background-position:center; background-repeat:no-repeat;'; } ?>
        "
    >
        <div class="header-container <?php if( !$header_section_width ) { echo 'content-limit'; } ?>">
            <div class="header-left">
                <a href="<?php echo get_home_url(); ?>">
                    
                    <?php 
                        if( have_rows( 'page_banner' ) ) {
                            while( have_rows( 'page_banner' ) ){
                                the_row(); 
                                $page_bg_enable = get_sub_field( 'page_bg_enable' );
                    
                                if( have_rows( 'banner_type' ) ) {
                                    while( have_rows( 'banner_type' ) ){
                                        the_row(); 
                                        $banner_text_toggle = get_sub_field( 'banner_text_toggle' );

                                        if( !$page_bg_enable || !$banner_text_toggle ) { echo '<h1>' . $company_name . '</h1>'; }
                                    }  
                                }
                            }  
                        }
                    ?>

                    <?php $banner = get_field('page_banner'); if( !$banner ) { echo '<h1>' . $company_name . '</h1>'; } ?>

                    <img class="header-logo"
                        src="<?php if( $header_logo=='colored' ) { echo $logo_colored_size; } else { echo $logo_white_size; } ?>"
                        width="<?php if( $header_logo=='colored' ) { echo $logo_colored_width; } else { echo $logo_white_width; } ?>"
                        height="<?php if( $header_logo=='colored' ) { echo $logo_colored_height; } else { echo $logo_white_height; } ?>"
                        alt="<?php echo $company_name; ?> logo" loading="lazy"
                    >
                </a>
            </div>

            <div class="header-right">

                <?php globalMenu(); ?>

                <?php if( $header_widget_01 ): ?>            
                    <?php if( is_active_sidebar('header-widget-01') ): ?>
                        <ul class="site-widget header-widget-01">
                            <?php dynamic_sidebar('header-widget-01'); ?>
                        </ul>
                    <?php else: ?>
                        <ul class="site-widget header-widget-01">
                            <li>
                                <?php searchMenu(); ?>
                            </li>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>        
            </div>
        </div>
    </header>

    <header id="header-01-mobile-header" class="header <?php if($sticky_header) { echo 'sticky'; } ?>"
        style="
            <?php if( $header_primary_background=='color' && $header_primary_background_color ) { echo 'background:' . $header_primary_background_color . ';'; } ?>
            <?php if( $header_primary_background=='image' ) { echo 'background-image:url(' . $header_primary_background_image . '); background-size:cover; background-position:center; background-repeat:no-repeat;'; } ?>            
        "
    >
        <div class="mobile-header__left">
            <a href="<?php echo site_url(''); ?>">
                <img class="header-logo"
                    src="<?php if( $header_logo=='colored' ) { echo $logo_colored_size; } else { echo $logo_white_size; } ?>"
                    width="<?php if( $header_logo=='colored' ) { echo $logo_colored_width; } else { echo $logo_white_width; } ?>"
                    height="<?php if( $header_logo=='colored' ) { echo $logo_colored_height; } else { echo $logo_white_height; } ?>"
                    alt="<?php echo $company_name; ?> logo" loading="lazy"
                >
            </a>
        </div>

        <div class="mobile-header__right">
            <i class="fa fa-bars" aria-hidden="true" id="mobile-header__icon-menu"></i>
        </div>
    </header>

    <header id="mobile-header__drawer" class="mobile-header__drawer">
        <div class="mobile-header__drawer-overlay"></div>

        <div class="mobile-header__drawer-container">
            <?php if( $header_widget_01 && !is_active_sidebar('header-widget-01') ): ?>
                <div class="mobile-header__drawer-header">
                    <?php echo do_shortcode( $search_object_shortcode ); ?>
                </div>
            <?php endif; ?>

            <div class="mobile-header__drawer-content">
                <?php globalMenu(); ?>
            </div>

            <div class="mobile-header__drawer-footer">

                <div class="mobile-header__socialmedia">
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

                <span>&copy;<?php the_time('Y'); ?>. All Rights Reserved.</span>
            </div>
        </div>
    </header>