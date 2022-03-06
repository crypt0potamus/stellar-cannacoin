<?php

add_action( 'wp_ajax_mtrt_validate_address', 'mtrt_validate_address' );

function mtrt_validate_address() {

	check_ajax_referer( 'mtrt_save_settings', 'nonce' );

	$address = sanitize_text_field( $_POST['address'] );

	if ( 0 !== strpos( $address, 'ban_' ) ) {
		wp_send_json_error(__('StellarCannaCoin address is not valid. It should start with <code>ban_</code>.', 'stellar-cannacoin'));
	}

	mtrt_update_option( '_stellar_cannacoin_address', $address );

	wp_send_json_success(__('Saved!', 'stellar-cannacoin'));
}
