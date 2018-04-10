<?php
require_once 'config.php';
require_once 'functions.php';

$nValue = P_VALUE*Q_VALUE;

$messageAncii = convertStringToANCIIArr(MESSAGE);

$eilerFunc = (P_VALUE-1)*(Q_VALUE-1);

if(P_VALUE === Q_VALUE)
{
	$eilerFunc = P_VALUE*(P_VALUE-1);
}

$eValue = 0;

while(gmp_gcd($eValue,$eilerFunc) != 1)
{
	$eValue = mt_rand(2, $eilerFunc);
}

$dValue = calculateDValue($eValue, $eilerFunc);

echo PHP_EOL;

echo 'Open Key: {' . $eValue . ', ' . $nValue . '}' . PHP_EOL;
echo 'Private Key: {' . $dValue . ', ' . $nValue . '}' . PHP_EOL;

echo PHP_EOL;

$encryptedMessage = encryptMessage(MESSAGE, $eValue, $nValue);
$decryptedMessage = decryptMessage($encryptedMessage, $dValue, $nValue);

echo 'Original Message: ' . MESSAGE . PHP_EOL;
echo 'Encrypted message: ' . $encryptedMessage . PHP_EOL;
echo 'Decrypted message: ' . $decryptedMessage . PHP_EOL;

echo PHP_EOL;