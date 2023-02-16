
<?php get_header(); ?>


<section class="page-wrap">
<div class="container">
               <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
               <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

            <?php get_template_part( 'includes/section', "archive" );?>
           
        </div>
</section>
<?php dynamic_sidebar( 'footer' ); ?>
<?php get_footer(); ?>