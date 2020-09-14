</main>

<footer>
<?php 
    // chargement de la sidebar dont l'id est "bigstars-secondaire"
    // fonctionne si le support des widgets est activé dans functions.php 
    dynamic_sidebar('bigstars-secondaire'); 

    if(has_nav_menu('menu-footer')) {
        wp_nav_menu([
            'theme_location' => 'menu-footer', // identifiant du menu (theme location)
            'menu_class' => 'bigstars-menu', // classe css associée au menu
        ]);
    }
?>
<p>
    &copy; Moi 2020
</p>
</footer>

<?php
    wp_footer();
?>
</body>
</html>