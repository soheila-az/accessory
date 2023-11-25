<?php
/**
 * Interface for patch.
 *
 * @package Woodmart
 */

use XTS\Modules\Patcher\Client;

?>
<div class="woodmart-row woodmart-one-column">
	<div class="woodmart-column woodmart-stretch-column">
		<div class="woodmart-column-inner">
			<div class="wd-box xts-dashboard">
				<div class="woodmart-box-header">
					<h2>
						<?php esc_html_e( 'پچر', 'woodmart' ); ?>
					</h2>
				</div>
				<div class="woodmart-box-content">
					<div class="xts-loader-wrapper">
						<div class="xts-loader">
							<div class="xts-loader-el"></div>
							<div class="xts-loader-el"></div>
						</div>
						<p>
							<?php esc_html_e( 'ممکن است کمی طول بکشد...', 'woodmart' ); ?>
						</p>
					</div>
					<?php Client::get_instance()->render(); ?>
				</div>
				<?php if ( ! woodmart_get_opt( 'white_label' ) ) : ?>
					<div class="woodmart-box-footer">
						<p>Read more about automatic patcher tool in our <a href="https://xtemos.com/docs-topic/automatic-patcher/" target="_blank">documentation</a>.</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
