<?php
    if( have_rows( 'booking_module_settings' ) ) {
        while( have_rows( 'booking_module_settings' ) ) {
            the_row();

            $booking_heading = get_sub_field( 'booking_heading' );
            $booking_heading_content = get_sub_field( 'booking_heading_content' );
            $booking_target_location = get_sub_field( 'booking_target_location' );
            $booking_location_id = get_sub_field( 'booking_location_id' );
            $booking_target_service = get_sub_field( 'booking_target_service' );
            $booking_service_id = get_sub_field( 'booking_service_id' );
            $booking_target_employee = get_sub_field( 'booking_target_employee' );
            $booking_employee_id = get_sub_field( 'booking_employee_id' );

            $booking_layout = get_sub_field( 'booking_layout' );

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

    if( have_rows('site_colors', 'option') ) {
        while( have_rows('site_colors', 'option') ) {
            the_row();
            $primary_color = get_sub_field( 'primary_color', 'option' );
            $secondary_color = get_sub_field( 'secondary_color', 'option' );
            $accent_color = get_sub_field( 'accent_color', 'option' );
        } 
    }
?>    
    
    <div id="<?php if( $css_id ) { echo ' ' . $css_id; } ?>" class="booking-module<?php if( $css_class ) { echo ' ' . $css_class; } ?>">

        <div class="booking-module__wrapper"
            style="
                <?php if( $margin_top ) { echo 'margin-top:' . $margin_top . 'em;'; } ?>
                <?php if( $margin_bottom ) { echo 'margin-bottom:' . $margin_bottom . 'em;'; } ?>
                <?php if( $margin_left ) { echo 'margin-left:' . $margin_left . 'em;'; } ?>
                <?php if( $margin_right ) { echo 'margin-right:' . $margin_right . 'em;'; } ?>

                <?php if( $padding_top ) { echo 'padding-top:' . $padding_top . 'em;'; } ?>
                <?php if( $padding_bottom ) { echo 'padding-bottom:' . $padding_bottom . 'em;'; } ?>
                <?php if( $padding_left ) { echo 'padding-left:' . $padding_left . 'em;'; } ?>
                <?php if( $padding_right ) { echo 'padding-right:' . $padding_right . 'em;'; } ?>
            "

            <?php if( $transition_animation == 'fade' || $transition_animation == 'flip' || $transition_animation == 'slide' ): ?>
                data-aos="<?php echo $transition_animation . '-' . $transition_direction; ?>"
            <?php endif; ?>
            
            <?php if( $transition_animation == 'zoom' ): ?>
                data-aos="<?php echo $transition_animation . '-' . $transition_zoom_direction; ?>"
            <?php endif; ?>

            data-aos="<?php echo $transition_animation; ?>"

            <?php if( $transition_duration ): ?>
                data-aos-duration="<?php echo $transition_duration; ?>"
            <?php endif; ?>
            
            data-aos-delay="<?php echo $transition_delay; ?>"
        >

            <?php if( $booking_heading && $booking_heading_content ): ?>
                <div class="booking-module__heading">
                    <?php echo $booking_heading_content; ?>
                </div>
            <?php endif; ?>

            <?php echo do_shortcode( '[ea_bootstrap width="100%" scroll_off="true" show_remaining_slots="1" layout_cols="' . $booking_layout . '"]' ); ?>

            <?php if( $booking_target_location && $booking_location_id ): ?>
                <?php echo do_shortcode( '[ea_bootstrap width="100%" scroll_off="true" show_remaining_slots="1" layout_cols="' . $booking_layout . '" location="' . $booking_location_id . '"]' ); ?>   
            <?php endif; ?>

            <?php if( $booking_target_service && $booking_service_id ): ?>
                <?php echo do_shortcode( '[ea_bootstrap width="100%" scroll_off="true" show_remaining_slots="1" layout_cols="' . $booking_layout . '" service="' . $booking_service_id . '"]' ); ?>   
            <?php endif; ?>

            <?php if( $booking_target_employee && $booking_employee_id ): ?>
                <?php echo do_shortcode( '[ea_bootstrap width="100%" scroll_off="true" show_remaining_slots="1" layout_cols="' . $booking_layout . '" worker="' . $booking_employee_id . '"]' ); ?>   
            <?php endif; ?>
        </div>
    </div>