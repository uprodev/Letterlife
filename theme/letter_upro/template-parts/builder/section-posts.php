<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if($posts): ?>

		<section class="read-block">
			<div class="content-width">

				<?php if ($title): ?>
					<div class="title-h2"><?= $title ?></div>
				<?php endif ?>
				
				<div class="slider-wrap">
					<div class="swiper read-slider">
						<div class="swiper-wrapper">

							<?php foreach($posts as $post): 

								global $post;
								setup_postdata($post); ?>
								<div class="swiper-slide">

									<?php if (has_post_thumbnail()): ?>
										<figure>
											<a href="<?php the_permalink() ?>">
												<?php the_post_thumbnail('full') ?>
											</a>
										</figure>
									<?php endif ?>
									
									<div class="text">
										<ul class="list-info">

											<?php $terms = wp_get_object_terms($post->ID, 'category') ?>

											<?php if ($terms): ?>
												<?php foreach ($terms as $term): ?>
													<li class="teg">
														<p><?= $term->name ?></p>
													</li>
												<?php endforeach ?>
											<?php endif ?>
											
											<li><p><?= reading_time() ?> <?php _e('min read', 'Letterlife') ?></p></li>
										</ul>
										<h6>
											<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
										</h6>

										<?php if (get_the_excerpt()): ?>
											<p class="text-p"><?php the_excerpt() ?></p>
										<?php endif ?>
										
										<div class="link-wrap">
											<a href="<?php the_permalink() ?>">Read more <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-3.svg" alt=""></a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>

							<?php wp_reset_postdata(); ?>

						</div>
						<div class="nav-wrap">
							<div class="swiper-pagination read-pagination"></div>
							<div class="wrap">
								<div class="swiper-button-next read-next"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""></div>
								<div class="swiper-button-prev read-prev"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt=""></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endif; ?>

	<?php endif; ?>