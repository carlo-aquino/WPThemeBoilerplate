<?php
    if( have_rows( 'button_module_settings' ) ) {
        while( have_rows( 'button_module_settings' ) ) {
            the_row();

            $button_content = get_sub_field( 'button_content' );
            $button_link = get_sub_field( 'button_link' );
            $button_align = get_sub_field( 'button_align' );

            $button_transition_animation = get_sub_field( 'button_transition_animation' );
            $button_transition_direction = get_sub_field( 'button_transition_direction' );
            $button_transition_zoom_direction = get_sub_field( 'button_transition_zoom_direction' );
            $button_transition_duration = get_sub_field( 'button_transition_duration' );
            $button_transition_delay = get_sub_field( 'button_transition_delay' );

            $button_css_id = get_sub_field( 'button_css_id' );
            $button_css_class = get_sub_field( 'button_css_class' );

            if( $button_link ) {
                $button_link_url = $button_link['url'];
                $button_link_title = $button_link['title'];
                $button_link_target = $button_link['target'] ? $button_link['target'] : '_self';
            } 

            if( have_rows( 'button_margin_settings' ) ) {
                while( have_rows( 'button_margin_settings' ) ) {
                    the_row();
        
                    $button_margin_top = get_sub_field( 'button_margin_top' );
                    $button_margin_bottom = get_sub_field( 'button_margin_bottom' );
                    $button_margin_left = get_sub_field( 'button_margin_left' );
                    $button_margin_right = get_sub_field( 'button_margin_right' );
                }
            }
        
            if( have_rows( 'button_padding_settings' ) ) {
                while( have_rows( 'button_padding_settings' ) ) {
                    the_row();
        
                    $button_padding_top = get_sub_field( 'button_padding_top' );
                    $button_padding_bottom = get_sub_field( 'button_padding_bottom' );
                    $button_padding_left = get_sub_field( 'button_padding_left' );
                    $button_padding_right = get_sub_field( 'button_padding_right' );
                }
            }
        }
    }  
?>

<div class="button-module">
    
    <div class="button-module__wrapper"
        style="
            text-align: <?php echo $button_align; ?>;

            <?php if( $button_margin_top ) { echo 'margin-top:' . $button_margin_top . 'em;'; } ?>
            <?php if( $button_margin_bottom ) { echo 'margin-bottom:' . $button_margin_bottom . 'em;'; } ?>
            <?php if( $button_margin_left ) { echo 'margin-left:' . $button_margin_left . 'em;'; } ?>
            <?php if( $button_margin_right ) { echo 'margin-right:' . $button_margin_right . 'em;'; } ?>

            <?php if( $button_padding_top ) { echo 'padding-top:' . $button_padding_top . 'em;'; } ?>
            <?php if( $button_padding_bottom ) { echo 'padding-bottom:' . $button_padding_bottom . 'em;'; } ?>
            <?php if( $button_padding_left ) { echo 'padding-left:' . $button_padding_left . 'em;'; } ?>
            <?php if( $button_padding_right ) { echo 'padding-right:' . $button_padding_right . 'em;'; } ?>
        "

        <?php if( $button_transition_animation == 'fade' || $button_transition_animation == 'flip' || $button_transition_animation == 'slide' ): ?>
            data-aos="<?php echo $button_transition_animation . '-' . $button_transition_direction; ?>"
        <?php endif; ?>
        
        <?php if( $button_transition_animation == 'zoom' ): ?>
            data-aos="<?php echo $button_transition_animation . '-' . $button_transition_zoom_direction; ?>"
        <?php endif; ?>

        <?php if( $button_transition_duration ): ?>
            data-aos-duration="<?php echo $button_transition_duration; ?>"
        <?php endif; ?>
        
        data-aos-delay="<?php echo $button_transition_delay; ?>"
    >

        <?php if( $button_link ): ?>
            <a href="<?php echo esc_url( $button_link_url ); ?>" target="<?php echo esc_attr( $button_link_target ); ?>">
        <?php endif; ?>    

            <span id="<?php if( $button_css_id ) { echo $button_css_id; } ?>" class="<?php if(  $button_css_class ) { echo  $button_css_class; } ?>">
                <?php if( $button_content ) { echo $button_content; } ?>
            </span>

        <?php if( $button_link ): ?>
            </a>
        <?php endif; ?>  

    </div>

</div>