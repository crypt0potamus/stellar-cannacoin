<?php

/**
 * Plugin Name: Stellar CannaCoin
 * Description: ‌Generate link and QR image to receive StellarCannaCoin donation.
 * Version:     1.0.0
 * Author:      crypt0potamus
 * Author URI:      https://farahani.dev
 * Text Domain: stellar-cannacoin
 * Domain Path: /languages
 * License:     GPLv3
 */

namespace Stellar_CannaCoin;

use Stellar_CannaCoin\Admin\Init as Admin;
use Stellar_CannaCoin\Includes\Assets;
use Stellar_CannaCoin\Includes\Elementor;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once 'vendor/autoload.php';

register_activation_hook( __FILE__, '\Stellar_CannaCoin\activation_hook_callback' );

function activation_hook_callback() {
	\Stellar_CannaCoin\Includes\Init::activate();
}

register_deactivation_hook( __FILE__, '\Stellar_CannaCoin\deactivation_hook_callback' );

function deactivation_hook_callback() {
	\Stellar_CannaCoin\Includes\Init::deactivate();
}


Admin::instance();
Assets::instance();
Elementor::instance();
