<?php

function scc_get_QR_code() {
	$qr = Stellar_CannaCoin\QRCode::getMinimumQRCode(
		scc_get_option('_stellar_cannacoin_address'),
		QR_ERROR_CORRECT_LEVEL_L
	);
	$im = $qr->createImage(6, 8);
	ob_start();
	imagepng($im);
	imagepng($im);
	$image_data = ob_get_contents();
	ob_end_clean();
	imagedestroy($im);

	return '<figure class="scc-qr-code"><img src="data:image/png;base64,' . base64_encode($image_data) . '"></figure>';
}
