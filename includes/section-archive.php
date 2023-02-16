<div class="archive-container">
<?php if (have_posts()):
    while (have_posts()):
        the_post();?>

<div class="is-layout-constrained wp-block-group post-card">
    <div class="wp-block-group__inner-container">
        <div class="is-layout-constrained wp-block-group">
            <div class="wp-block-group__inner-container">
                <figure class="feature-image-post wp-block-post-featured-image">
                    <?php the_post_thumbnail() ?></figure>
            </div>
        </div>



        <div class="is-vertical is-nowrap is-layout-flex wp-container-2 wp-block-group post-card-body">
            <h2 style="text-transform:capitalize;" class="wp-block-post-title has-large-font-size"><?php the_title() ?></h2>

            <div class="wp-block-post-date has-small-font-size">
                <time>
                    <?php the_time('F j, Y')?>
                    </time></div>

            <div class="wp-block-post-excerpt has-medium-font-size">
                <p class="wp-block-post-excerpt__excerpt"><?php the_excerpt() ?></p>
                <p class="wp-block-post-excerpt__more-text"><a class="wp-block-post-excerpt__more-link"
                        href="<?php the_permalink() ?>">Read More</a></p>
            </div>
        </div>
    </div>
</div>

<?php endwhile;endif;?>
</div>