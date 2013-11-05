	</div><!-- #main -->
	<?php while (have_posts()) : the_post(); ?>
	        <div id="slideupbox">
	        	<a href="#" class="close-link">x</a>
				<p><?php the_field('slideup_box_content', 'option'); ?></p>
			</div>
	<?php endwhile;?>
	
	<footer id="footer"  role="contentinfo">
		<div class="container">
			<div class="inner content clearfix">
				<div class="span two logos">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer First Column')) : ?><?php endif; ?>
				</div>
				<div class="span two footer-menu">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Second Column')) : ?><?php endif; ?>
				</div>
				<div class="span five break-on-mobile">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Third Column')) : ?><?php endif; ?>		
				</div>
			</div>
			<div class="bottom-nav">
				<span class="copyright">&copy; <?php bloginfo( 'name' ); ?></span>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary_footer', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
				
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="fb-root"></div>
<?php wp_footer(); ?>
</body>
</html>