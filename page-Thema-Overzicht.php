<?php /* Template Name: Thema-Overzicht */ ?>
<?php get_header(); ?>


<section class="page-wrap">
    <h1><?php the_title() ?><h2>
<div class="Container">
<?php wp_nav_menu( array( 
            'theme_location' => 'theme-menu', 
            "menu_class" => "theme-menu",
            'walker' => new Menu_Walker()
            ) ); ?>
    </div>
</section>

<?php get_footer(); ?>