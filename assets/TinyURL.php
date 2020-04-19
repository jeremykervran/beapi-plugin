<?php

class TinyURL {
    
    private $plugin_name;

    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function get_tiny_url($url) {
        $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
    
        return $tinyurl;
    }
    
    public function display_tiny_url($url) {
        echo '<div>';
        echo 'Partager l\'URL : <a href="'.$this->get_tiny_url($url).'">'.$this->get_tiny_url($url).'</a>';
        echo '</div>';
    }
}