<?php

/**
 * functions.php
 * Ce fichier permet de définir les fonctionnalités de notre thème
 * 
 */

// activer la fonctionnalité 'image de mise en avant' (post thumbnail) pour notre thème
// écrivez ci-dessous le code permettant d'activer cette fonctionnalité 
add_theme_support('post-thumbnails');



// activer la gestion des widgets
// Rechercher: "wordpress register_sidebar" ou "wordpress add widget support" dans un moteur de recherche

/**
 * bigstars_sidebars
 * Déclaration de nos "sidebar".
 * Une sidebar" contient des widgets
 * Une fois qu'une sidebar (ou plus) est délcarée, on peut y ajouter des widgets
 * Direction le back-office sous le menu "Apparence -> widgets"
 */
function bigstars_sidebars()
{
    // Déclaration d'une sidebar dont l'identifiant (id) est bigstars-principal
    register_sidebar([
        'name' => 'Principal',
        'id' => 'bigstars-principal',
        'description' => 'Ma sidebar principale',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',

    ]);

    // Déclaration d'une sidebar dont l'identifiant (id) est bigstars-secondaire
    register_sidebar([
        'name' => 'Secondaire',
        'id' => 'bigstars-secondaire',
        'description' => 'Ma sidebar secondaire',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',

    ]);
}

// add_action permet d'exécuter des fonction à un instant T du chargement de wordpress
// https://codex.wordpress.org/Plugin_API/Action_Reference
// Notre fonction bigstars_sidebars() sera exécutée au moment de l'initialisation des widgets
add_action('widgets_init', 'bigstars_sidebars');


/** CUSTOM POST TYPES */

function bigstars_custom_post_type()
{
    $labels = [
        'name'              => 'galaxie',
        'all_items'          => 'Toutes les galaxies',
        'singular_name'     => 'galaxie',
        // Menu Admin                                  
        'menu_name'         => 'Les galaxies',
        'add_new_item'      => 'Ajouter une nouvelle galaxie',
        'edit_item'         => 'Editer une galaxie',
    ];

    $args = array(
        'rewrite'            => array('slug' => 'galaxies'),
        'labels'            => $labels,
        'label'             => 'Galaxies',
        'description'       => 'Les galaxies de l\'univers',
        'menu_icon'         => 'dashicons-star-filled',
        'show_in_rest'      => true,
        'public'            => true,
        'has_archive'       => true,
        'supports'          => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields',),
    );

    register_post_type('galaxies', $args);

    
    $taxonomy_labels = [
        'name' => 'Type de galaxie',
        'new_item_name' => 'Nouveau type',
    ];

    $taxonomy_args = [
        'labels' => $taxonomy_labels,
        'public' => true,
        'show_in_rest' => true, 
    ];

    register_taxonomy('galaxies-type', 'galaxies', $taxonomy_args);

}

//Pour rajouter le support des tag de titres
add_action('init', 'bigstars_custom_post_type', 0);





/** MENU */

/* ajouter plusieurs "emplacements" de menu */
function bigstars_menus()
{
    register_nav_menus([
        'menu-bigstars' => __('Menu Bigstars'),
        'menu-footer' => __('Menu footer'),
    ]);
}

add_action('init', 'bigstars_menus');

/* ou pour ajouter 1 seul "emplacement" de menu  
function bigstars_menus()
{
    register_nav_menu('menu-bigstars',  __('Menu Bigstars'));
}
add_action('init', 'bigstars_menus');
*/
