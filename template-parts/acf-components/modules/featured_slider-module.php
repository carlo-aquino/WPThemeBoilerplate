<?php 
    if( have_rows( 'featured_slider_module_settings' ) ) {
        while( have_rows( 'featured_slider_module_settings' ) ) {
            the_row();

            $featured_slider_data_source = get_sub_field( 'featured_slider_data_source' );

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

    <div id="<?php if( $css_id ) echo ' ' . esc_attr($css_id); ?>" class="featured-slider-module container-fluid g-0<?php if( $css_class ) echo ' ' . esc_attr($css_class); ?>">
        
        <?php

            if( $featured_slider_data_source=='custom' ) {
                get_template_part( 'template-parts/acf-components/modules/featured_slider', 'module_custom-content' );        
            }

            if( $featured_slider_data_source=='post' ) {
                get_template_part( 'template-parts/acf-components/modules/featured_slider', 'module_post-content' );        
            }

        ?>

    </div>


