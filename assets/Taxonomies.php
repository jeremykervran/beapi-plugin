<?php

class Taxonomies {

    /**
     * @var $plugin_name string
     */
    private $plugin_name;

    /**
     * @var $version string
     */
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        $this->set_hooks();
    }

    /**
     * Déclarations des taxonomies : Types d'annonce, région et catégorie
     * 
     * @return void
     */
    function register_annonces_taxonomies(): void {
        // Types d'annonce
        $labels = array(
            'name'              => __( 'Types d\'annonce', 'lbc-bepi' ),
            'singular_name'     => __( 'Type d\'annonce', 'lbc-bepi' ),
            'search_items'      => __( 'Rechercher dans les types d\'annonce', 'lbc-bepi' ),
            'all_items'         => __( 'Tous les types d\'annonce', 'lbc-bepi' ),
            'parent_item'       => __( 'Type parent', 'lbc-bepi' ),
            'parent_item_colon' => __( 'Type parent:', 'lbc-bepi' ),
            'edit_item'         => __( 'Editer le type', 'lbc-bepi' ),
            'update_item'       => __( 'Mettre à jour le type', 'lbc-bepi' ),
            'add_new_item'      => __( 'Ajouter un nouveau type', 'lbc-bepi' ),
            'new_item_name'     => __( 'Nouveau nom de type', 'lbc-bepi' ),
            'menu_name'         => __( 'Types d\'annonce', 'lbc-bepi' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'typeannonce' ),
        );

        register_taxonomy( 'typeannonce', array( 'annonces' ), $args );

        unset( $args );
        unset( $labels );

        // Regions
        $labels = array(
            'name'              => __( 'Régions', 'lbc-beapi' ),
            'singular_name'     => __( 'Région', 'lbc-beapi' ),
            'search_items'      => __( 'Rechercher dans les régions', 'lbc-beapi' ),
            'all_items'         => __( 'Toutes les régions', 'lbc-beapi' ),
            'parent_item'       => __( 'Région parente', 'lbc-beapi' ),
            'parent_item_colon' => __( 'Région parente:', 'lbc-beapi' ),
            'edit_item'         => __( 'Editer la région', 'lbc-beapi' ),
            'update_item'       => __( 'Mettre à jour la région', 'lbc-beapi' ),
            'add_new_item'      => __( 'Ajouter une nouvelle région', 'lbc-beapi' ),
            'new_item_name'     => __( 'Nouveau nom de région', 'lbc-beapi' ),
            'menu_name'         => __( 'Régions', 'lbc-beapi' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'region' ),
        );

        register_taxonomy( 'region', array( 'annonces' ), $args );

        unset( $args );
        unset( $labels );

        // Catégories
        $labels = array(
            'name'              => __( 'Catégorie', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => __( 'Catégorie', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Rechercher dans les catégories', 'textdomain' ),
            'all_items'         => __( 'Toutes les catégories', 'textdomain' ),
            'parent_item'       => __( 'Catégorie parente', 'textdomain' ),
            'parent_item_colon' => __( 'Catégorie parente:', 'textdomain' ),
            'edit_item'         => __( 'Editer la catégorie', 'textdomain' ),
            'update_item'       => __( 'Mettre à jour la catégorie', 'textdomain' ),
            'add_new_item'      => __( 'Ajouter une nouvelle catégorie', 'textdomain' ),
            'new_item_name'     => __( 'Nouveau nom de catégorie', 'textdomain' ),
            'menu_name'         => __( 'Catégories', 'textdomain' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'categorie' ),
        );

        register_taxonomy( 'categorie', array( 'annonces' ), $args );

        unset( $args );
        unset( $labels );
    }

    /**
     * Register taxonomies hooks
     * 
     * @return void
     */
    private function set_hooks(): void {
        add_action( 'init', array($this, 'register_annonces_taxonomies') );
    }
}