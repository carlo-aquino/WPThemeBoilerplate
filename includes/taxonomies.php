<?php

    function create_portfolio_categories() {
        $category_labels = array(
            'name'              => _x( 'Portfolio Categories', 'taxonomy general name' ),
            'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Categories' ),
            'all_items'         => __( 'All Categories' ),
            'parent_item'       => __( 'Parent Category' ),
            'parent_item_colon' => __( 'Parent Category:' ),
            'edit_item'         => __( 'Edit Portfolio Category' ),
            'update_item'       => __( 'Update Category' ),
            'add_new_item'      => __( 'Add New Category' ),
            'new_item_name'     => __( 'New Category Name' ),
            'menu_name'         => __( 'Portfolio Categories' )
        );

        $category_args = array(
            'hierarchical'      => true,
            'labels'            => $category_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'portfolio-categories' ),
        );
        

        register_taxonomy( 'portfolio_categories', array( 'portfolio' ), $category_args );
    }

    add_action( 'init', 'create_portfolio_categories', 0 );

    function create_portfolio_tags() {
        $tag_labels = array(
            'name'              => _x( 'Portfolio Tags', 'taxonomy general name' ),
            'singular_name'     => _x( 'Portfolio Tag', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Tags' ),
            'all_items'         => __( 'All Tags' ),
            'parent_item'       => __( 'Parent Tag' ),
            'parent_item_colon' => __( 'Parent Tag:' ),
            'edit_item'         => __( 'Edit Portfolio Tag' ),
            'update_item'       => __( 'Update Tag' ),
            'add_new_item'      => __( 'Add New Tag' ),
            'new_item_name'     => __( 'New Tag Name' ),
            'menu_name'         => __( 'Portfolio Tags' )
        );

        $tag_args = array(
            'hierarchical'      => false,
            'labels'            => $tag_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'portfolio-tags' ),
        );
        
        register_taxonomy( 'portfolio_tags', array( 'portfolio' ), $tag_args );
    }

    add_action( 'init', 'create_portfolio_tags', 0 );