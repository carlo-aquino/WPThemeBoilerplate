<?php
    if( have_rows( 'tab_module_settings' ) ) {
        while( have_rows( 'tab_module_settings' ) ) {
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

    $tabHeadingCTR = 1;
    $tabContentCTR = 1;
    $randID = rand();
?>

<div id="<?php if( $css_id ) echo ' ' . esc_attr($css_id); ?>" class="tab-module<?php if( $css_class ) echo ' ' . esc_attr($css_class); ?>">
    
    <div class="tab-module__wrapper"
        style="
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

        <?php if( have_rows( 'tab_module_settings' ) ): while( have_rows( 'tab_module_settings' ) ): the_row(); ?>

            <?php if( have_rows( 'tab_repeater' ) ): ?>

                <div class="tab-module__tabs">

                    <div class="tab-module__heading">
                        <ul class="tab-module__heading-wrapper" role="tablist">

                            <?php while( have_rows( 'tab_repeater' ) ): the_row();
                                $tab_heading = get_sub_field( 'tab_heading' );
                                
                                if( have_rows( 'id_classes_settings' ) ) {
                                    while( have_rows( 'id_classes_settings' ) ) {
                                        the_row();

                                        $css_class = get_sub_field( 'css_class' );
                                    }
                                }
                            ?>

                                <li class="tab-module__tab<?php if( $css_class ) echo ' ' . esc_attr($css_class); if( $tabHeadingCTR == 1 ) echo ' active'; ?>" data-tab-target="<?php echo '#tab-content-' . $randID . '-' . $tabHeadingCTR; ?>" role="tab" tabindex="<?php echo $tabHeadingCTR-1; ?>">
                                    <?php echo esc_html($tab_heading); ?>
                                </li>

                            <?php $tabHeadingCTR++; endwhile; ?>   

                        </ul>
                    </div>

                    <div class="tab-module__content" role="tabpanel">

                        <?php while( have_rows( 'tab_repeater' ) ): the_row();
                            $tab_heading = get_sub_field( 'tab_heading' );
                            
                            if( have_rows( 'id_classes_settings' ) ) {
                                while( have_rows( 'id_classes_settings' ) ) {
                                    the_row();
                        
                                    $css_id = get_sub_field( 'css_id' );
                                    $css_class = get_sub_field( 'css_class' );
                                }
                            }
                        ?>
                            
                            <input type="checkbox" id="<?php echo 'tab-content-mobile' . $randID . '-' . $tabContentCTR; ?>">
                            <label for="<?php echo 'tab-content-mobile' . $randID . '-' . $tabContentCTR; ?>"><?php echo esc_html($tab_heading); ?></label>

                            <div
                                id="<?php echo 'tab-content-' . $randID . '-' . $tabContentCTR; if( $css_id ) { echo ' ' . esc_attr($css_id); } ?>"
                                class="tab-module__content-container<?php if( $css_class ) { echo ' ' . esc_attr($css_class); } if( $tabContentCTR == 1 ) { echo ' active'; } ?>"
                                data-tab-content>  
                                
                                <?php
                                    if ( have_rows( 'tab_content' ) ) {
                                        while( have_rows( 'tab_content' ) ) {
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

                        <?php $tabContentCTR++; endwhile; ?>    

                    </div>    

                </div>    
                
            <?php endif; ?>

        <?php endwhile; endif; ?>

    </div>

</div>