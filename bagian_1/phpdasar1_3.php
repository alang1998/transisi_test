<?php
	$input = 'jakarta adalah ibukota negara republik indonesia';
    $arrayInput = explode(' ', $input);

	function createUBT(array $arrayInput, int $gram)
	{
		$x = 1;
		$result = '';
		foreach ($arrayInput as $item) {
			if ($x < $gram) {
				$result .= $item.' ';
				$x++;
			} else {
				$result .= $item.', ';
				$x = 1;
			}
		}
		$result = substr($result, 0, -2);

        return $result;
	}

	echo "Unigram : " . createUBT($arrayInput, 1) . "<br>";
	echo "Bigram : " . createUBT($arrayInput, 2) . "<br>";
	echo "Trigram : " . createUBT($arrayInput, 3) . "<br>";