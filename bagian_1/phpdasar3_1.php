<?php 

$arr = [
    ['f', 'g', 'h', 'i'],
    ['j', 'k', 'p', 'q'],
    ['r', 's', 't', 'u']
];

function search(array $arr, string $input)
{
    $currentPosition = [];
    $strings = str_split($input);

    foreach ($strings as $str) {
        foreach ($arr as $row => $value) {
            $col = array_search($str, array_column($value, null));
            if ($col !== false) {
                if (!getPosition($currentPosition, [$row, $col])) {
                    return false;
                }
                $currentPosition = [$row, $col];
            }
        } 
    }
    return true;
}

function getPosition(array $current, array $forward)
{
    if (empty($current)) {
        return true;
    }
    // Right
    if ([$current[0], $current[1]+1] == $forward) {
        return true;
    }
    // Left
    if ([$current[0], $current[1]-1] == $forward) {
        return true;
    }
    // Up
    if ([$current[0]+1, $current[1]] == $forward) {
        return true;
    }
    // Down
    if ([$current[0]-1, $current[1]] == $forward) {
        return true;
    }

    return false;
}

$result = array();
$arrayString = ['fghi', 'fghp', 'fjrstp', 'fghq', 'fst', 'pqr', 'fghh'];

foreach ($arrayString as $string) {
    $result[$string] = search($arr, $string);
}

var_dump($result);

?>