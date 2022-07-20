<?php
    if( have_rows( 'code_module_settings' ) ) {
        while( have_rows( 'code_module_settings' ) ) {
            the_row();

            $code_content = get_sub_field( 'code_content' );
            $code_css_id = get_sub_field( 'code_css_id' );
            $code_css_class = get_sub_field( 'code_css_class' );

            if( have_rows( 'code_margin_settings' ) ) {
                while( have_rows( 'code_margin_settings' ) ) {
                    the_row();
        
                    $code_margin_top = get_sub_field( 'code_margin_top' );
                    $code_margin_bottom = get_sub_field( 'code_margin_bottom' );
                    $code_margin_left = get_sub_field( 'code_margin_left' );
                    $code_margin_right = get_sub_field( 'code_margin_right' );
                }
            }
        
            if( have_rows( 'code_padding_settings' ) ) {
                while( have_rows( 'code_padding_settings' ) ) {
                    the_row();
        
                    $code_padding_top = get_sub_field( 'code_padding_top' );
                    $code_padding_bottom = get_sub_field( 'code_padding_bottom' );
                    $code_padding_left = get_sub_field( 'code_padding_left' );
                    $code_padding_right = get_sub_field( 'code_padding_right' );
                }
            }
        }
    }  
?> 

    <div id="<?php if( $code_css_id ) { echo ' ' . $code_css_id; } ?>" class="code-module<?php if( $code_css_class ) { echo ' ' . $code_css_class; } ?>">

        <div class="code-module__wrapper"
            style="
                <?php if( $code_margin_top ) { echo 'margin-top:' . $code_margin_top . 'em;'; } ?>
                <?php if( $code_margin_bottom ) { echo 'margin-bottom:' . $code_margin_bottom . 'em;'; } ?>
                <?php if( $code_margin_left ) { echo 'margin-left:' . $code_margin_left . 'em;'; } ?>
                <?php if( $code_margin_right ) { echo 'margin-right:' . $code_margin_right . 'em;'; } ?>

                <?php if( $code_padding_top ) { echo 'padding-top:' . $code_padding_top . 'em;'; } ?>
                <?php if( $code_padding_bottom ) { echo 'padding-bottom:' . $code_padding_bottom . 'em;'; } ?>
                <?php if( $code_padding_left ) { echo 'padding-left:' . $code_padding_left . 'em;'; } ?>
                <?php if( $code_padding_right ) { echo 'padding-right:' . $code_padding_right . 'em;'; } ?>
            "
        >
            <?php if( $code_content ) { echo $code_content; } ?>
        </div>
        
    </div>