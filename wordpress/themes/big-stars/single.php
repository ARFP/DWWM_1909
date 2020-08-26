<?php
// chargement du fichier "header.php"
get_header();

if(have_posts()) {

    while(have_posts()) {
        the_post();
        ?>

        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_date(); ?></p>
            <?php the_content(); ?>
        </article>


        <?php
    } // fin du while
} // fin du if

// chargement du fichier "footer.php"
get_footer();