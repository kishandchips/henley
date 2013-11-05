<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package henley
 * @since henley 1.0
 */
query_posts(array_merge($wp_query->query_vars, array(
	'orderby' => 'menu_order',
	'order' => 'ASC'
)));
get_header(); ?>
<div id="events">
<div id="page" class="container">
	<div id="content" class="break-on-mobile">
		<div class="categories clearfix">
			<?php
                $args = array(
                    'orderby'   => 'name',
                    'order'     => 'ASC',
                    'taxonomy'  => 'event_category',
                    'hide_empty'    => 1
                );
                $terms = get_terms( 'event_category', $args );
                $current_cat_id = get_queried_object()->term_id;
			?>
			<ul>
				<li>
					<a <?php if($current_cat_id == ''): ?>class='current'<?php endif; ?> href="<?php echo get_permalink(1849); ?>"><?php _e('All Projects')?></a>
				</li>
				<?php foreach ($terms as $term) : ?>
					<li>
						<a <?php if($current_cat_id == $term->term_id): ?>class='current'<?php endif; ?> href="<?php echo get_term_link($term);?>"><?php echo $term->name; ?></a>
					</li>
				 <?php endforeach; ?>
			</ul>
			<a class="link back-btn right floatbtn" href="<?php echo get_permalink(11); ?>" title="<?php _e('Back to Projects')?>">
				<?php _e('Back to Projects')?>
			</a>
		</div>		
	<?php while ( have_posts() ) : the_post(); ?>	
		<div class="row content_image">
			<div class="images-bar">
				<img src="<?php the_field("event_image"); ?>" alt="" />
			</div>
			<div class="content-wrapper">
			<h1><?php the_title(); ?></h1>
			<p><?php the_field("event_date"); ?></p>
			<p><b><?php the_field("event_location"); ?></b></p>
			<p><?php the_field("event_time"); ?></p>
			<p><?php the_content(); ?></p>
			
			
			<a href="<?php the_field("button_link"); ?>" class="button" <?php if( get_field('external_link') ): ?>target="_blank"<?php endif; ?>><?php the_field("button_text"); ?></a>
			</div>
		</div>
	<?php endwhile; // end of the loop. ?>
	</div>
	<?php get_template_part('sidebar'); ?>
</div><!-- #page -->
</div>
<?php get_footer(); ?>