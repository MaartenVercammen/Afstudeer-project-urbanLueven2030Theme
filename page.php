<?php get_header(); ?>


<section class="page-wrap">
<div class="Container">
            <h1><?php the_title(); ?></h1>

            <?php get_template_part( 'includes/section', "content" );?>
    </div>
</section>
<?php dynamic_sidebar( 'footer' ); ?>
<?php get_footer(); ?>