<?php
    if( have_rows( 'image_module_settings' ) ) {
        while( have_rows( 'image_module_settings' ) ) {
            the_row();

            $image_content = get_sub_field( 'image_content' );
            $image_size = get_sub_field( 'image_size' );
            $image_lightbox = get_sub_field( 'image_lightbox' );
            $image_link = get_sub_field( 'image_link' );

            $image_transition_animation = get_sub_field( 'image_transition_animation' );
            $image_transition_direction = get_sub_field( 'image_transition_direction' );
            $image_transition_zoom_direction = get_sub_field( 'image_transition_zoom_direction' );
            $image_transition_duration = get_sub_field( 'image_transition_duration' );
            $image_transition_delay = get_sub_field( 'image_transition_delay' );

            $image_css_id = get_sub_field( 'image_css_id' );
            $image_css_class = get_sub_field( 'image_css_class' );

            if( have_rows( 'image_margin_settings' ) ) {
                while( have_rows( 'image_margin_settings' ) ) {
                    the_row();
        
                    $image_margin_top = get_sub_field( 'image_top_margin' );
                    $image_margin_bottom = get_sub_field( 'image_bottom_margin' );
                    $image_margin_left = get_sub_field( 'image_left_margin' );
                    $image_margin_right = get_sub_field( 'image_right_margin' );
                }
            }
        
            if( have_rows( 'image_padding_settings' ) ) {
                while( have_rows( 'image_padding_settings' ) ) {
                    the_row();
        
                    $image_padding_top = get_sub_field( 'image_top_padding' );
                    $image_padding_bottom = get_sub_field( 'image_bottom_padding' );
                    $image_padding_left = get_sub_field( 'image_left_padding' );
                    $image_padding_right = get_sub_field( 'image_right_padding' );
                }
            }

            if( $image_content ) {
                $image_content_size = $image_content['sizes'][$image_size];
                $image_content_width = $image_content['sizes'][ $image_size . '-width'];
                $image_content_height = $image_content['sizes'][ $image_size . '-height'];
                $image_content_alt = $image_content['alt'];
            }

            if( $image_link ) {
                $image_link_url = $image_link['url'];
                $image_link_title = $image_link['title'];
                $image_link_target = $image_link['target'] ? $image_link['target'] : '_self';
            } 
        }
    }        
?>

<div id="<?php if( $image_css_id ) { echo ' ' . $image_css_id; } ?>" class="image-module<?php if( $image_css_class ) { echo ' ' . $image_css_class; } ?>">
    <div class="image-module__wrapper"
        style="
            <?php if( $image_margin_top ) { echo 'margin-top:' . $image_margin_top . 'em;'; } ?>
            <?php if( $image_margin_bottom ) { echo 'margin-bottom:' . $image_margin_bottom . 'em;'; } ?>
            <?php if( $image_margin_left ) { echo 'margin-left:' . $image_margin_left . 'em;'; } ?>
            <?php if( $image_margin_right ) { echo 'margin-right:' . $image_margin_right . 'em;'; } ?>

            <?php if( $image_padding_top ) { echo 'padding-top:' . $image_padding_top . 'em;'; } ?>
            <?php if( $image_padding_bottom ) { echo 'padding-bottom:' . $image_padding_bottom . 'em;'; } ?>
            <?php if( $image_padding_left ) { echo 'padding-left:' . $image_padding_left . 'em;'; } ?>
            <?php if( $image_padding_right ) { echo 'padding-right:' . $image_padding_right . 'em;'; } ?>
        "

        <?php if( $image_transition_animation == 'fade' || $image_transition_animation == 'flip' || $image_transition_animation == 'slide' ): ?>
            data-aos="<?php echo $image_transition_animation . '-' . $image_transition_direction; ?>"
        <?php endif; ?>
        
        <?php if( $image_transition_animation == 'zoom' ): ?>
            data-aos="<?php echo $image_transition_animation . '-' . $image_transition_zoom_direction; ?>"
        <?php endif; ?>

        <?php if( $image_transition_duration ): ?>
            data-aos-duration="<?php echo $image_transition_duration; ?>"
        <?php endif; ?>
        
        data-aos-delay="<?php echo $image_transition_delay; ?>"
    >

        <?php if( $image_link && !$image_lightbox ): ?>
            <a href="<?php echo esc_url( $image_link_url ); ?>" target="<?php echo esc_attr( $image_link_target ); ?>">
        <?php endif; ?>   
        
        <?php if( $image_lightbox ): ?>
            <a href="<?php echo $image_content['sizes']['theme-xlarge']; ?>" data-fancybox="images">
        <?php endif; ?> 

            <?php if( $image_content ): ?>
                <picture>
                    <source media="(max-width:980px)"
                            srcset="<?php echo $image_content['sizes']['theme-large']; ?> 980w">
                    <source media="(max-width:768px)"
                            srcset="<?php echo $image_content['sizes']['theme-medium']; ?> 768w">
                    <source media="(max-width:640px)"
                            srcset="<?php echo $image_content['sizes']['theme-small']; ?> 640w">
                    <source media="(max-width:425px)"
                            srcset="<?php echo $image_content['sizes']['theme-xsmall']; ?> 425w">

                    <img src="<?php echo $image_content_size; ?>" width="<?php echo $image_content_width; ?>" height="<?php echo $image_content_height; ?>" alt="<?php echo $image_content_alt; ?>" class="img-fluid" loading="lazy">
                </picture>       
            <?php endif; ?>

        <?php if( $image_link || $image_lightbox ): ?>
            </a>
        <?php endif; ?>  
    </div>
</div>