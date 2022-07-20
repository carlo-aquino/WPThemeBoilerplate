<?php
    if( have_rows( 'text_module_settings' ) ) {
        while( have_rows( 'text_module_settings' ) ) {
            the_row();

            $text_content = get_sub_field( 'text_content' );
            $text_link = get_sub_field( 'text_link' );

            $text_transition_animation = get_sub_field( 'text_transition_animation' );
            $text_transition_direction = get_sub_field( 'text_transition_direction' );
            $text_transition_zoom_direction = get_sub_field( 'text_transition_zoom_direction' );
            $text_transition_duration = get_sub_field( 'text_transition_duration' );
            $text_transition_delay = get_sub_field( 'text_transition_delay' );

            $text_css_id = get_sub_field( 'text_css_id' );
            $text_css_class = get_sub_field( 'text_css_class' );

            if( $text_link ) {
                $text_link_url = $text_link['url'];
                $text_link_title = $text_link['title'];
                $text_link_target = $text_link['target'] ? $text_link['target'] : '_self';
            } 

            if( have_rows( 'text_margin_settings' ) ) {
                while( have_rows( 'text_margin_settings' ) ) {
                    the_row();
        
                    $text_margin_top = get_sub_field( 'text_margin_top' );
                    $text_margin_bottom = get_sub_field( 'text_margin_bottom' );
                    $text_margin_left = get_sub_field( 'text_margin_left' );
                    $text_margin_right = get_sub_field( 'text_margin_right' );
                }
            }

            if( have_rows( 'text_padding_settings' ) ) {
                while( have_rows( 'text_padding_settings' ) ) {
                    the_row();
        
                    $text_padding_top = get_sub_field( 'text_padding_top' );
                    $text_padding_bottom = get_sub_field( 'text_padding_bottom' );
                    $text_padding_left = get_sub_field( 'text_padding_left' );
                    $text_padding_right = get_sub_field( 'text_padding_right' );
                }
            }
        }
    } 
?>

    <div id="<?php if( $text_css_id ) { echo ' ' . $text_css_id; } ?>" class="text-module<?php if( $text_css_class ) { echo ' ' . $text_css_class; } ?>">
        <div class="text-module__wrapper"
            style="
                <?php if( $text_margin_top ) { echo 'margin-top:' . $text_margin_top . 'em;'; } ?>
                <?php if( $text_margin_bottom ) { echo 'margin-bottom:' . $text_margin_bottom . 'em;'; } ?>
                <?php if( $text_margin_left ) { echo 'margin-left:' . $text_margin_left . 'em;'; } ?>
                <?php if( $text_margin_right ) { echo 'margin-right:' . $text_margin_right . 'em;'; } ?>

                <?php if( $text_padding_top ) { echo 'padding-top:' . $text_padding_top . 'em;'; } ?>
                <?php if( $text_padding_bottom ) { echo 'padding-bottom:' . $text_padding_bottom . 'em;'; } ?>
                <?php if( $text_padding_left ) { echo 'padding-left:' . $text_padding_left . 'em;'; } ?>
                <?php if( $text_padding_right ) { echo 'padding-right:' . $text_padding_right . 'em;'; } ?>
            "

            <?php if( $text_transition_animation == 'fade' || $text_transition_animation == 'flip' || $text_transition_animation == 'slide' ): ?>
                data-aos="<?php echo $text_transition_animation . '-' . $text_transition_direction; ?>"
            <?php endif; ?>
            
            <?php if( $text_transition_animation == 'zoom' ): ?>
                data-aos="<?php echo $text_transition_animation . '-' . $text_transition_zoom_direction; ?>"
            <?php endif; ?>

            <?php if( $text_transition_duration ): ?>
                data-aos-duration="<?php echo $text_transition_duration; ?>"
            <?php endif; ?>
            
            data-aos-delay="<?php echo $text_transition_delay; ?>"
        >

            <?php if( $text_link ): ?>
                <a href="<?php echo esc_url( $text_link_url ); ?>" target="<?php echo esc_attr( $text_link_target ); ?>">
            <?php endif; ?>    

                <?php if( $text_content ) { echo $text_content; } ?>

            <?php if( $text_link ): ?>
                </a>
            <?php endif; ?>  

        </div>
    </div>