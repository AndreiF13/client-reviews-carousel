<?php

/* 
 * Register the testimonial custom post type
 */

function client_reviews_carousel_register_testimonial_cpt() {
	$slug = apply_filters( 'client_reviews_carousel_testimonial_cpt_rewrite_slug', 'testimonials' );		
	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'client-reviews-carousel' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'client-reviews-carousel' ),
		'menu_name'             => __( 'Testimonials', 'client-reviews-carousel' ),
		'name_admin_bar'        => __( 'Testimonial', 'client-reviews-carousel' ), 
		'all_items'             => __( 'All Testimonials', 'client-reviews-carousel' ), 
	);
	$args = array(
		'label'                 => __( 'Testimonials', 'client-reviews-carousel' ),
		'description'           => __( 'A custom post type for testimonial', 'client-reviews-carousel' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 32,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => $slug ),		
	);
	register_post_type( 'testimonial', $args );
 
				$args = array(
				'labels' => '',
				'public' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
				'show_admin_column' => true,
				'hierarchical' => true,
				'query_var' => true,
				'rewrite' => array(
					'slug' => __( 'testimonial', 'client-reviews-carousel' ),
					'with_front' => false,
					'hierarchical' => false
					)
				);  
}
add_action( 'init', 'client_reviews_carousel_register_testimonial_cpt', 0 );
