<?php

$value = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
$array = explode(" ", $value);
$range = 7;
sort($array);

function getAverage(array $array)
{
    $avg = array_sum($array) / count($array);
    return $avg;
}

function getMax(array $array, int $range)
{
    $max = implode(", ", array_slice(array_reverse($array), 0, $range));
    return $max;
}

function getMin(array $array, int $range)
{
    $min = implode(", ", array_slice($array, 0, $range));
    return $min;
}

echo "String nilai: " . $value . "<br>";
echo "Nilai rata-rata: " . getAverage($array) . "<br>";
echo $range. " Nilai tertinggi: " . getMax($array, $range) . "<br>";
echo $range. " Nilai terendah: " . getMin($array, $range) . "<br>";

