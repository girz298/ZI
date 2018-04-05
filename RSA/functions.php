<?php

function calculateDValue($randValue, $eilerFunc)
{
	$i = 0;
	while(true){
		$result = ($i*$randValue)%$eilerFunc;
		if($result === 1)
		{
			return $i;
		}
		$i++;
	}
	return 0;
}

function encryptMessage($message, $eValue, $nValue)
{
	return bcpowmod($message, $eValue, $nValue);
}

function decryptMessage($message, $dValue, $nValue)
{
	return bcpowmod($message, $dValue, $nValue);
}

function convertStringToANCIIArr($string)
{
	$result = [];

	for($i = 0; $i<strlen($string); $i++)
	{
		$result[] = ord($string[$i]);
	}

	return $result;
}

function convertANCIIArrToString(array $anciiArr)
{
	$result = [];

	foreach($anciiArr as $anciiCode)
	{
		$result[] = chr($anciiCode);
	}

	return implode('', $result);
}