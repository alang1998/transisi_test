<?php

$arrLetters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

$string = 'DFHKNQ';

function encrypt(string $string, array $arrLetters)
{
    $encrypt = '';
    $arrString = str_split($string);
    foreach($arrString as $key => $string) {
        $index = $key+1;
        $search = array_search(strtolower($string), $arrLetters);
        
        if ($index % 2 == 0) {
            if ($search - $index > 25) {
                $encrypt .= $arrLetters[$search - $index - 26];
            } else if ($search - $index < 0) {
                $encrypt .= $arrLetters[$search - $index + 26];
            } else {
                $encrypt .= $arrLetters[$search - $index];
            }
        } else {
            if ($search + $index > 25) {
                $encrypt .= $arrLetters[$search + $index - 26];
            } else if ($search + $index < 0) {
                $encrypt .= $arrLetters[$search + $index + 26];
            } else {
                $encrypt .= $arrLetters[$search + $index];
            }
        }
    }

    return strtoupper($encrypt);
}

echo encrypt($string, $arrLetters);