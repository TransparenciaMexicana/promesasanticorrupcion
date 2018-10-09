<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _corrupcion
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <div id="header-space" class="h3 w-100"></div>
			<div id="404-container" class="pa3 pa5-ns flex flex-column-reverse flex-row-ns items-center dark-blue">
                <div class="w-90 w-50-ns flex flex-column items-center items-start-ns lh-copy pl3-ns">
                    <div id="four04" class="f1 fw1">404</div>
                    <div class="f1 b tc tl-ns">Página no encontrada</div>
                    <a href="<?php bloginfo('url'); ?>">
                        <button class="br4 pa3 bg-white dark-blue pointer grow b fw1 f3">Regresar al inicio</button>
                    </a>
                </div>
                <div class="w-90 w-50-ns tr">
                    <img alt="404" src="<?php echo bloginfo('template_url')?>/imgs/404.png">
                </div>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
