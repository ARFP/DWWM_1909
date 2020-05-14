<?php

require 'Person.php';

$julien = new Person('LeDeveloppeur', 'Julien');

$bilel = new Person('LeSuperDeveloppeur', 'Bilel');


echo $julien->getInfos();

echo $bilel->getInfos();

echo "\n---\n\n";

$julien->setLastname('ThePHPDev');

echo $julien->getInfos();

echo $bilel->getInfos();

echo "\n---\n\n";



// string, int, float, bool, array = non objet


//echo '<p>Hello World</p>';
