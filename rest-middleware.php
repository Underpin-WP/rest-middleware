<?php

use Underpin\Abstracts\Underpin;

Underpin::attach( 'setup', new \Underpin\Factories\Observer( 'rest_middleware', [
	'update' => function () {
		require_once( plugin_dir_path( __FILE__ ) . 'Rest_Middleware.php' );
	},
	'deps'   => [ 'scripts' ],
] ) );