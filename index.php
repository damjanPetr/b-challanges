<?php

// PART 1
echo "<h3>Part 1</h3>";

function decimal_to_bin($arg)
{
    $binaryString = '';
    while ($arg >= 1) {
        if ($arg < 1) {
            break;
        }
        $s = ($arg % 2) ? '1' : '0';
        $binaryString = $s . $binaryString;
        $arg = $arg / 2;
    }
    return $binaryString;
}

echo "Delimal to binary " . decimal_to_bin(155);

echo "<hr>";

function decimal_to_roman($num)
{
    $returnValue = '';
    $map = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    while ($num > 0) {
        foreach ($map as $roman => $value) {
            if ($num >= $value) {
                $num -= $value;
                $returnValue .= $roman;
            }
        }

    }
    return $returnValue;

}

echo "Delimal to roman " . decimal_to_roman(10);
echo "<hr>";
// PART 2
echo "<h3>Part 2</h3>";
// function binary_to_decimal($num)
// {
//     return
// };


function binary_to_roman($roman)
{
    $roman = strval($roman);
    // var_dump($roman);
    $map = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    $result = 0;
    foreach ($map as $key => $value) {
        while (strpos($roman, $key) === 0) {
            $result += $value;
            $roman = substr($roman, strlen($key));
        }

    }
    return $result;

}
echo "Roman to binary " . binary_to_roman(1010110);
echo "<hr>";

// PART 3
echo "<h3>Part 3</h3>";
echo "<hr>";

?>