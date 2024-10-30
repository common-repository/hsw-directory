<style type="text/css">

.hsw-dir-panel {
	margin-bottom: 30px;
}

.hsw-dir-panel-body {
	background-color: #fff;
	box-shadow: rgba(0,0,0,.298039) 0 1px 4px -1px;
}

.hsw-dir-panel-image {
	text-align: center;
}

.hsw-dir-panel-image img {
	max-width: 100%;
	height: auto;
	display: block;
}

.hsw-dir-panel-image-inner {
	background-color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	color: #fff;
	text-align: left;
	display: flex;
}

.hsw-dir-panel-image-inner a {
	flex-grow: 1;
	color: #fff;
	text-align: center;
	padding-top: 10px;
	padding-bottom: 10px;
}

.hsw-dir-panel-image-inner a:hover {
	background-color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#a51b20')); ?>;
	color: #fff;
	cursor: pointer;
}

.hsw-dir-panel-item {
	font-size: 14px;
}

.hsw-panel-item-content {
	padding-left: 15px;
	padding-right: 15px;
}

.hsw-dir-button {
	text-align: center;
	color: #ffffff;
	padding: 10px 20px;
	display: inline-block;
	background-color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	border: 1px solid <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	cursor: pointer;
	box-shadow: rgba(0,0,0,.298039) 0 1px 4px -1px;
}

.hsw-dir-button:hover {
	background-color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#a51b20')); ?>;
	color: #fff;
	cursor: pointer;
	border-color: #555;
}

.hsw-dir-button.active {
	background-color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#a51b20')); ?>;
	color: #fff;
	cursor: pointer;
	border-color: #555;
}

.hsw-dir-button.disabled {
	cursor: default;
	background-color: #fff;
	border-color: #555;
	color: #555;
	box-shadow: none;
}

.hsw-dir-button-alt {
	text-align: center;
	color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	border: 1px solid <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	padding: 0px 10px;
	display: inline-block;
	background-color: #fff;
}

.hsw-dir-button-alt:hover {
	background-color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#a51b20')); ?>;
	color: #fff;
	cursor: pointer;
}

#hsw-dir-search-button.hsw-dir-button {
	display: block;
}

.hsw-dir-featured-icon {
	position: absolute;
	top: 0;
	left: 15px;
	padding: 5px 10px;
	font-size: 12px;
	line-height: 12px;
	background: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	color: #fff;
}

.hsw-social-seperatror {
	display: inline-block;
	margin-right: 5px;
}

a.hsw-social-icon {
	width: 30px;
	height: 30px;
	display: inline-block;
	text-align: center;
	line-height: 30px;
	color: #fff;
	margin-right: 5px;
	margin-top: 15px;
}

a.hsw-social-icon:hover {
	color: #f1f1f1;
	cursor: pointer;
}

a.hsw-social-icon.website {
	background-color: #999;
}

a.hsw-social-icon.twitter {
	background-color: #55acee;
}

a.hsw-social-icon.facebook {
	background-color: #3b5998;
}

a.hsw-social-icon.google {
	background-color: #dd4b39;
}

a.hsw-social-icon.linkedin {
	background-color: #007bb5;
}

a.hsw-social-icon.pinterest {
	background-color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
}

a.hsw-social-icon.instagram {
	background-color: #e95950;
}

.hsw-dir-extra {
	text-align: left;
	font-size: 14px;
}

.hsw-dir-extra-item {
	margin-bottom: 15px;
	padding-left: 15px;
	padding-right: 15px;
}

.hsw-dir-extra-item .col-2 svg {
	color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
}

.hsw-dir-send-message label {
	display: block;
	margin-bottom: 15px;
}

#hsw-dir-ajax-content .hsw-dir-send-message input, #hsw-dir-ajax-content .hsw-dir-send-message textarea {
	display: block;
	margin-bottom: 15px;
	border: 1px solid #555;
	width: 100%;
}

a.hsw-show-extra {
	border: 1px solid #555;
	color: #555;
}

a.hsw-show-extra:hover {
	cursor: pointer;
	color: #555;
}

#hsw-dir-map {
	min-height: 250px;
	margin-bottom: 30px;
}

.hsw-dir-key-value-pairs .hsw-dir-key-value-pairs-inner {
	font-size: 14px;
	padding-left: 15px;
	padding-right: 15px;
	background: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	color: #fff;
}

.hsw-dir-key-value-pairs .hsw-dir-key-value-pairs-inner .row {
	border-top: 1px solid #fff;
	padding-top: 5px;
	padding-bottom: 5px;
}

#hsw-dir-filters {
	margin-bottom: 30px;
}

#hsw-dir-filters .hsw-dir-filters-inner {
	border: 1px solid <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	padding: 0 15px 15px 15px;
	box-shadow: rgba(0,0,0,.298039) 0 1px 4px -1px;
}

#hsw-refine-search {
	background-color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	color: #fff;
	padding: 15px;
	margin-bottom: 15px;
	font-size: 16px;
}

#hsw-dir-filters .hsw-dir-filters-inner label {
	display: block;
	padding-bottom: 10px;
	padding-top: 15px;
	background-color: #fff;
	color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	font-size: 16px;
}

#hsw-dir-filters .hsw-dir-filters-inner .hsw-filter-wrap {
	display: block;
}

#hsw-dir-filters .hsw-dir-filters-inner .hsw-filter-wrap select, #hsw-dir-filters .hsw-dir-filters-inner .hsw-filter-wrap input {
	display: block;
	padding: 5px;
	padding-left: 15px;
	width: 100%;
	border: 1px solid <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	min-height: 45px;
	border-radius: 0;
}

#hsw-dir-filters .hsw-dir-filters-inner .hsw-filter-wrap input {
	padding-top: 10px;
	padding-bottom: 10px;
}

.hsw-dir-nav-left {
	margin-bottom: 15px;
}

.hsw-dir-nav-right {
	margin-bottom: 15px;
	text-align: right;
}

.hsw-dir-page-count {
	line-height: 50px;
}

.hsw-dir-modal-post-content {
	padding-top: 30px;
}

#remodal .remodal-cancel {
	background: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	color: #fff;
}

#remodal .remodal-cancel:hover {
	background: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#a51b20')); ?>;
	color: #fff;
}

#mapbox {
	min-height: 350px;
	margin-bottom: 30px;
	box-shadow: rgba(0,0,0,.298039) 0 1px 4px -1px;
}

.mapbox-popup {
	padding: 15px 30px 5px 30px;
}

.mapbox-popup span {
	font-size: 14px;
	text-align: center;
	display: block;
	margin-bottom: 5px;
}

.mapbox-popup span.hsw-dir-map-popup-title {
	font-size: 16px;
}

#hsw-dir-list-top-pager {
	margin-bottom: 30px;
}

#hsw-dir-list-top-pager .hsw-dir-list-top-pager-right{
	text-align: right;
}

#hsw-dir-ajax-loader {
	font-size: 50px;
	text-align: center;
	color: <?php echo esc_attr(get_theme_mod('hsw_dir_brand_primary', '#cb2027')); ?>;
	padding-top: 100px;
	width: 100%;
}

.hsw-dir-no-results {
	margin-top: 50px;
	margin-bottom: 50px;
}
</style>