<?php
    if( have_rows( 'grid_module_settings' ) ) {

        while( have_rows( 'grid_module_settings' ) ) {
            
            the_row();
            
            $grid_heading = get_sub_field( 'grid_heading' );
            $grid_type = get_sub_field( 'grid_type' );

            $grid_data_source = get_sub_field( 'grid_data_source' );
            $grid_items_per_row = get_sub_field( 'grid_items_per_row' );
            $grid_gap = get_sub_field( 'grid_gap' );
            
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
            
            $ctr = $grid_transition_delay;

            if( have_rows( 'grid_post_settings' ) ) {
                while( have_rows( 'grid_post_settings' ) ) {
                    the_row();
        
                    $grid_total_items = get_sub_field( 'grid_total_items' );
                    $grid_order_by = get_sub_field( 'grid_order_by' );
                    $grid_order = get_sub_field( 'grid_order' );
                    $grid_pagination = get_sub_field( 'grid_pagination' );
                }
            }
        }
    }

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $grid_post_query = new WP_Query(array(
        'post_type'             => $grid_data_source_filter,
        'posts_per_page'        => $grid_total_items,
        'orderby'               => $grid_order_by,
        'order'                 => $grid_order,
        'paged'                 => $paged,
        'ignore_sticky_posts'   => 1,
    ));

    
?>
    <?php if( $grid_post_query->have_posts() ): ?>

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
            
            <?php while( $grid_post_query->have_posts() ): $grid_post_query->the_post(); ?>
                <article class="grid-module__cards__card<?php echo ' ' . $grid_type; ?>"
                    <?php if( $transition_animation == 'fade' || $transition_animation == 'flip' || $transition_animation == 'slide' ): ?>
                        data-aos="<?php echo $transition_animation . '-' . $transition_direction; ?>"
                    <?php endif; ?>
                    
                    <?php if( $transition_animation == 'zoom' ): ?>
                        data-aos="<?php echo $transition_animation . '-' . $transition_zoom_direction; ?>"
                    <?php endif; ?>

                    <?php if( $transition_duration ): ?>
                        data-aos-duration="<?php echo $transition_duration; ?>"
                    <?php endif; ?>
                    
                    data-aos-delay="<?php echo $ctr; ?>"
                >
                    
                    <a href="<?php the_permalink(); ?>"><span class="hit-area"></span></a>

                    <?php if( is_sticky() ): ?>
                        <div class="features-module__cards__card-violator">
                            <strong>PINNED</strong>
                        </div>
                    <?php endif; ?>
                        
                    <div class="grid-module__cards__card-overlay background-overlay<?php echo ' ' . $grid_type; ?>"></div>
                    
                    <?php the_post_thumbnail( 'theme-small',
                        array(
                            'class' => 'img-fluid '. $grid_type,
                            'width' => 640,
                            'alt'   => get_the_title(),
                        ) 
                    ); ?>
                    
                    <header class="grid-module__cards__card-content">
                        <?php echo '<' . $grid_heading . '>'; ?>
                            <?php the_title(); ?>
                        <?php echo '</' . $grid_heading . '>'; ?>

                        <span class="grid-date"><strong><?php the_time('F j, Y'); ?></strong></span>
                    </header>

                </article>
            <?php $ctr = $ctr+200; endwhile; ?>
            
        </div>

        <?php if( $grid_data_source == 'post' && $grid_pagination ): ?>
            <div class="grid-module__pagination">
                <?php
                    $total_pages = $grid_post_query->max_num_pages;

                    if ($total_pages > 1){
                
                        $current_page = max(1, get_query_var('paged'));
                
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text'    => __('« prev'),
                            'next_text'    => __('next »'),
                        ));
                    }
                ?>
            </div>
        <?php endif; ?>

    <?php endif; wp_reset_postdata();?>
    