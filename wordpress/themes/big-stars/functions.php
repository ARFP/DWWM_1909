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
function bigstars_sidebars() {

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


