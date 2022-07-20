<?php 
    if( have_rows( 'grid_module_settings' ) ) {
        while( have_rows( 'grid_module_settings' ) ) {
            the_row();

            $grid_data_source = get_sub_field( 'grid_data_source' );
            $grid_items_per_row = get_sub_field( 'grid_items_per_row' );
            $grid_gap = get_sub_field( 'grid_gap' );
            $grid_css_id = get_sub_field( 'grid_css_id' );
            $grid_css_class = get_sub_field( 'grid_css_class' );

            if( have_rows( 'grid_margin_settings' ) ) {
                while( have_rows( 'grid_margin_settings' ) ) {
                    the_row();
        
                    $grid_margin_top = get_sub_field( 'grid_margin_top' );
                    $grid_margin_bottom = get_sub_field( 'grid_margin_bottom' );
                    $grid_margin_left = get_sub_field( 'grid_margin_left' );
                    $grid_margin_right = get_sub_field( 'grid_margin_right' );
                }
            }

            if( have_rows( 'grid_padding_settings' ) ) {
                while( have_rows( 'grid_padding_settings' ) ) {
                    the_row();
        
                    $grid_padding_top = get_sub_field( 'grid_padding_top' );
                    $grid_padding_bottom = get_sub_field( 'grid_padding_bottom' );
                    $grid_padding_left = get_sub_field( 'grid_padding_left' );
                    $grid_padding_right = get_sub_field( 'grid_padding_right' );
                }
            }
        }
    }    
?>    
    
    <div id="<?php if( $grid_css_id ) { echo ' ' . $grid_css_id; } ?>" class="grid-module<?php if( $grid_css_class ) { echo ' ' . $grid_css_class; } ?>">

        <div class="grid-module__wrapper"
            style="
                <?php if( $grid_margin_top ) { echo 'margin-top:' . $grid_margin_top . 'em;'; } ?>
                <?php if( $grid_margin_bottom ) { echo 'margin-bottom:' . $grid_margin_bottom . 'em;'; } ?>
                <?php if( $grid_margin_left ) { echo 'margin-left:' . $grid_margin_left . 'em;'; } ?>
                <?php if( $grid_margin_right ) { echo 'margin-right:' . $grid_margin_right . 'em;'; } ?>

                <?php if( $grid_padding_top ) { echo 'padding-top:' . $grid_padding_top . 'em;'; } ?>
                <?php if( $grid_padding_bottom ) { echo 'padding-bottom:' . $grid_padding_bottom . 'em;'; } ?>
                <?php if( $grid_padding_left ) { echo 'padding-left:' . $grid_padding_left . 'em;'; } ?>
                <?php if( $grid_padding_right ) { echo 'padding-right:' . $grid_padding_right . 'em;'; } ?>
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