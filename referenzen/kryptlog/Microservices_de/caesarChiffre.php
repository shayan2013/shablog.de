<?php
	function caesarError() {
		$errorTxt = 'nur Zahlen zwieschen 1 und 51 eingeben!';
		return $errorTxt;
	}
	
	function caesarBeschreibung() {
		$beschreibung = 'Caesar-Chiffre ist ein Verfahren indem die Buchstaben abhängig vom Schlüssel vertauscht werden';
		return $beschreibung;
	}
	
	function caesarKeyTest($key) {
		if (!filter_var($key, FILTER_VALIDATE_INT) === false) {
			try {
				$key %= 52;	
			} catch (Exception $e) {
				return false;
			}
			return true;
		}
	}
	
	function caesarEnt($txt, $key) {
		
	}
	
    function caesarVer($txt, $key, $buchstaben=NULL) {
        if ($buchstaben===null) {
            $buchstaben = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIHKLMNOPQRSTUVWXYZ';
        }
		$buchstaben = str_split($buchstaben);
		$buchstabenFlipped = array_flip($buchstaben);
		$count = count($buchstaben);
		$out = '';
		for ($x = 0, $len = mb_strlen($txt); $x < $len; ++$x) {
			$letter = mb_substr($txt, $x, 1);
			$currentPos = (isset($buchstabenFlipped[$letter]) ? $buchstabenFlipped[$letter] : -1);
			if ($currentPos === -1) {
				$out[$x] = $letter;
			} else {
				$newPos = (($currentPos + $key) % $count);
				$out[$x] = $buchstaben[$newPos];
			}
		}
		return implode('', $out);
	}
	
	function caesarPruefer($txt, $key, $verEnt) {
		if (($key < 0) || (!(caesarKeyTest($key)))) {
			return caesarError();
		}
		$key %= 52;
		if ($verEnt == "verschluesseln") {
			try {
				return caesarVer($txt, $key);
			} catch (Exception $e) {
				return caesarError();
			}
		} else if ($verEnt == "entschluesseln") {
			$key = 52 - $key;
			try{
				return caesarVer($txt, $key);
			} catch (Exception $e) {
				return caesarError();
			}
		}
	}
?>