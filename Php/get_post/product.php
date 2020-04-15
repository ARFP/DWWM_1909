<?php
session_start(); // Démarrage d'une session PHP. Obligatoire pour accéder à la variable $_SESSION.

// $_SESSION est un tableau (array)
// Ici, on crée dans $_SESSION l'élément "products" qui est lui même un tableau (array)
// $_SESSION['products'] contiendra la liste des produits ajoutés via le formulaire de cette page
if(empty($_SESSION['products'])) {
    $_SESSION['products'] = [];
}
    
// $_GET contient les variables passées dans l'url (ie: ?nom=Mike)

// sont considérés "empty" :    null, '', [], 0, false
if (empty($_GET['nom'])) {
    // Si l'url ne contient pas le paramètre 'nom', on redirige l'utilisateur vers l'index.
    header('location: ./index.html');
    exit(); // exit obligatoire après un header('location...')
}

// Passé cette ligne, on sait que le paramètre 'nom' existe et n'est pas vide !

$nom = basename($_GET['nom']); // récupération du paramètre d'url 'nom' dans la variable $nom.

?>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP POST</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Bonjour <?= $nom; ?></h1>

    <form action="result.php" method="post">
        <input type="hidden" name="user_name" value="<?= $nom; ?>">
        <h2>Ajouter un produit</h2>
        <fieldset>
            <label for="product">Produit</label>
            <input type="text" id="product" name="product_name" value="" placeholder="Nom du produit" required>
        </fieldset>

        <fieldset>
            <label for="price">Prix</label>
            <input type="number" min="1" step="0.5" id="price" name="product_price" value="" placeholder="Prix du produit" required>
        </fieldset>

        <button type="submit">Valider</button>

    </form>

    <section>
        <h2>Liste des produits</h2>
        <?php
        //var_dump($_SESSION);
        // Parcours des produits ajoutés (voir result.php)
        foreach ($_SESSION['products'] as $product) {
            echo ('<p>'. $product['nom'] . ' à ' .  $product['prix'] . '€ ajouté par ' . $product['utilisateur']. '</p>');
        }
        ?>
    </section>
</body>

</html>