<?php if( have_rows( 'grid_module_settings' ) ): while( have_rows( 'grid_module_settings' ) ): the_row();
    $grid_heading = get_sub_field( 'grid_heading' );
    $grid_description_toggle = get_sub_field( 'grid_description_toggle' );
    $grid_type = get_sub_field( 'grid_type' );

    $grid_items_per_row = get_sub_field( 'grid_items_per_row' );
    $grid_gap = get_sub_field( 'grid_gap' );
    $grid_css_id = get_sub_field( 'grid_css_id' );
    $grid_css_class = get_sub_field( 'grid_css_class' );

    $grid_transition_animation = get_sub_field( 'grid_transition_animation' );
    $grid_transition_direction = get_sub_field( 'grid_transition_direction' );
    $grid_transition_zoom_direction = get_sub_field( 'grid_transition_zoom_direction' );
    $grid_transition_duration = get_sub_field( 'grid_transition_duration' );
    $grid_transition_delay = get_sub_field( 'grid_transition_delay' );
    
    $ctr = $grid_transition_delay; ?>

    <div class="grid-module__cards
        <?php 
            if( $grid_items_per_row=='one' ) { echo ' grid-per-row__01'; } 
            if( $grid_items_per_row=='two' ) { echo ' grid-per-row__02'; } 
            if( $grid_items_per_row=='three' ) { echo ' grid-per-row__03'; } 
            if( $grid_items_per_row=='four' ) { echo ' grid-per-row__04'; } 
        ?>"

        style="
            <?php if( $grid_gap ) { echo 'gap: ' . $grid_gap . 'em'; } ?>
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
                $grid_custom_image_size = $grid_custom_image['sizes']['theme-small'];
                $grid_custom_image_width = $grid_custom_image['sizes']['theme-small-width'];
                $grid_custom_image_height = $grid_custom_image['sizes']['theme-small-height'];
                $grid_custom_image_alt = $grid_custom_image['alt'];
            }
            
            if( $grid_custom_link ) {
                $grid_custom_link_url = $grid_custom_link['url'];
                $grid_custom_link_title = $grid_custom_link['title'];
                $grid_custom_link_target = $grid_custom_link['target'] ? $grid_custom_link['target'] : '_self';
            } 
        ?>   

            <article class="grid-module__cards__card<?php echo ' ' . $grid_type; ?>"
                <?php if( $grid_transition_animation == 'fade' || $grid_transition_animation == 'flip' || $grid_transition_animation == 'slide' ): ?>
                    data-aos="<?php echo $grid_transition_animation . '-' . $grid_transition_direction; ?>"
                <?php endif; ?>
                
                <?php if( $grid_transition_animation == 'zoom' ): ?>
                    data-aos="<?php echo $grid_transition_animation . '-' . $grid_transition_zoom_direction; ?>"
                <?php endif; ?>

                <?php if( $grid_transition_duration ): ?>
                    data-aos-duration="<?php echo $grid_transition_duration; ?>"
                <?php endif; ?>
                
                data-aos-delay="<?php echo $ctr; ?>"
            >
                
                <?php if( $grid_custom_link ): ?>
                    <a href="<?php echo esc_url( $grid_custom_link_url ); ?>" target="<?php echo esc_attr( $grid_custom_link_target ); ?>">
                        <span class="hit-area"></span>
                    </a>
                <?php endif; ?>
                    
                <div class="grid-module__cards__card-overlay background-overlay<?php echo ' ' . $grid_type; ?>"></div>
                
                <?php if( $grid_custom_image ): ?>
                    <div class="grid-module__cards__card-image">
                        <img src="<?php echo $grid_custom_image_size; ?>" width="<?php echo $grid_custom_image_width; ?>" alt="<?php echo $grid_custom_image_alt; ?>" class="img-fluid<?php echo ' ' . $grid_type; ?>">
                    </div>
                <?php endif; ?>
                
                <?php if( $grid_custom_title || $grid_custom_description ): ?>
                    <div class="grid-module__cards__card-content">

                    <header class="grid-module__cards__card-content__header">
                        <?php if( $grid_custom_title ): ?>

                            <?php echo '<' . $grid_heading . '>'; ?>
                                <?php echo $grid_custom_title; ?>
                            <?php echo '</' . $grid_heading . '>'; ?>

                        <?php endif; ?>
                    </header>
                        
                    <?php if( $grid_description_toggle && $grid_custom_description ): ?>
                        <p><?php echo $grid_custom_description; ?></p>
                    <?php endif; ?>

                    </div>
                <?php endif; ?>

            </article>
            
        <?php $ctr = $ctr+200; endwhile; endif; ?>
    
    </div>

<?php endwhile; endif; ?>
    