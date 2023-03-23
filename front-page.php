<?php get_header(); ?>

<div class="front-hero-section">
    <div class="text-center">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/white-logo.svg" alt="main logo">
        <h1>Embrace Visual Art in Kenya</h1>
    </div>
</div>

<div class="container">
    <div class="row featured-exhibition">
        <div class="col-md-12 my-5 text-center">
            <h2 class=""> Featured Exhibition </h2>
        </div>

        <?php 
            $args = array(
                'product_tag' => 'featured-exhibition',
                'posts_per_page' => 1,
            );
            $featured = new WP_Query($args); ?>

        <?php if($featured->have_posts()) : ?>
        <?php while ($featured->have_posts()) : $featured->the_post(); ?>

        <div class="col-md-5">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="col-md-6 py-3 ps-5">
            <h3 class=""><?php the_title(); ?></h3>
            <p><?php echo wp_trim_excerpt(); ?></p>

            <div class="exhibition-prompts my-4">
                <a href="<?php echo get_permalink(); ?>">Exhibition Details </a>
                <?php woocommerce_get_template('loop/add-to-cart.php'); ?>
            </div>
            
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            <h5><?php _e( "Our featured exhibition is coming soon" ); ?></h5>
            <?php endif; ?>
        </div>
    </div>

    <div class="row exciting-exhibitions">
        <div class="col-md-12">
            <h2 class=" text-center mb-5"> Exciting Exhibitions This February </h2>
        </div>

        <?php
        $args = array(
            'post_type' => 'exhibitions',
            'posts_per_page' => 3,
            'tag__not_in' => 3
        );
        $the_query = new WP_Query($args); ?>

        <?php if($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="col-md-4">
            <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?>
                <h5 class="mt-3"><?php the_title(); ?></h5></a>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <p><?php _e( 'Sorry, no exhibitions this month' ); ?></p>
        <?php endif; ?>
    </div>

    <div class="row star-artists">
        <div class="col-md-12">
            <h2 class=" text-center mb-5"> Star Artists </h2>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/artist-placeholder.png"
                alt="featured exhibition">
            <h5 class=" mt-3">Vincent Van Goug</h3>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/artist-placeholder.png"
                alt="featured exhibition">
            <h5 class=" mt-3">Vincent Van Goug</h3>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/artist-placeholder.png"
                alt="featured exhibition">
            <h5 class=" mt-3">Vincent Van Goug</h3>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/artist-placeholder.png"
                alt="featured exhibition">
            <h5 class=" mt-3">Vincent Van Goug</h3>
        </div>
    </div>

    <div class="row art-mediums">
        <div class="col-md-12 text-center">
            <h2 class=" text-center mb-5"> Art Mediums </h2>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/medium-placeholder.png"
                alt="featured exhibition">
            <h5 class=" mt-3">Painting</h3>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/medium-placeholder.png"
                alt="featured exhibition">
            <h5 class=" mt-3">Painting</h3>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/medium-placeholder.png"
                alt="featured exhibition">
            <h5 class=" mt-3">Painting</h3>
        </div>

        <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/medium-placeholder.png"
                alt="featured exhibition">
            <h5 class=" mt-3">Painting</h3>
        </div>
    </div>
</div>


<?php get_footer(); ?>