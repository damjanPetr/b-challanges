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

echo "Decimal to binary " . decimal_to_bin(55);
echo "<br>";
function decimal_to_roman($num, $convertLimit = 3999999)
{
    if ($num <= $convertLimit) {
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
    } else {
        return ": FUNCTION ERROR  $num is bigger than $convertLimit";
    }

}

echo "Delimal to roman " . decimal_to_roman(15);
echo "<hr>";
// PART 2
echo "<h3>Part 2</h3>";
function binary_to_decimal($arg)
{

    $array = str_split($arg); // make array
    $array = array_reverse($array); // reverse array

    $i = 0; // index
    $num = 0;
    foreach ($array as $values) {
        $ans = $values * pow(2, $i);
        $num += $ans;
        $i++;
    }

    return $num;


}
;

echo "Binary to decimal " . binary_to_decimal(10011011);
echo "<br>";
function roman_to_decimal($arg)
{
    $roman = strval($arg);
    // var_dump($roman);
    $result = 0;
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

    foreach ($map as $key => $value) {
        while (strpos($roman, $key) === 0) {
            $result += $value;
            // var_dump(strlen($key));           
            $roman = substr($roman, strlen($key));

        }

    }
    return $result;

}
echo "Roman to decimal " . roman_to_decimal("XV");
echo "<hr>";

// PART 3
echo "<h3>Part 3</h3>";

function checkType($arg)
{

    $type = '';
    // Check decimal 
    if (is_numeric($arg) && floor($arg) != $arg) {
        $type = 'decimal';
    }
    // Check binary 
    elseif (preg_match("/^[01]+$/", $arg)) {
        $type = 'binary';
    }
    // Check Roman 
    elseif (preg_match("/^[IVXLCDM]+$/", $arg)) {
        $type = "roman";
    } else {
        $type = "decimal";
    }
    echo "<hr>";
    echo "Number is $arg and is of type: $type. ";
    echo "<br>";

    // var_dump($type);
    if ($type == 'decimal') {
        echo 'Decimal to binary ' . decimal_to_bin($arg);
        echo "<br>";
        echo 'Decimal to roman ' . decimal_to_roman($arg);
    } elseif ($type == 'binary') {
        echo 'Banary to Decimal ' . binary_to_decimal($arg);
        echo "<br>";
        echo 'Binary to Roman ' . decimal_to_roman(binary_to_decimal($arg));
        echo "<br>";
    } elseif ($type == 'roman') {
        echo 'Roman to decimal ' . roman_to_decimal($arg);
        echo "<br>";
        echo 'Roman to binary ' . decimal_to_bin(roman_to_decimal($arg));
        echo "<br>";

    }


    return "Number is $type";
}

// echo "<hr>";
// 
// echo "Roman test " . checkType("X");
// echo "<br>";
// echo "binary test " . checkType(10000);
// echo "<br>";
// echo "decimal test " . checkType(39999990);


$typeArray = [
    "IILX",
    '01000101',
    741,
    "VLV",
    '01010100',
    '010101',
    71,
    '01110101',
    "DLX",
    131,
    "XCX",
    841,
    4,
];

foreach ($typeArray as $item) {
    checkType($item);
}




?>