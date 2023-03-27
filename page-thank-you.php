<?php 
/* Thank You Page */

get_header(); ?>

<div class="page-hero-section">
    <h1 class="text-center"> <?php echo get_the_title(); ?> <h1>
</div>

<?php wc_get_template('checkout/thankyou.php');  ?>

<?php get_footer(); ?>