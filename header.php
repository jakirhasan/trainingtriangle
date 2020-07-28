<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class('trainingtriangle'); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'primary-menu',
					'menu_class'        => 'primary-menu-2',
				)
			);
			?>
	</header>