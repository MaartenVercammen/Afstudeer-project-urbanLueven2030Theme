<?php

/*
Template Name: Contact Us
*/
?>

<?php get_header(); ?>

<div class="Container">
            <h1><?php the_title(); ?></h1>
            <div class="row">
                <div class="col-6">
                    This is contact form
                </div>
                <div class="col-6">
                <?php get_template_part( 'includes/section', "content" );?>
                </div>            </div>

            
    </div>


<?php get_footer(); ?>