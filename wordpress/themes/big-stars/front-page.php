<?php
/**
 * front-page.php 
 * fichier correspondant à la page d'accueil du site
 * Selon la configuration de wordpress (règlages->lecture), 
 * ce fichier affichera soit les derniers articles, soit la page statique choisie.
 */
// chargement du fichier "header.php"
get_header();
?>

<section class="liste">
<h2>front-page.php</h2>

<?php

if(have_posts()) {

    while(have_posts()) {
        the_post();
        ?>

        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_date(); ?></p>
            <div>
                <?php
                    // afficher l'image de mise en avant si elle existe
                    if(has_post_thumbnail()) {
                        //the_post_thumbnail(); // pas de paramètre = grande taille
                        //the_post_thumbnail('large'); // image grande taille
                        //the_post_thumbnail('medium'); // image taille moyenne
                        the_post_thumbnail('thumbnail'); // image miniature
                    }

                                        
                ?>
            </div>
            <div>
            <?php 
               // the_content(); 
            ?>
            </div>
        </article>


        <?php
    } // fin du while
} // fin du if

?>

</section>

<?php

// chargement du fichier "footer.php"
get_footer();