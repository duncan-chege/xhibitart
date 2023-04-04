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

<?php $args = array(
    'post_type' => 'product',
); 
    $xhibitions = new WP_Query($args);
?>

<?php $args = array(
    'post_type' => 'event_magic_tickets',
); 
    $tickets = new WP_Query($args);
?>

<?php $query = array(
   'post_type' => 'shop_order',
   'post_status' => 'any'
);

$orders = new WP_Query($query);
?>
    <div class="brief-stats">
        <div class="row g-0">
            <div class="col-md-3">
                <p> Exhibitions Posted </p>
                <h3><?php echo $xhibitions->found_posts; ?></h3>
            </div>
            <div class="col-md-3">
                <p> Tickets Booked </p>
                <h3><?php echo $orders->found_posts; ?></h3>
            </div>
            <div class="col-md-3">
                <p> Cash Received </p>
                <h3>Ksh 1000</h3>
            </div>
            <div class="col-md-3">
                <p> Artists Posted </p>
                <h3>2</h3>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>