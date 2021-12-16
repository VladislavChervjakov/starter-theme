<?php

namespace Inc;

final class Enqueue {

    private static $instance = null;


    private function __construct() {

        add_action( 'wp_enqueue_scripts', [ $this, 'starter_theme_load_scripts' ] );

    }

    public function starter_theme_load_scripts () {

        // load bootstrap
        wp_enqueue_style(
            'bootstrap',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'
        );

        wp_enqueue_script(
            'popper-js',
            'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',
            [ 'jquery' ],
        true
        );

        wp_enqueue_script(
        'bootstrap-js',
           'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
                [ 'jquery' ],
            true
        );


        // load theme scripts and styles
        wp_enqueue_style(
           'starter_theme_style',
           get_template_directory_uri() . '/dest/css/starter-theme.css',
           [],
           '1.0',
           true

       );


        wp_enqueue_script(
            'starter_theme_script',
               get_template_directory_uri() . '/dest/js/starter-theme.js',
                   [],
              '1.0',
          true
        );
    }


    public static function getInstance() {
        if ( !isset( $instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}