<?php
session_start();

if(empty($_POST['product_name']) || empty($_POST['product_price'])  || empty($_POST['user_name']) ) {
    header('location: ./product.php');
    exit;
}

$user_name = $_POST['user_name'];
$product_name = $_POST['product_name'];
$product_price = intval($_POST['product_price']);


if($product_price < 1) {
    header('location: ./product.php');
    exit;
}

// echo $product_name . ' ' . $product_price;

$newproduct = array(
    'nom' => $product_name,
    'prix' => $product_price,
    'utilisateur' => $user_name
);

$_SESSION['products'][] = $newproduct;

$_SESSION['products_count'] = count($_SESSION['products']);

header('location: ./product.php?nom='.$user_name.'');

?>