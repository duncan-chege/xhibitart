<?php 

/* Template Name: Dashboard Page */

get_header(); ?>

<div class="page-hero-section">
    <h1 class="text-center"> <?php echo get_the_title(); ?> <h1>
</div>

<?php while(have_posts()){ the_post(); ?>
    <?php the_content(); ?>
<?php } ?>

<?php get_footer(); ?>