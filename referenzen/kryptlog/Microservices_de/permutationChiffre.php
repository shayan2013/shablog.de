<?php
	function permutationError() {
		$errorTxt = 'Der Schlüssel muss kleiner als die Länge des Textes sein';
		return $errorTxt;
	}
	
	function permutationBeschreibung() {
		$beschreibung = 'Buchstaben werden reihenweise in einer Matrix eingetragen und spaltenweise gelesen';
		return $beschreibung;
	}
	
	function permutationKeyTest($key, $txt) {
		if (!filter_var($key, FILTER_VALIDATE_INT) === false) {
			if ($key < strlen($txt)) {
				return true;
			}
		}
		return false;
	}
	
	function txtpasser($txt, $key) {
		while (strlen($txt) % $key != 0) {
			$txt .= "#";
		}
		return $txt;
	}
	
	function permutationEnt($txt, $key) {
		
	}
	
    function permutationVer($txt, $key, $buchstaben=NULL) {
		$arr = str_split($txt);
		$str = "";
		for ($i = 0; $i < $key; $i++) {
			for ($j = $i; $j < sizeof($arr); $j+= $key) {
				$str .= $arr[$j];
			}
		}
		return $str;
	}
	
	function permutationPruefer($txt, $key, $verEnt) {
		if (($key < 0) || (!(permutationKeyTest($key, $txt)))) {
			return permutationError();
		}
		$txt = txtpasser($txt, $key);
		
		if ($verEnt == "verschluesseln") {
			try {
				return permutationVer($txt, $key);
			} catch (Exception $e) {
				return permutationError();
			}
		} else if ($verEnt == "entschluesseln") {
			$txtlength = strlen($txt);
			$entkey = $txtlength / $key;
			$key = ceil($entkey);
			try{
				return permutationVer($txt, $key);
			} catch (Exception $e) {
				return permutationError();
			}
		}
	}
?>