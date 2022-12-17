<?php
    if( have_rows( 'empty_space_module_settings' ) ) {
        while( have_rows( 'empty_space_module_settings' ) ) {
            the_row();

            $empty_space_height = get_sub_field( 'empty_space_height' );
            
            if( have_rows( 'id_classes_settings' ) ) {
                while( have_rows( 'id_classes_settings' ) ) {
                    the_row();
        
                    $css_id = get_sub_field( 'css_id' );
                    $css_class = get_sub_field( 'css_class' );
                }
            }
        }
    }  
?> 


    <div id="<?php if( $css_id ) { echo ' ' . esc_attr($css_id); } ?>" class="empty-space-module<?php if( $css_class ) echo ' ' . esc_attr($css_class); ?>"
        style="height: <?php echo $empty_space_height; ?>rem;" >

        <div class="empty-space-module__wrapper" style="height: <?php echo esc_attr($empty_space_height); ?>rem;"></div>

    </div>