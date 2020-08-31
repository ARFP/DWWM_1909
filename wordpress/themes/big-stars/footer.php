</main>

<footer>
<?php 
    // chargement de la sidebar dont l'id est "bigstars-secondaire"
    // fonctionne si le support des widgets est activé dans functions.php 
    dynamic_sidebar('bigstars-secondaire'); 
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