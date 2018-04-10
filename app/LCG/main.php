<?php
require_once 'config.php';
require_once 'NumbersGenerator.php';

$generator = new NumbersGenerator(A_VALUE, C_VALUE, M_LENGTH, T0_VALUE);

$originalArr = [];
$encodedArr = [];
$resultArr = [];

for ($charIdx = 0; $charIdx < M_LENGTH; $charIdx++){
    $originalArr[] = SURNAME_4_LETTERS[$charIdx];
    $encodedArr[] = (int)gmp_xor(ord(SURNAME_4_LETTERS[$charIdx]), $generator->getValue());
}

$generator = new NumbersGenerator(A_VALUE, C_VALUE, M_LENGTH, T0_VALUE);

for ($charIdx = 0; $charIdx < M_LENGTH; $charIdx++){
    $resultArr[] = chr((int)gmp_xor($encodedArr[$charIdx], $generator->getValue()));
    $encodedArr[$charIdx] = chr($encodedArr[$charIdx]);
}

echo PHP_EOL;
echo 'Original message: ' . implode('', $originalArr) . PHP_EOL;
echo 'Encoded message: ' . implode('', $encodedArr) . PHP_EOL;
echo 'Decoded message: ' . implode('', $resultArr) . PHP_EOL;
echo PHP_EOL;