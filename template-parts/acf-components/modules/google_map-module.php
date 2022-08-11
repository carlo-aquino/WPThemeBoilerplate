<?php if( have_rows( 'google_map_module_settings' ) ) : $gmap_api_key = get_field( 'gmap_api_key', 'option' ); ?>

    <?php while( have_rows( 'google_map_module_settings' ) ) :
        the_row();

        $google_map_address = get_sub_field( 'google_map_address' );
        $google_map_height = get_sub_field( 'google_map_height' );

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
    ?>

        <div id="<?php if( $css_id ) { echo ' ' . $css_id; } ?>" class="google-map-module<?php if( $css_class ) { echo ' ' . $css_class; } ?>">
            
            <div class="google-map-module__wrapper"
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

                <iframe
                    title="Google Map"
                    width="100%"
                    height="<?php if( $google_map_height ) { echo $google_map_height; } else { echo '100%'; } ?>"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/place?key=<?php echo $gmap_api_key; ?>
                        &q=<?php echo $google_map_address; ?>" >
                </iframe>

            </div>

        </div>

    <?php endwhile; ?> 

<?php endif; ?>