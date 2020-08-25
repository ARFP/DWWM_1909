<!DOCTYPE html>

<html lang='fr'>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php bloginfo('name'); ?></title>
    </head>
    <body>
        <h1>single.php</h1>
        <p><?php bloginfo('description'); ?></p>
        <p><?php bloginfo('url'); ?></p>
        <p><?php bloginfo('wpurl'); ?></p>
        <p><?php bloginfo('admin_email'); ?></p>

        <main>
            <?php

                if(have_posts()) {
                    
                    while(have_posts()) {
                        the_post();
                        ?>

                            <article>
                                <h2><?php the_title(); ?></h2>
                                <div>
                                    <?php the_content(); ?>
                                </div>
                            </article>
                            

                        <?php
                    }

                }
                else {
                    echo 'Contenu indisponible';
                }
            ?>
        </main>
    </body>
</html>
