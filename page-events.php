<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package kishandchips
 * @since kishandchips 1.0
 */

get_header(); ?>

<?php 
	    query_posts(array( 
	        'post_type' => 'event'
	    ) );  
	?>
<div id="events">
<div id="page" class="container">
	<div id="content" class="break-on-mobile">
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
			<a href="<?php the_field("button_link"); ?>" class="button"><?php the_field("button_text"); ?></a>
			</div>
		</div>
	<?php endwhile; // end of the loop. ?>
	</div>
	<?php get_template_part('sidebar'); ?>
</div><!-- #page -->
</div>
<?php get_footer(); ?>