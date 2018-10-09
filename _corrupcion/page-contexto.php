<?php
/**
 * The Contexto Page template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _corrupcion
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <div id="header-space" class="h3 w-100"></div>
            
            <div id="context-container" class="bg-white pa3">
                <div class="lh-copy pt0">
                    <h2 class="f3 f2-ns fw1 dark-blue tc lh-copy ma0 pa1 ma2-l">Los <span class="b">compromisos internacionales</span> de México en <span>anticorrupción</span></h2>
                    <div class=" dark-blue pa1 f6 f5-l">
                        <p>En la Cumbre de Londres de 2016, México firmó una serie de treinta compromisos contra la corrupción. Sin embargo, no han habido me- canismos oficiales de monitoreo y evaluación en el rastreo de los compromisos. A falta de dichos mecanismos, Transparencia Internacional lanzó un esfuerzo global para el monitoreo del cum- plimiento de los mismos,en el cual Transparen- cia Mexicana participó. Esto incluye la creación de una plataforma global, así como plataformas individualizadas a distintos contextos naciona- les. Esta plataforma es una de ellas.</p>
                        <p>De 30 compromisos firmados por México, Transparencia Mexicana optó por darle priori- dad a ocho para esta plataforma, todos en temas relacionados a contrataciones abiertas, datos abiertos, participación civil, e industrias extractivas. En estos, mayoritariamente se han visto avances, pero no se han completado. La mayoría de los compromisos se encuentra en proceso. Sólo dos de ellos están completos.</p>
                    </div>
                    <div id="pledge-graph" class="pa1 relative ">
                        
                        <?php 
                            $args = array(
                            'post_type' => 'compromiso',
                            'meta_key' => 'status',
                            'meta_value' => 0,
                            'meta_compare' => '==',
                            'showposts' => '-1'
                            ); 
                            $aNewQuery = new WP_Query( $args);
                            $num_incomplete = $aNewQuery->post_count;
                            
                            $args = array(
                            'post_type' => 'compromiso',
                            'meta_key' => 'status',
                            'meta_value' => 1,
                            'meta_compare' => '==',
                            'showposts' => '-1'
                            ); 
                            $aNewQuery = new WP_Query( $args);
                            $num_complete = $aNewQuery->post_count;
                            
                            $num_total = $num_incomplete + $num_complete;
                        ?>
                        
                        <div id="pledge-graph-blue" class="relative  f3 f2-l dark-blue">
                            <?php echo $num_incomplete; ?>/<?php echo $num_total; ?>
                        </div>
                        <div id="pledge-graph-green" class="relative  f3 f2-l dark-green">
                            <?php echo $num_complete; ?>/<?php echo $num_total; ?>
                        </div>
                        <img class="w-100" src="<?php bloginfo('template_url'); ?>/imgs/graphic-context.png" />
                    </div>
                    <div class=" dark-blue pa1 f6 f5-l">
                        <p>Es de suma importancia un trabajo continuo al respecto. Ante el cierre de este sexenio de go- bierno Transparencia Mexicana cree pertinente abrir una conversación sobre el cumplimiento de estos compromisos antes de concluir el pro- ceso de transición. Las palabras de nuestro go- bierno deben traducirse en acciones.</p>
                    </div>
                </div>

            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
