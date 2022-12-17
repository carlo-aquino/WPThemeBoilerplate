<?php
    if( have_rows( 'button_module_settings' ) ) {
        while( have_rows( 'button_module_settings' ) ) {
            the_row();

            $button_content = get_sub_field( 'button_content' );
            $button_link = get_sub_field( 'button_link' );
            $button_align = get_sub_field( 'button_align' );

            if( $button_link ) {
                $button_link_url = $button_link['url'];
                $button_link_title = $button_link['title'];
                $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
            }

            if( have_rows( 'margin_settings' ) ) {
                while( have_rows( 'margin_settings' ) ) {
                    the_row();
        
                    $margin_top = get_sub_field( 'margin_top' );
                    $margin_bottom = get_sub_field( 'margin_bottom' );
                    $margin_left = get_sub_field( 'margin_left' );
                    $margin_right = get_sub_field( 'margin_right' );
                }
            }
        
            if( have_rows( 'padding_settings' ) ) {
                while( have_rows( 'padding_settings' ) ) {
                    the_row();
        
                    $padding_top = get_sub_field( 'padding_top' );
                    $padding_bottom = get_sub_field( 'padding_bottom' );
                    $padding_left = get_sub_field( 'padding_left' );
                    $padding_right = get_sub_field( 'padding_right' );
                }
            }
            
            if( have_rows( 'animation_settings' ) ) {
                while( have_rows( 'animation_settings' ) ) {
                    the_row();
        
                    $transition_animation = get_sub_field( 'transition_animation' );
                    $transition_direction = get_sub_field( 'transition_direction' );
                    $transition_zoom_direction = get_sub_field( 'transition_zoom_direction' );
                    $transition_duration = get_sub_field( 'transition_duration' );
                    $transition_delay = get_sub_field( 'transition_delay' );
                }
            }

            if( have_rows( 'id_classes_settings' ) ) {
                while( have_rows( 'id_classes_settings' ) ) {
                    the_row();
        
                    $css_id = get_sub_field( 'css_id' );
                    $css_class = get_sub_field( 'css_class' );
                }
            }
        }
    }  
?>

<div class="button-module">
    
    <div class="button-module__wrapper"
        style="
            text-align: <?php echo esc_attr($button_align); ?>;

            <?php if( $margin_top ) echo 'margin-top:' . esc_attr($margin_top) . 'em;'; ?>
            <?php if( $margin_bottom ) echo 'margin-bottom:' . esc_attr($margin_bottom) . 'em;'; ?>
            <?php if( $margin_left ) echo 'margin-left:' . esc_attr($margin_left) . 'em;'; ?>
            <?php if( $margin_right ) echo 'margin-right:' . esc_attr($margin_right) . 'em;'; ?>

            <?php if( $padding_top ) echo 'padding-top:' . esc_attr($padding_top) . 'em;'; ?>
            <?php if( $padding_bottom ) echo 'padding-bottom:' . esc_attr($padding_bottom) . 'em;'; ?>
            <?php if( $padding_left ) echo 'padding-left:' . esc_attr($padding_left) . 'em;'; ?>
            <?php if( $padding_right ) echo 'padding-right:' . esc_attr($padding_right) . 'em;'; ?>
        "

        <?php if( $transition_animation == 'fade' || $transition_animation == 'flip' || $transition_animation == 'slide' ): ?>
            data-aos="<?php echo esc_attr($transition_animation . '-' . $transition_direction); ?>"
        <?php endif; ?>
        
        <?php if( $transition_animation == 'zoom' ): ?>
            data-aos="<?php echo esc_attr($transition_animation . '-' . $transition_zoom_direction); ?>"
        <?php endif; ?>

        data-aos="<?php echo esc_attr($transition_animation); ?>"

        <?php if( $transition_duration ): ?>
            data-aos-duration="<?php echo esc_attr($transition_duration); ?>"
        <?php endif; ?>
        
        data-aos-delay="<?php echo esc_attr($transition_delay); ?>"
    >

        <?php if( $button_link ): ?>
            <a href="<?php echo esc_url( $button_link_url ); ?>" target="<?php echo esc_attr( $button_link_target ); ?>" role="button">
        <?php endif; ?>    

            <span id="<?php if( $css_id ) echo esc_attr($css_id); ?>" class="<?php if(  $css_class ) echo  esc_attr($css_class); ?>">
                <?php if( $button_content ) echo esc_html($button_content); ?>
            </span>

        <?php if( $button_link ): ?>
            </a>
        <?php endif; ?>  

    </div>

</div>