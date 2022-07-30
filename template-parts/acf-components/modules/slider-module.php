<?php 
    if( have_rows( 'slider_module_settings' ) ) {
        while( have_rows( 'slider_module_settings' ) ) {
            the_row();

            $slider_data_source = get_sub_field( 'slider_data_source' );

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

            if( have_rows( 'id_classes_settings' ) ) {
                while( have_rows( 'id_classes_settings' ) ) {
                    the_row();
        
                    $css_id = get_sub_field( 'css_id' );
                    $css_class = get_sub_field( 'css_class' );
                }
            }
        }
    }
?>    

    <div id="<?php if( $css_id ) { echo ' ' . $css_id; } ?>" class="slider-module<?php if( $css_class ) { echo ' ' . $css_class; } ?>">
       
        <div class="slider-module__container"
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
