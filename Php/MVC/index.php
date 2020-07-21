<?php

// fonction de debogage (affiche le contenu d'une variable, peu importe son type)
function d($var) {
    echo '<pre>'.var_export($var, true).'</pre>';
}

require 'Loader.php';

$route = new Route('/immochateau_mvc/');

d($route);

d($_SERVER);

exit;
