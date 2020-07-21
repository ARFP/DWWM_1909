<?php
/**
 * Représente une route MVC
 */
class Route
{
    /** @var string $httpMethod La méthode HTTP utilisée par la requête en cours. */
    public $httpMethod;

    /** @var string $controller Le contrôleur à instancier */
    public $controller;

    /** @var string $action la méthode à exécuter dans le contrôleur  */
    public $action;

    /** @var string $id Les données à envoyer en paramètre de la méthode du contrôleur à exécuter  */
    public $id;


    /**
     * Constructeur de la classe Route
     * @param string $chemin Le chemin relatif du site par rapport au domaine
     * Exemple
     * Pour l'url "http://localhost/immo_du_chateau/", "/immo_du_chateau/" est le chemin relatif par rapport au domaine "localhost".
     * Si le site est directement sur le domaine (ex: mondomaine.fr), laisser vide.
     */
    public function __construct(string $chemin = '')
    {        
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET'; // Méthode HTTP utilisée (GET, POST...)

        $url = str_replace($chemin, '', $_SERVER['REQUEST_URI']); // Si le site se trouve dans un sous-répertoire du domaine, on suprime le chemin associé
        $url = explode('/' ,  $url);

        $this->controller   = $url[0] ?? 'accueil'; // 1ère partie de l'url = nom du contrôleur
        $this->action       = $url[1] ?? 'index';   // 2ème partie de l'url = méthode du contrôleur à exécuter
        $this->id           = $url[2] ?? '';        // 3ème partie de l'url = une donnée transmise à la méthode du contrôleur
    }

    /**
     * Exécute la route actuelle.
     */
    public function run()
    {
        try 
        {
            $this->controller   = basename($this->controller); // (basename() supprime toute notion de chemin dans une chaine de caractères
            $this->action       = basename($this->action);
            $this->id           = basename($this->id);

            $controllerName = ('Controllers\\' . $this->controller); // Nom du contrôleur à invoquer

            $controller = new $controllerName(); // Instanciation du contrôleur $controllerName. Si le contrôleur n'existe pas (erreur), on rentre dans le catch.

            if(!method_exists($controller, $this->action)) {    // On vérifie que this->action correspond à une méthode du contrôleur
                exit('404 : Action non trouvée');               // Si méthode non trouvée, on dégage !
            }

            $result = $controller->{$this->action}($this->id); // Exécution de la méthode demandée, les méthodes du contrôleur renvoient une Vue (View)

            return $result; // On retourne le résultat (la vue)
        } 
        catch (Exception $e) 
        {
            exit('404 : Contrôleur non trouvé.'); // Si le contrôleur n'est pas trouvé, on arrive ici et on dégage.
        }
    }

    
}