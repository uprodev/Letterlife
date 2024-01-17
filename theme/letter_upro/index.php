<?php get_header(); ?>

<?php $queried_object_id = get_queried_object_id() ?>

<section class="read-block blog">
	<div class="bg">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-9.png" alt="">
		<img src="<?= get_stylesheet_directory_uri() ?>/img/bg-10.png" alt="" class="mob">
	</div>
	<div class="content-width">

		<?php if ($field = get_field('label_b', 'option')): ?>
			<p class="top"><?= $field ?></p>
		<?php endif ?>

		<h1><?= is_tax() || is_category() ? single_term_title() : get_field('title_b', 'option') ?></h1>

		<?php if ($field = get_field('subtitle_b', 'option')): ?>
			<p class="info"><?= $field ?></p>
		<?php endif ?>

		<?php 
		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => 3,
			'paged' => get_query_var('paged')
		);
		if(is_category()) $args['cat'] = $queried_object_id;
		if(is_tag()) $args['tag_id'] = $queried_object_id;
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()): 
			?>

			<div class="content posts-response">

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<div class="item">

						<?php get_template_part('parts/content', 'post') ?>

					</div>
				<?php endwhile; ?>

			</div>

			<?php 
		endif;
		wp_reset_postdata(); 
		?>

		<?php if ($wp_query->max_num_pages > 1) { ?>
			<script> var this_page = 1; </script>

			<div class="btn-wrap">
				<a href="#" class="btn-loadmore btn-default" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><?php _e('Load more', 'Letterlife') ?></a>
			</div>
		<?php } ?>

	</div>
</section>

<?php get_footer(); ?>