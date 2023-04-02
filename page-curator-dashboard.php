<?php 

/* Template Name: Dashboard Page */

get_header(); ?>

<div class="page-hero-section">
    <h1 class="text-center"> <?php echo get_the_title(); ?> <h1>
</div>

<div class="container">
    <?php $current_user = wp_get_current_user();
        echo "<h3 class='welcome-txt'>Welcome ".$current_user->display_name. "</h3>"
    ?>

    <div class=" exhibition-sxn">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
        );
        $the_query = new WP_Query($args); ?>

        <h4>Exhibition stats</h4>
        <div class="row">
            <?php if($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="col-md-4">
                <?php the_post_thumbnail(); ?>
                <h5><?php the_title(); ?></h5>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>