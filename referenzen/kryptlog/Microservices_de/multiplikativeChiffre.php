<?php
	function multiplikativeError() {
		$errorTxt = 'Eine der Zahlen (1, 3, 5, 7, 9, 11, 15, 17, 19, 21, 23, 25)';
		return $errorTxt;
	}
	
	function multiplikativeBeschreibung() {
		$beschreibung = 'Jedes Klartextzeichen m wird mit dem Schl¨ussel t multipliziert: c ≡ m · t mod ';
		return $beschreibung;
	}
	
	function multiplikativeKeyTest($key) {
		if (!filter_var($key, FILTER_VALIDATE_INT) === false) {
			if (multiplikativeKeyTest2($key)) {
				return true;
			}
		}
		return false;
	}

	function multiplikativeKeyTest2($key) {
		$keyArr = array("1", "3", "5", "7", "9", "17", "19", "21", "23", "25");
		if(in_array($key, $keyArr, true)) {
			return true;
		} else {
			return false;
		}
	}
	
	function multiplikativeEnt($txt, $key) {
		
	}

	function mInvmod($a,$n){
        if ($n < 0) $n = -$n;
        if ($a < 0) $a = $n - (-$a % $n);
		$inv = 0; $nt = 1; $r = $n; $nr = $a % $n;
		while ($nr != 0) {
			$quot= intval($r/$nr);
			$tmp = $nt;  $nt = $inv - $quot*$nt;  $inv = $tmp;
			$tmp = $nr;  $nr = $r - $quot*$nr;  $r = $tmp;
		}
		if ($r > 1) return -1;
		if ($inv < 0) $inv += $n;
		return $inv;
	}
	
    function multiplikativeVer($txt, $key, $buchstaben=NULL) {
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
				$newPos = (($currentPos * $key) % $count);
				$out[$x] = $buchstaben[$newPos];
			}
		}
		return implode('', $out);
	}
	
	function multiplikativePruefer($txt, $key, $verEnt) {
		if (($key < 0) || (!(multiplikativeKeyTest($key)))) {
			return multiplikativeError();
		}
		if ($verEnt == "verschluesseln") {
			try {
				return multiplikativeVer($txt, $key);
			} catch (Exception $e) {
				return multiplikativeError();
			}
		} else if ($verEnt == "entschluesseln") {
			$key = mInvmod($key, 52);
			try{
				return multiplikativeVer($txt, $key);
			} catch (Exception $e) {
				return multiplikativeError();
			}
		}
	}
?>