<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<style>.site__header { background-color:<?= get_theme_mod("site__title__background"); ?>;}</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site__header">
		<section class="site__nav__container">
		<?= get_custom_logo(); ?>
		<?php wp_nav_menu(array(
				"menu" => "Primaire",
				"container"=>"nav"
			))?>
			<div class="nav_widget-container">
				<?php get_sidebar('nav_widget-1'); ?>
				<?php get_sidebar('nav_widget-2'); ?>
			</div>
			</section>
		<div class="site__branding">
		
			
				
				
			<?php
			$under_description = get_bloginfo( 'description', 'display' );
			if ( $under_description || is_customize_preview() ) :
				?>
				<p class="site__description"><?php echo $under_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->


	<aside class="site__menu">
		<input type="checkbox" name ="chk-burger" id="chk-burger" class="chk-burger">
		<label for="chk-burger" class="burger">X</label>
		<!-- <div id="nav-icon3">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
		</div> -->
		<h2>menu secondaire</h2>
		<?php wp_nav_menu(array(
			"menu" => "sidebar",
			"container" => "nav",
			"container_class" => "menu__aside"
		))
		?>
	</aside>


	<aside class="site__menu site__sidebar">
		<div><?php get_sidebar('aside-1'); ?></div>
		<div><?php get_sidebar('aside-2'); ?></div>
	</aside>
