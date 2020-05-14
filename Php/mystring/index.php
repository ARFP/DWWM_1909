<?php
/**
 * Programme MyString
 * Test de la classe MyString
 */
require 'MyString.php';

$monObjet = new MyString("HeLLo éverybody, welCome to PHP 7 !");

echo $monObjet."\n";

echo $monObjet->charAt(17);
echo "\n";
echo $monObjet->charAt(1337);
echo "\n";
echo $monObjet->indexOf('y');
echo "\n";
echo $monObjet->substring(3, 17);
echo "\n";
var_dump($monObjet->split(','));
echo "\n";
echo $monObjet->toLowerCase();
echo "\n";
echo $monObjet->toUpperCase();
echo "\n";
echo $monObjet->toTitle();
