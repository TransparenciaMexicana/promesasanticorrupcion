<?php
/**
 * The single pledge (compromiso) template file
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
            
            <?php 
                global $post; 
                while ( have_posts() ) :
                    the_post();
                    $to_exclude = get_the_ID();
                    $status = get_post_meta( $post->ID, 'status', true );
            ?>
            
            <div id="header-space" class="h3 w-100"></div>
            <div class="<?php if($status){echo "bg-green";}else{echo "bg-dark-blue";} ?> pa3 z-0 pb4 pb5-ns">
                <div class="pledge-single-container pa2 pb3 no-underline  w-100 flex flex-row items-center justify-center mb3">
                    <!--this is the pledge icon-->
                    <?php if($status):?>
                        <img class="w4 w-20-l mr3 mr4-l" src="<?php echo bloginfo('template_url').'/imgs/_gifs/'.basename(get_the_post_thumbnail_url(),".png").'_G.gif'; ?>" alt="20">
                    <?php else: ?>
                        <img class="w4 w-20-l mr3 mr4-l" src="<?php echo bloginfo('template_url').'/imgs/_gifs/'.basename(get_the_post_thumbnail_url(),".png").'.gif'; ?>" alt="20">
                    <?php endif; ?>
                    <div class="white f6 f5-ns pb3 w-40-l">
                        <!--this is the pledge title-->
                        <h2 class=" f5 f3-l mb1 normal ttu tracked">
                            <?php
                                $raw_title = get_the_title();
                                $words = explode(' ',$raw_title);
                                $words[0] = "<span class='b'>".$words[0]."</span>";
                                $fixed_title = implode(' ',$words);
                                echo $fixed_title;
                            ?>
                        </h2>
                        <!--this is the pledge category-->
                        <h3 class=" fw1 mt1 f5 f3-l i">
                            <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo esc_html( $categories[0]->name );   
                                }
                            ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div id="middle-bg" class=" pt0 dark-blue fw1 z-0 bg-white relative">
                <div id="single-pledge-content" class="lh-copy pa3 ma3 ml4-m mr4-m ml5-l mr5-l shadow-5 bg-white z-2">
                    <?php the_content(); ?>
                </div>
                <div id="space-div" class="h4  bg-light-gray relative z-1"></div>
            </div>
            <?php endwhile; ?>
            
            <div class="bg-light-gray pa3 pt2 z-2">

                <h2 class="tc f3 f2-m f1-l b dark-blue ma0 pb3">Otros Compromisos</h2>
                <div class="flex flex-row flex-wrap justify-center">
                    
                    <?php 
						$args = array(
						'post_type' => 'compromiso',
						'post__not_in' => array($to_exclude),
						'orderby' => 'rand',
						'showposts' => '-1'
						); 
						$aNewQuery = new WP_Query( $args);
					?>
					
					<?php if ($aNewQuery->have_posts()) : while ($aNewQuery->have_posts()) : $aNewQuery->the_post(); ?>
                        
                        <?php if(!get_post_meta( $post->ID, 'status', true )):?>
                            <a href="<?php echo get_the_permalink();?>" class="w-25  pa2-m pa4-l"><img class="w-100 grow" src="<?php echo get_the_post_thumbnail_url(); ?>"/></a>
                        <?php else: ?>
                            <a href="<?php echo get_the_permalink();?>" class="w-25  pa2-m pa4-l"><img class="w-100 grow" src="<?php echo bloginfo('template_url').'/imgs/_icons/'.basename(get_the_post_thumbnail_url(),".png").'_G.png'; ?>"/></a>
                        <?php endif; ?>
                    
                        <?php endwhile;?> 
					<?php else: ?>
                        <p>No pledges!</p>
					<?php endif; ?>
                    
                    
                </div>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
