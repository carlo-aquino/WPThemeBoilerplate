<?php if( have_rows( 'special_column_layout_settings' ) ): while( have_rows( 'special_column_layout_settings' ) ): the_row();
    $full_width = get_sub_field( 'full_width' ); 
    $section_height = get_sub_field( 'section_height' );
    $column_distribution = get_sub_field( 'column_distribution' ); 
    $column_gap = get_sub_field( 'column_gap' ); 
    
    if( have_rows( 'section_heading' ) ) {
        while( have_rows( 'section_heading' ) ) {
            the_row();

            $section_heading_toggle = get_sub_field( 'section_heading_toggle' );
            $section_heading_text = get_sub_field( 'section_heading_text' );
            $section_heading_color = get_sub_field( 'section_heading_color' );
            $section_heading_align = get_sub_field( 'section_heading_align' );
        }
    } 
    
    if( have_rows( 'background_settings' ) ) {
        while( have_rows( 'background_settings' ) ) {
            the_row();

            $background_type = get_sub_field( 'background_type' );
            $background_color = get_sub_field( 'background_color' );
            $background_image = get_sub_field( 'background_image' );
            $background_image_fixed = get_sub_field( 'background_image_fixed' );
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

    <section id="<?php if( $css_id ) echo esc_attr($css_id); ?>" class="special-column-layout mobile-spacer
        <?php
            if( $background_type == 'select' ) echo 'mobile-spacer--custom';
            if( $css_class ) echo ' ' . esc_attr($css_class);
            if( $full_width ) echo ' px-0';
        ?>"
        style="

            <?php if( $section_height ) echo 'height:' . esc_attr($section_height) . 'rem;'; ?>

            <?php if( $background_type=='color' ) echo 'background-color:' . esc_attr($background_color) . ';'; ?>
            <?php if( $background_type=='image' ) echo 'background-image:url(' . esc_url($background_image) . '); background-size:cover; background-position:center; background-repeat:no-repeat;'; ?>
            <?php if( $background_image_fixed && $background_image ) echo 'background-attachment: fixed;'; ?>

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
            data-aos="<?php echo esc_html($transition_animation . '-' . $transition_direction); ?>"
        <?php endif; ?>
        
        <?php if( $transition_animation == 'zoom' ): ?>
            data-aos="<?php echo esc_html($transition_animation . '-' . $transition_zoom_direction); ?>"
        <?php endif; ?>

        data-aos="<?php echo esc_html($transition_animation); ?>"

        <?php if( $transition_duration ): ?>
            data-aos-duration="<?php echo esc_html($transition_duration); ?>"
        <?php endif; ?>
        
        data-aos-delay="<?php echo esc_html($transition_delay); ?>"
    >
        <div class="background-overlay"
            style="
                <?php if( $background_type=='image' && $background_image_overlay ) echo 'display:block;'; ?>
                <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color ) echo 'background:' . esc_attr($background_image_overlay_color) . ';'; ?>
                <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color && $background_image_overlay_opacity ) echo 'opacity:' . esc_attr($background_image_overlay_opacity) . '%;'; ?>
            "
        ></div>

        <div class="container-fluid special-column-layout__wrapper <?php if( !$full_width ) echo 'content-limit'; ?>">

            <?php if( $section_heading_toggle ): ?>
                <h2 class="section-heading" style="text-align:<?php echo esc_attr($section_heading_align); ?>; color:<?php echo esc_attr($section_heading_color); ?>"><?php echo esc_html($section_heading_text); ?></h2>
            <?php endif; ?>  

            <div class="row <?php if( !$column_gap ) echo 'g-0 '; ?>special-column-layout__row">

                <?php if( have_rows('row_01_settings') ): while( have_rows('row_01_settings') ): the_row();
                    $column_link = get_sub_field( 'column_link' );
                    
                    if( have_rows( 'background_settings' ) ) {
                        while( have_rows( 'background_settings' ) ) {
                            the_row();
                
                            $background_type = get_sub_field( 'background_type' );
                            $background_color = get_sub_field( 'background_color' );
                            $background_image = get_sub_field( 'background_image' );
                            $background_image_fixed = get_sub_field( 'background_image_fixed' );
                            $background_image_overlay = get_sub_field( 'background_image_overlay' );
                            $background_image_overlay_color = get_sub_field( 'background_image_overlay_color' );
                            $background_image_overlay_opacity = get_sub_field( 'background_image_overlay_opacity' );
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
                    
                    if( $column_link ) {
                        $column_link_url = $column_link['url'];
                        $column_link_title = $column_link['title'];
                        $column_link_target = $column_link['target'] ? $column_link['target'] : '_self';
                    }
                ?>

                    
                    <div class="col-lg-12 py-2 special-column-layout__column <?php if( $full_width ) echo 'p-0'; ?> <?php if( $background_type=='image' && $background_image  ) echo 'px-0'; ?>">

                        <div id="<?php if( $css_id ) echo esc_attr($css_id); ?>" class="special-column-layout__column-wrapper <?php if( $css_class ) echo esc_attr($css_class); ?> <?php if( !$column_gap ) echo 'p-0 '; ?>"
                            style="
                                <?php if( $background_type=='color' ) echo 'background-color:' . esc_attr($background_color) . ';'; ?>
                                <?php if( $background_type=='image' ) echo 'background-image:url(' . esc_url($background_image) . ');'; ?>
                                <?php if( $background_image_fixed && $background_image ) echo 'background-attachment: fixed;'; ?>
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

                            <div class="background-overlay"
                                style="
                                    <?php if( $background_type=='image' && $background_image_overlay ) echo 'display:block;'; ?>
                                    <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color ) echo 'background:' . esc_attr($background_image_overlay_color) . ';'; ?>
                                    <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color && $background_image_overlay_opacity ) echo 'opacity:' . esc_attr($background_image_overlay_opacity) . '%;'; ?>
                                "
                            ></div>

                            <?php if( $column_link ): ?>
                                <a href="<?php echo esc_url( $column_link_url ); ?>" target="<?php echo esc_attr( $column_link_target ); ?>">
                                    <span class="column-link"></span>
                                </a>
                            <?php endif; ?> 

                            <div class="special-column-layout__column-wrapper__container"
                                style="
                                    <?php if( $padding_top ) echo 'padding-top:' . esc_attr($padding_top) . 'em;'; ?>
                                    <?php if( $padding_bottom ) echo 'padding-bottom:' . esc_attr($padding_bottom) . 'em;'; ?>
                                    <?php if( $padding_left ) echo 'padding-left:' . esc_attr($padding_left) . 'em;'; ?>
                                    <?php if( $padding_right ) echo 'padding-right:' . esc_attr($padding_right) . 'em;'; ?>
                                " 
                            >
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
                
                                            if( get_row_layout() == 'gallery_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/gallery', 'module' );
                                            }

                                            if( get_row_layout() == 'google_map_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/google_map', 'module' );
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
                            
                        </div>

                    </div>

                <?php endwhile; endif; ?>

                <?php if( have_rows('column_01_settings') ): while( have_rows('column_01_settings') ): the_row();
                    $column_link = get_sub_field( 'column_link' );
                    
                    if( have_rows( 'background_settings' ) ) {
                        while( have_rows( 'background_settings' ) ) {
                            the_row();
                
                            $background_type = get_sub_field( 'background_type' );
                            $background_color = get_sub_field( 'background_color' );
                            $background_image = get_sub_field( 'background_image' );
                            $background_image_fixed = get_sub_field( 'background_image_fixed' );
                            $background_image_overlay = get_sub_field( 'background_image_overlay' );
                            $background_image_overlay_color = get_sub_field( 'background_image_overlay_color' );
                            $background_image_overlay_opacity = get_sub_field( 'background_image_overlay_opacity' );
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
                    
                    if( $column_link ) {
                        $column_link_url = $column_link['url'];
                        $column_link_title = $column_link['title'];
                        $column_link_target = $column_link['target'] ? $column_link['target'] : '_self';
                    }
                ?>

                    <?php if ( $column_distribution=='fraction-01'): ?>
                        <div class="col-lg-6 py-2 special-column-layout__column special-column-layout__column-left <?php if( $full_width ) echo 'p-0'; ?> <?php if( $background_type=='image' && $background_image  ) echo 'px-0'; ?>">
                    <?php elseif ( $column_distribution=='fraction-02' ): ?>
                        <div class="col-lg-5 py-2 special-column-layout__column special-column-layout__column-left <?php if( $full_width ) echo 'p-0'; ?> <?php if( $background_type=='image' && $background_image  ) echo 'px-0'; ?>">
                    <?php else: ?>        
                        <div class="col-lg-7 py-2 special-column-layout__column special-column-layout__column-left <?php if( $full_width ) echo 'p-0'; ?> <?php if( $background_type=='image' && $background_image  ) echo 'px-0'; ?>">
                    <?php endif; ?>

                        <div id="<?php if( $css_id ) { echo esc_attr($css_id); } ?>" class="special-column-layout__column-wrapper <?php if( $css_class ) echo esc_attr($css_class); ?> <?php if( !$column_gap ) echo 'p-0 '; ?>"
                            style="
                                <?php if( $background_type=='color' ) echo 'background-color:' . esc_attr($background_color) . ';'; ?>
                                <?php if( $background_type=='image' ) echo 'background-image:url(' . esc_url($background_image) . ');'; ?>
                                <?php if( $background_image_fixed && $background_image ) echo 'background-attachment: fixed;'; ?>
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

                            <div class="background-overlay"
                                style="
                                    <?php if( $background_type=='image' && $background_image_overlay ) echo 'display:block;'; ?>
                                    <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color ) echo 'background:' . esc_attr($background_image_overlay_color) . ';'; ?>
                                    <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color && $background_image_overlay_opacity ) echo 'opacity:' . esc_attr($background_image_overlay_opacity) . '%;'; ?>
                                "
                            ></div>

                            <?php if( $column_link ): ?>
                                <a href="<?php echo esc_url( $column_link_url ); ?>" target="<?php echo esc_attr( $column_link_target ); ?>">
                                    <span class="column-link"></span>
                                </a>
                            <?php endif; ?> 

                            <div class="special-column-layout__column-wrapper__container"
                                style="
                                    <?php if( $padding_top ) echo 'padding-top:' . esc_attr($padding_top) . 'em;'; ?>
                                    <?php if( $padding_bottom ) echo 'padding-bottom:' . esc_attr($padding_bottom) . 'em;'; ?>
                                    <?php if( $padding_left ) echo 'padding-left:' . esc_attr($padding_left) . 'em;'; ?>
                                    <?php if( $padding_right ) echo 'padding-right:' . esc_attr($padding_right) . 'em;'; ?>
                                " 
                            >
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
                
                                            if( get_row_layout() == 'gallery_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/gallery', 'module' );
                                            }

                                            if( get_row_layout() == 'google_map_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/google_map', 'module' );
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
                            
                        </div>

                    </div>

                <?php endwhile; endif; ?>

                <?php if( have_rows('column_02_settings') ): while( have_rows('column_02_settings') ): the_row();
                    $column_link = get_sub_field( 'column_link' );
                    
                    if( have_rows( 'background_settings' ) ) {
                        while( have_rows( 'background_settings' ) ) {
                            the_row();
                
                            $background_type = get_sub_field( 'background_type' );
                            $background_color = get_sub_field( 'background_color' );
                            $background_image = get_sub_field( 'background_image' );
                            $background_image_fixed = get_sub_field( 'background_image_fixed' );
                            $background_image_overlay = get_sub_field( 'background_image_overlay' );
                            $background_image_overlay_color = get_sub_field( 'background_image_overlay_color' );
                            $background_image_overlay_opacity = get_sub_field( 'background_image_overlay_opacity' );
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
                    
                    if( $column_link ) {
                        $column_link_url = $column_link['url'];
                        $column_link_title = $column_link['title'];
                        $column_link_target = $column_link['target'] ? $column_link['target'] : '_self';
                    } ?>

                    <?php if ( $column_distribution=='fraction-01'): ?>
                        <div class="col-lg-6 py-2 special-column-layout__column special-column-layout__column-right <?php if( $full_width ) echo 'p-0'; ?> <?php if( $background_type=='image' && $background_image  ) echo 'px-0'; ?>">
                    <?php elseif ( $column_distribution=='fraction-02' ): ?>
                        <div class="col-lg-7 py-2 special-column-layout__column special-column-layout__column-right <?php if( $full_width ) echo 'p-0'; ?> <?php if( $background_type=='image' && $background_image  ) echo 'px-0'; ?>">
                    <?php else: ?>        
                        <div class="col-lg-5 py-2 special-column-layout__column special-column-layout__column-right <?php if( $full_width ) echo 'p-0'; ?> <?php if( $background_type=='image' && $background_image  ) echo 'px-0'; ?>">
                    <?php endif; ?>

                        <div id="<?php if( $css_id ) echo esc_attr($css_id); ?>" class="special-column-layout__column-wrapper <?php if( $css_class ) echo esc_attr($css_class); ?> <?php if( !$column_gap ) echo 'p-0 '; ?>"
                            style="
                                <?php if( $background_type=='color' ) echo 'background-color:' . esc_attr($background_color) . ';'; ?>
                                <?php if( $background_type=='image' ) echo 'background-image:url(' . esc_url($background_image) . ');'; ?>
                                <?php if( $background_image_fixed && $background_image ) echo 'background-attachment: fixed;'; ?>
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

                            <div class="background-overlay"
                                style="
                                    <?php if( $background_type=='image' && $background_image_overlay ) echo 'display:block;'; ?>
                                    <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color ) echo 'background:' . esc_attr($background_image_overlay_color) . ';'; ?>
                                    <?php if( $background_type=='image' && $background_image_overlay && $background_image_overlay_color && $background_image_overlay_opacity ) echo 'opacity:' . esc_attr($background_image_overlay_opacity) . '%;'; ?>
                                "
                            ></div>
                            
                            <?php if( $column_link ): ?>
                                <a href="<?php echo esc_url( $column_link_url ); ?>" target="<?php echo esc_attr( $column_link_target ); ?>">
                                    <span class="column-link"></span>
                                </a>
                            <?php endif; ?> 

                            <div class="special-column-layout__column-wrapper__container"
                                style="
                                    <?php if( $padding_top ) echo 'padding-top:' . esc_attr($padding_top) . 'em;'; ?>
                                    <?php if( $padding_bottom ) echo 'padding-bottom:' . esc_attr($padding_bottom) . 'em;'; ?>
                                    <?php if( $padding_left ) echo 'padding-left:' . esc_attr($padding_left) . 'em;'; ?>
                                    <?php if( $padding_right ) echo 'padding-right:' . esc_attr($padding_right) . 'em;'; ?>
                                "  
                            >
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
                
                                            if( get_row_layout() == 'gallery_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/gallery', 'module' );
                                            }

                                            if( get_row_layout() == 'google_map_module' ) {
                                                get_template_part( 'template-parts/acf-components/modules/google_map', 'module' );
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
                            
                        </div>

                    </div>

                <?php endwhile; endif; ?>
                
            </div>

        </div>
    </section>

<?php endwhile; endif; ?>