<?php
session_start(); // voir product.php

// on vérifie que les champs du formulaire de product.php ont été renseignés
if(empty($_POST['product_name']) || empty($_POST['product_price'])  || empty($_POST['user_name']) ) {
    header('location: ./product.php');
    exit;
}

$user_name = $_POST['user_name']; // nom d'utilisateur fourni dans le formulaire de index.html
$product_name = $_POST['product_name']; // nom du produit fourni dans le formulaire de product.php
$product_price = intval($_POST['product_price']); // prix du produit fourni dans le formulaire de product.php (converti en entier grace à la fonction intval())


if($product_price < 1) { 
    // Si le prix du produit est inférieur à 1, on redirige vers product.php
    header('location: ./product.php');
    exit;
}

// on construit un tableau qui représente 1 produit et on y injecte les variables récupérées ci-dessus
$newproduct = array(
    'nom' => $product_name,
    'prix' => $product_price,
    'utilisateur' => $user_name
);

// ajout du nouveau produit à la session
$_SESSION['products'][] = $newproduct;

// nombre de produits au total dans la session
$_SESSION['products_count'] = count($_SESSION['products']);

// redirection vers la page product
header('location: ./product.php?nom='.$user_name.'');
exit;