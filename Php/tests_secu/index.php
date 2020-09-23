<?php
require 'DbProducts.php';

$db = new DbProducts();

if (!empty($_POST)) {
    require 'post.php';
    exit;
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Products</title>
    <link rel="stylesheet" href="style.css?<?=$_SERVER['REQUEST_TIME']; ?>">
</head>

<body>

    <header>
        <h1><a href="index.php">Products</a></h1>
    </header>

    <main>

        <table>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>DESCRIPTION</th>
            </tr>

            <?php
            $products = $db->getProducts();

            foreach ($products as $p) {

                echo '<tr>';
                echo '<td>' . $p['id'] . '</td>';
                echo '<td><a href="?product=' . $p['id'] . '">' . $p['name'] . '</a></td>';
                echo '<td>' . $p['price'] . '</td>';
                echo '<td>' . $p['description'] . '</td>';
                echo '</tr>';
            }
            ?>

        </table>

        <hr>

        <h2>Product Form</h2>

        <form action="post.php" method="post">

            <?php
            $product_id = $_GET['product'] ?? 0;

            $product = (!empty($product_id) ? $db->getProduct($_GET['product']) : []);
            ?>

            <h3><?= ($product_id != '0' ? 'Product #' . $product_id : 'New product'); ?></h3>

            <input type="hidden" name="product_id" value="<?= $product_id; ?>">

            <fieldset>
                <legend>Product information</legend>

                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?=($product['name'] ?? ''); ?>" placeholder="Product Name" pattern=".{2,50}" title="2 lettres minimum" required>
                <br>
                <label for="price">Price</label>
                <input type="number" id="price" name="price" value="<?=($product['price'] ?? '19.99'); ?>" step="0.01">
                <br>
                <label for="description">Description</label>
                <textarea id="description" name="description" value="<?=($product['description'] ?? ''); ?>" placeholder="Product Description"></textarea>
            </fieldset>

            <button type="submit">Save</button>

        </form>

    </main>

</body>

</html>