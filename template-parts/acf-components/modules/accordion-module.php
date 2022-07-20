<?php
    if( have_rows( 'tab_module_settings' ) ) {
        while( have_rows( 'tab_module_settings' ) ) {
            the_row();

            $accordion_transition_animation = get_sub_field( 'accordion_transition_animation' );
            $accordion_transition_direction = get_sub_field( 'accordion_transition_direction' );
            $accordion_transition_zoom_direction = get_sub_field( 'accordion_transition_zoom_direction' );
            $accordion_transition_duration = get_sub_field( 'accordion_transition_duration' );
            $accordion_transition_delay = get_sub_field( 'accordion_transition_delay' );

            $accordion_css_id = get_sub_field( 'accordion_css_id' );
            $accordion_css_class = get_sub_field( 'accordion_css_class' );

            if( have_rows( 'accordion_margin_settings' ) ) {
                while( have_rows( 'accordion_margin_settings' ) ) {
                    the_row();
        
                    $accordion_margin_top = get_sub_field( 'accordion_top_margin' );
                    $accordion_margin_bottom = get_sub_field( 'accordion_bottom_margin' );
                    $accordion_margin_left = get_sub_field( 'accordion_left_margin' );
                    $accordion_margin_right = get_sub_field( 'accordion_right_margin' );
                }
            }
        
            if( have_rows( 'accordion_padding_settings' ) ) {
                while( have_rows( 'accordion_padding_settings' ) ) {
                    the_row();
        
                    $accordion_padding_top = get_sub_field( 'accordion_top_padding' );
                    $accordion_padding_bottom = get_sub_field( 'accordion_bottom_padding' );
                    $accordion_padding_left = get_sub_field( 'accordion_left_padding' );
                    $accordion_padding_right = get_sub_field( 'accordion_right_padding' );
                }
            }
        }
    }

    $accordionContentCTR = 1;
    $randID = rand();
?>

<div class="accordion-module">
    
    <div class="accordion-module__wrapper">

        <?php if( have_rows( 'accordion_module_settings' ) ): while( have_rows( 'accordion_module_settings' ) ): the_row(); ?>

            <?php if( have_rows( 'accordion_repeater' ) ): ?>

                <div class="accordion-module__accordions">

                    <div class="accordion-module__content">

                        <?php while( have_rows( 'accordion_repeater' ) ): the_row();
                            $accordion_heading = get_sub_field( 'accordion_heading' );
                            $accordion_item_css_id = get_sub_field( 'accordion_item_css_id' );
                            $accordion_item_css_class = get_sub_field( 'accordion_item_css_class' );
                        ?>

                            <input type="checkbox" id="<?php echo 'accordion-content' . $randID . '-' . $accordionContentCTR; ?>">
                            <label for="<?php echo 'accordion-content' . $randID . '-' . $accordionContentCTR; ?>"><?php echo $accordion_heading; ?></label>

                            <div
                                id="<?php echo 'accordion-content-' . $randID . '-' . $accordionContentCTR; if( $accordion_item_css_id ) { echo ' ' . $accordion_item_css_id; } ?>"
                                class="accordion-module__content-container<?php if( $accordion_item_css_class ) { echo ' ' . $accordion_item_css_class; } ?>"
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