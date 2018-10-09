<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
        <!--section-->
        <div id="ghost-div-1" class="pb2 bg-white">
            <div  id="home-section-1" class="bg-dark-blue white overflow-hidden pb3">
                <div class="fl w-100 w-50-ns pa3 pa4-ns  pl5-l">
                    <h2 class="f2 fw1 lh-copy">RASTREO DE PROMESAS <span class="b">ANTICORRUPCIÓN</span></h2>
                    <div class="f6 f4-l fw3">
                        <p>México ha suscrito diferentes compromisos internacionales para el control efectivo de la corrupción. Transparencia Mexicana escogió ocho de los compromisos para hacer un seguimiento puntual de sus avances.</p>
                        <p>Evaluamos el cumplimiento del Gobierno en datos abiertos, participación ciudadana, transparencia en industrias extrac tivas y contrataciones abiertas. Aunque, en general, México ha ido avanzando en estos compromisos, hay amplio espacio de mejora.</p>
                        <p>Nuestra plataforma te ayudará a identificar si han cumplido los compromisos y qué nos falta para hacerlo bien.</p>
                    </div>
                    <br/>
                    <a href="<?php bloginfo('url'); ?>/contexto">
                        <button class="br4 pa3 bg-white dark-blue pointer grow b">SABER MÁS</button>
                    </a>
                </div>
                <div class="fl w-100 w-50-ns pa2 pt4-ns ">
                    <img class="dn-ns" src="<?php bloginfo('template_url'); ?>/imgs/home_mob.png" alt="graphic" />
                    <img class="dn db-ns mr4-ns fr-ns" src="<?php bloginfo('template_url'); ?>/imgs/graphic-desk.png" alt="graphic" />
                </div>
            </div>
        </div>
        <!--Section-->

        <div id="status-section" class=" w-100 bg-white pb3 cf pa5-ns">
            <div class="fl w-100 pa4 pa5-l mb5-l">
                <h2 class="f2 fw1 lh-copy dark-blue f1-l">ESTATUS DE <br/><span class="b">COMPROMISOS</span></h2>

                <div class="fl w-100">
                    
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
                    
                    <div class="circle-container relative h5 fl w-100 w-50-ns grow-large">
                        <div class="circle-1a bg-dark-blue flex justify-around items-center">
                            <div class="circle-1a-inner white flex justify-around items-center f2">
                                <?php echo $num_incomplete; ?>/<?php echo $num_total; ?>
                            </div>
                        </div>
                        <div class="circle-1b bg-dark-blue flex justify-around items-center pa3 white tc">
                            EN PROCESO
                        </div>
                    </div>
                    <div class="circle-container relative h5 fl w-100 w-50-ns grow-large">
                        <div class="circle-1a bg-green flex justify-around items-center">
                            <div class="circle-1a-inner white flex justify-around items-center f2">
                                <?php echo $num_complete; ?>/<?php echo $num_total; ?>
                            </div>
                        </div>
                        <div class="circle-1b bg-green flex justify-around items-center pa3 white tc">
                            COMPLETOS
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Section-->
        <div id="ghost-section" class="bg-dark-blue cf">
            <div id="home-section-compromisos" class="bg-green pb3">
                <h2 class="f2 f1-l b white pa4 ma0 tc tl-ns pt5-ns pl5-l">COMPROMISOS</h2>
                <div class="pa3 flex flex-row justify-around">
                    <div class="flex flex-row items-center justify-between dib white">
                        <div class="w2 h2 bg-green ba bw1 b--white f4 b br-100 flex justify-around items-center pt1 shadow-5">C</div>
                        <div class="ml2">COMPLETOS</div>
                    </div>
                    <div class="flex flex-row items-center justify-between dib white">
                        <div class="w2 h2 tc  bg-dark-blue ba bw1 b--white f4 b br-100 flex justify-around items-center pt1 shadow-5">P</div>
                        <div class="ml2">EN PROCESO</div>
                    </div>
                </div>
                <div id="pledges-container" class="pa4 pb5 flex flex-column flex-row-ns flex-wrap-ns justify-around-ns">
                    
                    <?php 
						$args = array(
						'post_type' => 'compromiso',
						'order' => 'ASC',
						'showposts' => '-1'
						); 
						$aNewQuery = new WP_Query( $args);
					?>
					
					<?php if ($aNewQuery->have_posts()) : while ($aNewQuery->have_posts()) : $aNewQuery->the_post(); ?>

                        <a href="<?php echo get_the_permalink();?>" class="pledge-single-container   no-underline  w-100 w-40-l flex flex-row items-center">
                            <?php if(!get_post_meta( $post->ID, 'status', true )):?>
                                <img class="w4 w-30-l grow" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="20">
                            <?php else: ?>
                                <img class="w4 w-30-l grow" src="<?php echo bloginfo('template_url').'/imgs/_icons/'.basename(get_the_post_thumbnail_url(),".png").'_G.png'; ?>" alt="20">
                            <?php endif;?>
                            <div class="white f6 f5-ns pb3">
                                
                                <p class=" mb1 ttu tracked">
                                    <?php
                                        $raw_title = get_the_title();
                                        $words = explode(' ',$raw_title);
                                        $words[0] = "<span class='b'>".$words[0]."</span>";
                                        $fixed_title = implode(' ',$words);
                                        echo $fixed_title;
                                    ?>
                                </p>
                                
                                <p class="  mt1 i">
                                    <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo esc_html( $categories[0]->name );   
                                        }
                                    ?>
                                </p>
                            </div>
                        </a>
                    
                        <?php endwhile;?> 
					<?php else: ?>
                        <p>No pledges!</p>
					<?php endif; ?>
                    
                    
                </div>
            </div>
        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
