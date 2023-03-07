<?php /* Template Name: Thema-Overzicht */ ?>







<?php get_header(); ?>


<section class="page-wrap">

    <h1><?php the_title() ?><h2>
            <div class="Container">
                <p><?php the_content() ?></p>

            </div>
</section>
<?php dynamic_sidebar( 'footer' ); ?>
<?php get_footer(); ?>