<?php
    if( have_rows( 'gallery_module_settings' ) ) {
        while( have_rows( 'gallery_module_settings' ) ) {
            the_row();

            $gallery_images = get_sub_field( 'gallery_images' );
            $gallery_items_per_row = get_sub_field( 'gallery_items_per_row' );
            $gallery_gap = get_sub_field( 'gallery_gap' );
            $gallery_image_height = get_sub_field( 'gallery_image_height' );

            $gallery_transition_animation = get_sub_field( 'gallery_transition_animation' );
            $gallery_transition_direction = get_sub_field( 'gallery_transition_direction' );
            $gallery_transition_zoom_direction = get_sub_field( 'gallery_transition_zoom_direction' );
            $gallery_transition_duration = get_sub_field( 'gallery_transition_duration' );
            $gallery_transition_delay = get_sub_field( 'gallery_transition_delay' );

            $gallery_css_id = get_sub_field( 'gallery_css_id' );
            $gallery_css_class = get_sub_field( 'gallery_css_class' );

            $gallery_ctr = $gallery_transition_delay;

            if( have_rows( 'gallery_margin_settings' ) ) {
                while( have_rows( 'gallery_margin_settings' ) ) {
                    the_row();
        
                    $gallery_margin_top = get_sub_field( 'gallery_margin_top' );
                    $gallery_margin_bottom = get_sub_field( 'gallery_margin_bottom' );
                    $gallery_margin_left = get_sub_field( 'gallery_margin_left' );
                    $gallery_margin_right = get_sub_field( 'gallery_margin_right' );
                }
            }

            if( have_rows( 'gallery_padding_settings' ) ) {
                while( have_rows( 'gallery_padding_settings' ) ) {
                    the_row();
        
                    $gallery_padding_top = get_sub_field( 'gallery_padding_top' );
                    $gallery_padding_bottom = get_sub_field( 'gallery_padding_bottom' );
                    $gallery_padding_left = get_sub_field( 'gallery_padding_left' );
                    $gallery_padding_right = get_sub_field( 'gallery_padding_right' );
                }
            }
        }
    }   
?>    
    
    <div id="<?php if( $gallery_css_id ) { echo ' ' . $gallery_css_id; } ?>" class="gallery-module<?php if( $gallery_css_class ) { echo ' ' . $gallery_css_class; } ?>">

        <div class="gallery-module__wrapper"
            style="
                <?php if( $gallery_margin_top ) { echo 'margin-top:' . $gallery_margin_top . 'em;'; } ?>
                <?php if( $gallery_margin_bottom ) { echo 'margin-bottom:' . $gallery_margin_bottom . 'em;'; } ?>
                <?php if( $gallery_margin_left ) { echo 'margin-left:' . $gallery_margin_left . 'em;'; } ?>
                <?php if( $gallery_margin_right ) { echo 'margin-right:' . $gallery_margin_right . 'em;'; } ?>

                <?php if( $gallery_padding_top ) { echo 'padding-top:' . $gallery_padding_top . 'em;'; } ?>
                <?php if( $gallery_padding_bottom ) { echo 'padding-bottom:' . $gallery_padding_bottom . 'em;'; } ?>
                <?php if( $gallery_padding_left ) { echo 'padding-left:' . $gallery_padding_left . 'em;'; } ?>
                <?php if( $gallery_padding_right ) { echo 'padding-right:' . $gallery_padding_right . 'em;'; } ?>
            "
        >

            <?php if( $gallery_images ): ?>

                <div class="gallery-module__content
                    <?php 
                        if( $gallery_items_per_row=='one' ) { echo ' grid-per-row__01'; } 
                        if( $gallery_items_per_row=='two' ) { echo ' grid-per-row__02'; } 
                        if( $gallery_items_per_row=='three' ) { echo ' grid-per-row__03'; } 
                        if( $gallery_items_per_row=='four' ) { echo ' grid-per-row__04'; } 
                    ?>"

                    style="
                        <?php if( $gallery_gap ) { echo 'gap: ' . $gallery_gap . 'em'; } ?>
                    "
                >

                    <?php foreach( $gallery_images as $image ): ?>

                        <a href="<?php echo $image['sizes']['theme-xlarge']; ?>" data-fancybox="gallery-module-image">
                            <picture>
                                <source media="(max-width:980px)"
                                        srcset="<?php echo $image['sizes']['theme-large']; ?> 980w">
                                <source media="(max-width:768px)"
                                        srcset="<?php echo $image['sizes']['theme-medium']; ?> 768w">
                                <source media="(max-width:640px)"
                                        srcset="<?php echo $image['sizes']['theme-small']; ?> 640w">
                                <source media="(max-width:425px)"
                                        srcset="<?php echo $image['sizes']['theme-xsmall']; ?> 425w">

                                <img src="<?php echo $image['sizes']['theme-small']; ?>" class="img-fluid" width="<?php echo $image['sizes']['theme-small-width']; ?>"
                                    style="
                                        <?php if( $gallery_image_height ) { echo 'height: ' . $gallery_image_height . 'rem'; } ?>
                                    "

                                    <?php if( $gallery_transition_animation == 'fade' || $gallery_transition_animation == 'flip' || $gallery_transition_animation == 'slide' ): ?>
                                        data-aos="<?php echo $gallery_transition_animation . '-' . $gallery_transition_direction; ?>"
                                    <?php endif; ?>
                                    
                                    <?php if( $gallery_transition_animation == 'zoom' ): ?>
                                        data-aos="<?php echo $gallery_transition_animation . '-in'; ?>"
                                    <?php endif; ?>

                                    <?php if( $gallery_transition_duration ): ?>
                                        data-aos-duration="<?php echo $gallery_transition_duration; ?>"
                                    <?php endif; ?>
                                    
                                    data-aos-delay="<?php echo $gallery_ctr; ?>"
                                >
                            </picture>
                        </a>
                                       
                    <?php $gallery_ctr = $gallery_ctr+200; endforeach; ?>

                </div>

            <?php endif; ?>
            
        </div>
    </div>