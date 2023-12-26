<?php get_header(); ?>

<section class="post-block">
	<div class="content-width">
		<div class="main">
			<div class="top">
				<ul class="breadcrumb">
					<?php if(function_exists('bcn_display')) bcn_display() ?>
				</ul>

				<?php get_template_part('parts/share') ?>

			</div>
			<div class="content">
				<h1><?php the_title() ?></h1>
				<?php the_content() ?>
			</div>
			<div class="share">
				<h6><?php _e('Share this post', 'Letterlife') ?></h6>
				
				<?php get_template_part('parts/share') ?>
				
				<?php $tags = wp_get_object_terms(get_the_ID(), 'post_tag') ?>

				<?php if ($tags): ?>
					<ul class="tag">

						<?php foreach ($tags as $tag): ?>
							<li>
								<a href="<?= get_term_link($tag->term_id) ?>"><?= $tag->name ?></a>
							</li>
						<?php endforeach ?>

					</ul>
				<?php endif ?>
				
				<?php $author_id = get_post_field ('post_author', get_the_ID()) ?>

				<?php if ($field = get_field('avatar', 'user_' . $author_id)): ?>
					<div class="img-wrap-author">
						<?= wp_get_attachment_image($field['ID'], 'full') ?>
					</div>
				<?php endif ?>
				
				<?php if (get_the_author_meta('display_name', $author_id ) || get_the_author_meta('description', $author_id )): ?>
				<p class="name">

					<?php if ($field = get_the_author_meta('display_name', $author_id )): ?>
						<?= $field ?>
					<?php endif ?>

					<?php if ($field = get_the_author_meta('description', $author_id )): ?>
						<span><?= $field ?></span>
					<?php endif ?>

				</p>
			<?php endif ?>

		</div>
	</div>

	<?php 
	$args = array(
		'post_type' => 'post',  
		'posts_per_page' => 10,
		'post__not_in' => [get_the_ID()],
		'paged' => get_query_var('paged')
	);
	$wp_query = new WP_Query($args);
	if($wp_query->have_posts()): 
		?>

		<aside class="aside-right">
			<p class="title"><?php _e('Latest posts', 'Letterlife') ?></p>
			<ul>

				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink() ?>">
							<?php the_title() ?>
							<img src="<?= get_stylesheet_directory_uri() ?>/img/icon-8.svg" alt="">
						</a>
					</li>
				<?php endwhile; ?>

			</ul>
		</aside>

		<?php 
	endif;
	wp_reset_query(); 
	?>

</div>
</section>

<section class="read-block blog latest-blog">
	<div class="content-width">
		<div class="title-h2 title-600"><?php _e('Latest posts', 'Letterlife') ?></div>

		<?php 
		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => 3,
			'post__not_in' => [get_the_ID()],
			'paged' => get_query_var('paged')
		);
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