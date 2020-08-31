<?php
/**
 * single.php 
 * Affichage d'un "post" unique
 */

// chargement du fichier "header.php"
get_header();
?>
<p>single.php</p>

<section class="single">

<?php

if(have_posts()) {

    while(have_posts()) {
        the_post();
        ?>

        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_date(); ?></p>
            <figure>
                <?php
                    // afficher l'image de mise en avant si elle existe
                    if(has_post_thumbnail()) {
                        //the_post_thumbnail(); // pas de paramètre = grande taille
                        //the_post_thumbnail('large'); // image grande taille
                        the_post_thumbnail('medium'); // image taille moyenne
                        //the_post_thumbnail('thumbnail'); // image miniature
                    }                  
                ?>
            </figure>
            <div>
            <?php 
               the_content(); // affichage de l'article 
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