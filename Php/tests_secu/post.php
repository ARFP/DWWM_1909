<?php

if (empty($_POST['name']) || empty($_POST['price'])) {
    exit('Aucune donnée');
}


require 'DbProducts.php';

$db = new DbProducts();


$product_id             = $_POST['product_id'] ?? '0';
$product_name           = $_POST['name'];
$product_price          = $_POST['price'];
$product_description    = $_POST['description'];


if(strlen($product_name) < 2 || strlen($product_name) > 50) {
    exit('error');
}


switch ($product_id) {

    case '0': // nouveau produit

        $result = $db->addProduct($product_name, $product_price, $product_description);

        break;
    default: // mise à jour produit existant

        $result = $db->updateProduct($product_id, $product_name, $product_price, $product_description);

        break;
}

sleep(1);

echo '<hr><a href="index.php">Home</a>';

//header('location: index.php');
