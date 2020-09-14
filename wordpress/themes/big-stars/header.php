<!DOCTYPE html>

<html lang='fr'>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); // Le titre du blog ?></title>

    <?php wp_head(); ?>


    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

</head>
<body>
    <header>
        <img src="<?=bloginfo('template_url'); ?>/img/logo.png" />
        <h1><?php bloginfo('name'); // Le titre du blog ?></h1>
        <h2><?php bloginfo('description'); // Le titre du blog ?></h2>
                    
            <?php
                if(has_nav_menu('menu-bigstars')) {
                    wp_nav_menu([
                        'theme_location' => 'menu-bigstars', // identifiant du menu (theme location)
                        'menu_class' => 'bigstars-menu', // classe css associée au menu
                    ]);
                }
                
            ?>
        
        <nav>
            
        </nav>
    </header>
    
    <main>

