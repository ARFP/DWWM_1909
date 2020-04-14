<?php

?>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP POST</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Bonjour </h1>

    <form action="result.php" method="post">
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
    </section>
</body>
</html>