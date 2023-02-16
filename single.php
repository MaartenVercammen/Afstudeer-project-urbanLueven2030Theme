<?php get_header(); ?>


<section class="page-wrap">
<div class="Container">

            <?php get_template_part( 'includes/section', "blogpost" );?>
    </div>
</section>
<?php dynamic_sidebar( 'footer' ); ?>
<?php get_footer(); ?>