<?php

$string = "tranSISI";

function getLowercase(string $string)
{
    $split = str_split($string);
    $result = 0;

    for ($i=0; $i < count($split); $i++) { 
        if ($split[$i] === strtolower($split[$i])) {
            $result += 1;
        }
    }

    return $result;
}

echo "Terdapat " . getLowercase($string) . " huruf kecil pada kata " . $string;
