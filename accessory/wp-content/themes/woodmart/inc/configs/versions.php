<?php

if ( ! defined( 'WOODMART_THEME_DIR' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * ------------------------------------------------------------------------------------------------
 * Array of versions for dummy content import section
 * ------------------------------------------------------------------------------------------------
 */
return apply_filters(
	'woodmart_get_versions_to_import',
	array(
		'main'                  => array(
			'title'   => 'Woodmart Main',
			'process' => 'xml,home,options,widgets,headers,sliders,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/home/',
		),
		'megamarket'            => array(
			'title'   => 'Megamarket',
			'process' => 'xml,home,options,widgets,headers,sliders',
			'type'    => 'version',
			'base'    => 'megamarket_base',
			'link'    => 'https://woodmart.xtemos.com/megamarket/',
		),
		'smart-home'            => array(
			'title'   => 'Smart Home',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'tags'    => 'smart-home',
		),
		'school'                => array(
			'title'   => 'School',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'tags'    => 'school',
		),
		'real-estate'           => array(
			'title'   => 'Real Estate',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'tags'    => 'real estate',
		),
		'beauty'                => array(
			'title'   => 'Beauty',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'sweets-bakery'         => array(
			'title'   => 'Sweets Bakery',
			'process' => 'xml,home,options,widgets,headers,sliders,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'decor'                 => array(
			'title'   => 'Decor',
			'process' => 'xml,home,options,widgets,wood_slider,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'retail'                => array(
			'title'   => 'Retail',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'books'                 => array(
			'title'   => 'Books',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'shoes'                 => array(
			'title'   => 'Shoes',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'marketplace'           => array(
			'title'   => 'Marketplace',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'electronics'           => array(
			'title'   => 'Electronics',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'fashion-color'         => array(
			'title'   => 'Fashion Color',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/demo-fashion-colored/demo/fashion-colored/',
		),
		'fashion-minimalism'    => array(
			'title'   => 'Fashion Minimalism',
			'process' => 'xml,home,options,widgets,headers,sliders,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'tools'                 => array(
			'title'   => 'Tools',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'grocery'               => array(
			'title'   => 'Grocery',
			'process' => 'xml,home,options,widgets,headers,sliders,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'lingerie'              => array(
			'title'   => 'Lingerie',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'glasses'               => array(
			'title'   => 'Glasses',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'black-friday'          => array(
			'title'   => 'Black Friday',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'retail-2'              => array(
			'title'   => 'Retail 2',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'handmade'              => array(
			'title'   => 'Handmade',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/handmade/',
		),
		'repair'                => array(
			'title'   => 'Repair',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'lawyer'                => array(
			'title'   => 'Lawyer',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'corporate-2'           => array(
			'title'   => 'Corporate 2',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'drinks'                => array(
			'title'   => 'Drinks',
			'process' => 'xml,home,options,widgets,headers,images,sliders',
			'type'    => 'version',
			'base'    => 'base',
		),
		'medical-marijuana'     => array(
			'title'   => 'Medical Marijuana',
			'process' => 'xml,home,options,widgets,headers,sliders,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'electronics-2'         => array(
			'title'   => 'Electronics 2',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'fashion'               => array(
			'title'   => 'Fashion',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'medical'               => array(
			'title'   => 'Medical',
			'process' => 'xml,home,options,widgets,headers,sliders,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'coffee'                => array(
			'title'   => 'Coffee',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'accessories'           => array(
			'title'   => 'Accessories',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'camping'               => array(
			'title'   => 'Camping',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'alternative-energy'    => array(
			'title'   => 'Alternative Energy',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'flowers'               => array(
			'title'   => 'Flowers',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'fashion-flat'          => array(
			'title'   => 'Fashion Flat',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/demo-fashion-flat/demo/flat/',
		),
		'bikes'                 => array(
			'title'   => 'Bikes',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'wine'                  => array(
			'title'   => 'Wine',
			'process' => 'xml,home,options,widgets,headers,sliders,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'landing-gadget'        => array(
			'title'   => 'Landing Gadget',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'travel'                => array(
			'title'   => 'Travel',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'corporate'             => array(
			'title'   => 'Corporate',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'magazine'              => array(
			'title'   => 'Magazine',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/magazine/',
		),
		'hardware'              => array(
			'title'   => 'Hardware',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/demo-hardware/?opt=hardware/',
		),
		'food'                  => array(
			'title'   => 'Food',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'cosmetics'             => array(
			'title'   => 'Cosmetics',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'motorcycle'            => array(
			'title'   => 'Motorcycle',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'sport'                 => array(
			'title'   => 'Sport',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'minimalism'            => array(
			'title'   => 'Minimalism',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'organic'               => array(
			'title'   => 'Organic',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'watches'               => array(
			'title'   => 'Watches',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/demo-watches/demo/watch/',
		),
		'digitals'              => array(
			'title'   => 'Digital',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'jewellery'             => array(
			'title'   => 'Jewellery',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'toys'                  => array(
			'title'   => 'Toys',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'mobile-app'            => array(
			'title'   => 'Mobile App',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/demo-mobile-app/?opt=mobile_app/',
		),
		'christmas'             => array(
			'title'   => 'Christmas',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'dark'                  => array(
			'title'   => 'Dark',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/demo-dark/?opt=dark/',
		),
		'cars'                  => array(
			'title'   => 'Cars',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/home-cars/demo/cars/',
		),
		'furniture'             => array(
			'title'   => 'Furniture',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
		),
		'base-light'            => array(
			'title'   => 'Base Light',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/demo-light/?opt=light/',
		),
		'base-rtl'              => array(
			'title'   => 'Base rtl',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/home-rtl/?rtl/',
		),
		'basic'                 => array(
			'title'   => 'Basic',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-basic/?opt=layout_basic/',
		),
		'boxed'                 => array(
			'title'   => 'Boxed',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-boxed/?opt=layout_boxed/',
		),
		'categories'            => array(
			'title'   => 'Categories',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-categories/?opt=layout_categories/',
		),
		'landing'               => array(
			'title'   => 'Landing',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/landing/?opt=layout_landing/',
		),
		'lookbook'              => array(
			'title'   => 'Lookbook',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-lookbook/?opt=layout_lookbook/',
		),
		'fullscreen'            => array(
			'title'   => 'Fullscreen',
			'process' => 'xml,home,widgets,sliders,headers,images,options',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-fullscreen/?opt=layout_fullscreen/',
		),
		'video'                 => array(
			'title'   => 'Video',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-video/?opt=layout_video/',
		),
		'parallax'              => array(
			'title'   => 'Parallax',
			'process' => 'xml,home,options,widgets,sliders,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-parallax/?opt=layout_parallax/',
		),
		'infinite-scrolling'    => array(
			'title'   => 'Infinite Scrolling',
			'process' => 'xml,home,options,widgets,wood_slider,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/infinite-scrolling/?opt=layout_infinite/',
		),
		'grid'                  => array(
			'title'   => 'Grid',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-grid-2/?opt=layout_grid2/',
		),
		'digital-portfolio'     => array(
			'title'   => 'Digital Portfolio',
			'process' => 'xml,home,options,widgets,headers,images',
			'type'    => 'version',
			'base'    => 'base',
			'link'    => 'https://woodmart.xtemos.com/layout-digital-portfolio/?opt=layout_digital_portfolio/',
		),
		'base'                  => array(
			'title'   => 'Base content (required)',
			'process' => 'xml,xml_images,widgets,options,headers',
			'type'    => 'base',
		),
		'megamarket_base'       => array(
			'title'   => 'Base content megamarket (required)',
			'process' => 'xml,xml_images,widgets,options,headers',
			'type'    => 'base',
		),

		/**
		 * Pages.
		 */
		'contact-us'            => array(
			'title'   => 'Contact Us',
			'process' => 'xml',
			'type'    => 'page',
		),
		'contact-us-2'          => array(
			'title'   => 'Contact Us 2',
			'process' => 'xml',
			'type'    => 'page',
		),
		'contact-us-3'          => array(
			'title'   => 'Contact Us 3',
			'process' => 'xml',
			'type'    => 'page',
		),
		'contact-us-4'          => array(
			'title'   => 'Contact Us 4',
			'process' => 'xml',
			'type'    => 'page',
		),
		'about-us'              => array(
			'title'   => 'Old About Us',
			'process' => 'xml',
			'type'    => 'page',
		),
		'about-us-2'            => array(
			'title'   => 'Old About Us 2',
			'process' => 'xml',
			'type'    => 'page',
		),
		'about-us-3'            => array(
			'title'   => 'About Us',
			'process' => 'xml',
			'type'    => 'page',
		),
		'about-us-4'            => array(
			'title'   => 'About Us 2',
			'process' => 'xml,headers',
			'type'    => 'page',
		),
		'about-me'              => array(
			'title'   => 'Old About Me',
			'process' => 'xml',
			'type'    => 'page',
		),
		'about-me-2'            => array(
			'title'   => 'About Me',
			'process' => 'xml,headers',
			'type'    => 'page',
		),
		'our-team'              => array(
			'title'   => 'Old Our Team',
			'process' => 'xml',
			'type'    => 'page',
		),
		'our-team-2'            => array(
			'title'   => 'Our Team',
			'process' => 'xml',
			'type'    => 'page',
		),
		'faqs'                  => array(
			'title'   => 'FAQs',
			'process' => 'xml',
			'type'    => 'page',
		),
		'faqs-2'                => array(
			'title'   => 'FAQs 2',
			'process' => 'xml',
			'type'    => 'page',
			'link'    => 'https://woodmart.xtemos.com/faqs-two/',
		),
		'about-factory'         => array(
			'title'   => 'About Factory',
			'process' => 'xml',
			'type'    => 'page',
			'link'    => 'https://woodmart.xtemos.com/handmade/about-factory/',
		),
		'custom-404'            => array(
			'title'   => 'Custom-404',
			'process' => 'xml',
			'type'    => 'page',
			'link'    => 'https://woodmart.xtemos.com/custom-404-page/',
		),
		'custom-404-2'          => array(
			'title'   => 'Custom-404-2',
			'process' => 'xml',
			'type'    => 'page',
			'link'    => 'https://woodmart.xtemos.com/custom-404-page-2/',
		),
		'christmas-maintenance' => array(
			'title'   => 'Christmas maintenance',
			'process' => 'xml,options',
			'type'    => 'page',
		),
		'maintenance'           => array(
			'title'   => 'Maintenance',
			'process' => 'xml,options',
			'type'    => 'page',
		),
		'maintenance-2'         => array(
			'title'   => 'Maintenance 2',
			'process' => 'xml,options',
			'type'    => 'page',
		),
		'maintenance-3'         => array(
			'title'   => 'Maintenance 3',
			'process' => 'xml,options',
			'type'    => 'page',
		),

		'custom-privacy-policy' => array(
			'title'   => 'Custom Privacy Policy',
			'process' => 'xml',
			'type'    => 'page',
			'link'    => 'https://woodmart.xtemos.com/privacy-policy/',
		),
		'track-order'           => array(
			'title'   => 'Track Order',
			'process' => 'xml',
			'type'    => 'page',
		),

		/**
		 * Element.
		 */

		'product-filters'       => array(
			'title'   => 'Product filters',
			'process' => 'xml',
			'type'    => 'element',
		),
		'parallax-scrolling'    => array(
			'title'   => 'Parallax scrolling',
			'process' => 'xml',
			'type'    => 'element',
		),
		'animations'            => array(
			'title'   => 'Animations',
			'process' => 'xml',
			'type'    => 'element',
		),
		'sliders'               => array(
			'title'   => 'Sliders',
			'process' => 'xml,wood_slider',
			'type'    => 'element',
		),
		'image-hotspot'         => array(
			'title'   => 'Image Hotspot',
			'process' => 'xml',
			'type'    => 'element',
		),
		'list-element'          => array(
			'title'   => 'List-element',
			'process' => 'xml',
			'type'    => 'element',
		),
		'buttons'               => array(
			'title'   => 'Buttons',
			'process' => 'xml',
			'type'    => 'element',
		),
		'video-element'         => array(
			'title'   => 'Video-element',
			'process' => 'xml',
			'type'    => 'element',
		),
		'timeline'              => array(
			'title'   => 'Timeline',
			'process' => 'xml',
			'type'    => 'element',
		),
		'top-rated-products'    => array(
			'title'   => 'Top Rated Products',
			'process' => 'xml',
			'type'    => 'element',
		),
		'sale-products'         => array(
			'title'   => 'Sale Products',
			'process' => 'xml',
			'type'    => 'element',
		),
		'products-categories'   => array(
			'title'   => 'Products Categories',
			'process' => 'xml',
			'type'    => 'element',
		),
		'products-category'     => array(
			'title'   => 'Products Category',
			'process' => 'xml',
			'type'    => 'element',
		),
		'products-by-id'        => array(
			'title'   => 'Products by ID',
			'process' => 'xml',
			'type'    => 'element',
		),
		'featured-products'     => array(
			'title'   => 'Featured Products',
			'process' => 'xml',
			'type'    => 'element',
		),
		'recent-products'       => array(
			'title'   => 'Recent Products',
			'process' => 'xml',
			'type'    => 'element',
		),
		'gradients'             => array(
			'title'   => 'Gradients',
			'process' => 'xml',
			'type'    => 'element',
		),
		'section-dividers'      => array(
			'title'   => 'Section Dividers',
			'process' => 'xml',
			'type'    => 'element',
		),
		'brands-element'        => array(
			'title'   => 'Brands Element',
			'process' => 'xml',
			'type'    => 'element',
		),
		'button-with-popup'     => array(
			'title'   => 'Button with popup',
			'process' => 'xml',
			'type'    => 'element',
		),
		'ajax-products-tabs'    => array(
			'title'   => 'AJAX products tabs',
			'process' => 'xml',
			'type'    => 'element',
		),
		'animated-counter'      => array(
			'title'   => 'Animated counter',
			'process' => 'xml',
			'type'    => 'element',
		),
		'products-widgets'      => array(
			'title'   => 'Products widgets',
			'process' => 'xml',
			'type'    => 'element',
		),
		'products-grid'         => array(
			'title'   => 'Products grid',
			'process' => 'xml',
			'type'    => 'element',
		),
		'blog-element'          => array(
			'title'   => 'Blog element',
			'process' => 'xml',
			'type'    => 'element',
		),
		'portfolio-element'     => array(
			'title'   => 'Portfolio element',
			'process' => 'xml',
			'type'    => 'element',
		),
		'menu-price'            => array(
			'title'   => 'Menu price',
			'process' => 'xml',
			'type'    => 'element',
		),
		'360-degree-view'       => array(
			'title'   => '360 degree view',
			'process' => 'xml',
			'type'    => 'element',
		),
		'countdown-timer'       => array(
			'title'   => 'Countdown timer',
			'process' => 'xml',
			'type'    => 'element',
		),
		'testimonials'          => array(
			'title'   => 'Testimonials',
			'process' => 'xml',
			'type'    => 'element',
		),
		'team-member'           => array(
			'title'   => 'Team member',
			'process' => 'xml',
			'type'    => 'element',
		),
		'social-buttons'        => array(
			'title'   => 'Social Buttons',
			'process' => 'xml',
			'type'    => 'element',
		),
		'instagram'             => array(
			'title'   => 'Instagram',
			'process' => 'xml',
			'type'    => 'element',
		),
		'google-maps'           => array(
			'title'   => 'Google maps',
			'process' => 'xml',
			'type'    => 'element',
		),
		'banners'               => array(
			'title'   => 'Banners',
			'process' => 'xml',
			'type'    => 'element',
		),
		'carousels'             => array(
			'title'   => 'Carousels',
			'process' => 'xml',
			'type'    => 'element',
		),
		'titles'                => array(
			'title'   => 'Titles',
			'process' => 'xml',
			'type'    => 'element',
		),
		'images-gallery'        => array(
			'title'   => 'Images gallery',
			'process' => 'xml',
			'type'    => 'element',
		),
		'pricing-tables'        => array(
			'title'   => 'Pricing Tables',
			'process' => 'xml',
			'type'    => 'element',
		),
		'infobox'               => array(
			'title'   => 'Infobox',
			'process' => 'xml',
			'type'    => 'element',
		),
	)
);
