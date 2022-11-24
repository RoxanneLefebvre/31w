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
/**
* Template Name: Evenement
*
* @package WordPress
* @subpackage igc_31w
*/
?>
 
<?php get_header() ?>
<main class="site__main">
 
    <h1 class="">Resultat de recherche</h1>
    <?php 
        if ( have_posts() ) : 
            while ( have_posts() ) :
                        the_post();?>
        <?php the_title() ?>
        <p><?php echo wp_trim_words( get_the_excerpt(), 35, '...' ); ?></p>
               
        
            <?php endwhile; ?>
        <?php endif ?>
</main>
<?php get_footer() ?>