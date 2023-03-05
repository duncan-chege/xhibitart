<?php get_header(); ?>

<?php while(have_posts()){ the_post(); ?>

<div class='container'>
    <div class='row'>
        <div class='col-md-8 offset-md-2'>
            <div class="single-featured"><?php the_post_thumbnail(); ?></div>
            <h1 class='font-weight-bold my-4 text-center'><?php echo get_the_title(); ?></h1>
            <?php the_content(); ?>
            <div class="text-center my-5">
                <a href="#" class="book-slot">Book Your Slot</a>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<?php get_footer(); ?>