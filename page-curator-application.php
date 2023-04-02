<?php 

/* Template Name: Curator Application */

get_header(); ?>

<div class="page-hero-section">
    <h1 class="text-center"> <?php echo get_the_title(); ?> <h1>
</div>

<?php while(have_posts()){ the_post(); ?>
<div class="form-holder"><?php the_content(); ?></div>
<?php } ?>

<?php get_footer(); ?>