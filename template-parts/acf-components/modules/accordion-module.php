<?php
    if( have_rows( 'accordion_module_settings' ) ) {
        while( have_rows( 'accordion_module_settings' ) ) {
            the_row();

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

    $accordionContentCTR = 1;
    $randID = rand();
?>

<div id="<?php if( $css_id ) { echo $css_id; } ?>" class="accordion-module<?php if( $css_class ) { echo ' ' . $css_class; } ?>">
    
    <div class="accordion-module__wrapper"
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

        <?php if( have_rows( 'accordion_module_settings' ) ): while( have_rows( 'accordion_module_settings' ) ): the_row(); ?>

            <?php if( have_rows( 'accordion_repeater' ) ): ?>

                <div class="accordion-module__accordions">

                    <div class="accordion-module__content">

                        <?php while( have_rows( 'accordion_repeater' ) ): the_row();
                            $accordion_heading = get_sub_field( 'accordion_heading' );
                            
                            if( have_rows( 'id_classes_settings' ) ) {
                                while( have_rows( 'id_classes_settings' ) ) {
                                    the_row();
                        
                                    $css_id = get_sub_field( 'css_id' );
                                    $css_class = get_sub_field( 'css_class' );
                                }
                            }
                        ?>

                            <input type="checkbox" id="<?php echo 'accordion-content' . $randID . '-' . $accordionContentCTR; ?>">
                            <label for="<?php echo 'accordion-content' . $randID . '-' . $accordionContentCTR; ?>"><?php echo $accordion_heading; ?></label>

                            <div
                                id="<?php echo 'accordion-content-' . $randID . '-' . $accordionContentCTR; if( $css_id ) { echo ' ' . $css_id; } ?>"
                                class="accordion-module__content-container<?php if( $css_class ) { echo ' ' . $css_class; } ?>"
                                data-accordion-content>  
                                
                                <?php
                                    if ( have_rows( 'accordion_content' ) ) {
                                        while( have_rows( 'accordion_content' ) ) {
                                            the_row();
                                            
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

                                            if( get_row_layout() == 'gallery_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/gallery', 'module' );
                                            }

                                            if( get_row_layout() == 'grid_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/grid', 'module' );
                                            }

                                            if( get_row_layout() == 'image_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/image', 'module' );
                                            }

                                            if( get_row_layout() == 'text_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/text', 'module' );
                                            }
                                        }
                                    }
                                ?>   

                            </div>

                        <?php $accordionContentCTR++; endwhile; ?>    

                    </div>    

                </div>    
                
            <?php endif; ?>

        <?php endwhile; endif; ?>

    </div>

</div>