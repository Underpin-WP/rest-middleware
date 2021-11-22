<?php


namespace Underpin_Rest_Middleware\Factories;


use Underpin\Abstracts\Observer;
use Underpin\Abstracts\Storage;
use Underpin_Scripts\Abstracts\Script;
use function Underpin\underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Rest_Middleware extends Observer {

	public $description = 'Sets up script params necessary for AJAX and REST requests';
	public $name        = 'REST Middleware';

	function update( $instance, Storage $storage ) {
		if ( $instance instanceof Script ) {
			$instance->set_param( 'nonce', wp_create_nonce( 'wp_rest' ) );
			$instance->set_param( 'rest_url', get_rest_url() );
		} else {
			underpin()->logger()->log( 'warning', 'rest_middleware_action_failed_to_run', 'Middleware action failed to run. Rest_Middleware expects to run on a Script loader.', [
				'loader'  => get_class( $this->loader_item ),
				'expects' => 'Underpin_Scripts\Abstracts\Script',
			] );
		}
	}

}