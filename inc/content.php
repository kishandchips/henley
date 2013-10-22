<?php while(has_sub_field("content")): ?>
<?php $layout = get_row_layout(); ?>

	<?php if(get_row_layout() == "content"): ?>

		<div class="row <?php echo $layout; ?>" style="<?php the_sub_field("css"); ?>">
			<h1><?php the_sub_field("title"); ?></h1>
			<?php the_sub_field("content_field"); ?>
		</div>
 
	<?php elseif(get_row_layout() == "content_image"): ?>
 
		<div class="row <?php echo $layout; ?>" style="<?php the_sub_field("css"); ?>">
			<div class="images-bar">
				<img class="scale" src="<?php the_sub_field("image"); ?>" alt="<?php the_sub_field("title"); ?>">

				<?php 
					$images = get_sub_field('images');
					if( $images ): ?>
			            <?php foreach( $images as $image ): ?>
			                    <img class="scale"  src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			            <?php endforeach; ?>
				<?php endif; ?>				
			</div>
			<h1><?php the_sub_field("title"); ?></h1>
			<?php the_sub_field("img-content"); ?>
		</div>

	<?php elseif(get_row_layout() == "accordion"): ?>
 
		<div class="row <?php echo $layout; ?>" style="<?php the_sub_field("css"); ?>">
			<h1><?php the_sub_field("title"); ?></h1>
			<?php if(get_sub_field('items')): $i = 0; ?>
				<?php while(has_sub_field('items')): $i++; ?>	
					<div class="accordion" data-id="<?php echo $i; ?>">
						<h2><?php the_sub_field("title"); ?></h2>
						<div class="content" data-id="<?php echo $i; ?>">
							<?php the_sub_field('content'); ?>
						</div>
					</div>		 					
				<?php endwhile; ?>
			<?php endif; ?>
		</div>	
 
	<?php elseif(get_row_layout() == "accordion_image"): // layout: Featured Posts ?>

		<div class="row <?php echo $layout; ?>" style="<?php the_sub_field("css"); ?>">
			<div class="images-bar">
				<img class="scale" src="<?php the_sub_field("image"); ?>" alt="<?php the_sub_field("title"); ?>">
				<?php 
					$images = get_sub_field('images');
					if( $images ): ?>
			            <?php foreach( $images as $image ): ?>
			                    <img class="scale" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			            <?php endforeach; ?>
				<?php endif; ?>				
			</div>			
			<h1><?php the_sub_field("title"); ?></h1>
			<?php if(get_sub_field('items')): $i = 0; ?>
				<?php while(has_sub_field('items')): $i++; ?>	
					<div class="accordion" data-id="<?php echo $i; ?>">
						<h2><?php the_sub_field("title"); ?></h2>
						<div class="content" data-id="<?php echo $i; ?>">
							<?php the_sub_field('content'); ?>
						</div>
					</div>		 					
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

	<?php elseif(get_row_layout() == "columns"): ?>		

	<div class="columns">
		<?php $total_columns = count( get_sub_field('column-content')); ?>
		<?php while (has_sub_field('column-content')) : ?>

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
			<div class="break-on-mobile span equal-height <?php echo $class; ?>" style="<?php the_sub_field('css'); ?>;">
				<?php the_sub_field('content'); ?>
			</div>
		<?php endwhile; ?>
	</div>
 
	<?php endif; ?>
<?php endwhile; ?>