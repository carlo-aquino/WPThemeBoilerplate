<?php
    if( have_rows( 'gallery_module_settings' ) ) {
        while( have_rows( 'gallery_module_settings' ) ) {
            the_row();
            
            $gallery_image_size = get_sub_field( 'gallery_image_size' );
            $gallery_images = get_sub_field( 'gallery_images' );
            $gallery_items_per_row = get_sub_field( 'gallery_items_per_row' );
            $gallery_gap = get_sub_field( 'gallery_gap' );
            $gallery_masonry_toggle = get_sub_field( 'gallery_masonry_toggle' );
            $gallery_image_height = get_sub_field( 'gallery_image_height' );

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

            $gallery_ctr = $transition_delay;
            $column_count = 0;

            if( $gallery_items_per_row == 'one') { $column_count = 1; }
            if( $gallery_items_per_row == 'two') { $column_count = 2; }
            if( $gallery_items_per_row == 'three') { $column_count = 3; }
            if( $gallery_items_per_row == 'four') { $column_count = 4; }
        }
    }   
?>    
    
    <div id="<?php if( $css_id ) echo ' ' . esc_attr($css_id); ?>" class="gallery-module<?php if( $css_class ) echo ' ' . esc_attr($css_class); ?>">

        <div class="gallery-module__wrapper"
            style="
                <?php if( $margin_top ) echo 'margin-top:' . esc_attr($margin_top) . 'em;'; ?>
                <?php if( $margin_bottom ) echo 'margin-bottom:' . esc_attr($margin_bottom) . 'em;'; ?>
                <?php if( $margin_left ) echo 'margin-left:' . esc_attr($margin_left) . 'em;'; ?>
                <?php if( $margin_right ) echo 'margin-right:' . esc_attr($margin_right) . 'em;'; ?>

                <?php if( $padding_top ) echo 'padding-top:' . esc_attr($padding_top) . 'em;'; ?>
                <?php if( $padding_bottom ) echo 'padding-bottom:' . esc_attr($padding_bottom) . 'em;'; ?>
                <?php if( $padding_left ) echo 'padding-left:' . esc_attr($padding_left) . 'em;'; ?>
                <?php if( $padding_right ) echo 'padding-right:' . esc_attr($padding_right) . 'em;'; ?>
            "
        >

            <?php if( $gallery_images ): ?>

                <div class="gallery-module__content<?php if( $gallery_masonry_toggle ) echo ' grid js-masonry'; ?>"
                    style="
                        <?php if( !$gallery_masonry_toggle ) echo 'grid-template-columns:repeat(' . esc_attr($column_count) . ', 1fr);'; ?>
                        <?php if( $gallery_gap ) echo 'gap:' . esc_attr($gallery_gap) . ';'; ?>
                    "
                >

                    <?php foreach( $gallery_images as $image ): ?>
                        
                        <div class="gallery-module__item<?php if( $gallery_masonry_toggle ) echo ' grid-item'; ?>"
                            style="
                                <?php if( !$gallery_masonry_toggle && $gallery_image_height ) echo 'height: ' . esc_attr($gallery_image_height) . 'rem'; ?>
                                <?php
                                    if( $gallery_masonry_toggle ) {
                                        if( $gallery_items_per_row == 'four' ) echo 'width: 25%;';
                                        if( $gallery_items_per_row == 'three' ) echo 'width: 33.33%;';
                                        if( $gallery_items_per_row == 'two' ) echo 'width: 50%;';
                                        if( $gallery_items_per_row == 'one' ) echo 'width: 100%;';        
                                    } 
                                ?>

                                <?php if( $gallery_gap ) echo 'padding:' . ( esc_attr($gallery_gap) / 2 )  . 'em;'; ?>
                            "
                        >

                            <a href="<?php echo esc_url($image['sizes']['theme-xlarge']); ?>" data-fancybox="gallery-module-image" data-caption="<?php echo esc_attr($image['caption']); ?>" aria-label="<?php echo esc_attr($image['alt']); ?>">
                                <picture>
                                    <source media="(max-width:980px)"
                                            srcset="<?php echo esc_url($image['sizes']['theme-large']); ?> 980w">
                                    <source media="(max-width:768px)"
                                            srcset="<?php echo esc_url($image['sizes']['theme-medium']); ?> 768w">
                                    <source media="(max-width:640px)"
                                            srcset="<?php echo esc_url($image['sizes']['theme-small']); ?> 640w">
                                    <source media="(max-width:425px)"
                                            srcset="<?php echo esc_url($image['sizes']['theme-xsmall']); ?> 425w">

                                    <img src="<?php echo esc_url($image['sizes'][$gallery_image_size]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid" width="<?php echo esc_attr($image['sizes'][$gallery_image_size . '-width']); ?>" height="<?php echo esc_attr($image['sizes'][$gallery_image_size . '-height']); ?>"

                                        <?php if( $transition_animation == 'fade' || $transition_animation == 'flip' || $transition_animation == 'slide' ): ?>
                                            data-aos="<?php echo esc_attr($transition_animation . '-' . $transition_direction); ?>"
                                        <?php endif; ?>
                                        
                                        <?php if( $transition_animation == 'zoom' ): ?>
                                            data-aos="<?php echo esc_attr($transition_animation . '-in'); ?>"
                                        <?php endif; ?>

                                        data-aos="<?php echo esc_attr($transition_animation); ?>"

                                        <?php if( $transition_duration ): ?>
                                            data-aos-duration="<?php echo esc_attr($transition_duration); ?>"
                                        <?php endif; ?>
                                        
                                        data-aos-delay="<?php echo $gallery_ctr; ?>"
                                    >
                                </picture>
                            </a>

                        </div>
                         
                    <?php $gallery_ctr = $gallery_ctr+200; endforeach; ?>

                </div>

            <?php endif; ?>
            
        </div>
    </div>