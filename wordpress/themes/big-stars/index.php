<?php
/**
 * index.php
 * Ce fichier est le fichier par défaut du thème (est appelé si aucun fichier spécifique n'existe pour le contenu demandé)
 * @see : https://wphierarchy.com/
 * 
 */

// chargement du fichier "header.php"
get_header();
?>

<section class="liste">
<h2>index.php</h2>

<?php

// La boucle wordpress
// // un post = un article ou une page

if(have_posts()) { // si un ou des post(s) est (sont) associé(s) à l'url demandé

    while(have_posts()) { // on boucle sur le(s) post(s) associé(s) à l'url demandé
        the_post(); // chargement des données du post en cours

        // le code suivant corespond à l'affichage d'1 post
        // les fonctions wordpress commençant par "the_" permettent d'afficher les données d'un post chargé par the_post()
        // les fonctions commençant par "the_" ne sont utilisables qu'à l'intérieur de la boucle wordpress
        // les utiliser à l'extérieur de cette boucle ne fonctionnera pas.
        // liste de toutes les fonctions wordpress : 
        //      https://codex.wordpress.org/fr:Fonctions_de_r%C3%A9f%C3%A9rence
        ?>

        <article>
            <?php the_date(); // date du post ?>
            <h2>
                <?php
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('thumbnail'); // afficher l'image de mise en avant au format "miniature"
                    }
                ?>
                <a href="<?php the_permalink(); // url du post ?>">
                    <?php the_title(); // titre du post ?>
                </a>
            </h2>
        </article>


        <?php
    } // fin du while
} // fin du if

?>

</section>

<?php


// chargement du fichier "footer.php"
get_footer();