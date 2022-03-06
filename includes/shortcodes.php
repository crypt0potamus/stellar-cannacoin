<?php

function mtrt_shortcode(){
	return mtrt_get_QR_code();
}

add_shortcode('stellar_cannacoin', 'mtrt_shortcode');
