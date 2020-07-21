<?php 

/**
 * CLASS Loader
 * Autochargement de classes
 */
class Loader
{
    /**
     * Chargement automatique de classes (PSR4)
     * @see https://www.php-fig.org/psr/psr-4/
     */
    public static function autoload($className)
    {
        $className = str_replace('\\' , DIRECTORY_SEPARATOR , $className); // Remplacement des "\" par des "/"

        $className = __DIR__.'/'.$className.'.php'; // construction du chemin vers le fichier (le nom du fichier correspond au nom de la classe)

        if(is_file($className)) { // Si le fichier existe
            require_once $className;
        }
    }
}

// Enregistrement de la méthode Loader::autoload dans la pile de chargement automatique de PHP
spl_autoload_register('Loader::autoload');
