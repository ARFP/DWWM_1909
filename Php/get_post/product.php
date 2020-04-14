<?php
session_start();
// $nom = $_GET['nom'] ?? null;
// null, '', [], 0, false
if (empty($_GET['nom'])) {
    header('location: ./index.html');
    exit();
}

$nom = basename($_GET['nom']);

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

        foreach ($_SESSION['products'] as $product) {
            echo ('<p>'. $product['nom'] . ' à ' .  $product['prix'] . '€ ajouté par ' . $product['utilisateur']. '</p>');
        }
        ?>
    </section>
</body>

</html>