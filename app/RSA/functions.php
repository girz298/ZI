<?php

function calculateDValue($eValue, $eilerFunc)
{
	$i = 0;
	while(true){
//		$result = bcmod(bcmul($i,$eValue), $eilerFunc);
		$result =  ($i*$eValue)%$eilerFunc;
		if($result == 1 && $i != $eValue)
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