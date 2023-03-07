<?php get_header(); ?>

<section class="page-wrap">
    <div class="">
        <?php get_template_part('includes/section', "content"); ?>
    </div>

</section>

<?php dynamic_sidebar( 'footer' ); ?>
<?php get_footer(); ?>