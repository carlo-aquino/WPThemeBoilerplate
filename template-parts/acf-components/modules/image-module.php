<?php if( have_rows( 'image_module_settings' ) ): while( have_rows( 'image_module_settings' ) ):
    the_row();

    $image_content = get_sub_field( 'image_content' );
    $image_size = get_sub_field( 'image_size' );
    $image_lightbox = get_sub_field( 'image_lightbox' );
    $image_link = get_sub_field( 'image_link' );

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
    
    if( have_rows( 'animation_settings' ) ) {
        while( have_rows( 'animation_settings' ) ) {
            the_row();

            $transition_animation = get_sub_field( 'transition_animation' );
            $transition_direction = get_sub_field( 'transition_direction' );
            $transition_zoom_direction = get_sub_field( 'transition_zoom_direction' );
            $transition_duration = get_sub_field( 'transition_duration' );
            $transition_delay = get_sub_field( 'transition_delay' );
        }
    }

    if( have_rows( 'id_classes_settings' ) ) {
        while( have_rows( 'id_classes_settings' ) ) {
            the_row();

            $css_id = get_sub_field( 'css_id' );
            $css_class = get_sub_field( 'css_class' );
        }
    }           
?>

    <div id="<?php if( $css_id ) { echo ' ' . $css_id; } ?>" class="image-module<?php if( $css_class ) { echo ' ' . $css_class; } ?>">
        <div class="image-module__wrapper"
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

            <?php if( $transition_animation == 'fade' || $transition_animation == 'flip' || $transition_animation == 'slide' ): ?>
                data-aos="<?php echo $transition_animation . '-' . $transition_direction; ?>"
            <?php endif; ?>
            
            <?php if( $transition_animation == 'zoom' ): ?>
                data-aos="<?php echo $transition_animation . '-' . $transition_zoom_direction; ?>"
            <?php endif; ?>

            <?php if( $transition_duration ): ?>
                data-aos-duration="<?php echo $transition_duration; ?>"
            <?php endif; ?>

            data-aos="<?php echo $transition_animation; ?>"
            
            data-aos-delay="<?php echo $transition_delay; ?>"
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

                        <img src="<?php echo $image_content_size; ?>" width="<?php echo $image_content_width; ?>" height="<?php echo $image_content_height; ?>" alt="<?php echo $image_content_alt; ?>" class="img-fluid">
                    </picture>       
                <?php endif; ?>

            <?php if( $image_link || $image_lightbox ): ?>
                </a>
            <?php endif; ?>  
        </div>
    </div>
    
<?php endwhile; endif; ?>