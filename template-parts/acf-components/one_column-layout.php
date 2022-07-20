<?php if( have_rows( 'one-column_layout_settings' ) ): while( have_rows( 'one-column_layout_settings' ) ): the_row();
    $full_width = get_sub_field( 'full_width' );
    $section_height = get_sub_field( 'section_height' );
    $section_css_id = get_sub_field( 'section_css_id' );
    $section_css_class = get_sub_field( 'section_css_class' );
    $section_background_type = get_sub_field( 'section_background_type' );
    $section_background_color = get_sub_field( 'section_background_color' );
    $section_background_image = get_sub_field( 'section_background_image' );
    $section_background_image_overlay = get_sub_field( 'section_background_image_overlay' );
    $section_background_image_overlay_color = get_sub_field( 'section_background_image_overlay_color' );
    $section_background_image_overlay_opacity = get_sub_field( 'section_background_image_overlay_opacity' );

    $section_transition_animation = get_sub_field( 'section_transition_animation' );
    $section_transition_direction = get_sub_field( 'section_transition_direction' );
    $section_transition_zoom_direction = get_sub_field( 'section_transition_zoom_direction' );
    $section_transition_duration = get_sub_field( 'section_transition_duration' );
    $section_transition_delay = get_sub_field( 'section_transition_delay' );
    
    if( have_rows( 'section_heading' ) ) {
        while( have_rows( 'section_heading' ) ) {
            the_row();

            $section_heading_toggle = get_sub_field( 'section_heading_toggle' );
            $section_heading_text = get_sub_field( 'section_heading_text' );
            $section_heading_color = get_sub_field( 'section_heading_color' );
            $section_heading_align = get_sub_field( 'section_heading_align' );
        }
    }
    
    if( have_rows( 'section_margin_settings' ) ) {
        while( have_rows( 'section_margin_settings' ) ) {
            the_row();

            $section_margin_top = get_sub_field( 'section_margin_top' );
            $section_margin_bottom = get_sub_field( 'section_margin_bottom' );
            $section_margin_left = get_sub_field( 'section_margin_left' );
            $section_margin_right = get_sub_field( 'section_margin_right' );
        }
    } 
    
    if( have_rows( 'section_padding_settings' ) ) {
        while( have_rows( 'section_padding_settings' ) ) {
            the_row();

            $section_padding_top = get_sub_field( 'section_padding_top' );
            $section_padding_bottom = get_sub_field( 'section_padding_bottom' );
            $section_padding_left = get_sub_field( 'section_padding_left' );
            $section_padding_right = get_sub_field( 'section_padding_right' );
        }
    }?>

        <section id="<?php if( $section_css_id ) { echo $section_css_id; } ?>" class="one-column-layout mobile-spacer<?php if( $section_css_class ) { echo ' ' . $section_css_class; } ?><?php if( $full_width ) { echo ' px-0'; } ?>"
            style="
                <?php if( $section_height ) { echo 'height:' . $section_height . 'px;'; } ?>
                
                <?php if( $section_background_type=='color' ) { echo 'background:' . $section_background_color . ';'; } ?>
                <?php if( $section_background_type=='image' ) { echo 'background-image:url(' . $section_background_image . '); background-size:cover; background-position:center; background-repeat:no-repeat;'; } ?>

                <?php if( $section_margin_top ) { echo 'margin-top:' . $section_margin_top . 'em;'; } ?>
                <?php if( $section_margin_bottom ) { echo 'margin-bottom:' . $section_margin_bottom . 'em;'; } ?>
                <?php if( $section_margin_left ) { echo 'margin-left:' . $section_margin_left . 'em;'; } ?>
                <?php if( $section_margin_right ) { echo 'margin-right:' . $section_margin_right . 'em;'; } ?>

                <?php if( $section_padding_top ) { echo 'padding-top:' . $section_padding_top . 'em;'; } ?>
                <?php if( $section_padding_bottom ) { echo 'padding-bottom:' . $section_padding_bottom . 'em;'; } ?>
                <?php if( $section_padding_left ) { echo 'padding-left:' . $section_padding_left . 'em;'; } ?>
                <?php if( $section_padding_right ) { echo 'padding-right:' . $section_padding_right . 'em;'; } ?>
            "

            <?php if( $section_transition_animation == 'fade' || $section_transition_animation == 'flip' || $section_transition_animation == 'slide' ): ?>
                data-aos="<?php echo $section_transition_animation . '-' . $section_transition_direction; ?>"
            <?php endif; ?>
            
            <?php if( $section_transition_animation == 'zoom' ): ?>
                data-aos="<?php echo $section_transition_animation . '-' . $section_transition_zoom_direction; ?>"
            <?php endif; ?>

            <?php if( $section_transition_duration ): ?>
                data-aos-duration="<?php echo $section_transition_duration; ?>"
            <?php endif; ?>
            
            data-aos-delay="<?php echo $section_transition_delay; ?>"
        >
            <div class="background-overlay"
                style="
                    <?php if( $section_background_type=='image' && $section_background_image_overlay ) { echo 'display:block;'; } ?>
                    <?php if( $section_background_type=='image' && $section_background_image_overlay && $section_background_image_overlay_color ) { echo 'background:' . $section_background_image_overlay_color . ';'; } ?>
                    <?php if( $section_background_type=='image' && $section_background_image_overlay && $section_background_image_overlay_color && $section_background_image_overlay_opacity ) { echo 'opacity:' . $section_background_image_overlay_opacity . '%;'; } ?>
                "
            ></div>

            <div class="one-column-layout__wrapper <?php if( !$full_width ) { echo 'content-limit'; } ?>">
            
                <?php if( $section_heading_toggle ): ?>
                    <h2 class="section-heading" style="text-align:<?php echo $section_heading_align; ?>; color:<?php echo $section_heading_color; ?>"><?php echo $section_heading_text; ?></h2>
                <?php endif; ?>  

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