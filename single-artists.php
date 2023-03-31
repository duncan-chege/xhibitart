<?php get_header(); ?>

<?php while(have_posts()){ the_post(); ?>

<div class='container'>
    <div class='row mt-5'>
        <div class="col-md-3">
            <div class="artist-img mt-5 text-center"><?php the_post_thumbnail(); ?></div>
        </div>
        <div class='col-md-7 ml-2'>
            <h1 class='font-weight-bold my-4 text-center'><?php echo get_the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php } ?>

<?php get_footer(); ?>