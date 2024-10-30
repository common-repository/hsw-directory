<?php

if (isset($_GET['taxonomy_1'])) {
	$override_taxonmy_1 = $_GET['taxonomy_1'];
} else {
	$override_taxonmy_1 = false;
} 

if (isset($_GET['taxonomy_2'])) {
	$override_taxonmy_2 = $_GET['taxonomy_2'];
} else {
	$override_taxonmy_2 = false;
} 

?>

<script type="text/javascript">
	(function($) {

		$(document).ready(function() {

			/*
			*
			*	Vars
			*
			*/

			modal = $('#remodal').remodal()
			current_page = 1

			// get started
			hsw_dir_ajax_get_listings(1)
			hsw_dir_ajax_get_pager(current_page)

			/*
			*
			*	Toggle filters click
			*
			*/

			$('#hsw-dir-toggle-filters').on('click', function() {
				if ($(this).hasClass('closed')) {
					$(this).toggleClass('closed open').toggleClass('active inactive')
					$('#hsw-dir-filters').slideDown()
				} else {
					$(this).toggleClass('closed open').toggleClass('active inactive')
					$('#hsw-dir-filters').slideUp()
				}
			})

			/*
			*
			*	Apply filters click
			*
			*/

			$('#hsw-dir-search-button').on('click', function() {
				current_page = 1
				hsw_dir_ajax_get_listings(1)
				<?php if (get_theme_mod('hsw_dir_show_map', 'no') == 'yes') : ?>
				hsw_dir_map_update_source(1)
				<?php endif; ?>
				hsw_dir_ajax_get_pager(1)
			})

			/*
			*
			*	Pager Clicks
			*
			*/

			$('.hsw-dir-change-page').on('click', function() {
				
				if (!$(this).hasClass('disabled')) {

					if ($(this).hasClass('forward')) {
						current_page++
					}
					
					if ($(this).hasClass('backward')) {
						current_page--
					}

					if ($(this).hasClass('hsw-dir-pager-bottom')) {

						$('html, body').animate({
							scrollTop: $('.hsw-dir-panel-row:visible:first').offset().top -100
						}, 500).promise().then(function() {

							hsw_dir_ajax_get_pager(current_page)
							hsw_dir_ajax_get_listings(current_page, scroll)
							<?php if (get_theme_mod('hsw_dir_show_map', 'no') == 'yes') : ?>
							hsw_dir_map_update_source(current_page)
							<?php endif; ?>

						})

					} else {

						hsw_dir_ajax_get_pager(current_page)
						hsw_dir_ajax_get_listings(current_page, scroll)
						<?php if (get_theme_mod('hsw_dir_show_map', 'no') == 'yes') : ?>
						hsw_dir_map_update_source(current_page)
						<?php endif; ?>

					}


					
				}
				
			});

			/*
			*
			*	Panel Item dropdowns
			*
			*/

			$("#hsw-dir-ajax-content").delegate(".hsw-dir-show-extra", "click", function() {
				if ($('svg', this).hasClass('fa-chevron-down')) {
					$('#hsw-dir-extra-'+$(this).data('post')).slideDown()
				} else {
					$('#hsw-dir-extra-'+$(this).data('post')).slideUp()
				}
				$('svg', this).toggleClass('fa-chevron-down fa-chevron-up');
			});

			/*
			*
			*	Panel Item Modals
			*
			*/

			$("#hsw-dir-ajax-content").delegate(".hsw-dir-show-extra-modal", "click", function() {

				var _this = $(this)

				$('svg', this).removeClass('fa-book-open').addClass('fa-cog fa-spin')

				$.ajax({
					type: 'post',
					dataType: 'html',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						action: 'hsw_dir_ajax_get_listing_modal' ,
						post_id: $(this).data('post')
					},
					success: function(r) {

						$('#remodal-content').html(r)
						_this.find('svg').removeClass('fa-cog fa-spin').addClass('fa-book-open')
						modal.open();

					}
				})

			});

			/*
			*
			*	Initialize Mapbox
			*
			*/

			<?php if (get_theme_mod('hsw_dir_show_map', 'no') == 'yes') : ?>

			mapboxgl.accessToken = '<?php echo esc_attr(get_theme_mod('hsw_dir_mapbox_access_token')); ?>';
			var geojson

			var map = new mapboxgl.Map({
				container: 'mapbox',
				style: 'mapbox://styles/mapbox/streets-v8',
				center: [<?php echo (float)get_theme_mod('hsw_dir_map_dlng', -2.091068); ?>, <?php echo (float)get_theme_mod('hsw_dir_map_dlat', 55.869058); ?>],
				zoom: <?php echo absint(get_theme_mod('hsw_dir_map_dzoom', 10)); ?>,
				scrollZoom: <?php echo esc_attr(get_theme_mod('hsw_dir_map_dscrollzoom', 'false')); ?>,
				maxZoom: <?php echo esc_attr(get_theme_mod('hsw_dir_map_max_zoom', 14)); ?>,
				dragRotate: false

			});

			map.addControl(new mapboxgl.NavigationControl({
				showCompass: false
			}), 'bottom-right');

			map.on('load', function() {
				
				map.on('click', function(e) {
					var features = map.queryRenderedFeatures(e.point, {
						layers: ['unclustered-point']
					});

					if (!features.length) {
						return;
					}

					var feature = features[0];
					var popup = new mapboxgl.Popup({ offset: [0, -15] })
					.setLngLat(feature.geometry.coordinates)
					.setHTML('<div class="mapbox-popup">'
						+ '<span class="hsw-dir-map-popup-title">'+feature.properties.title+'</span>'
						+ '<span>'+feature.properties.phone+'</span>'
						+ '<span>'+feature.properties.address+'</span>'
						+ '</div>')
					.setLngLat(feature.geometry.coordinates)
					.addTo(map);
				})

				hsw_dir_setup_map()
			})

			<?php endif; ?>

			/*
			*
			*	Setup the map for the first page (1) load
			*
			*/

			function hsw_dir_setup_map() {

				var filters = hsw_dir_get_filters()
				
				$.ajax({
					type: 'post',
					dataType: 'json',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						action: 'hsw_dir_ajax_get_map',
						taxonomy_1: filters.taxonomy_1,
						taxonomy_2: filters.taxonomy_2,
						keyword: filters.keyword,
						page: 1
					},
					success: function(r) {

						map.addSource("1", {
							type: "geojson",
							data: r.data,
							cluster: <?php echo esc_attr(get_theme_mod('hsw_dir_map_use_clusters', 'true')); ?>,
							clusterMaxZoom: <?php echo absint(get_theme_mod('hsw_dir_map_clusters_max_zoom', 12)); ?>,
							clusterRadius: <?php echo absint(get_theme_mod('hsw_dir_map_cluster_radius', 20)); ?>
						})

						map.addLayer({
							id: "clusters",
							type: "circle",
							source: "1",
							filter: ["has", "point_count"],
							paint: {
								"circle-color": "<?php echo esc_attr(get_theme_mod('hsw_dir_map_cluster_color', '#cb2027')); ?>",
								"circle-radius": <?php echo absint(get_theme_mod('hsw_dir_map_cluster_circ_radius', 20)); ?>,
								"circle-opacity": <?php echo (float)get_theme_mod('hsw_dir_map_cluster_circ_opacity', 0.5); ?>
							}
						});

						map.addLayer({
							id: "cluster-count",
							type: "symbol",
							source: "1",
							filter: ["has", "point_count"],
							layout: {
								"text-field": "{point_count_abbreviated}",
								"text-size": <?php echo absint(get_theme_mod('hsw_dir_map_cluster_text_size', 16)); ?>,
							},
							paint: {
								"text-color": "<?php echo esc_attr(get_theme_mod('hsw_dir_map_cluster_text_color', '#ffffff')); ?>"
							}
						});

						map.addLayer({
							id: "unclustered-point",
							type: "circle",
							source: "1",
							filter: ["!has", "point_count"],
							paint: {
								"circle-color": "<?php echo esc_attr(get_theme_mod('hsw_dir_map_sp_circle_color', '#cb2027')); ?>",
								"circle-radius": <?php echo absint(get_theme_mod('hsw_dir_map_sp_circle_radius', 10)); ?>,
								"circle-stroke-width": <?php echo absint(get_theme_mod('hsw_dir_map_sp_circle_stroke_width', 2)); ?>,
								"circle-stroke-color": "<?php echo esc_attr(get_theme_mod('hsw_dir_map_sp_circle_stroke_color', '#ffffff')); ?>"
							}
						})
						
						var bounds = new mapboxgl.LngLatBounds();

						r.data.features.forEach(function(feature) {
							bounds.extend(feature.geometry.coordinates);
						});

						map.fitBounds(bounds, { padding: <?php echo absint(get_theme_mod('hsw_dir_map_bounds_padding', 50)); ?> });
						
						map.getSource('1').setData(r.data);

						var bounds = new mapboxgl.LngLatBounds();

						r.data.features.forEach(function(feature) {
							bounds.extend(feature.geometry.coordinates);
						});

						map.fitBounds(bounds, { padding: <?php echo absint(get_theme_mod('hsw_dir_map_bounds_padding', 50)); ?> });

					}
				})

			}

			/*
			*
			*	Update the map source object when the data changes
			*
			*/

			function hsw_dir_map_update_source(page) {

				var filters = hsw_dir_get_filters()

				$.ajax({
					type: 'post',
					dataType: 'json',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						action: 'hsw_dir_ajax_get_map',
						taxonomy_1: filters.taxonomy_1,
						taxonomy_2: filters.taxonomy_2,
						keyword: filters.keyword,
						page: page,

					},
					success: function(r) {

						geojson = r.data

						map.getSource('1').setData(r.data);

						var bounds = new mapboxgl.LngLatBounds();

						r.data.features.forEach(function(feature) {
							bounds.extend(feature.geometry.coordinates);
						});

						map.fitBounds(bounds, { padding: <?php echo absint(get_theme_mod('hsw_dir_map_bounds_padding', 50)); ?> });

					}
				})

			}

			/*
			*
			*	Update the pager when the data changes
			*
			*/

			function hsw_dir_ajax_get_pager(page) {

				var filters = hsw_dir_get_filters()

				$.ajax({
					type: 'post',
					dataType: 'json',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						action: 'hsw_dir_ajax_get_pager' ,
						taxonomy_1: filters.taxonomy_1,
						taxonomy_2: filters.taxonomy_2,
						keyword: filters.keyword,
						page: page
					},
					success: function(r) {

						console.log(r.data)

						$('.hsw-dir-change-page').removeClass('disabled')

						if (r.data.backward == false) {
							$('.hsw-dir-change-page.backward').addClass('disabled')
						}

						if (r.data.forward == false) {
							$('.hsw-dir-change-page.forward').addClass('disabled')
						}

						$('#hsw-page-count-current').html(current_page)
						$('#hsw-page-count-total').html(r.data.max_pages)

					}
				})

			}

			/*
			*
			*	Generate a list of items
			*
			*/

			function hsw_dir_ajax_get_listings(page) {

				$('#hsw-dir-ajax-loader').show()
				$('#hsw-dir-ajax-content').hide()

				var num = $('#hsw-dir-ajax-content').outerHeight();
				$('#hsw-dir-ajax-loader' ).css({'min-height': num});

				var filters = hsw_dir_get_filters()

				$.ajax({
					type: 'post',
					dataType: 'html',
					url: '<?php echo admin_url('admin-ajax.php'); ?>',
					data: {
						action: 'hsw_dir_ajax_get_listings' ,
						taxonomy_1: filters.taxonomy_1,
						taxonomy_2: filters.taxonomy_2,
						keyword: filters.keyword,
						page: page
					},
					success: function(r) {

						$('#hsw-dir-ajax-content').html(r).imagesLoaded().then(function() {
							$('#hsw-dir-ajax-loader').hide()
							$('#hsw-dir-ajax-content').fadeIn()
						})

						$('.hsw-show-extra').off()
						$('.hsw-dir-contact-button').off()

						$('.hsw-show-extra').on('click', function() {

							if ($(this).hasClass('closed')) {
								$(this).removeClass('closed').addClass('open')
								$('*[data-extra="'+$(this).data('target')+'"]').slideDown()
								$('svg', this).removeClass('fa-angle-down').addClass('fa-angle-up')
							} else {
								$(this).removeClass('open').addClass('closed')
								$('*[data-extra="'+$(this).data('target')+'"]').slideUp()
								$('svg', this).removeClass('fa-angle-up').addClass('fa-angle-down')
							}
						})

						

					}
				})
			}

			/*
			*
			*	Return the filter settings
			*
			*/

			function hsw_dir_get_filters() {

				var filter_settings = {}

				if ($('#hsw-dir-taxonomy-1').length) {
					filter_settings.taxonomy_1 =  $('#hsw-dir-taxonomy-1').val()
				} else {
					<?php if ($override_taxonmy_1) : ?>
					filter_settings.taxonomy_1 = <?php echo esc_attr($override_taxonmy_1); ?>
					<?php else : ?>
					filter_settings.taxonomy_1 = 'all'
					<?php endif; ?>
				}

				if ($('#hsw-dir-taxonomy-2').length) {
					filter_settings.taxonomy_2 =  $('#hsw-dir-taxonomy-2').val()
				} else {
					<?php if ($override_taxonmy_2) : ?>
					filter_settings.taxonomy_2 = <?php echo esc_attr($override_taxonmy_2); ?>
					<?php else : ?>
					filter_settings.taxonomy_2 = 'all'
					<?php endif; ?>
				}

				if ($('#hsw-dir-keyword').length) {
					filter_settings.keyword =  $('#hsw-dir-keyword').val()
				} else {
					filter_settings.keyword = ''
				}

				return filter_settings

			}

			/*
			*
			*	Detect when images have loaded
			*
			*/

			$.fn.imagesLoaded = function () {

				var $imgs = this.find('img[src!=""]');
				if (!$imgs.length) {return $.Deferred().resolve().promise();}

				var dfds = [];  
				$imgs.each(function(){

					var dfd = $.Deferred();
					dfds.push(dfd);
					var img = new Image();
					img.onload = function(){dfd.resolve();}
					img.onerror = function(){dfd.resolve();}
					img.src = this.src;

				});
				return $.when.apply($,dfds);

			}

		})

})(jQuery)
</script>