<?php if( have_rows( 'one-column_layout_settings' ) ): while( have_rows( 'one-column_layout_settings' ) ): the_row();
    $full_width = get_sub_field( 'full_width' );
    $section_height = get_sub_field( 'section_height' );

    if( have_rows( 'background_settings' ) ) {
        while( have_rows( 'background_settings' ) ) {
            the_row();

            $background_type = get_sub_field( 'background_type' );
            $background_color = get_sub_field( 'background_color' );
            $background_image = get_sub_field( 'background_image' );
            $background_image_overlay = get_sub_field( 'background_image_overlay' );
            $background_image_overlay_color = get_sub_field( 'background_image_overlay_color' );
            $background_image_overlay_opacity = get_sub_field( 'background_image_overlay_opacity' );
        }
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
    } ?>

        <section id="<?php if( $css_id ) { echo $css_id; } ?>" class="one-column-layout mobile-spacer<?php if( $css_class ) { echo ' ' . $css_class; } ?><?php if( $full_width ) { echo ' px-0'; } ?>"
            style="
                <?php if( $section_height ) { echo 'height:' . $section_height . 'rem;'; } ?>
                
                <?php if( $background_type=='color' ) { echo 'background-color:' . $background_color . ';'; } ?>
                <?php if( $background_type=='image' ) { echo 'background-image:url(' . $background_image . ');'; } ?>

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

            <?php if( $transition_duration ): ?>
                data-aos-duration="<?php echo $transition_duration; ?>"
            <?php endif; ?>
            
            data-aos-delay="<?php echo $transition_delay; ?>"
        >
            <div class="background-overlay"
                style="
                    <?php if( $background_type=='image' && $background_image_overlay ) { echo 'display:block;'; } ?>
                    <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color ) { echo 'background:' . $background_image_overlay_color . ';'; } ?>
                    <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color && $background_image_overlay_opacity ) { echo 'opacity:' . $background_image_overlay_opacity . '%;'; } ?>
                "
            ></div>

            <div class="one-column-layout__wrapper <?php if( !$full_width ) { echo 'content-limit'; } ?>"> 

                <?php
                    if ( have_rows( 'column_modules' ) ) {
                        while( have_rows( 'column_modules' ) ) {
                            the_row();

                            if( get_row_layout() == 'accordion_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/accordion', 'module' );
                            }

                            if( get_row_layout() == 'booking_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/booking', 'module' );
                            }
                            
                            if( get_row_layout() == 'button_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/button', 'module' );
                            }

                            if( get_row_layout() == 'code_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/code', 'module' );
                            }

                            if( get_row_layout() == 'embed_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/embed', 'module' );
                            }

                            if( get_row_layout() == 'empty_space_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/empty_space', 'module' );
                            }

                            if( get_row_layout() == 'featured_slider_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/featured_slider', 'module' );
                            }

                            if( get_row_layout() == 'gallery_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/gallery', 'module' );
                            }

                            if( get_row_layout() == 'grid_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/grid', 'module' );
                            }

                            if( get_row_layout() == 'image_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/image', 'module' );
                            }

                            if( get_row_layout() == 'slider_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/slider', 'module' );
                            }
                
                            if( get_row_layout() == 'tab_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/tab', 'module' );
                            }

                            if( get_row_layout() == 'text_module' ) {
                                get_template_part( 'template-parts/acf-components/modules/text', 'module' );
                            }
                        }
                    }
                ?>

            </div>
            
        </section>

<?php endwhile; endif; ?>