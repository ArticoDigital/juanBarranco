<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php the_title(); ?> </title>

    <meta name="description" content="<?php bloginfo('description'); ?>"/>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500,500i,700,700i,900,900i" rel="stylesheet">
    <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/assets/images/favicon.ico">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/style.css">

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">-->

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-urlBody="<?php bloginfo('url') ?>">
<header class="Header">
    <a href="<?php bloginfo('url') ?>">
        <figure>
            <img src=" <?php bloginfo('template_url') ?>/assets/images/logo-juanBarranco.svg" alt="">
        </figure>
    </a>
</header>
<div class="menu-navButtonContent row end" >
    <div class="menu-navButton" id="MenuNav">
        <span></span>
        <span></span>
        <span></span>
    </div>

</div>
<ul class="flags-languages"><?php pll_the_languages();?></ul>
<div class="content-menu center">
    <?php wp_nav_menu(array('theme_location' => 'menuHeader', 'container' => 'nav')) ?>
</div>


<main>


