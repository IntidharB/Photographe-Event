<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<?php wp_head() ?>
</head>

<body>
<header>
    <div id="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_theme_mod('photoEvent_logo'); ?>" alt=""></a>
    </div>
    <nav class="menu main-navigation" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
        <?php wp_nav_menu(array(
            'theme_location' => 'header',
            'menu_class' => 'header-menu'
        )); ?>
        <?php do_action('my_custom_header_hook'); ?>
    </nav>
    <div id="burger-menu">
        <div id="burger-icon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
    <div id="responsive-menu">
        <?php wp_nav_menu(array(
            'theme_location' => 'header',
            'menu_class' => 'responsive-menu'
        )); ?>
        <?php do_action('my_custom_header_hook'); ?>
    </div>
</header>
 

	