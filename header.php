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
			wp_enqueue_script('easing', get_template_directory_uri().'/js/plugins/jquery.easing.js');
			wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');
		}
		add_action('wp_enqueue_scripts', 'load_assets');
	?>
	<?php wp_head(); ?>
	<!--[if lt IE 8]> <script src="<?php bloginfo('template_url')?>/js/lte-ie7.js"></script> <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/ie.css" />
	<![endif]-->
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
					<button class="mobile-navigation-btn uppercase"><i aria-hidden="true" class="icon-arrow-down tiny"></i>menu</button>
					<nav role="navigation" class="site-navigation main-navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary_header', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
					</nav><!-- .site-navigation .main-navigation -->
				</div>
			</div>		
		</header><!-- #masthead -->
		<div id="main" role="main">