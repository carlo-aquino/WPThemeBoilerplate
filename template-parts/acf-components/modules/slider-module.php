<?php 
    if( have_rows( 'slider_module_settings' ) ) {
        while( have_rows( 'slider_module_settings' ) ) {
            the_row();

            $slider_data_source = get_sub_field( 'slider_data_source' );

            $slider_css_id = get_sub_field( 'slider_css_id' );
            $slider_css_class = get_sub_field( 'slider_css_class' );

            if( have_rows( 'slider_margin_settings' ) ) {
                while( have_rows( 'slider_margin_settings' ) ) {
                    the_row();
        
                    $slider_margin_top = get_sub_field( 'slider_margin_top' );
                    $slider_margin_bottom = get_sub_field( 'slider_margin_bottom' );
                    $slider_margin_left = get_sub_field( 'slider_margin_left' );
                    $slider_margin_right = get_sub_field( 'slider_margin_right' );
                }
            }

            if( have_rows( 'slider_padding_settings' ) ) {
                while( have_rows( 'slider_padding_settings' ) ) {
                    the_row();
        
                    $slider_padding_top = get_sub_field( 'slider_padding_top' );
                    $slider_padding_bottom = get_sub_field( 'slider_padding_bottom' );
                    $slider_padding_left = get_sub_field( 'slider_padding_left' );
                    $slider_padding_right = get_sub_field( 'slider_padding_right' );
                }
            }
        }
    }
?>    

    <div id="<?php if( $slider_css_id ) { echo ' ' . $slider_css_id; } ?>" class="slider-module<?php if( $slider_css_class ) { echo ' ' . $slider_css_class; } ?>">
       
        <div class="slider-module__container"
            style="
                <?php if( $slider_margin_top ) { echo 'margin-top:' . $slider_margin_top . 'em;'; } ?>
                <?php if( $slider_margin_bottom ) { echo 'margin-bottom:' . $slider_margin_bottom . 'em;'; } ?>
                <?php if( $slider_margin_left ) { echo 'margin-left:' . $slider_margin_left . 'em;'; } ?>
                <?php if( $slider_margin_right ) { echo 'margin-right:' . $slider_margin_right . 'em;'; } ?>

                <?php if( $slider_padding_top ) { echo 'padding-top:' . $slider_padding_top . 'em;'; } ?>
                <?php if( $slider_padding_bottom ) { echo 'padding-bottom:' . $slider_padding_bottom . 'em;'; } ?>
                <?php if( $slider_padding_left ) { echo 'padding-left:' . $slider_padding_left . 'em;'; } ?>
                <?php if( $slider_padding_right ) { echo 'padding-right:' . $slider_padding_right . 'em;'; } ?>
            "
        >

            <?php
                if( $slider_data_source=='custom' ) {
                    get_template_part( 'template-parts/acf-components/modules/slider', 'module_custom-content' );        
                }

                if( $slider_data_source=='post' ) {
                    get_template_part( 'template-parts/acf-components/modules/slider', 'module_post-content' );        
                }
            ?>

        </div>
    </div>
