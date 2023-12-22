<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if ($testimonials): ?>
		<section class="testimonials">
			<div class="content-width">

				<?php if ($title): ?>
					<div class="title-h2"><?= $title ?></div>
				<?php endif ?>
				
				<div class="content">

					<?php foreach ($testimonials as $item): ?>
						<div class="item">

							<?php if ($item['text']): ?>
								<blockquote>“<span><?= $item['text'] ?></span>”</blockquote>
							<?php endif ?>
							
							<div class="name-wrap">

								<?php if ($item['name']): ?>
									<p><b><?= $item['name'] ?></b></p>
								<?php endif ?>
								
								<?php if ($item['position']): ?>
									<p><?= $item['position'] ?></p>
								<?php endif ?>
								
							</div>
						</div>
					<?php endforeach ?>
					
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php endif; ?>