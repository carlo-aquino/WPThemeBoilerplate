<?php
    if( have_rows( 'empty_space_module_settings' ) ) {
        while( have_rows( 'empty_space_module_settings' ) ) {
            the_row();

            $empty_space_height = get_sub_field( 'empty_space_height' );
            $empty_space_css_id = get_sub_field( 'empty_space_css_id' );
            $empty_space_css_class = get_sub_field( 'empty_space_css_class' );
        }
    }  
?> 


    <div id="<?php if( $empty_space_css_id ) { echo ' ' . $empty_space_css_id; } ?>" class="empty-space-module<?php if( $empty_space_css_class ) { echo ' ' . $empty_space_css_class; } ?>"
        style="height: <?php echo $empty_space_height; ?>rem;" >

        <div class="empty-space-module__wrapper" style="height: <?php echo $empty_space_height; ?>rem;"></div>

    </div>