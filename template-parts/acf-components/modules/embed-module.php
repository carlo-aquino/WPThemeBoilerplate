<?php
    if( have_rows( 'embed_module_settings' ) ) {
        while( have_rows( 'embed_module_settings' ) ) {
            the_row();

            $embed_content = get_sub_field( 'embed_content' );
            $embed_css_id = get_sub_field( 'embed_css_id' );
            $embed_css_class = get_sub_field( 'embed_css_class' );

            if( have_rows( 'embed_margin_settings' ) ) {
                while( have_rows( 'embed_margin_settings' ) ) {
                    the_row();
        
                    $embed_margin_top = get_sub_field( 'embed_margin_top' );
                    $embed_margin_bottom = get_sub_field( 'embed_margin_bottom' );
                    $embed_margin_left = get_sub_field( 'embed_margin_left' );
                    $embed_margin_right = get_sub_field( 'embed_margin_right' );
                }
            }
        
            if( have_rows( 'embed_padding_settings' ) ) {
                while( have_rows( 'embed_padding_settings' ) ) {
                    the_row();
        
                    $embed_padding_top = get_sub_field( 'embed_padding_top' );
                    $embed_padding_bottom = get_sub_field( 'embed_padding_bottom' );
                    $embed_padding_left = get_sub_field( 'embed_padding_left' );
                    $embed_padding_right = get_sub_field( 'embed_padding_right' );
                }
            }
        }
    }  
?> 

    <div id="<?php if( $embed_css_id ) { echo ' ' . $embed_css_id; } ?>" class="embed-module<?php if( $embed_css_class ) { echo ' ' . $embed_css_class; } ?>">

        <div class="embed-module__wrapper"
            style="
                <?php if( $embed_margin_top ) { echo 'margin-top:' . $embed_margin_top . 'em;'; } ?>
                <?php if( $embed_margin_bottom ) { echo 'margin-bottom:' . $embed_margin_bottom . 'em;'; } ?>
                <?php if( $embed_margin_left ) { echo 'margin-left:' . $embed_margin_left . 'em;'; } ?>
                <?php if( $embed_margin_right ) { echo 'margin-right:' . $embed_margin_right . 'em;'; } ?>

                <?php if( $embed_padding_top ) { echo 'padding-top:' . $embed_padding_top . 'em;'; } ?>
                <?php if( $embed_padding_bottom ) { echo 'padding-bottom:' . $embed_padding_bottom . 'em;'; } ?>
                <?php if( $embed_padding_left ) { echo 'padding-left:' . $embed_padding_left . 'em;'; } ?>
                <?php if( $embed_padding_right ) { echo 'padding-right:' . $embed_padding_right . 'em;'; } ?>
            "
        >

            <div class="embed-module__wrapper embed-container">
                <?php if( $embed_content ) { echo $embed_content; } ?>
            </div>
            
        </div>
        
    </div>