<?php

function debug($var = null)
{
    echo gettype($var).' = '.var_export($var, true);
    echo '<hr>';
}

$input = null;

debug($input);

echo $input;