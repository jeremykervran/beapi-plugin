<?php

/*
Plugin Name: leBonCoin BeApi
Plugin URI: https://github.com/jeremykervran/lbc-beapi/
Description: Reproduction de LeBonCoin pour BeApi
Author: Jeremy Kervran
Author URI: https://github.com/jeremykervran/
Text Domain: lbc-beapi
*/

// **************************************************
//                      DEFINE
// **************************************************

define( 'LBC_NAME', 'LBC - BeApi');
define( 'LBC_VERSION', '1.0.0' );
define( 'LBC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// **************************************************
//                     REQUIRE
// **************************************************

// Assets
require_once( __DIR__ . '/assets/ACF_Fields.php' );
require_once( __DIR__ . '/assets/CPT.php' );
require_once( __DIR__ . '/assets/Taxonomies.php' );
require_once( __DIR__ . '/assets/TinyURL.php' );

// Inc
require_once( __DIR__ . '/inc/Search.php' );

// **************************************************
//                    AUTOLOAD
// **************************************************

$ACFFields  = new ACF_FIelds(LBC_NAME, LBC_VERSION);
$CPT        = new CPT(LBC_NAME, LBC_VERSION);
$Taxonomies = new Taxonomies(LBC_NAME, LBC_VERSION);
