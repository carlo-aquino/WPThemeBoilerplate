<?php if( have_rows( 'grid_module_settings' ) ): while( have_rows( 'grid_module_settings' ) ): the_row();
    $grid_heading = get_sub_field( 'grid_heading' );
    $grid_title_toggle = get_sub_field( 'grid_title_toggle' );
    $grid_description_toggle = get_sub_field( 'grid_description_toggle' );

    $grid_type = get_sub_field( 'grid_type' );
    $grid_items_per_row = get_sub_field( 'grid_items_per_row' );
    $grid_gap = get_sub_field( 'grid_gap' );
    $grid_masonry_toggle = get_sub_field( 'grid_masonry_toggle' );

    if( have_rows( 'grid_image_group' ) ) {
        while( have_rows( 'grid_image_group' ) ) {
            the_row();

            $grid_image_toggle = get_sub_field( 'grid_image_toggle' );
            $grid_image_size = get_sub_field( 'grid_image_size' );
        }
    }

    if( have_rows( 'grid_button_group' ) ) {
        while( have_rows( 'grid_button_group' ) ) {
            the_row();

            $grid_button_toggle = get_sub_field( 'grid_button_toggle' );
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
    
    $ctr = $transition_delay;
    $column_count = 0;

    if( $grid_items_per_row == 'one') $column_count = 1;
    if( $grid_items_per_row == 'two') $column_count = 2;
    if( $grid_items_per_row == 'three') $column_count = 3;
    if( $grid_items_per_row == 'four') $column_count = 4;

    $grid_item_count = 1;
    $grid_content_count = 0;
    $grid_content = get_sub_field('grid_custom_settings');

    if ( is_array($grid_content) ) $grid_content_count = count($grid_content);
?>

    <div class="grid-module__cards<?php if( $grid_masonry_toggle ) echo ' grid'; ?>"
        style="
            <?php if( !$grid_masonry_toggle ) echo 'grid-template-columns:repeat(' . $column_count . ', 1fr);'; ?>
            <?php if( $grid_gap ) echo 'gap:' . esc_attr($grid_gap) . 'em;'; ?>
        "
    >

        <?php if( have_rows( 'grid_custom_settings' ) ): while( have_rows( 'grid_custom_settings' ) ):
            the_row();
            $grid_custom_image = get_sub_field( 'grid_custom_image' );
            $grid_custom_title = get_sub_field( 'grid_custom_title' );
            $grid_custom_description = get_sub_field( 'grid_custom_description' );
            $grid_custom_link = get_sub_field( 'grid_custom_link' );

            if( $grid_custom_image ) {
                $grid_custom_image_url = $grid_custom_image['url'];
                $grid_custom_image_size = $grid_custom_image['sizes'][$grid_image_size];
                $grid_custom_image_width = $grid_custom_image['sizes'][$grid_image_size . '-width'];
                $grid_custom_image_height = $grid_custom_image['sizes'][$grid_image_size . '-height'];
                $grid_custom_image_alt = $grid_custom_image['alt'];
            }
            
            if( $grid_custom_link ) {
                $grid_custom_link_url = $grid_custom_link['url'];
                $grid_custom_link_title = $grid_custom_link['title'];
                $grid_custom_link_target = $grid_custom_link['target'] ? $grid_custom_link['target'] : '_self';
            } 
        ?>   
            
            <article class="grid-module__cards__card<?php echo ' ' . esc_attr($grid_type); ?><?php if( $grid_masonry_toggle ) echo ' grid-item'; ?>"
                style="
                    <?php if( $grid_masonry_toggle && $grid_type == 'type-two'  ) echo 'height: auto;'; ?>
                    <?php if( !$grid_masonry_toggle && $grid_type == 'type-two' && $grid_description_toggle  ) echo 'height: 100%;'; ?>
                    <?php if( !$grid_masonry_toggle && $grid_type == 'type-two' && !$grid_description_toggle  ) echo 'height: 15rem;'; ?>

                    <?php
                        if( $grid_masonry_toggle ) {
                            if( $grid_items_per_row == 'four' ) echo 'width: 25%;';
                            if( $grid_items_per_row == 'three' ) echo 'width: 33.33%;';
                            if( $grid_items_per_row == 'two' ) echo 'width: 50%;';
                            if( $grid_items_per_row == 'one' ) echo 'width: 100%;';        
                        } 
                    ?>

                    <?php if( $grid_gap && $grid_masonry_toggle ) echo 'padding:' . ( esc_attr($grid_gap) / 2 )  . 'em;'; ?>
                "

                <?php if( $transition_animation == 'fade' || $transition_animation == 'flip' || $transition_animation == 'slide' ): ?>
                    data-aos="<?php echo esc_html($transition_animation . '-' . $transition_direction); ?>"
                <?php endif; ?>
                
                <?php if( $transition_animation == 'zoom' ): ?>
                    data-aos="<?php echo esc_html($transition_animation . '-' . $transition_zoom_direction); ?>"
                <?php endif; ?>

                data-aos="<?php echo esc_html($transition_animation); ?>"

                <?php if( $transition_duration ): ?>
                    data-aos-duration="<?php echo esc_html($transition_duration); ?>"
                <?php endif; ?>
                
                data-aos-delay="<?php echo $ctr; ?>"

                role="group" aria-label="<?php echo esc_html($grid_item_count . ' / ' . $grid_content_count); ?>"
            >
                
                <?php if( $grid_custom_link && !$grid_button_toggle ): ?>
                    <a href="<?php echo esc_url( $grid_custom_link_url ); ?>" target="<?php echo esc_attr( $grid_custom_link_target ); ?>" aria-label="<?php echo esc_attr($grid_custom_title); ?>">
                        <span class="hit-area"></span>
                    </a>
                <?php endif; ?>
                
                <div class="grid-module__cards__card-container<?php echo ' ' . esc_attr($grid_type); ?>">
                    <div class="grid-module__cards__card-overlay background-overlay<?php echo ' ' . esc_attr($grid_type); ?>"></div>

                    <?php if( $grid_image_toggle && $grid_custom_image ): ?>
                        <div class="grid-module__cards__card-image">
                            <picture>
                                <source media="(max-width:980px)"
                                        srcset="<?php echo $grid_custom_image['sizes']['theme-large']; ?> 980w">
                                <source media="(max-width:768px)"
                                        srcset="<?php echo $grid_custom_image['sizes']['theme-medium']; ?> 768w">
                                <source media="(max-width:640px)"
                                        srcset="<?php echo $grid_custom_image['sizes']['theme-small']; ?> 640w">
                                <source media="(max-width:425px)"
                                        srcset="<?php echo $grid_custom_image['sizes']['theme-xsmall']; ?> 425w">

                                <img src="<?php echo esc_url($grid_custom_image_size); ?>" width="<?php echo esc_attr($grid_custom_image_width); ?>" alt="<?php echo esc_attr($grid_custom_image_alt); ?>" class="img-fluid<?php echo ' ' . esc_attr($grid_type); ?>">
                            </picture>
                        </div>
                    <?php endif; ?>
                    
                    <?php if( ($grid_custom_title && $grid_title_toggle) || ($grid_description_toggle && $grid_custom_description) ): ?>
                        <div class="grid-module__cards__card-content">

                            <header class="grid-module__cards__card-content__header">
                                <?php if( $grid_custom_title ): ?>

                                    <?php echo '<' . $grid_heading . '>'; ?>
                                        <?php echo esc_html($grid_custom_title); ?>
                                    <?php echo '</' . $grid_heading . '>'; ?>

                                <?php endif; ?>
                            </header>
                                
                            <?php if( $grid_description_toggle && $grid_custom_description ): ?>
                                <p><?php echo esc_html($grid_custom_description); ?></p>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                    <?php if( $grid_button_toggle && $grid_custom_link ): ?>
                        <div class="grid-module__cards__card-cta button-module">
                            <div class="button-module__wrapper">
                                <a href="<?php echo esc_url( $grid_custom_link_url ); ?>" target="<?php echo esc_attr( $grid_custom_link_target ); ?>" role="button">  
                                    <span>
                                        <?php echo esc_html($grid_custom_link_title); ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?> 

                </div>

            </article>
            
        <?php $ctr = $ctr+200; $grid_item_count++; endwhile; endif; ?>
    
    </div>

<?php endwhile; endif; ?>
    