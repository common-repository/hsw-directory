<div class="row" id="hsw-dir-filters" style="display: none;">

	<div class="col-12">

		<div class="hsw-dir-filters-inner">

			<div class="row">

				<?php if ( get_theme_mod('hsw_dir_show_taxonomy_1_filter', 'yes') == 'yes'  )  : ?>

					<div class="col-12 col-sm-6 col-md-3">

						<?php 

						$terms = get_terms(array(
							'taxonomy' => 'hsw_dir_listing_tax_1',
							'hide_empty' => true,
						));

						?>

						<label><?php echo esc_html(get_theme_mod('hsw_dir_label_tax_1_filter_heading', __('Taxonomy 1', 'hsw-directory'))); ?></label>

						<?php if (isset($_GET['taxonomy_1'])) {
							$tx1 = $_GET['taxonomy_1'];
						} else {
							$tx1 = false;
						} ?>

						<div class="hsw-filter-wrap">

							<select id="hsw-dir-taxonomy-1">

								<option value="all"><?php echo esc_html(get_theme_mod('hsw_dir_label_tax_1_filter_select', __('All', 'hsw-directory'))); ?></option>

								<?php foreach ($terms as $k => $v) : ?>

									<option value="<?php echo esc_attr($v->term_id); ?>" <?php echo ( $tx1 && (int)$_GET['taxonomy_1'] == $v->term_id ? 'selected' : '' ); ?>>
										<?php echo esc_html($v->name); ?>
									</option>

								<?php endforeach; ?>

							</select>

						</div>

					</div>

				<?php endif; ?>

				<?php if ( get_theme_mod('hsw_dir_show_taxonomy_2_filter', 'yes') == 'yes'  )  : ?>

					<div class="col-12 col-sm-6 col-md-3">

						<?php 

						$terms = get_terms(array(
							'taxonomy' => 'hsw_dir_listing_tax_2',
							'hide_empty' => true,
						));

						?>

						<label><?php echo esc_html(get_theme_mod('hsw_dir_label_tax_2_filter_heading', esc_html__('Taxonomy 2', 'hsw-directory'))); ?></label>

						<?php if (isset($_GET['taxonomy_2'])) {
							$tx2 = $_GET['taxonomy_2'];
						} else {
							$tx2 = false;
						} ?>

						<div class="hsw-filter-wrap">

							<select id="hsw-dir-taxonomy-2">

								<option value="all"><?php echo esc_html(get_theme_mod('hsw_dir_label_tax_2_filter_select', esc_html__('All', 'hsw-directory'))); ?></option>

								<?php foreach ($terms as $k => $v) : ?>

									<option value="<?php echo esc_attr($v->term_id); ?>" <?php echo ( $tx2 && (int)$_GET['taxonomy_2'] == $v->term_id ? 'selected' : '' ); ?>>
										<?php echo esc_html($v->name); ?>
									</option>

								<?php endforeach; ?>

							</select>

						</div>

					</div>

				<?php endif; ?>

				<?php if ( get_theme_mod('hsw_dir_show_keyword_filter', 'yes') == 'yes' ) : ?>

					<div class="col-12 col-sm-6 col-md-3">

						<label><?php echo esc_html(get_theme_mod('hsw_dir_label_keyword_heading', __('Keyword', 'hsw-directory'))); ?></label>

						<?php if (isset($_GET['keyword'])) {
							$kw = $_GET['keyword'];
						} else {
							$kw = '';
						} ?>

						<div class="hsw-filter-wrap">

							<input id="hsw-dir-keyword" type="text" value="<?php echo esc_attr($kw); ?>">

						</div>

					</div>

				<?php endif; ?>

				<div class="col-12 col-sm-6 col-md-3">

					<label><?php echo esc_html(get_theme_mod('hsw_dir_label_keyword_heading', __('Filters', 'hsw-directory'))); ?></label>

					<a id="hsw-dir-search-button" class="hsw-dir-button">

						<?php echo esc_html(get_theme_mod('hsw_dir_label_search_button', __('Apply', 'hsw-directory'))); ?>

					</a>

				</div>

			</div>

		</div>

	</div>

</div>