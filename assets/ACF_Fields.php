<?php

class ACF_Fields {

    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        
        $this->set_hooks();
    }

    /**
     * Declare ACF fields
     * 
     * @return void
     */
    public function register_annnonces_field_groups(): void {
        if ( function_exists( 'acf_add_local_field_group' ) ) {
            acf_add_local_field_group( [
                'key'      => 'annonces_group',
                'title'    => 'Champs annonces',
                'fields'   => [
                    [
                        'key'   => 'lnb_subtitle',
                        'label' => 'Subtitle',
                        'name'  => 'subtitle',
                        'type'  => 'text',
                    ],
                    [
                        'key'     => 'lbc_select',
                        'label'   => 'Select',
                        'name'    => 'select',
                        'type'    => 'select',
                        'choices' => [
                            'red'    => 'Red',
                            'blue'   => 'Blue',
                            'yellow' => 'Yellow',
                        ],
                        'ui'      => 1,
                        'ajax'    => 1,
                    ],
                ],
                'location' => [
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'annonces',
                        ],
                    ],
                ],
            ] );
        }
    }

    /**
     * Register ACF fields hooks
     * 
     * @return void
     */
    private function set_hooks(): void {
        add_action( 'acf/init', 'register_annnonces_field_groups' );
    }
}