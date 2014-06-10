<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content container">

	<div id="primary" class="content-area span seven break-on-mobile">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="article">
						<h1><?php the_title(); ?></h1>
						<div class="date"><?php the_time('F Y'); ?></div>
						
						<?php the_post_thumbnail('full'); ?>
						<div class="excerpt">
							<?php the_content(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="readmore">
							<?php _e('continue reading') ?>
						</a>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- #main-content -->

<?php get_footer();?>
