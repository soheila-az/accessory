<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Products
class offer_Widget_offer extends Widget_Base {

   public function get_name() {
      return 'Offer_Products';
   }

   public function get_title() {
      return esc_html__( 'Special Offer', 'special-offer-woodmart' );
   }

   public function get_icon() {
        return 'eicon-form-vertical';
   }

   public function get_categories() {
      return [ 'offer-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'products_section',
         [
            'label' => esc_html__( 'پیشنهاد ویژه', 'special-offer-woodmart' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
			'offer_title',
			[
				'label'   => esc_html__( 'عنوان پیشنهاد شگفت انگیز', 'special-offer-woodmart' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'پیشنهادات ویژه امروز : ',
			]
		);

      $this->add_control(
         'category',
         [
            'label' => esc_html__( 'دسته بندی محصولات', 'special-offer-woodmart' ),
            'type' => Controls_Manager::SELECT2,
            'title' => esc_html__( 'Select a category', 'special-offer-woodmart' ),
            'multiple' => true,
            'options' => offer_get_terms_dropdown_array([
               'taxonomy' => 'product_cat',
               'hide_empty' => false,
            ]),
         ]
      );

      $this->add_control(
         'ppp',
         [
            'label' => __( 'تعداد محصول', 'special-offer-woodmart' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
               'no' => [
                  'min' => 0,
                  'max' => 100,
                  'step' => 1,
               ],
            ],
            'default' => [
               'size' => 3,
            ]
         ]
      );

      $this->add_control(
         'order',
         [
            'label' => __( 'مرتب سازی', 'special-offer-woodmart' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => [
               'ASC'  => __( 'صعودی', 'special-offer-woodmart' ),
               'DESC' => __( 'نزولی', 'special-offer-woodmart' )
            ],
         ]
      );

    $this->add_control(
			'offer_btn_color',
			[
				'label'     => esc_html__( 'رنگ دکمه خرید', 'special-offer-woodmart' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .products-swiper-button ' => 'background-color: {{VALUE}}',
				],
			]
		);

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {

      // get our input from the widget settings.

      $settings = $this->get_settings_for_display();

      global $product;
      global $wpdb;

		// Get products on sale
		$product_ids_raw = $wpdb->get_results(
		"SELECT posts.ID, posts.post_parent
		FROM `$wpdb->posts` posts
		INNER JOIN `$wpdb->postmeta` ON (posts.ID = `$wpdb->postmeta`.post_id)
		INNER JOIN `$wpdb->postmeta` AS mt1 ON (posts.ID = mt1.post_id)
		WHERE
			posts.post_status = 'publish'
			AND  (mt1.meta_key = '_sale_price_dates_to' AND mt1.meta_value >= ".time().")
			GROUP BY posts.ID
			ORDER BY posts.post_title");

		$product_ids_on_sale = array();

		foreach ( $product_ids_raw as $product_raw )
		{
			if(!empty($product_raw->post_parent))
			{
				$product_ids_on_sale[] = $product_raw->post_parent;
			}
			else
			{
				$product_ids_on_sale[] = $product_raw->ID;
			}
		}
		$product_ids_on_sale = array_unique($product_ids_on_sale);


	  ?>

    <?php if ( wp_is_mobile() ): ?>
    		<div class="iwp-offer-slider-mob">
    		 <div class="gallery-container-mob">

            <div class="swiper-container gallery-main-mob">
              <div class="swiper-wrapper">
               <?php

			   $cat_include = $settings['category'];

   		  $args = array(
               'post_type' => 'product',
               'posts_per_page' => $settings['ppp']['size'],
               'order' => $settings['order'],
               'post_status' => 'publish',
               'post__in'			    => array_merge( array( 0 ), $product_ids_on_sale ),
               'tax_query' => array(
                   'relation' => 'AND',
               ),
           );


           if (!empty($settings['category'])) {
               $cat_include = array();
               foreach ($settings['category'] as $category) {
                   $term = term_exists($category, 'product_cat');
                   if ($term !== 0 && $term !== null) {
                       $cat_include[] = $term['term_id'];
                   }
               }
               if (!empty($cat_include)) {
                   $args['tax_query'][] = array(
                       'taxonomy' => 'product_cat',
                       'terms' => $cat_include,
                       'operator' => 'IN',
                   );
               }
           }


                  $products = new \WP_Query($args);

                            /* Start the Loop */
                            while ( $products->have_posts() ) : $products->the_post(); ?>

                            <div class="swiper-slide">


                                          <div class="carousel-image">

                                            <div class="carousel-special-offer-badge">پیشنهاد ویژه</div>
                                            <a href="<?php the_permalink() ?>">
                                            <?php woocommerce_template_loop_product_thumbnail(); ?>
                                            </a>
                                            <div class="special-offer-time-text">زمان باقی مانده تا پایان تخفیف</div>
                                            <div class="countdown-offer">
                                                 <?php
                                                 global $product;
                            $sale_date_end = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
                        $sale_date_start = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );

                        if ( ( apply_filters( 'woodmart_sale_countdown_variable', false ) || woodmart_get_opt( 'sale_countdown_variable' ) ) && $product->get_type() == 'variable' ) {
                          // Variations cache
                          $cache          = apply_filters( 'woodmart_countdown_variable_cache', true );
                          $transient_name = 'woodmart_countdown_variable_cache_' . $product->get_id();
                          $available_variations = array();

                          if ( $cache ) {
                            $available_variations = get_transient( $transient_name );
                          }

                          if ( ! $available_variations ) {
                            $available_variations = $product->get_available_variations();
                            if ( $cache ) {
                              set_transient( $transient_name, $available_variations, apply_filters( 'woodmart_countdown_variable_cache_time', WEEK_IN_SECONDS ) );
                            }
                          }

                          if ( $available_variations ) {
                            $sale_date_end = get_post_meta( $available_variations[0]['variation_id'], '_sale_price_dates_to', true );
                            $sale_date_start = get_post_meta( $available_variations[0]['variation_id'], '_sale_price_dates_from', true );
                          }
                        }

                        $curent_date = strtotime( date( 'Y-m-d H:i:s' ) );

                        if ( $sale_date_end < $curent_date || $curent_date < $sale_date_start ) return;

                            $timezone = 'GMT';

                            if ( apply_filters( 'woodmart_wp_timezone', false ) ) $timezone = wc_timezone_string();

                        woodmart_enqueue_js_library( 'countdown-bundle' );
                        woodmart_enqueue_js_script( 'countdown-element' );
                        woodmart_enqueue_inline_style( 'countdown' );

                        echo '<div class="wd-product-countdown wd-timer' . woodmart_get_old_classes( ' woodmart-product-countdown woodmart-timer' ) . '" data-end-date="' . esc_attr( date( 'Y-m-d H:i:s', $sale_date_end ) ) . '" data-timezone="' . $timezone . '"></div>';

                                                        ?>
                                                        </div>
                                    </div>




                            </div>
                            <?php
                            endwhile;
                             wp_reset_postdata();
                            ?>
            </div>
             <div class="swiper-pagination"></div>
             <div class="swiper-button-prev"></div>
             <div class="swiper-button-next"></div>
           </div>
         </div>
    		</div>

    <?php else: ?>

<div class="iwp-offer-slider">
  <div class="backimgright"></div>
  <div class="backimgleft"></div>
      <div class="gallery-container">

        <div class="swiper-container gallery-main">
         <div class="swiper-wrapper">
          <?php
            $cat_include = $settings['category'];

   		  $args = array(
               'post_type' => 'product',
               'posts_per_page' => $settings['ppp']['size'],
               'order' => $settings['order'],
               'post_status' => 'publish',
               'post__in'			    => array_merge( array( 0 ), $product_ids_on_sale ),
               'tax_query' => array(
                   'relation' => 'AND',
               ),
           );


           if (!empty($settings['category'])) {
               $cat_include = array();
               foreach ($settings['category'] as $category) {
                   $term = term_exists($category, 'product_cat');
                   if ($term !== 0 && $term !== null) {
                       $cat_include[] = $term['term_id'];
                   }
               }
               if (!empty($cat_include)) {
                   $args['tax_query'][] = array(
                       'taxonomy' => 'product_cat',
                       'terms' => $cat_include,
                       'operator' => 'IN',
                   );
               }
           }
            $products = new \WP_Query($args);

      /* Start the Loop */
      while ( $products->have_posts() ) : $products->the_post(); ?>

      <div class="swiper-slide">



        <div class="carousel-item--data">

                    <div class="carousel-image">

                      <div class="carousel-special-offer-badge"><?php echo esc_html($settings['offer_title']); ?></div>
                      <?php woocommerce_template_loop_product_thumbnail(); ?>
                      <div class="special-offer-time-text">زمان باقی مانده تا پایان تخفیف</div>
                      <div class="countdown-offer">
                           <?php
                           global $product;
      $sale_date_end = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
  $sale_date_start = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );

  if ( ( apply_filters( 'woodmart_sale_countdown_variable', false ) || woodmart_get_opt( 'sale_countdown_variable' ) ) && $product->get_type() == 'variable' ) {
    // Variations cache
    $cache          = apply_filters( 'woodmart_countdown_variable_cache', true );
    $transient_name = 'woodmart_countdown_variable_cache_' . $product->get_id();
    $available_variations = array();

    if ( $cache ) {
      $available_variations = get_transient( $transient_name );
    }

    if ( ! $available_variations ) {
      $available_variations = $product->get_available_variations();
      if ( $cache ) {
        set_transient( $transient_name, $available_variations, apply_filters( 'woodmart_countdown_variable_cache_time', WEEK_IN_SECONDS ) );
      }
    }

    if ( $available_variations ) {
      $sale_date_end = get_post_meta( $available_variations[0]['variation_id'], '_sale_price_dates_to', true );
      $sale_date_start = get_post_meta( $available_variations[0]['variation_id'], '_sale_price_dates_from', true );
    }
  }

  $curent_date = strtotime( date( 'Y-m-d H:i:s' ) );

  if ( $sale_date_end < $curent_date || $curent_date < $sale_date_start ) return;

      $timezone = 'GMT';

      if ( apply_filters( 'woodmart_wp_timezone', false ) ) $timezone = wc_timezone_string();

  woodmart_enqueue_js_library( 'countdown-bundle' );
  woodmart_enqueue_js_script( 'countdown-element' );
  woodmart_enqueue_inline_style( 'countdown' );

  echo '<div class="wd-product-countdown wd-timer' . woodmart_get_old_classes( ' woodmart-product-countdown woodmart-timer' ) . '" data-end-date="' . esc_attr( date( 'Y-m-d H:i:s', $sale_date_end ) ) . '" data-timezone="' . $timezone . '"></div>';

                                  ?>
                                  </div>

                                  <div class="swiper-button-prev"></div>
                                  <div class="swiper-button-next"></div>
                    </div>


                        <div class="carousel-title-container">
                            <h3 class="carousel-title">
                                <?php the_title(); ?>
                            </h3>
                        </div>



                        <div class="carousel-utilities">

                            <div class="offer-slider-price"><?php woocommerce_template_loop_price(); ?>
                                <?php
                                            global $product;
                            								if ( $product->is_on_sale() ) {

                            								if ( ! $product->is_type( 'variable' ) ) {

                            								$max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;

                            								} else {

                            									$max_percentage = 0;

                            									foreach ( $product->get_children() as $child_id ) {
                            									$variation = wc_get_product( $child_id );
                            									$price = $variation->get_regular_price();
                            									$sale = $variation->get_sale_price();
                            									if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
                            									if ( $percentage > $max_percentage ) {
                            									$max_percentage = $percentage;
                            									}
                            									}

                            								}
                                            echo "<strong>درصد تخفیف شما:</strong>";
                                            echo "<span class='products-swiper-discount'>";
                            								echo "<div class='sale-perc'>" . round($max_percentage) . "%  - </div>";
                                            echo "</span>";
                            								}
                            							?>

                            </div>

                            <?php	echo do_shortcode( get_the_excerpt() ); ?>
                            <div class="btn-offer">
                              <a href="<?php the_permalink() ?>"><div class="products-swiper-button"> <svg id="svg_basket" viewBox="0 0 22.8 29.4"><path d="M21.8 6.5h-5.6V4.8c0-2.6-2.1-4.8-4.8-4.8-2.6 0-4.8 2.1-4.8 4.8v1.8H1c-.6 0-1 .4-1 1v17.8c.2 2.2 2 4 4.3 4h14.3c2.2 0 4.1-1.8 4.3-4.1V7.5c-.1-.5-.5-1-1.1-1zM8.6 4.8C8.6 3.3 9.9 2 11.4 2c1.5 0 2.8 1.3 2.8 2.8v1.8H8.6V4.8zm10 22.6H4.5c-1.2.1-2.3-.9-2.4-2.1V8.5h4.6v.9c0 .6.4 1 1 1s1-.4 1-1v-.9h5.6v.9c0 .6.4 1 1 1s1-.4 1-1v-.9h4.6v16.7c-.2 1.2-1.1 2.2-2.3 2.2z"></path></svg>
                                مشاهده و خرید محصول</div>
                              </a>
                            </div>





                        </div>






            </div>





      </div>

      <?php
      endwhile;
   wp_reset_postdata();
   ?>

    </div>

  </div>


  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
      <?php
      $cat_include = $settings['category'];

   		  $args = array(
               'post_type' => 'product',
               'posts_per_page' => $settings['ppp']['size'],
               'order' => $settings['order'],
               'post_status' => 'publish',
               'post__in'			    => array_merge( array( 0 ), $product_ids_on_sale ),
               'tax_query' => array(
                   'relation' => 'AND',
               ),
           );


           if (!empty($settings['category'])) {
               $cat_include = array();
               foreach ($settings['category'] as $category) {
                   $term = term_exists($category, 'product_cat');
                   if ($term !== 0 && $term !== null) {
                       $cat_include[] = $term['term_id'];
                   }
               }
               if (!empty($cat_include)) {
                   $args['tax_query'][] = array(
                       'taxonomy' => 'product_cat',
                       'terms' => $cat_include,
                       'operator' => 'IN',
                   );
               }
           }
      $products = new \WP_Query($args);

      /* Start the Loop */
      while ( $products->have_posts() ) : $products->the_post(); ?>
      <div class="swiper-slide offer-slide-side">
      		<?php
      							global $product;
      								if ( $product->is_on_sale() ) {
      								if ( ! $product->is_type( 'variable' ) ) {
      								$max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
      								} else {
      									$max_percentage = 0;
      									foreach ( $product->get_children() as $child_id ) {
      									$variation = wc_get_product( $child_id );
      									$price = $variation->get_regular_price();
      									$sale = $variation->get_sale_price();
      									if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
      									if ( $percentage > $max_percentage ) {
      									$max_percentage = $percentage;
      									}
      									}
      								}

      								}
      							?>

            <div class="offer-side-title">
              <span class="offer-side-product-title"><?php the_title(); ?></span>

            </div>
      </div>

      <?php
      endwhile;
   wp_reset_postdata();
   ?>


     </div>
   </div>
 </div>
</div>
<?php endif; ?>
   <?php
   }

}

Plugin::instance()->widgets_manager->register_widget_type( new offer_Widget_offer );
