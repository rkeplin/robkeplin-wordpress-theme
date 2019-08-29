<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title><?php echo wp_title('-', true, 'right') . get_bloginfo('name'); ?></title>

    <link href="<?php echo get_template_directory_uri(); ?>/assets/vendor/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">

    <?php wp_head(); ?>

    <?php if (getenv('ANALYTICS') == 1): ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo getenv('GOOGLE_ANALYTICS_ID'); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo getenv('GOOGLE_ANALYTICS_ID'); ?>');
        </script>
    <?php endif; ?>
</head>
<body <?php echo (is_front_page()) ? 'data-spy="scroll" data-target="#navigation" data-offset="150"' : ''; ?>>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 border-bottom shadow-sm fixed-top bg-light top-bar">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a class="text-dark" href="<?php bloginfo('url') ?>"><?php echo get_bloginfo('name'); ?></h5>

        <ul id="navigation" class="navbar navbar-light bg-light my-2 my-md-0 mr-md-3">
            <li class="nav-item">
                <a class="nav-link text-dark <?php echo (is_front_page()) ? 'active' : '' ?>" href="<?php echo (!is_front_page()) ? bloginfo('url') : null; ?>#about">About</a>
            </li>
            <!--
            <li class="nav-item interests-li">
                <a class="nav-link text-dark" href="<?php echo (!is_front_page()) ? bloginfo('url') : null; ?>#interests">Interests</a>
            </li>
            -->
            <li class="nav-item">
                <a class="blog-link text-dark <?php echo (!is_front_page()) ? 'active' : '' ?>" href="<?php echo get_permalink(get_page_by_path('blog')); ?>">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-primary" href="<?php echo (!is_front_page()) ? bloginfo('url') : null; ?>#contact">Contact</a>
            </li>
        </ul>
    </div>

    <main role="main">
