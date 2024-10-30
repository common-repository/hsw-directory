<?php

$post_id = absint($_POST['post_id']);

?>

<div class="row">

	<div class="col-12">

		<h1><?php echo get_the_title($post_id); ?></h1>

	</div>

</div>

<?php if (get_theme_mod('hsw_dir_show_item_social_icons', 'yes') == 'yes') : ?>

	<div class="hsw-dir-extra-item">

		<?php if ($website = get_field('website', $post_id)) : ?>

			<a href="<?php echo esc_url($website); ?>" class="hsw-social-icon website">
				<span class="fas fa-fw fa-link"></span>
			</a>

		<?php endif; ?>


		<?php if ($twitter = get_field('twitter_url', $post_id)) : ?>

			<a href="<?php echo esc_url($twitter); ?>" class="hsw-social-icon twitter">
				<span class="fab fa-fw fa-twitter"></span>
			</a>

		<?php endif; ?>

		<?php if ($facebook = get_field('facebook_url', $post_id)) : ?>

			<a href="<?php echo esc_url($facebook); ?>" class="hsw-social-icon facebook">
				<span class="fab fa-fw fa-facebook"></span>
			</a>

		<?php endif; ?>

		<?php if ($google = get_field('google_url')) : ?>

			<a href="<?php echo esc_url($google); ?>" class="hsw-social-icon google">
				<span class="fab fa-fw fa-google"></span>
			</a>

		<?php endif; ?>

		<?php if ($linkedin = get_field('linkedin_url', $post_id)) : ?>

			<a href="<?php echo esc_url($linkedin); ?>" class="hsw-social-icon linkedin">
				<span class="fab fa-fw fa-linkedin"></span>
			</a>

		<?php endif; ?>

		<?php if ($pinterest = get_field('pinterest_url', $post_id)) : ?>

			<a href="<?php echo esc_url($pinterest); ?>" class="hsw-social-icon pinterest">
				<span class="fab fa-fw fa-pinterest"></span>
			</a>

		<?php endif; ?>

		<?php if ($instagram = get_field('instagram_url', $post_id)) : ?>

			<a href="<?php echo esc_url($instagram); ?>" class="hsw-social-icon instagram">
				<span class="fab fa-fw fa-instagram"></span>
			</a>

		<?php endif; ?>

	</div>

<?php endif; ?>

<?php if (get_theme_mod('hsw_dir_show_item_phone_number', 'yes') == 'yes') : ?>

	<?php if ( $phone = get_field('phone_number', $post_id) ) : ?>

		<div class="row">

			<div class="col-12">

				<?php echo $phone; ?>

			</div>

		</div>

	<?php endif; ?>

<?php endif; ?>

<?php if (get_theme_mod('hsw_dir_show_item_address', 'yes') == 'yes') : ?>

	<?php if ( $address = get_field('address', $post_id) ) : ?>

		<div class="row">

			<div class="col-12">

				<?php echo $address; ?>

			</div>

		</div>

	<?php endif; ?>

<?php endif; ?>

<div class="row hsw-dir-modal-post-content">

	<div class="col-12">

		<?php echo get_post_field('post_content', $post_id); ?></h1>

	</div>

</div>

