<?php

$compatible_plugins = woodmart_get_config( 'compatible-plugins' );

?>

<div class="woodmart-row woodmart-one-column xts-plugins-tab">
	<div class="woodmart-column woodmart-stretch-column">
		<div class="woodmart-column-inner">
			<div class="wd-box xts-dashboard">
				<div class="woodmart-box-header">
					<h2>
						<?php esc_html_e( 'Theme related plugins', 'woodmart' ); ?>
					</h2>
				</div>
				<div class="woodmart-box-content">
					<?php get_template_part( 'inc/admin/setup-wizard/templates/plugins', '', array( 'show_plugins' => 'theme_plugin' ) ); ?>
				</div>
				<?php if ( ! woodmart_get_opt( 'white_label' ) ) : ?>
					<div class="woodmart-box-footer">
						<p>Plugins marked with "Required" label are needed for the smooth operation of the WoodMart theme. Other plugins provide additional functionality but may be deleted if they are not necessary.</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php if ( $compatible_plugins ) : ?>
	<div class="woodmart-row woodmart-one-column xts-plugins-tab">
		<div class="woodmart-column woodmart-stretch-column">
			<div class="woodmart-column-inner">
				<div class="wd-box xts-dashboard">
					<div class="woodmart-box-header">
						<h2>
							<?php esc_html_e( 'Compatible plugins', 'woodmart' ); ?>
						</h2>
					</div>
					<div class="woodmart-box-content woodmart-compatible-plugins">
						<?php get_template_part( 'inc/admin/setup-wizard/templates/plugins', '', array( 'show_plugins' => 'compatible' ) ); ?>
					</div>
					<?php if ( ! woodmart_get_opt( 'white_label' ) ) : ?>
						<div class="woodmart-box-footer">
							<p>
								<?php esc_html_e( 'Didn\'t find a compatible plugin?', 'woodmart' ); ?>
								<a href="https://xtemos.com/forums/forum/woodmart-premium-template/">
									<?php esc_html_e( 'Get help', 'woodmart' ); ?>
								</a>
							</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
