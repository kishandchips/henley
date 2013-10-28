<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<meta name="format-detection" content="telephone=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />     
	<?php 
		function load_assets(){
			wp_enqueue_style('style', get_template_directory_uri().'/css/style.css');

			wp_enqueue_script('modernizr', get_template_directory_uri().'/js/libs/modernizr.min.js');
			wp_enqueue_script('jquery', get_template_directory_uri().'/js/libs/jquery.min.js');
			wp_enqueue_script('scroller', get_template_directory_uri().'/js/plugins/jquery.scroller.js');	
			wp_enqueue_script('easing', get_template_directory_uri().'/js/plugins/jquery.easing.js');
			wp_enqueue_script('selecter', get_template_directory_uri().'/js/plugins/jquery.fs.selecter.min.js');			
			wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');
		}
		add_action('wp_enqueue_scripts', 'load_assets');
	?>
	<?php wp_head(); ?>
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/ie.css" />
	<![endif]-->
	<!--[if lt IE 8]> <script src="<?php bloginfo('template_url')?>/js/lte-ie7.js"></script> <![endif]-->
	<!--[if lt IE 8]> <script src="<?php bloginfo('template_url')?>/css/ie7.css"></script> <![endif]-->

    <script type="text/javascript">
		var themeUrl = '<?php bloginfo( 'template_url' ); ?>';
		var baseUrl = '<?php bloginfo( 'url' ); ?>';
	</script>	
</head>

<body <?php body_class(); ?>>
	<div id="page">
		<header id="header" role="banner">
			<div class="container">
				<a href="<?php bloginfo( 'url' ); ?>" class="site-logo ir" title="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>"><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></a>	
				<div id="top-nav">
					<?php if ( is_user_logged_in() ) {
						$current_user = wp_get_current_user();
	    				echo '<span class="userinfo">Hello ' . $current_user->user_login .'!</span>';
	    				wp_loginout('/');
					} else {
					    wp_loginout('/');
					} ?>
					<div class="socials">
						
					</div>
				</div>
				<div class="navigation-container clearfix">
					<button class="mobile-navigation-btn uppercase"><i aria-hidden="true" class="icons-down_arrow"></i>menu</button>
					<nav role="navigation" class="site-navigation main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary_header', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
					</nav><!-- .site-navigation .main-navigation -->
				</div>
			</div>		
		</header><!-- #masthead -->

		<?php if(get_field('slideshow')): ?>
		<div id="header-image" class="container clearfix">
			<?php
				$values = get_field('slideshow');
				$number_of_slides = count($values);
				?>
				<?php if($number_of_slides > 1): ?>
					<div id="homepage-scroller" class="scroller" data-auto-scroll="true">
						<div class="outer">
							<div class="inner">
								<div class="scroller-mask">						
									<?php $i = 0; ?>
									<?php while (the_repeater_field('slideshow')) : ?>					
									<div class="scroll-item <?php if($i == 0) echo 'current'; ?>" data-id="<?php echo $i;?>">
										<img class="scale" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
										<span class="title <?php the_sub_field('title_position'); ?>">
											<?php the_sub_field('title'); ?>
										</span>
									</div>
									<?php $i++; ?>
									<?php endwhile; ?>
								</div>
								<div class="scroller-navigation">
									<a class="prev-btn icons-arrow-left"></a>
									<a class="next-btn icons-arrow-right"></a>
								</div>
							</div>
						</div>
					</div><!-- #homepage-scroller -->			
				<?php else: ?>
					<?php while (the_repeater_field('slideshow')) : ?>		
						<div class="scroll-item">
							<img class="scale" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
							<span class="title <?php the_sub_field('title_position'); ?>">
								<?php the_sub_field('title'); ?>
							</span>
						</div>
					<?php endwhile; ?>								
				<?php endif; ?>
			</div>	
		<?php endif; ?>		

		<div id="main" role="main">