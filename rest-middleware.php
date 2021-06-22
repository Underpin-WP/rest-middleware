<?php

add_action( 'underpin/before_setup', function ( $file, $class ) {
	require_once( plugin_dir_path( __FILE__ ) . 'Rest_Middleware.php' );
}, 20, 2 );