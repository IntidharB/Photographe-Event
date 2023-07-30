<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>

<body>
	<header>
		<div id="logo">
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_theme_mod('photoEvent_logo'); ?>" alt=""></a>
		</div>
		<nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
			<?php wp_nav_menu(array(
				'theme_location' => 'header',
				'menu_class' => 'header-menu'

			)); ?>
		</nav>
	</header>