<?php

add_action( 'wp_ajax_scc_validate_address', 'scc_validate_address' );

function scc_validate_address() {

	check_ajax_referer( 'scc_save_settings', 'nonce' );

	$address = sanitize_text_field( $_POST['address'] );

	if ( 0 !== strpos( $address, 'G' ) ) {
		wp_send_json_error(__('StellarCannaCoin address is not valid. It should start with <code>G</code>.', 'stellar-cannacoin'));
	}

	scc_update_option( '_stellar_cannacoin_address', $address );

	wp_send_json_success(__('Saved!', 'stellar-cannacoin'));
}
