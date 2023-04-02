<?php get_header(); ?>

<?php while(have_posts()){ the_post(); ?>

<div class='container'>
    <div class='row'>
        <div class='col-md-8 offset-md-2'>
            <div class="single-featured"><?php the_post_thumbnail(); ?></div>
            <h1 class='font-weight-bold my-4 text-center'><?php echo get_the_title(); ?></h1>
            <?php the_content(); ?>

            <?php $artists = get_field('artists'); ?>

            <?php if( ! empty($artists)): ?>
            <?php foreach($artists as $artist): ?>
            <div class="artist-sxn">
                <h4> Exhibiting Artist </h4>
                <a href="<?php echo get_page_link($artist->ID); ?>"><img
                        src="<?php echo get_the_post_thumbnail_url($artist->ID, 'thumbnail'); ?>" />
                    <?php echo $artist->post_title; ?>
                </a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>

            <a href="<?php echo home_url(); ?>" class="back-exhibitions my-3 d-inline-block">Back to Exhibitions </a>
        </div>
    </div>
</div>

<?php } ?>

<?php get_footer(); ?>