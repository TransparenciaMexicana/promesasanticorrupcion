<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _corrupcion
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="pa4 pa5-l bg-dark-blue cf ">
            
            <div class="fl w-100 w-50-ns pa3 tc">
                <a class="w-100" href="https://www.tm.org.mx/"><img src="<?php bloginfo('template_url'); ?>/imgs/logo-tm.png" alt="transparencia-mexicana" class="w-90 w-50-ns pb2" /></a>
                <div class="w-100 white flex flex-column items-center pa2 lh-copy">
                    <div id="social" class="pa2 flex flex-row justify-between items-center white">
                        <a class="pa2" href="https://m.facebook.com/TransparenciaMexicana?fref=ts"><img class="w-60" src="<?php bloginfo('template_url'); ?>/imgs/icon-fb.png" alt="facebook" /></a>
                        <a class="pa2" href="https://twitter.com/IntegridadMx"><img class="w-60" src="<?php bloginfo('template_url'); ?>/imgs/icon-twitter.png" alt="twitter" /></a>
                        <a class="pa2" href="https://www.youtube.com/user/TransparenciaMex"><img class="w-60" src="<?php bloginfo('template_url'); ?>/imgs/icon-youtube.png" alt="youtube" /></a>
                    </div>
                    <div class=" f4 "><a class="pointer grow white tracked no-underline" href="mailto:info@tm.org.mx">info@tm.org.mx</a></div>

                </div>
            </div>
            <div class="fr w-100 w-50-ns pa3 tc flex flex-row flex-wrap justify-around items-center">
                <h3 class="f4 white ma3 w-100 pb3-ns">CON EL APOYO DE:</h3>
                <a class="w-30 grow" href="https://www.transparency.org/"><img src="<?php bloginfo('template_url'); ?>/imgs/logo-transparency-int.png" alt="transparency-international" ></a>
                <a class="w-20 grow" href="https://www.ukaiddirect.org/"><img src="<?php bloginfo('template_url'); ?>/imgs/logo-uk-aid.png" alt="uk-aid" ></a>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
