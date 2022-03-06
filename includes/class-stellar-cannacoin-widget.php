<?php

namespace Stellar_CannaCoin\Includes;

class Stellar_CannaCoin_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'stellar-cannacoin';
	}

	public function get_title() {
		return __( 'Stellar CannaCoin', 'stellar-cannacoin' );
	}

	public function get_icon() {
		return 'eicon-play';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {}

	protected function render() {
		echo mtrt_get_QR_code();
	}

}
