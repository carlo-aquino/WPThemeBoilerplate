    <?php

        if( have_rows('custom_footer', 'option') ) {
            while( have_rows('custom_footer', 'option') ) {
                the_row();

                $footer_type = get_sub_field( 'footer_type', 'option' );
            } 
        }

        if( $footer_type == 'footer-01' ) {
            get_template_part( 'template-parts/footers/footer', '01' );
        }

        if( $footer_type == 'footer-02' ) {
            get_template_part( 'template-parts/footers/footer', '02' );
        }

        wp_footer();

    ?>   

    <script src="https://kit.fontawesome.com/a182dff85a.js" crossorigin="anonymous"></script>

    <script>
        AOS.init({
            offset: 200,
            duration: 1000,
            once: false,
            disable: 'mobile',
        });
    </script>
</body>

</html>