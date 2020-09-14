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




function wpm_custom_post_type(){

    //D'abord les infos qui seront affichées dans le panneau d'admin

    $labels = [
        //Nom singulier
        'name'              => _x('galaxie', 'Post Type General Name'),
        'singular_name'     => _x('galaxies', 'Post Type Singular Name'), // _x fonction qui permet de traduire grace aux fichiers 'PO', fonctionne également avec
        //Libeleé dans le menu                                               __(, _e, et _n                                   
        'menu_name'         => __('Les galaxies'),
        //Pour les différentes actions que l'on peut faire dans le panneau d'admin (à vérif)
        'all_item'          => __('Toutes les galaxies'),
        'view-item'         => __('Voir les galaxies'),
        'add_new_item'      => __('Ajouter une nouvelle galaxie'),
        'add_new'           => __('Ajouter une galaxie'),
        'edit_item'         => __('Editer une étoile'),
        'uptdate_item'      => __('Modifier une étoile'),
        'search_item'       => __('Rechercher la couleur d\'une galaxie'),
        'not_found'         => __('Non trouvée'),
        'not_found_in_trash'=> __('Non trouvée dans la corbeille'),
    ];

    $args = array(
        'label'             => __( 'Les galaxies'),
        'description'       => __( 'Toutes les galaxies de l\'univers'),
        'labels'            => $labels,
        'menu_icon'         => 'dashicons-star-filled', // pour l'incône du menu ->> https://developer.wordpress.org/resource/dashicons/#editor-video
        // sert a définir le titre, l'éditeur, auteur, mais comment voir ça ? )
        'supports'          => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        /* 
        * Différentes options supplémentaires
        */
        'show_in_rest'      => true,
        'hierarchical'      => false,
        'public'            => true,
        'has_archive'       => true,
        'rewrite'			=> array( 'slug' => 'galaxies'),

    );

    register_post_type( 'galaxies', $args );

}

//Pour rajouter le support des tag de titres
add_action( 'init', 'wpm_custom_post_type', 0 );


/** MENU */
/* ajouter 1 seul "emplacement" de menu  
function bigstars_menus()
{
    register_nav_menu('menu-bigstars',  __('Menu Bigstars'));
}

add_action('init', 'bigstars_menus');

*/

/* ajouter plusieurs "emplacements" de menu */
function bigstars_menus()
{
    register_nav_menus([
        'menu-bigstars' => __('Menu Bigstars'),
        'menu-footer' => __('Menu footer'),
    ]);
}

add_action('init', 'bigstars_menus');