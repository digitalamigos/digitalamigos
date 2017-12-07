<?php
/**
 * Plugin Name: CSB Custom Post Types
 * Description: This plugin adds the Our Brands custom post type specific for this website template.
 * Version: 1.0.0 
 * License: GPL2
 */

class damigosACM {
     
    /**
     * Constructor. Called when plugin is initialised
     */
    function __construct() {
        add_action( 'init', array( $this, 'register_custom_post_type' ) );
    }

    function register_custom_post_type() {
        /**
         * Registers a Custom Post Type called Case Study
         */
        register_post_type('case_study', array(
            'labels' => array(
                'name'               => _x( 'Case Study', 'post type general name', 'sage' ),
                'singular_name'      => _x( 'Case Study', 'post type singular name', 'sage' ),
                'menu_name'          => _x( 'Case Study', 'admin menu', 'sage' ),
                'name_admin_bar'     => _x( 'Case Study', 'add new on admin bar', 'sage' ),
                'add_new'            => _x( 'Add New', 'Case Study', 'sage' ),
                'add_new_item'       => __( 'Add New Case Study', 'sage' ),
                'new_item'           => __( 'New Case Study', 'sage' ),
                'edit_item'          => __( 'Edit Case Study', 'sage' ),
                'view_item'          => __( 'View Case Study', 'sage' ),
                'all_items'          => __( 'Case Studies', 'sage' ),
                'search_items'       => __( 'Search Case Study', 'sage' ),
                'parent_item_colon'  => __( 'Parent Case Study:', 'sage' ),
                'not_found'          => __( 'No Case Study item found.', 'sage' ),
                'not_found_in_trash' => __( 'No Case Study item found in Trash.', 'sage' ),
            ),
            
                    
            // Frontend         
            'has_archive'        => false,
            'public'             => false,
            'hierarchical' => false,
             
            // Admin
            'capability_type' => 'post',
            'menu_icon'     => 'dashicons-images-alt',
            'menu_position' => 5,
            'query_var'     => true,
            'show_in_menu'  => true,
            'show_ui'       => true,
            'supports'      => array(
                'title',
                'editor',
            )

        ));
    }
}
 
$damigosACM = new damigosACM;