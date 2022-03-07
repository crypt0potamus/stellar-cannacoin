<?php

namespace Stellar_CannaCoin\Admin;

use Stellar_CannaCoin\Includes\Functions;

class Init {

	private static $instance = null;

	private function __construct() {
		$this->init();
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new Init();
		}

		return self::$instance;
	}

	public function init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'assets' ) );
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
	}

	public function assets( $hook ) {
		if ( 'settings_page_stellar-cannacoin' === $hook ) {
			wp_enqueue_style( 'scc-admin' );
			wp_enqueue_script( 'scc-admin' );
		}
	}

	public function add_menu_page() {
		add_submenu_page(
			'options-general.php',
			__( 'Stellar CannaCoin', 'stellar-cannacoin' ),
			__( 'Stellar CannaCoin', 'stellar-cannacoin' ),
			'manage_options',
			'stellar-cannacoin',
			array( $this, 'renbder_settings_page' ),
		);
	}

	public function renbder_settings_page() {
		?>
		<div class="scc-admin-wrapper">
			<div class="scc-admin-header">
				<span class="scc-logo">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" width="50" height="50" viewBox="0 0 64 35">
						<path stroke="#000" stroke-linecap="round" stroke-width="3" d="M2 23v-1l1-1v-3l1-3 1-2 1-1 1-2 1-1V8l3-3 2-1h1l1-1h1l1-1h2a433 433 0 0 1 15 2l3 1h1l1 2 2 2 2 3 1 3v2l-1 1h-6l-4-1-1-1h-1l-1-1v-1h-1l-2-2h-5l-4 2-1 1-3 2-2 2-1 2-2 1-1 1-4 1H3v-1"/>
						<path stroke="#000" stroke-linecap="round" stroke-width="3" d="m18 19 1 2 1 3 7 5 5 2 2 1h2l4 1h5l3-1 4-2 2-2 3-2 2-3 1-4 1-3 1-3-1-1c-1-2-3 0-5 0l-3 2-2 1-2 2-1 1-2 1-2 2v1h-2l-1 1-2 1h-2l-2-1-4-2-2-2-3-1-5-1-2 2"/>
					</svg>
				</span>
				<span class="scc-admin-title">
					<h1><?php esc_html_e( 'Stellar CannaCoin', 'stellar-cannacoin' ); ?></h1>
				</span>
				<p><?php esc_html_e( 'Unofficial StellarCannaCoin plugin for WordPress.', 'stellar-cannacoin' ); ?></p>
				<p><?php esc_html_e( 'Use the following shortcode to display donation QR code. If you are using Elemntor, use the Elementor widget.', 'stellar-cannacoin' ); ?><code>[stellar_cannacoin]</code></p>
				<br>
			</div>
			<div class="scc-admin-main">
				<section class="scc-settings">
					<label for="scc_address">
						<?php _e( 'StellarCannaCoin address:', 'stellar-cannacoin' ); ?>
					</label>
					<br>
					<input type="text" id="scc-address" name="scc_address" placeholder="G" size="64" pattern="[a-z0-9]{64}" value="<?php echo esc_attr( scc_get_option( '_stellar_cannacoin_address' ) ); ?>">
					<?php wp_nonce_field( 'scc_save_settings' ); ?>
					<input type="submit" id="save_scc_address" name="save_scc_address" value="<?php esc_attr_e( 'Save', 'stellar-cannacoin' ); ?>">
					<?php if ( scc_get_option( '_stellar_cannacoin_address' ) ) : ?>
					<img id="scc-indicator" src="<?php echo esc_attr( esc_url( 'https://id.lobstr.co/' . scc_get_option( '_stellar_cannacoin_address' ) . '.png' ) ); ?>">
					<?php endif; ?>
					<div id="scc-message-area"></div>
				</section>
			</div>
		</div>
		<?php
	}

}
