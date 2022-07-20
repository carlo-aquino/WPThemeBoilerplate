<?php

    if ( have_rows( 'section_column' ) ) {
        while( have_rows( 'section_column' ) ) {
            the_row();

            if( get_row_layout() == 'one_column_layout' ) {
                get_template_part( 'template-parts/acf-components/one_column', 'layout' );
            }

            if( get_row_layout() == 'two_column_layout' ) {
                get_template_part( 'template-parts/acf-components/two_column', 'layout' );
            }

            if( get_row_layout() == 'special_column_layout' ) {
                get_template_part( 'template-parts/acf-components/special_column', 'layout' );
            }
        }
    }