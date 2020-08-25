<!DOCTYPE html>

<html lang='fr'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php bloginfo('name'); // Le titre du blog ?></title>
    </head>
    <body>
        <h1>index.php</h1>
        <p><?php bloginfo('description'); // le slogan du blog ?></p>
        <p><?php bloginfo('url'); // l'url du blog ?></p>
        <p><?php bloginfo('wpurl'); // l'url du blog ?></p>
        <p><?php bloginfo('admin_email'); // l'adresse email de l'administrateur ?></p>

        <main>
            <?php
            // la boucle wordpress
            // https://codex.wordpress.org/fr:La_Boucle
            // https://www.youtube.com/watch?v=8AoGETGUbh0
            // un post = un article ou une page

                if(have_posts()) { // si des posts sont associés à l'url demandé
                    
                    while(have_posts()) { // on boucle sur le(s) post(s) associé à l'url demandé
                        the_post(); // chargement du prochain post
                        ?>

                            <article>
                                <h2>
                                    <a href="<?php the_permalink(); // lien vers le contenu ?>">
                                        <?php the_title(); // le titre du post ?>
                                    </a>
                                </h2>
                            </article>
                            

                        <?php
                    }

                }
                else { // si aucun post n'a été trouvé
                    echo 'Contenu indisponible';
                }
            ?>
        </main>
    </body>
</html>
