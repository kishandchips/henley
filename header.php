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
			wp_enqueue_script('prettyPhoto', get_template_directory_uri().'/js/plugins/jquery.colorbox-min.js');
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
	<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<link rel="stylesheet" type="text/css" href="http://assets.cookieconsent.silktide.com/current/style.min.css"/>
<script type="text/javascript" src="http://assets.cookieconsent.silktide.com/current/plugin.min.js"></script>
<script type="text/javascript">
// <![CDATA[
cc.initialise({
	cookies: {
		necessary: {}
	},
	settings: {
		consenttype: "implicit",
		bannerPosition: "push",
		style: "monochrome",
		tagPosition: "vertical-left",
		hideprivacysettingstab: true
	}
});
// ]]>
</script>
<!-- End Cookie Consent plugin -->
<script type="text/javascript" class="cc-onconsent-social" src="https://apis.google.com/js/plusone.js"></script>
</head>
<?php 
	$curr_page = get_queried_page();
	$curr_page_id = $curr_page->ID;
?>
<body <?php body_class(); ?>>
	<div id="page">
		<header id="header" role="banner">
			<div class="container">
				<a href="<?php bloginfo( 'url' ); ?>" class="site-logo ir" title="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>"><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></a>
				<div id="top-nav" class="clearfix">
					<div class="socials">
						<div class="fb-like" data-href="https://www.facebook.com/henleymba" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
						<div class="g-plusone" data-size="medium" data-href="<?php bloginfo( 'url' ); ?>"></div>
						<div class="tweet-button"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
					</div>
					<?php wp_nav_menu( array( 'theme_location' => 'header_top_nav', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>					
					<div class="phones">
						Freephone: 
						<span class="rTapNumber72599">07595 292 684</span>
						<br>
						International:
					  	<span class="rTapNumber72709">+44 (0)208 621 0050</span>					  	
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

		<?php if(get_field('slideshow', $curr_page_id)): ?>
		<div id="header-image" class="container clearfix">
			<?php
				$values = get_field('slideshow', $curr_page_id);
				$number_of_slides = count($values);
				?>
				<?php if($number_of_slides > 1): ?>
					<div id="homepage-scroller" class="scroller" data-auto-scroll="true">
						<div class="outer">
							<div class="inner">
								<div class="scroller-mask">						
									<?php $i = 0; ?>
									<?php while (the_repeater_field('slideshow', $curr_page_id)) : ?>					
									<div class="scroll-item <?php if($i == 0) echo 'current'; ?>" data-id="<?php echo $i;?>">
										<img class="scale" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
										<span class="title <?php the_sub_field('title_position'); ?>" style="background-color: <?php the_sub_field('title_background_colour'); ?>;">
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
					<?php while (the_repeater_field('slideshow', $curr_page_id)) : ?>		
						<div class="scroll-item">
							<img class="scale" src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
							<span class="title <?php the_sub_field('title_position'); ?>" style="background-color: <?php the_sub_field('title_background_colour'); ?>;">
								<?php the_sub_field('title'); ?>
							</span>
						</div>
					<?php endwhile; ?>								
				<?php endif; ?>
			</div>	
		<?php endif; ?>		

		<div id="main" role="main">