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
 * @package underscore
 */

?>

    <?php
        get_header();
    ?>

        <main class="site__main">
            <?php 
                if ( have_posts() ) : 
                    while ( have_posts() ) :
                        the_post();?>
                        <h1><a href="<?php the_permalink();?>">
                        <?php the_title(); ?></a></h1>
                        <h2>Duree du cours: <?php the_field('duree');?></h2>
                        <h2>Categorie de cour: <?php the_field('categorie');?></h2>
                        <h2>Dificulté: <?php the_field('dificulte');?></h2>
                        <?php the_content(null, true); ?>
                        
                    <?php endwhile; ?>
                <?php endif; ?>
            
        </main>

    <?php
        get_footer();
    ?>

