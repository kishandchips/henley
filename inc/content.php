<?php $id = (isset($id)) ? $id : $post->ID; ?>
<?php $i = 0; ?>
<?php if(get_field('content', $id)): ?>
<?php while (has_sub_field('content', $id)) : ?>
<?php 
	$background_image_id = get_sub_field('background_image_id');
	$background_image = wp_get_attachment_image_src($background_image_id, 'full');    			
?>
<?php
	$layout = get_row_layout();
	switch($layout){

		case 'row':	
			if(get_sub_field('column')):
?>
			<div id="<?php the_sub_field('anchor_tag'); ?>" class="row" style="background-color: <?php the_sub_field('background_color') ?>; background-image: url(<?php echo $background_image[0]; ?>); <?php the_sub_field('css'); ?>">
				<div class="container">
					<div class="inner clearfix">
					

					<?php $total_columns = count( get_sub_field('column', $id)); ?>
					<?php while (has_sub_field('column', $id)) : ?>
						<?php 
							$col_background_image_id = get_sub_field('column_background_image_id');
							$col_background_image = wp_get_attachment_image_src($col_background_image_id, 'full');
						?>
					
						<?php
						switch($total_columns){
							case 2:
								$class = 'five';
								break;
							case 3:
								$class = 'one-third';
								break;
							case 4:
								$class = 'one-fourth';
								break;
							case 5:
								$class = 'one-fifth';
								break;
							case 1:
							default:
								$class = 'ten';
								break;
						} ?>
						<div class="break-on-mobile span equal-height <?php if( get_sub_field('hide_on_mobile', $curr_page->ID) == true ) { ?>hide-on-mobile<?php } ?> <?php echo $class; ?>" style="<?php the_sub_field('css'); ?>; background-image: url(<?php echo $col_background_image[0]; ?>);">
							<?php the_sub_field('content'); ?>
						</div>
					<?php endwhile; ?>
					</div>
				</div>				
			</div>
			<?php endif; ?>
			<?php break; ?>
		<?php case 'pages':  ?>

			<?php $pages = get_sub_field('pages'); ?>
			<?php if(!empty($pages)): ?>
			<div class="pages">
				<header class="line-header"><h5 class="title"><?php the_sub_field('title'); ?></h5></header>
				<ul class="page-list clearfix">
					<?php foreach($pages as $post): ?>
					<?php setup_postdata($post) ?>
					<li class="page span">
						<a href="<?php the_permalink(); ?>" class="overlay-btn">
							<?php the_post_thumbnail('thumbnail', array('class' => 'scale')); ?>
						</a>
						<h6 class="uppercase"><a href="<?php the_permalink(); ?>" class="uppercase"><?php the_title(); ?></a></h6>
					</li>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php break; ?>

	<?php } ?>

<?php $i++; ?>
<?php endwhile; ?>
<?php endif; ?>