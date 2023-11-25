<?php

// Enqueue script
function offer_plugin_zhaket_enqueue_script() {

	// CSS
	wp_enqueue_style('offer-plugn-zhaket', plugin_dir_url( __FILE__ ) . '../assets/css/plugin.css');

	// JS
	wp_enqueue_script( 'offer-plugin-zhaket', plugin_dir_url( __FILE__ ) . '../assets/js/plugin.js', true );
	wp_register_script( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js', true );
	wp_enqueue_script('swiper');
}
add_action('wp_enqueue_scripts', 'offer_plugin_zhaket_enqueue_script');
