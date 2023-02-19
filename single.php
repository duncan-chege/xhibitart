<?php get_header(); ?>

<?php while(have_posts()){ the_post(); ?>

<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <h1 class='font-weight-bold mt-3'><?php echo get_the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php } ?>

<?php get_footer(); ?>