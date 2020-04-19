<?php

class Search {

	private $plugin_name;

	private $version;

	public function __construct($plugin_name, $version) {
		$this->verion = $version;
		$this->plugin_name = $plugin_name;

		$this->set_hooks();
	}

	/**
	 * Set any tax query
	 * 
	 * @param $taxonomy string
	 * @param $field string
	 * @param $terms string|array
	 * @return void
	 */
	private function set_tax_query($taxonomy, $field, $terms): void {
		$tax_query = [
			[
				'taxonomy' => $taxonomy,
				'field'    => $field,
				'terms'    => $terms,
			]
		];

		$query->set( 'tax_query', $tax_query );
	}

	/**
	 * Set the tax queries depending on the $_GET variables
	 * 
	 * @param $query WP_Query
	 * @return WP_Query
	 */
	public function beapi_annonces_search_query( WP_Query $query ) {

		// If we are in the admin panel, exit
		if ( is_admin() ) {
			return false;
		}
	
		// If the query is empty, exit
		if ( empty( $query ) ) {
			return false;
		}
	
		// Type slug
		$type_slug = $_GET['type'];
		
		// TODO not working atm
		if ( isset($type_slug) ) {
			$this->set_tax_query('typeannonce', 'slug', $type_slug);
		}
		
		// Region slug
		$region_slug = $_GET['region'];
	
		// if our region ID is not null, we set the tax query by region
		if ( isset($region_slug) && $region_slug != 'null' ) {
			$this->set_tax_query('region', 'slug', $region_slug);
		}
	
		// Categorie slug
		$categorie_slug = $_GET['categorie'];
	
		// if our categorie ID is not null, we set the tax query by categorie
		if ( isset($categorie_slug) && $categorie_slug != 'null' ) {
			$this->set_tax_query('categorie', 'slug', $categorie_slug);
		}
	
		return $query;
	}

	/**
	 * Set Search class hooks
	 * @return void
	 */
	private function set_hooks(): void {
		add_filter( 'pre_get_posts', array($this, 'beapi_annonces_search_query') );
	}
}
