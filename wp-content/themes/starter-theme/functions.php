<?php
use Inc\Enqueue;

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) { require_once dirname( __FILE__ ) . '/vendor/autoload.php'; }

// all classes
$classes = [
    Enqueue::class,
];

Enqueue::getInstance();