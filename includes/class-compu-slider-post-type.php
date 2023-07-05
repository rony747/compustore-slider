<?php

class Compu_Slider_Custom_Post {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this -> plugin_name = $plugin_name;
		$this -> version     = $version;
	}

	public function init() {
		$this -> register_cpt_compu_slider();
	}

	public function register_cpt_compu_slider() {
		$args = [
			'label'               => esc_html__( 'Compu Sliders', 'compu-slider' ),
			'labels'              => [
				'menu_name'          => esc_html__( 'Compu Sliders', 'compu-slider' ),
				'name_admin_bar'     => esc_html__( 'Compu Slider', 'compu-slider' ),
				'add_new'            => esc_html__( 'Add Compu Slider', 'compu-slider' ),
				'add_new_item'       => esc_html__( 'Add new Compu Slider', 'compu-slider' ),
				'new_item'           => esc_html__( 'New Compu Slider', 'compu-slider' ),
				'edit_item'          => esc_html__( 'Edit Compu Slider', 'compu-slider' ),
				'view_item'          => esc_html__( 'View Compu Slider', 'compu-slider' ),
				'update_item'        => esc_html__( 'View Compu Slider', 'compu-slider' ),
				'all_items'          => esc_html__( 'All Compu Sliders', 'compu-slider' ),
				'search_items'       => esc_html__( 'Search Compu Sliders', 'compu-slider' ),
				'parent_item_colon'  => esc_html__( 'Parent Compu Slider', 'compu-slider' ),
				'not_found'          => esc_html__( 'No Compu Sliders found', 'compu-slider' ),
				'not_found_in_trash' => esc_html__( 'No Compu Sliders found in Trash', 'compu-slider' ),
				'name'               => esc_html__( 'Compu Sliders', 'compu-slider' ),
				'singular_name'      => esc_html__( 'Compu Slider', 'compu-slider' ),
			],
			'public'              => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => false,
			'show_in_rest'        => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'has_archive'         => false,
			'query_var'           => false,
			'can_export'          => true,
			'rewrite_no_front'    => false,
			'show_in_menu'        => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-forms',
			'supports'            => [
				'title',
				'editor',
				'thumbnail',
			],
			'rewrite'             => true
		];
		register_post_type( 'compu-slider', $args );
	}

}
