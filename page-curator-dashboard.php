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
        'posts_per_page' => -1,
    ); 
        $xhibitions = new WP_Query($args);
    ?>

    <?php $args = array(
        'post_type' => 'artists',
        'posts_per_page' => -1
    );

        $artists = new WP_Query($args);
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

    <?php
        $args = array(
            'status' => 'wc-completed',
            'limit' => -1,
        );

        $completed_orders = wc_get_orders($args);

        $total = 0;

        foreach ($completed_orders as $order) {
            $total += $order->get_total();
        }
?>

    <div class="brief-stats">
        <div class="row g-0">
            <div class="col-md-3">
                <h5> Exhibitions Posted </h5>
                <h3><?php echo $xhibitions->found_posts; ?></h3>
            </div>
            <div class="col-md-3">
                <h5> Tickets Booked </h5>
                <h3><?php echo $orders->found_posts; ?></h3>
            </div>
            <div class="col-md-3">
                <h5> Cash Received </h5>
                <h3><?php echo wc_price($total); ?></h3>
            </div>
            <div class="col-md-3">
                <h5> Artists Posted </h5>
                <h3><?php echo $artists->found_posts; ?></h3>
            </div>
        </div>
    </div>

    <div class="w-100">
        <a href="<?php echo admin_url( 'post-new.php?post_type=product' ); ?>" class="add-xhibition">Add New
            Exhibition</a>
    </div>
    
    <div class="stat-table">
        <div class="row g-0">
            <div class="col-md-3">
                <h5> Exhibition Name </h5>
                <?php if($xhibitions->have_posts()) : ?>
                <?php while($xhibitions->have_posts()) : $xhibitions->the_post(); ?>
                <p> <?php echo get_the_title(); ?> </p>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3 text-center">
                <h5> Ticket Price </h5>
                <?php if($xhibitions->have_posts()) : ?>
                <?php while($xhibitions->have_posts()) : $xhibitions->the_post();
                $product = wc_get_product(get_the_ID());
                $regular_price = $product->get_regular_price(); ?>
                <p> <?php echo "Ksh ". $regular_price; ?> </p>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3 text-center">
                <h5> Total Tickets </h5>
                <?php if($xhibitions->have_posts()) : ?>
                <?php while($xhibitions->have_posts()) : $xhibitions->the_post();
                $product = wc_get_product(get_the_ID());
                $stock_quantity = $product->get_stock_quantity(); ?>
                <p> <?php echo $stock_quantity; ?> </p>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3 text-center">
                <h5> Tickets Bought </h5>
                <?php if($xhibitions->have_posts()) : ?>
                <?php while($xhibitions->have_posts()) : $xhibitions->the_post();
                $product_id = get_the_ID();
                $orders = wc_get_orders( array(
                    'status' => array( 'completed', 'processing' ),
                ) );
                $sales_count = 0;
                foreach ( $orders as $order ) {
                    $order_items = $order->get_items();
                    foreach ( $order_items as $item ) {
                        if ( $item->get_product_id() === $product_id ) {
                            $sales_count += $item->get_quantity();
                        }
                    }
                } ?>
                <p> <?php echo $sales_count; ?> </p>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>