<div class="wrap">
	<div class="about-wrap">
		<h1>
			<?php if ( woodmart_get_opt( 'white_label' ) && woodmart_get_opt( 'white_label_dashboard_title' ) ) : ?>
				<?php echo esc_html( woodmart_get_opt( 'white_label_dashboard_title' ) ); ?>
			<?php else : ?>
				<?php esc_html_e( 'به قالب ایران وودمارت خوش آمدید', 'woodmart' ); ?>
			<?php endif; ?>
		</h1>

		<div class="about-text">
			<?php if ( woodmart_get_opt( 'white_label' ) && woodmart_get_opt( 'white_label_dashboard_text' ) ) : ?>
				<?php echo esc_html( woodmart_get_opt( 'white_label_dashboard_text' ) ); ?>
			<?php else : ?>
				در این قسمت شما می توانید دموهای آماده قالب وودمارت را درون ریزی کرده و بر روی سایت خود نمایش دهید. از خرید شما دوست عزیز متشکریم.
			<?php endif; ?>
		</div>

		<div class="woodmart-theme-badge">
			<?php
			$badge_url = WOODMART_ASSETS_IMAGES . '/woodmart-badge.png';

			if ( woodmart_get_opt( 'white_label_dashboard_logo' ) && woodmart_get_opt( 'white_label' ) ) {
				$image_data = woodmart_get_opt( 'white_label_dashboard_logo' );

				if ( isset( $image_data['url'] ) && $image_data['url'] ) {
					$badge_url = wp_get_attachment_image_url( $image_data['id'], 'medium' );
				}
			}
			?>
			<img src="<?php echo esc_url( $badge_url ); ?>">
			<span>
				<?php
				$theme_version = explode( '.', woodmart_get_theme_info( 'Version' ) );
				echo esc_html( $theme_version[0] . '.' . $theme_version[1] );
				?>
			</span>
		</div>

		<?php if ( apply_filters( 'woodmart_dashboard_links', true ) ) : ?>
			<p class="redux-actions">
				<a href="https://iran-woodmart.ir/woodmart-theme-tutorials/" target="_blank" class="xts-bordered-btn xts-border-btn-primary">پایگاه دانش</a>
				<a href="https://iran-woodmart.ir/product/woodmart-theme-website-design-tutorials/" target="_blank" class="xts-bordered-btn xts-border-btn-primary">آموزش طراحی سایت با وودمارت</a>
				<a href="https://iran-woodmart.ir/customer-reviews/" class="xts-bordered-btn xts-border-btn-primary" target="_blank">نظرسنجی</a>
				<a href="https://iran-woodmart.ir/my-account/nirweb-ticket/" class="xts-btn xts-btn-primary" target="_blank">پشتیبانی ایران وودمارت</a>
			</p>
		<?php endif; ?>
	</div>

	<div class="wd-wrap-content">
		<h2 class="nav-tab-wrapper">
			<?php foreach ( $this->get_tabs() as $tab => $title ) : ?>
				<?php
				$nav_tab_classes = '';

				if ( $this->get_current_tab() === $tab ) {
					$nav_tab_classes .= ' nav-tab-active';
				}

				if ( 'wizard' === $tab ) {
					continue;
				}
				?>

				<a class="nav-tab<?php echo esc_attr( $nav_tab_classes ); ?>" href="<?php echo esc_url( $this->tab_url( $tab ) ); ?>">
					<?php echo esc_html( $title ); ?>
				</a>
			<?php endforeach ?>
		</h2>
