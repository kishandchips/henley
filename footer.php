	</div><!-- #main -->
	<footer id="footer"  role="contentinfo">
		<div class="container">
			<div class="inner content">
				footer dummy content<br>ooter dummy content<br>footer dummy content<br>footer dummy content<br>footer dummy content<br>ooter dummy content<br>footer dummy content<br>footer dummy content<br>
			</div>
			<div class="bottom-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'primary_footer', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
					&copy; <?php bloginfo( 'name' ); ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>