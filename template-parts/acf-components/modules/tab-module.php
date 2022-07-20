<?php
    if( have_rows( 'tab_module_settings' ) ) {
        while( have_rows( 'tab_module_settings' ) ) {
            the_row();

            $tab_transition_animation = get_sub_field( 'tab_transition_animation' );
            $tab_transition_direction = get_sub_field( 'tab_transition_direction' );
            $tab_transition_zoom_direction = get_sub_field( 'tab_transition_zoom_direction' );
            $tab_transition_duration = get_sub_field( 'tab_transition_duration' );
            $tab_transition_delay = get_sub_field( 'tab_transition_delay' );

            $tab_css_id = get_sub_field( 'tab_css_id' );
            $tab_css_class = get_sub_field( 'tab_css_class' );

            if( have_rows( 'tab_margin_settings' ) ) {
                while( have_rows( 'tab_margin_settings' ) ) {
                    the_row();
        
                    $tab_margin_top = get_sub_field( 'tab_top_margin' );
                    $tab_margin_bottom = get_sub_field( 'tab_bottom_margin' );
                    $tab_margin_left = get_sub_field( 'tab_left_margin' );
                    $tab_margin_right = get_sub_field( 'tab_right_margin' );
                }
            }
        
            if( have_rows( 'tab_padding_settings' ) ) {
                while( have_rows( 'tab_padding_settings' ) ) {
                    the_row();
        
                    $tab_padding_top = get_sub_field( 'tab_top_padding' );
                    $tab_padding_bottom = get_sub_field( 'tab_bottom_padding' );
                    $tab_padding_left = get_sub_field( 'tab_left_padding' );
                    $tab_padding_right = get_sub_field( 'tab_right_padding' );
                }
            }
        }
    }

    $tabHeadingCTR = 1;
    $tabContentCTR = 1;
    $randID = rand();
?>

<div class="tab-module">
    
    <div class="tab-module__wrapper">

        <?php if( have_rows( 'tab_module_settings' ) ): while( have_rows( 'tab_module_settings' ) ): the_row(); ?>

            <?php if( have_rows( 'tab_repeater' ) ): ?>

                <div class="tab-module__tabs">

                    <div class="tab-module__heading">
                        <ul class="tab-module__heading-wrapper">

                            <?php while( have_rows( 'tab_repeater' ) ): the_row();
                                $tab_heading = get_sub_field( 'tab_heading' );
                                $tab_tab_css_class = get_sub_field( 'tab_tab_css_class' );
                            ?>

                                <li class="tab-module__tab<?php if( $tab_tab_css_class ) { echo ' ' . $tab_tab_css_class; } ?>" data-tab-target="<?php echo '#tab-content-' . $randID . '-' . $tabHeadingCTR; ?>">
                                    <?php echo $tab_heading; ?>
                                </li>

                            <?php $tabHeadingCTR++; endwhile; ?>   

                        </ul>
                    </div>

                    <div class="tab-module__content">

                        <?php while( have_rows( 'tab_repeater' ) ): the_row();
                            $tab_heading = get_sub_field( 'tab_heading' );
                            $tab_tab_css_id = get_sub_field( 'tab_tab_css_id' );
                            $tab_tab_css_class = get_sub_field( 'tab_tab_css_class' );
                        ?>

                            
                            <input type="checkbox" id="<?php echo 'tab-content-mobile' . $randID . '-' . $tabContentCTR; ?>">
                            <label for="<?php echo 'tab-content-mobile' . $randID . '-' . $tabContentCTR; ?>"><?php echo $tab_heading; ?></label>

                            <div
                                id="<?php echo 'tab-content-' . $randID . '-' . $tabContentCTR; if( $tab_tab_css_id ) { echo ' ' . $tab_tab_css_id; } ?>"
                                class="tab-module__content-container<?php if( $tab_tab_css_class ) { echo ' ' . $tab_tab_css_class; } ?>"
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