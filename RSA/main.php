<?php
require_once 'config.php';
require_once 'functions.php';

$nValue = P_VALUE*Q_VALUE;

$message = 'I love you!';

$messageAncii = convertStringToANCIIArr($message);

$eilerFunc = (P_VALUE-1)*(Q_VALUE-1);

$dValue = 0;

while(gmp_gcd($dValue,$eilerFunc) != 1)
{
	$dValue = mt_rand(1, $eilerFunc);
}

$eValue = calculateDValue($dValue, $eilerFunc);



echo 'Open Key: {' . $eValue . ', ' . $nValue . '}' . PHP_EOL;
echo 'Private Key: {' . $dValue . ', ' . $nValue . '}' . PHP_EOL;

echo PHP_EOL;

$encryptionResult = [];
$decryptionResult = [];

foreach($messageAncii as $anciiCode)
{
	$encryptionResult[] = $encryptedMessage = encryptMessage($anciiCode, $eValue, $nValue);
	$decryptionResult[] = $decryptedMessage = decryptMessage($encryptedMessage, $dValue, $nValue);
}

$encryptionResultMesage = convertANCIIArrToString($encryptionResult);
$decryptionResultMessage = convertANCIIArrToString($decryptionResult);

echo 'Original Message: ' . $message . PHP_EOL;
echo 'Encrypted message: ' . $encryptionResultMesage . PHP_EOL;
echo 'Decrypted message: ' . $decryptionResultMessage . PHP_EOL;

if($message === $decryptionResultMessage)
{
	echo PHP_EOL;
	echo 'GREAT WORK';
	echo PHP_EOL;
}