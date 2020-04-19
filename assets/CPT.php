<?php

class CPT {

	/**
	 * @var $plugin_name string
	 */
	private $plugin_name;
	
	/**
	 * @var $version string
	 */
	private $version;

	/**
	 * @param $plugin_name
	 * @param $version
	 */
	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->set_hooks();
	}

	/**
	 * Déclaration du CPT
	 * 
 	 * @return void
	 */

	public function register_annonces_cpt(): void {
		$labels = array(
			'name'                  => __( 'Annonces', 'lbc-beapi' ),
			'singular_name'         => __( 'Annonce', 'lbc-beapi' ),
			'menu_name'             => __( 'Annonces', 'lbc-beapi' ),
			'name_admin_bar'        => __( 'Annonce', 'lbc-beapi' ),
			'add_new'               => __( 'Ajouter une annonce', 'lbc-beapi' ),
			'add_new_item'          => __( 'Ajouter une nouvelle annonce', 'lbc-beapi' ),
			'new_item'              => __( 'Nouvelle annonce', 'lbc-beapi' ),
			'edit_item'             => __( 'Editer l\'annonce', 'lbc-beapi' ),
			'view_item'             => __( 'Voir l\'annonce', 'lbc-beapi' ),
			'all_items'             => __( 'Toutes les annonces', 'lbc-beapi' ),
			'search_items'          => __( 'Recherche des annonces', 'lbc-beapi' ),
			'parent_item_colon'     => __( 'Annonces parentes :', 'lbc-beapi' ),
			'not_found'             => __( 'Aucune annonce trouvée', 'lbc-beapi' ),
			'not_found_in_trash'    => __( 'Aucune annonce trouvée dans la corbeille.', 'lbc-beapi' ),
			'featured_image'        => __( 'Image de l\'annonce', 'lbc-beapi' ),
			'set_featured_image'    => __( 'Définir l\'image de l\'annonce', 'lbc-beapi' ),
			'remove_featured_image' => __( 'Supprimer l\'image de l\'annonce', 'lbc-beapi' ),
			'use_featured_image'    => __( 'Utiliser comme image pour l\'annonce', 'lbc-beapi' ),
			'archives'              => __( 'Archives des annonces', 'lbc-beapi' ),
		);
	
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'annonces' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
		);
	
		register_post_type( 'annonces', $args );
	}
	
	/**
	 * Register CPT hooks
	 * 
	 * @return void
	 */
	private function set_hooks(): void {
		add_action( 'init', array($this, 'register_annonces_cpt') );
	}
}

