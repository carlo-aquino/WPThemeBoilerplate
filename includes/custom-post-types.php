<?php 

    function masc_post_types() {
        register_post_type('portfolio', array(
            'supports'          => array('title', 'editor', 'thumbnail', 'excerpt'),
            'public'            => true,
            'menu_icon'         => 'dashicons-portfolio',
            'menu_position'     => 5,
            'has_archive'       => false,
            'labels'            => array (
                                    'name'          => 'Portfolio',
                                    'add_new_item'  => 'Add New Portfolio',
                                    'all_items'     => 'All Portfolios',
                                    'singular_name' => 'Portfolio'
                                )
        ));
    }

    add_action('init', 'masc_post_types');
   