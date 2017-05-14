<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php // Load Font AWESOME ?>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		
		

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="inner-header" class="wrap cf">

					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<p id="logo" class="header-nav" itemscope itemtype="http://schema.org/Organization">
						<a href="<?php echo home_url(); ?>" rel="nofollow">
							<picture>
								<source
									srcset="<?php bloginfo('template_directory'); ?>/library/images/logo/logo-mini.png,
										<?php bloginfo('template_directory'); ?>/library/images/logo/logo-mini@2x.png 2x">
								<img
									src="<?php bloginfo('template_directory'); ?>/library/images/logo/logo-mini.png"
									srcset="<?php bloginfo('template_directory'); ?>/library/images/logo/logo-mini.png,
										<?php bloginfo('template_directory'); ?>/library/images/logo/logo-mini@2x.png 2x"
									alt="1 Grain to 1000 Grains">
							</picture>
						</a>
						<a class="btn--p1 header-nav-donate" href="<?php echo get_permalink( get_page_by_title( 'Donate' ) ) ?>">Donate</a>
					</p>

					<div class="header-nav-mobile-button toggle-display-trigger header-nav">
						<i class="fa fa-bars"></i>
					</div>
					<nav class="toggle-display-target header-nav header-nav-main" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         //'before' => '',                                 // before the menu
        			             //  'after' => '',                                  // after the menu
        			             //  'link_before' => '',                            // before each link
        			             //  'link_after' => '',                             // after each link
        			             'depth' => 2                                 // limit the depth of the nav
    					         //'fallback_cb' => 'echo "hello"'                             // fallback function (if there is one)
						)); ?>

						<a class="btn--p1 display--mobile-only header-nav-mobile-donate" href="<?php echo get_permalink( get_page_by_title( 'Donate' ) ) ?>">Donate</a>
					</nav>
					<div class="header-nav-mobile-overlay toggle-display-target-overlay-bg toggle-display-trigger"></div>
				</div>

			</header>
