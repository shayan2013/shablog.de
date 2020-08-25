<?php
function substError() {
	$errorTxt = '26 Zeichen zum Beispiel : yhkqgvxfoluapwmtzecjdbsnri';
	return $errorTxt;
}

	
	function substitutionBeschreibung() {
		$beschreibung = 'Bei dem wird ein festes Schlüsselalphabet für die Verschlüsselung verwendet.';
		return $beschreibung;
	}
function Cipher($text, $oldAlphabet, $newAlphabet, &$output)
{
	$output = "";
	$textLen = strlen($text);

	if (strlen($oldAlphabet) != strlen($newAlphabet))
		return false;

	for ($i = 0; $i < $textLen; ++$i)
	{
		$oldCharIndex = strpos($oldAlphabet, strtolower($text[$i]));

		if ($oldCharIndex !== false)
			$output .= ctype_upper($text[$i]) ? strtoupper($newAlphabet[$oldCharIndex]) : $newAlphabet[$oldCharIndex];
		else
			$output .= $text[$i];
	}

	return $output;
}

function substVer($text, $key, &$output)
{
	$plainAlphabet = "abcdefghijklmnopqrstuvwxyz";
	return Cipher($text, $plainAlphabet, $key, $output);
}

function substEnt($text, $key, &$output)
{
	$plainAlphabet = "abcdefghijklmnopqrstuvwxyz";
	return Cipher($text, $key, $plainAlphabet, $output);
}

function substKeyTest($k) {
	if ((is_string($k)) && (preg_match("/^[a-zA-Z ]*$/",$k)) && (strlen($k) == 26))  {
		return true;
	} else {
		return false;
	}
}


function substitutionPruefer($txt, $key, $verEnt) {
	$output = "";
	if (!(substKeyTest($key))) {
		return substError();
	}
		if ($verEnt == "verschluesseln") {
			try {
				return substVer($txt, $key, $output);
			} catch (Exception $e) {
				echo "Verschlüsselung fehlgeschlagen ", $e->getMessage(), "\n";
			}
		} else if ($verEnt == "entschluesseln") {
			try{
				return substEnt($txt, $key, $output);
			} catch (Exception $e) {
				echo "Entschlüsselung fehlgeschlagen ", $e->getMessage(), "\n";
			}
		}			

}


?>