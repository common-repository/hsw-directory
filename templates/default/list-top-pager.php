<div class="row" id="hsw-dir-list-top-pager">

	<div class="col-8 hsw-dir-list-top-pager-left">

		<a class="hsw-dir-change-page hsw-dir-button backward disabled">
			<span class="fas fa-fw fa-chevron-left"></span>
		</a>

		<a class="hsw-dir-change-page hsw-dir-button forward">
			<span class="fas fa-fw fa-chevron-right"></span>
		</a>

		<?php if (get_theme_mod('hsw_dir_show_filters', 'yes') == 'yes') : ?>
			<a id="hsw-dir-toggle-filters" class="closed inactive hsw-dir-button">
				<span class="fas fa-fw fa-sliders-h"></span>
			</a>
		<?php endif; ?>

	</div>

	<div class="col-4 hsw-dir-list-top-pager-right">

		<span id="hsw-page-count-current"></span> / <span id="hsw-page-count-total"></span>

	</div>

</div>