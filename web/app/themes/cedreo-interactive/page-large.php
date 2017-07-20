<?php

/**
 * Template Name: Page large
 */

?>

<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="section contenu">
		<div class="row">
			<?php
				$image = get_field('main_img');
				$position = get_field('main_img_position');
				// thumbnail
				$size = 'square';
				$thumb = $image['sizes'][ $size ];
			?>
			<?php if(!empty($image) && $position == 'left'): ?>
				<div class="columns large-4">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
			<?php endif; ?>
			<div class="columns large-8">
				<?php if (get_field('subtitle')) : ?>
					<h2 class="cedreo-title subtitle"><?php the_field('subtitle'); ?></h2>
				<?php endif; ?>
				<?php get_template_part('templates/content', 'page'); ?>
			</div>
			<?php if(!empty($image) && $position == 'right'): ?>
				<div class="columns large-4">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php get_template_part('templates/section'); ?>

	<?php if ( get_field('display-stories') ) { get_template_part('templates/section', 'stories'); } ?>

<?php endwhile; ?>
