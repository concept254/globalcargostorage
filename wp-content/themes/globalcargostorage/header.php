<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Global Cargo Storage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo get_stylesheet_directory_uri() ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo get_stylesheet_directory_uri() ?>/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-0 text-white d-flex align-items-center">
                <i class="fa fa-globe fa-2x me-3 lh-1"></i>
                <div class="d-flex flex-column">
                    <span style="font-size: 1.1rem;">Global Cargo Storage</span>
                    <span style="font-size: 0.75rem; opacity: 0.85; letter-spacing: 0.05em;">Portable & Self Storage Solutions</span>
                </div>
            </h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'menu_class'     => 'navbar-nav ml-auto',
                        'container'      => false,
                        'walker'         => new Mega_Menu_Walker(),
                    ));
                ?>
            </div>
            <?php
                    // Query the "website contacts" post
                    $args = array(
                        'post_type' => 'contact',
                        'name'      => 'website-contacts', // The slug of the post
                    );
                    $contact_query = new WP_Query($args);

                    // var_dump($contact_query);

                    if ($contact_query->have_posts()) {
                        while ($contact_query->have_posts()) {
                            $contact_query->the_post();

                            // Display custom fields
                            $contact_phone = get_field('telephone_number');
                            $contact_email = get_field('email_address');
                            $contact_address = get_field('address');
            ?>
            <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i><?php echo esc_html($contact_phone); ?></h4>
            <?php
                        }
                    }
                    wp_reset_postdata();
            ?>
        </div>
    </nav>
    <!-- Navbar End -->