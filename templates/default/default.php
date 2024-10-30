<?php

if (get_theme_mod('hsw_dir_show_map', 'no') == 'yes') {
	hswDirectory::get_template_part('map.php');
}

if (get_theme_mod('hsw_dir_show_filters', 'yes') == 'yes') {
	hswDirectory::get_template_part('filters.php');
}

if (get_theme_mod('hsw_dir_show_top_pager', 'yes') == 'yes') {
	hswDirectory::get_template_part('list-top-pager.php');
}

?>

<div class="row">

	<div class="col-12"> 

		<div id="hsw-dir-ajax-loader"><span class="fa fa-fw fa-spin fa-cog"></span></div>

		<div id="hsw-dir-ajax-content"></div>

	</div>

</div>

<?php

if (get_theme_mod('hsw_dir_show_bottom_pager', 'yes') == 'yes') {
	hswDirectory::get_template_part('list-bottom-pager.php');
}

?>

<div class="remodal-bg">
	<div class="remodal" id="remodal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<div id="remodal-content"></div>
		<br>
		<button data-remodal-action="cancel" class="remodal-cancel">Close</button>
	</div>
</div>

<?php hswDirectory::get_template_part('style.php'); ?>
<?php hswDirectory::get_template_part('js.php'); ?>