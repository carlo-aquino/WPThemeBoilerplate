<?php 
    if( have_rows( 'grid_module_settings' ) ) {
        while( have_rows( 'grid_module_settings' ) ) {
            the_row();

            $grid_data_source = get_sub_field( 'grid_data_source' );
            $grid_items_per_row = get_sub_field( 'grid_items_per_row' );
            $grid_gap = get_sub_field( 'grid_gap' );
            $grid_masonry_toggle = get_sub_field( 'grid_masonry_toggle' );
            
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
    
    <div id="<?php if( $css_id ) { echo ' ' . $css_id; } ?>" class="grid-module<?php if( $css_class ) { echo ' ' . $css_class; } ?>">

        <div class="grid-module__wrapper"
            style="
                <?php if( $margin_top ) { echo 'margin-top:' . $margin_top . 'em;'; } ?>
                <?php if( $margin_bottom ) { echo 'margin-bottom:' . $margin_bottom . 'em;'; } ?>
                <?php if( $margin_left ) { echo 'margin-left:' . $margin_left . 'em;'; } ?>
                <?php if( $margin_right ) { echo 'margin-right:' . $margin_right . 'em;'; } ?>

                <?php if( $padding_top ) { echo 'padding-top:' . $padding_top . 'em;'; } ?>
                <?php if( $padding_bottom ) { echo 'padding-bottom:' . $padding_bottom . 'em;'; } ?>
                <?php if( $padding_left ) { echo 'padding-left:' . $padding_left . 'em;'; } ?>
                <?php if( $padding_right ) { echo 'padding-right:' . $padding_right . 'em;'; } ?>

                <?php if( $grid_gap && $grid_masonry_toggle ) echo 'margin:' . -( $grid_gap / 2 )  . 'em;'; ?>
            "
        >

            <?php
                if( $grid_data_source=='custom' ) {
                    get_template_part( 'template-parts/acf-components/modules/grid', 'module_custom-content' );        
                }

                if( $grid_data_source=='post' ) {
                    get_template_part( 'template-parts/acf-components/modules/grid', 'module_post-content' );        
                }
            ?>
            
        </div>

    </div>