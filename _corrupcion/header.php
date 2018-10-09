<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _corrupcion
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>TM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class("w-100"); ?>>
<div id="page" class="site">
	
	<header id="masthead" class="site-header h3 shadow-5 pa3 bg-dark-blue fixed left-0 top-0 right-0 flex flex-row justify-between items-center white z-999">
		<div class="fl w-50">
            <a href="<?php bloginfo('url'); ?>">
                <img class="w-100 w-30-l w-60-m" alt="logo" src="<?php bloginfo('template_url'); ?>/imgs/logo-tm.png" />
            </a>
        </div>
		<nav id="site-navigation" class="main-navigation pa1 f2 w-50 tl">
			<div class="menu-toggle fa fa-align-justify fr" ></div>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
