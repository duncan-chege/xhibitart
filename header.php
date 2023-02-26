<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); echo ' | ';  bloginfo( 'name' ); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="">
        <nav class="navbar navbar-light navbar-expand-sm fixed-top" role='navigation'>
            <div class='container-fluid'>
                <!-- Brand and toggle button -->
                <div class='main-logo'>
                    <a href="<?php echo home_url(); ?>"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"
                            alt='xhibitart logo'></a>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <?php
                        wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'my-custom-menu',
                        'depth'             => 1,
                        'container'         => '',
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => 'navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>

                    <button type="button" class="btn btn-dark"> Curator SignUp </button>
                </div>
                <!-- End -->
            </div>
        </nav>
    </header>
