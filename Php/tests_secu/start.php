<?php
/**
 * Affiche une variable suivie d'une barre horizontale.
 * @var $var la variable à afficher
 */
function display($var)
{
    echo $var.'<hr>';
}

// Entrée utilisateur
$input = "<script>alert('Hello world');</script>";

display($input);



// supprime les chevrons < > et les quotes ' " et les remplace par leur entité HTML
$input_specialchars = htmlspecialchars($input);

display($input_specialchars);



// convertit tous les caractères spéciaux en leur équivalent "entité HTML"
$input_entities = htmlentities($input);

display($input_entities);



// supprime les balises XML et HTML
$input_strip_tags = strip_tags($input);

display($input_strip_tags);




// Entrée utilisateur
$input = "../wp-1909/wp-config.php";

display($input);



// supprime toute notion de "chemin" (url, uri, chemin local)
$input = basename($input);

display($input);

?>