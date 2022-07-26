<?php
    if( have_rows( 'grid_module_settings' ) ) {

        while( have_rows( 'grid_module_settings' ) ) {
            
            the_row();
            $grid_title_toggle = get_sub_field( 'grid_title_toggle' );
            $grid_description_toggle = get_sub_field( 'grid_description_toggle' );
            $grid_heading = get_sub_field( 'grid_heading' );
            
            $grid_type = get_sub_field( 'grid_type' );
            $grid_data_source = get_sub_field( 'grid_data_source' );
            $grid_data_source_filter = get_sub_field( 'grid_data_source_filter' );
            $grid_data_source_category = get_sub_field( 'grid_data_source_category' );
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
                    $grid_button_text = get_sub_field( 'grid_button_text' );
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

            if( have_rows( 'grid_post_settings' ) ) {
                while( have_rows( 'grid_post_settings' ) ) {
                    the_row();
        
                    $grid_total_items = get_sub_field( 'grid_total_items' );
                    $grid_order_by = get_sub_field( 'grid_order_by' );
                    $grid_order = get_sub_field( 'grid_order' );
                    $grid_pagination = get_sub_field( 'grid_pagination' );
                }
            }

            $grid_column_count = 0;

            if( $grid_items_per_row == 'one') { $grid_column_count = 1; }
            if( $grid_items_per_row == 'two') { $grid_column_count = 2; }
            if( $grid_items_per_row == 'three') { $grid_column_count = 3; }
            if( $grid_items_per_row == 'four') { $grid_column_count = 4; }
        }
    }

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    if( $grid_data_source_category ) {
        $results = array(); 
        $ctr = 0;

        while( $ctr < sizeof( $grid_data_source_category ) ) {
            array_push( $results, $grid_data_source_category[$ctr]->slug );
            $ctr++;
        }
    }

    $grid_post_query = new WP_Query(array(
        'post_type'             => $grid_data_source_filter,
        'posts_per_page'        => $grid_total_items,
        'orderby'               => $grid_order_by,
        'order'                 => $grid_order,
        'paged'                 => $paged,
        'ignore_sticky_posts'   => 1,

        'tax_query' => $grid_data_source_category ? array(
            array (
                'taxonomy' => $grid_data_source_category[0]->taxonomy,
                'field' => 'slug',
                'terms' => $results,
            )
        ) : '',
    ));

    $column_count = 0;
    $post_count = 1;

    if( $grid_items_per_row == 'one') $column_count = 1;
    if( $grid_items_per_row == 'two') $column_count = 2;
    if( $grid_items_per_row == 'three') $column_count = 3;
    if( $grid_items_per_row == 'four') $column_count = 4;

    
?>
    
    <?php if( $grid_post_query->have_posts() ): ?>
        
        <div class="grid-module__cards<?php if( $grid_masonry_toggle ) echo ' grid js-masonry'; ?>"
            style="
                <?php if( !$grid_masonry_toggle ) echo 'grid-template-columns:repeat(' . $column_count . ', 1fr);'; ?>
                <?php if( $grid_gap && $grid_masonry_toggle ) echo 'gap:' . esc_attr($grid_gap) . 'em;'; ?>
            "
        >
            
            <?php while( $grid_post_query->have_posts() ): $grid_post_query->the_post(); ?>
                <article class="grid-module__cards__card<?php echo ' ' . esc_attr($grid_type); ?><?php if( $grid_masonry_toggle ) echo ' grid-item'; ?>"
                    style="
                        <?php if( $grid_masonry_toggle && $grid_type == 'type-two' ) echo 'height: auto;'; ?>
                        <?php if( !$grid_masonry_toggle && $grid_type == 'type-two' ) echo 'height: 100%;'; ?>

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
                        data-aos="<?php echo esc_attr($transition_animation . '-' . $transition_direction); ?>"
                    <?php endif; ?>
                    
                    <?php if( $transition_animation == 'zoom' ): ?>
                        data-aos="<?php echo esc_attr($transition_animation . '-' . $transition_zoom_direction); ?>"
                    <?php endif; ?>

                    data-aos="<?php echo esc_attr($transition_animation); ?>"

                    <?php if( $transition_duration ): ?>
                        data-aos-duration="<?php echo esc_attr($transition_duration); ?>"
                    <?php endif; ?>
                    
                    data-aos-delay="<?php echo $ctr; ?>"

                    role="group" aria-label="<?php echo esc_attr($post_count . ' / ' . $grid_post_query->found_posts); ?>"
                >
                    
                    <?php if( !$grid_button_toggle || !$grid_button_text ): ?>
                        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><span class="hit-area"></span></a>
                    <?php endif;?>

                    <?php if( is_sticky() ): ?>
                        <div class="features-module__cards__card-violator">
                            <strong>PINNED</strong>
                        </div>
                    <?php endif; ?>
                        
                    
                    
                    <div class="grid-module__cards__card-container<?php echo ' ' . esc_attr($grid_type); ?>">
                        <div class="grid-module__cards__card-overlay background-overlay<?php echo ' ' . esc_attr($grid_type); ?>"></div>

                        <?php
                            if( $grid_image_toggle ) {
                                the_post_thumbnail( $grid_image_size,
                                    array(
                                        'class' => 'img-fluid '. $grid_type,
                                        'width' => $grid_image_size . '-width',
                                    ) 
                                );
                            }
                        ?>
                        
                        <?php if( $grid_title_toggle || $grid_description_toggle ): ?>
                            <div class="grid-module__cards__card-content">

                                <header class="grid-module__cards__card-header">
                                    <?php if( $grid_title_toggle ): ?>
                                        <?php echo '<' . $grid_heading . '>'; ?>
                                            <?php the_title(); ?>
                                        <?php echo '</' . $grid_heading . '>'; ?>
                                    <?php endif; ?>

                                    <span class="grid-date"><strong><?php the_time('F j, Y'); ?></strong></span>

                                    <?php
                                        if( $grid_description_toggle ) {
                                            if( get_the_content() ) {
                                                the_content();
                                            } else {
                                                the_excerpt();
                                            }
                                        }
                                    ?>
                                </header>

                            </div>
                        <?php endif; ?>

                        <?php if( $grid_button_toggle && $grid_button_text ): ?>
                            <div class="grid-module__cards__card-cta button-module">
                                <div class="button-module__wrapper">
                                    <a href="<?php the_permalink(); ?>" role="button">  
                                        <span><?php echo esc_html($grid_button_text); ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>  

                    </div>

                </article>
            <?php $ctr = $ctr+200; $post_count++; endwhile; ?>
            
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
    