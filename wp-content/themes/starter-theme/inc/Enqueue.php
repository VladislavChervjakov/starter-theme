<?php

namespace Inc;

final class Enqueue {

    private static $instance = null;


    private function __construct() {
       // add_action( 'admin_enqueue_scripts', [ $this, 'starter_theme_load_admin_scripts' ] );

        add_action( 'wp_enqueue_scripts', [ $this, 'starter_theme_load_scripts' ] );

    }


//    public function starter_theme_load_admin_scripts( $hook ) {
//
//    }

    public function starter_theme_load_scripts () {
//        wp_register_style(
//         'starter_theme_style',
//            get_template_directory_uri() . '/dest/css/starter-theme.css',
//            [],
//            '1.0.0',
//          'all'
//        );
//        wp_enqueue_style( 'starter_theme_style' );

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