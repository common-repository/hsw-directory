<?php if (!$r = hswDirectory::get_listings()) {	wp_die('Invalid Request'); } ?>

	<?php if (!$r['output'])  : ?>
		<h4 class="hsw-dir-no-results"><?php esc_html_e('No Results', 'hsw-directory'); ?></h4>
	<?php endif; ?>


	<?php foreach ( array_chunk($r['output'], $r['cols'], true) as $kc => $chunk ) : ?>

		<div class="row hsw-dir-panel-row">

			<?php foreach ( $chunk as $k => $v ) : ?>

				<div class="col-12 col-sm-12 col-md-<?php echo esc_attr(12 / $r['cols'] * 2); ?> col-lg-<?php echo esc_attr(12 / $r['cols']); ?>">

					<div class="hsw-dir-panel">

						<div class="hsw-dir-panel-body">

							<div class="inner">

								<div class="row">

									<div class="col-12">

										<?php if ( $featured = get_field('is_featured', $v['id']) ) : ?>		

											<span class="hsw-dir-featured-icon">
												<?php echo esc_html(get_theme_mod('hsw_dir_label_featured', esc_html__('FEATURED', 'hsw-directory'))); ?>
											</span>

										<?php endif; ?>

										<div class="hsw-dir-panel-image">

											<?php echo get_the_post_thumbnail( $v['id'], 'hsw_dir_1024x1024'); ?>

											<div class="hsw-dir-panel-image-inner">

												<a class="hsw-dir-show-extra" data-post="<?php echo $v['id']; ?>">
													<span class="fas fa-fw fa-chevron-down"></span>
												</a>

												<a class="hsw-dir-show-extra-modal" data-post="<?php echo $v['id']; ?>">
													<span class="fas fa-fw fa-book-open"></span>
												</a>

											</div>

											<div class="hsw-dir-extra" id="hsw-dir-extra-<?php echo $v['id']; ?>" style="display: none;">

												<?php if (get_theme_mod('hsw_dir_show_item_social_icons', 'yes') == 'yes') : ?>

													<div class="hsw-dir-extra-item">

														<?php if ($website = get_field('website', $v['id'])) : ?>

															<a href="<?php echo esc_url($website); ?>" class="hsw-social-icon website">
																<span class="fas fa-fw fa-link"></span>
															</a>

														<?php endif; ?>


														<?php if ($twitter = get_field('twitter_url', $v['id'])) : ?>

															<a href="<?php echo esc_url($twitter); ?>" class="hsw-social-icon twitter">
																<span class="fab fa-fw fa-twitter"></span>
															</a>

														<?php endif; ?>

														<?php if ($facebook = get_field('facebook_url', $v['id'])) : ?>

															<a href="<?php echo esc_url($facebook); ?>" class="hsw-social-icon facebook">
																<span class="fab fa-fw fa-facebook"></span>
															</a>

														<?php endif; ?>

														<?php if ($google = get_field('google_url', $v['id'])) : ?>

															<a href="<?php echo esc_url($google); ?>" class="hsw-social-icon google">
																<span class="fab fa-fw fa-google"></span>
															</a>

														<?php endif; ?>

														<?php if ($linkedin = get_field('linkedin_url', $v['id'])) : ?>

															<a href="<?php echo esc_url($linkedin); ?>" class="hsw-social-icon linkedin">
																<span class="fab fa-fw fa-linkedin"></span>
															</a>

														<?php endif; ?>

														<?php if ($pinterest = get_field('pinterest_url', $v['id'])) : ?>

															<a href="<?php echo esc_url($pinterest); ?>" class="hsw-social-icon pinterest">
																<span class="fab fa-fw fa-pinterest"></span>
															</a>

														<?php endif; ?>

														<?php if ($instagram = get_field('instagram_url', $v['id'])) : ?>

															<a href="<?php echo esc_url($instagram); ?>" class="hsw-social-icon instagram">
																<span class="fab fa-fw fa-instagram"></span>
															</a>

														<?php endif; ?>

													</div>

												<?php endif; ?>

												<?php if (get_theme_mod('hsw_dir_show_item_phone_number', 'yes') == 'yes') : ?>

													<?php if ( isset($v['phone']) ) : ?>

														<div class="hsw-dir-extra-item">

															<div class="row">

																<div class="col-2">

																	<span class="fas fa-fw fa-mobile"></span>

																</div>

																<div class="col-10">

																	<?php echo esc_html($v['phone']); ?>

																</div>

															</div>

														</div>

													<?php endif; ?>

												<?php endif; ?>

												<?php if (get_theme_mod('hsw_dir_show_item_address', 'yes') == 'yes') : ?>

													<?php if ( isset($v['address']) ) : ?>

														<div class="hsw-dir-extra-item">

															<div class="row">

																<div class="col-2">

																	<span class="fas fa-fw fa-map-marker-alt"></span>

																</div>

																<div class="col-10">

																	<?php echo esc_html($v['address']); ?>

																</div>

															</div>

														</div>

													<?php endif; ?>

												<?php endif; ?>

												<?php if (get_theme_mod('hsw_dir_show_item_key_value_pairs', 'yes') == 'yes') : ?>

													<?php if ($kvp = hswDirectory::get_key_value_pairs($v['id'])) : ?>

														<div class="row hsw-dir-key-value-pairs">

															<div class="col-12">

																<div class="hsw-dir-key-value-pairs-inner">

																	<?php foreach($kvp as $kvpk => $kvpv) : ?> 

																		<div class="row">

																			<div class="col-6">
																				<?php echo esc_html($kvpv['key']); ?>
																			</div>
																			<div class="col-6">
																				<?php echo esc_html($kvpv['value']); ?>
																			</div>

																		</div>

																	<?php endforeach; ?>

																</div>

															</div>

														</div>

													<?php endif; ?>

												<?php endif; ?>

											</div>

										</div>

									</div> 

									<div class="col-12">

										<div class="hsw-panel-item-content">

											<h4>
												<?php echo esc_html($v['title']); ?>
											</h4>

											<?php if (get_theme_mod('hsw_dir_show_item_short_description', 'yes') == 'yes') : ?>

												<?php if ($short_description = get_field('short_description', $v['id'])) : ?>

													<p>
														<?php echo esc_html($short_description); ?>
													</p>

												<?php endif; ?>

											<?php endif; ?>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			<?php endforeach; ?>

		</div>

	<?php endforeach; ?>