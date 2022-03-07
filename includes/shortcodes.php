<?php

function scc_shortcode(){
	return scc_get_QR_code();
}

add_shortcode('stellar_cannacoin', 'scc_shortcode');
