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

            $booking_css_id = get_sub_field( 'booking_css_id' );
            $booking_css_class = get_sub_field( 'booking_css_class' );

            $booking_transition_animation = get_sub_field( 'booking_transition_animation' );
            $booking_transition_direction = get_sub_field( 'booking_transition_direction' );
            $booking_transition_zoom_direction = get_sub_field( 'booking_transition_zoom_direction' );
            $booking_transition_duration = get_sub_field( 'booking_transition_duration' );
            $booking_transition_delay = get_sub_field( 'booking_transition_delay' );

            if( have_rows( 'booking_margin_settings' ) ) {
                while( have_rows( 'booking_margin_settings' ) ) {
                    the_row();
        
                    $booking_margin_top = get_sub_field( 'booking_margin_top' );
                    $booking_margin_bottom = get_sub_field( 'booking_margin_bottom' );
                    $booking_margin_left = get_sub_field( 'booking_margin_left' );
                    $booking_margin_right = get_sub_field( 'booking_margin_right' );
                }
            }
        
            if( have_rows( 'booking_padding_settings' ) ) {
                while( have_rows( 'booking_padding_settings' ) ) {
                    the_row();
        
                    $booking_padding_top = get_sub_field( 'booking_padding_top' );
                    $booking_padding_bottom = get_sub_field( 'booking_padding_bottom' );
                    $booking_padding_left = get_sub_field( 'booking_padding_left' );
                    $booking_padding_right = get_sub_field( 'booking_padding_right' );
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


    
    <div id="<?php if( $booking_css_id ) { echo ' ' . $booking_css_id; } ?>" class="booking-module<?php if( $booking_css_class ) { echo ' ' . $booking_css_class; } ?>">

        <div class="booking-module__wrapper"
            style="
                <?php if( $booking_margin_top ) { echo 'margin-top:' . $booking_margin_top . 'em;'; } ?>
                <?php if( $booking_margin_bottom ) { echo 'margin-bottom:' . $booking_margin_bottom . 'em;'; } ?>
                <?php if( $booking_margin_left ) { echo 'margin-left:' . $booking_margin_left . 'em;'; } ?>
                <?php if( $booking_margin_right ) { echo 'margin-right:' . $booking_margin_right . 'em;'; } ?>

                <?php if( $booking_padding_top ) { echo 'padding-top:' . $booking_padding_top . 'em;'; } ?>
                <?php if( $booking_padding_bottom ) { echo 'padding-bottom:' . $booking_padding_bottom . 'em;'; } ?>
                <?php if( $booking_padding_left ) { echo 'padding-left:' . $booking_padding_left . 'em;'; } ?>
                <?php if( $booking_padding_right ) { echo 'padding-right:' . $booking_padding_right . 'em;'; } ?>
            "

            <?php if( $booking_transition_animation == 'fade' || $booking_transition_animation == 'flip' || $booking_transition_animation == 'slide' ): ?>
                data-aos="<?php echo $booking_transition_animation . '-' . $booking_transition_direction; ?>"
            <?php endif; ?>
            
            <?php if( $booking_transition_animation == 'zoom' ): ?>
                data-aos="<?php echo $booking_transition_animation . '-' . $booking_transition_zoom_direction; ?>"
            <?php endif; ?>

            <?php if( $booking_transition_duration ): ?>
                data-aos-duration="<?php echo $booking_transition_duration; ?>"
            <?php endif; ?>
            
            data-aos-delay="<?php echo $booking_transition_delay; ?>"
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