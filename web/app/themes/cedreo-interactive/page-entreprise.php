<?php

/**
 * Template Name: Page entreprise
 */

?>
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="section contenu">
		<div class="row column">
			<?php if(get_field('logo')): ?>
				<div class="columns medium-4">
					<p><img src="<?php the_field('logo'); ?>" alt="Logo Cedreo Interactive"></p>
				</div>
			<?php endif; ?>
			<div class="columns medium-8">
				<?php if (get_field('subtitle')) : ?>
					<h2 class="cedreo-title subtitle"><?php the_field('subtitle'); ?></h2>
				<?php endif; ?>
				<?php get_template_part('templates/content', 'page'); ?>
			</div>

		</div>
	</div>

	<section class="section valeurs">
		<?php $v_image = get_field('v_image'); ?>
		<?php if( !empty($v_image) ) : ?>
				<?php
						// vars
						$vurl = $v_image['url'];
						$vtitle = $v_image['title'];
						$valt = $v_image['alt'];
						$vcaption = $v_image['caption'];

						// thumbnail
						$vsize = 'large';
						$vthumb = $v_image['sizes'][ $vsize ];
				?>
			<div class="row">
				<div class="columns medium-10 medium-offset-1">
				<?php if(get_field('v_title')): ?>
				<h2 class="cedreo-title subtitle"><?php the_field('v_title'); ?></h2>
				<?php endif; ?>
					<figure class="thumbnail">
						<img src="<?php echo $vthumb; ?>" alt="<?php echo $valt; ?>">
					</figure>
				</div>
			</div>
				<?php endif; ?>
		<div class="row">
			<div class="columns medium-8 medium-offset-2">
				<?php if(get_field('v_text')) { the_field('v_text'); } ?>
			</div>
		</div>
	</section>
	<section class="section competences contenu">
		<div class="row">
			<div class="columns medium-6">
				<?php if(get_field('c_title')): ?>
				<h2 class="cedreo-title subtitle"><?php the_field('c_title'); ?></h2>
				<?php endif; ?>
				<?php if(get_field('c_text')): ?>
				<?php the_field('c_text'); ?>
				<?php endif; ?>

				<?php

				// check if the repeater field has rows of data
				if( have_rows('competences') ): ?>

				<ul class="no-bullet competences-list">

					<?php 	// loop through the rows of data
				    while ( have_rows('competences') ) : the_row(); ?>

				        <li><?php the_sub_field('title'); ?>
				        	<div class="progress" role="progressbar" tabindex="0" aria-valuenow="<?php the_sub_field('value'); ?>" aria-valuemin="0" aria-valuetext="<?php the_sub_field('value'); ?> percent" aria-valuemax="100">
				        		<div style="width: <?php the_sub_field('value'); ?>%; height: 100%"><div class="progress-meter"></div></div>

							</div>
				        </li>

				    <?php endwhile; ?>

				</ul>

				<?php endif; ?>

			</div>
			<?php if(get_field('c_image')): ?>
			<div class="columns medium-6 text-right">
				<img src="<?php the_field('c_image'); ?>" alt="nos compétences">
			</div>
			<?php endif; ?>
		</div>
	</section>

	<?php if( have_rows('members') ): ?>
	<section class="section equipe grid">
		<div class="row column">
			<h2 class="cedreo-title">Notre <span>équipe</span></h2>

			<ul class="list contenu row no-bullet">

				<?php 	// loop through the rows of data
			    while ( have_rows('members') ) : the_row(); ?>

			        <li class="item columns large-4 medium-6 end">
								<?php $image = get_sub_field('photo'); ?>

								<?php if( !empty($image) ) {

										// vars
										$url = $image['url'];
										$title = $image['title'];
										$alt = $image['alt'];
										$caption = $image['caption'];

										// thumbnail
										$size = 'equipe';
										$thumb = $image['sizes'][ $size ];

									} else {
										$thumb = get_stylesheet_directory_uri() .'/dist/images/silhouette.jpg';
									}
								?>
			        	<div class="figure" style="background-image: url('<?php echo $thumb; ?>');">
									<div class="desc">
										<?php if(get_sub_field('name')) { ?>
										<h3 class="equipe-title">
											<?php the_sub_field('name'); ?>
											<?php if(get_sub_field('function')) { ?>
												&nbsp;<span><?php the_sub_field('function');?></span>
											<?php } ?>
										</h3>
										<?php } ?>
										<?php if(get_sub_field('desc')) { the_sub_field('desc');} ?>
									</div>
								</div>
							</li>

			    <?php endwhile; ?>

			</ul>

		</div>
	</section>
	<?php endif; ?>

	<?php get_template_part('templates/section', 'testimony'); ?>
	<?php if ( the_field('display-stories') ) { get_template_part('templates/section', 'stories'); } ?>

<?php endwhile; ?>
