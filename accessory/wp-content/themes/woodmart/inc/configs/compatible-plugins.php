<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );}

/**
 * ------------------------------------------------------------------------------------------------
 * Compatible plugins
 * ------------------------------------------------------------------------------------------------
 */

return apply_filters(
	'woodmart_compatible_plugins',
	array(
		'leadin'                         => array(
			'name'        => 'HubSpot',
			'slug'        => 'leadin',
			'required'    => false,
			'description' => esc_html__( 'HubSpot is a platform with all the tools and integrations you need for marketing, sales, and customer service. Each product in the platform is powerful alone, but the real magic happens when you use them together. See the magic for yourself in the free HubSpot WordPress plugin.', 'woodmart' ),
		),
		'wpml'                           => array(
			'name'        => 'WPML',
			'description' => esc_html__( 'WPML is a plugin for WordPress. Simply put, plugins extend the functionality of the basic WordPress CMS. In our case, WPML makes WordPress run multilingual.', 'woodmart' ),
			'buttons'     => array(
				array(
					'name' => esc_html__( 'Documentation', 'woodmart' ),
					'url'  => 'https://wpml.org/documentation/',
				),
			),
		),
		'wp-rocket'                      => array(
			'name'        => 'WP Rocket',
			'description' => esc_html__( 'WordPress experts recommend WP Rocket as the best WordPress caching plugin to achieve incredible speed result and optimize your website for the Core Web Vitals.', 'woodmart' ),
			'buttons'     => array(
				array(
					'name' => esc_html__( 'How to use', 'woodmart' ),
					'url'  => 'https://wp-rocket.me/features/',
				),
			),
		),
		'toolset'                        => array(
			'name'        => 'Toolset',
			'description' => esc_html__( 'Toolset offers a fresh approach to building WordPress sites. It builds on of WordPress and provides a complete design and development package, that requires no programming.', 'woodmart' ),
			'buttons'     => array(
				array(
					'name'        => esc_html__( 'Read more', 'woodmart' ),
					'url'         => 'https://toolset.com/home/how-youll-build-sites-with-toolset/',
					'extra-class' => 'xts-update',
				),
				array(
					'name' => esc_html__( 'How to use', 'woodmart' ),
					'url'  => 'https://toolset.com/documentation/',
				),
			),
		),
		'dokan-lite'                     => array(
			'name'        => 'Dokan',
			'slug'        => 'dokan-lite',
			'description' => esc_html__( 'The pioneer multi-vendor plugin for WordPress. Start your own marketplace in minutes!', 'woodmart' ),
			'required'    => false,
			'buttons'     => array(
				array(
					'name' => esc_html__( 'Documentation', 'woodmart' ),
					'url'  => 'https://wedevs.com/docs/dokan',
				),
			),
		),
		'wordpress-seo'                  => array(
			'name'        => 'Yoast SEO',
			'slug'        => 'wordpress-seo',
			'required'    => false,
			'description' => esc_html__( 'Improve your WordPress SEO: Write better content and have a fully optimized WordPress site using the Yoast SEO plugin.', 'woodmart' ),
		),
		'woocommerce-currency-switcher'  => array(
			'name'     => 'WOOCS - Currency switcher',
			'slug'     => 'woocommerce-currency-switcher',
			'required' => false,
			'image'    => 'currency_switcher.jpg',
		),
		'wp-mail-smtp'                   => array(
			'name'     => 'WP Mail SMTP от WPForms',
			'slug'     => 'wp-mail-smtp',
			'required' => false,
		),
		'loco-translate'                 => array(
			'name'     => 'Loco Translate',
			'slug'     => 'loco-translate',
			'required' => false,
		),
		'woocommerce-germanized'         => array(
			'name'     => 'Germanized for WooCommerce',
			'slug'     => 'woocommerce-germanized',
			'required' => false,
		),
		'bbpress'                        => array(
			'name'     => 'bbPress',
			'slug'     => 'bbpress',
			'required' => false,
		),
		'imagify'                        => array(
			'name'     => 'Imagify',
			'slug'     => 'imagify',
			'required' => false,
		),
		'acf-extended'                   => array(
			'name'     => 'Advanced Custom Fields',
			'slug'     => 'acf-extended',
			'required' => false,
		),
		'google-analytics-for-wordpress' => array(
			'name'     => 'Google Analytics Dashboard',
			'slug'     => 'google-analytics-for-wordpress',
			'required' => false,
		),
		'regenerate-thumbnails'          => array(
			'name'     => 'Regenerate Thumbnails',
			'slug'     => 'regenerate-thumbnails',
			'required' => false,
		),
		'simple-custom-post-order'       => array(
			'name'     => 'Simple Custom Post Order',
			'slug'     => 'simple-custom-post-order',
			'required' => false,
		),
		'wordfence'                      => array(
			'name'     => 'Wordfence Security',
			'slug'     => 'wordfence',
			'required' => false,
		),
		'transients-manager'             => array(
			'name'     => 'Transients Manager',
			'slug'     => 'transients-manager',
			'required' => false,
		),
		'advanced-nocaptcha-recaptcha'   => array(
			'name'     => 'CAPTCHA 4WP',
			'slug'     => 'advanced-nocaptcha-recaptcha',
			'required' => false,
		),
		'woocommerce-gateway-stripe'     => array(
			'name'     => 'WooCommerce Stripe Payment Gateway',
			'slug'     => 'woocommerce-gateway-stripe',
			'required' => false,
		),
		'woocommerce-checkout-manager'   => array(
			'name'     => 'Checkout Fields Manager for WooCommerce',
			'slug'     => 'woocommerce-checkout-manager',
			'required' => false,
		),
	)
);
