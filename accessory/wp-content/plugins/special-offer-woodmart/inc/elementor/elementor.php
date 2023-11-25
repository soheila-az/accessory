<?php

if ( ! defined( 'ABSPATH' ) ) exit;


// get posts dropdown
function offer_get_posts_dropdown_array($args = [], $key = 'ID', $value = 'post_title') {
  $options = [];
  $posts = get_posts($args);
  foreach ((array) $posts as $term) {
    $options[$term->{$key}] = $term->{$value};
  }
  return $options;
}

// get terms dropdown
function offer_get_terms_dropdown_array($args = [], $key = 'term_id', $value = 'name') {
  $options = [];
  $terms = get_terms($args);

  if (is_wp_error($terms)) {
    return [];
  }

  foreach ((array) $terms as $term) {
    $options[$term->{$key}] = $term->{$value};
  }

  return $options;
}


function offer_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'offer-elements',
		[
			'title' => esc_html__( 'افزودنی های المنتوری وودمارت', 'special-offer-woodmart' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'offer_add_elementor_widget_categories' );

//Elementor init

class offer_ElementorCustomElement {

   private static $instance = null;

   public static function get_instance() {
      if ( ! self::$instance )
         self::$instance = new self;
      return self::$instance;
   }

   public function init(){
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
   }


   public function widgets_registered() {

    // We check if the Elementor plugin has been installed / activated.
    if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){
         include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-offer.php');
         //include_once(plugin_dir_path( __FILE__ ).'/widgets/widget-price-tables.php');
      }
	}

}

offer_ElementorCustomElement::get_instance()->init();
