<?php if (have_posts()): while (have_posts()): the_post();
        ?>

		<div class="container post-body">
		  <h2>
		    <?php the_title();?>
		  </h2>
		  <div class="post-header-info">
		    <p>
		      <i
		        >Author:
		        <?php echo get_the_author_meta('first_name');
        ?>
		        <?php echo get_the_author_meta('last_name');
        ?></i
		      >
		    </p>
		    <p>
		      <i
		        >published on:
		        <?php the_date()?></i
		      >
		      <?php if (get_the_date() != get_the_modified_date()) {
            ?>
		      <i
		        >- last-updated on:
		        <?php the_modified_date()?></i
		      >
		    </p>
		    <?php }
        ?>
		  </div>
		  <div class="post-content">
		    <?php the_content_feed();
        ?>
		  </div>
		  <div class="post-info-container">
		    <div class="tag-container">
		      <p>
				<?php if( has_tag() ){?>
		        <?php $tags = get_the_tags();

        foreach ($tags as $tag) {
            ?>
		        <span class="dashicons dashicons-tag"></span
		        ><a href="<?php echo get_tag_link($tag->term_id) ?>"
		          ><?php echo $tag->name ?></a
		        >
		        <?php
        }
	}?>
		      </p>
		    </div>
		    <div class="category-container">
		      <p>
		        <?php $categories = get_the_category();

        foreach ($categories as $category) {
            ?>
		        <span class="dashicons dashicons-category"></span
		        ><a href="<?php echo get_tag_link($category->term_id) ?>"
		          ><?php echo $category->name ?></a
		        >
		        <?php
        }
        ?>
		      </p>
		    </div>
		  </div>
		</div>
		<?php endwhile;
endif;
?>
