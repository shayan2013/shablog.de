<?php
	function affineError() {
		$errorTxt = 'KEY nur Zahlen zwieschen 1 und 51  und T eine der Zahlen: (1, 3, 5, 7, 17, 19, 21, 23, 25)';
		return $errorTxt;
	}
	
	function affineBeschreibung() {
		$beschreibung = 'Addition und Multiplikation werden bei afﬁnen Chiffren kombiniert';
		return $beschreibung;
	}
	
	function affineKeyTest($key) {
		if (!filter_var($key, FILTER_VALIDATE_INT) === false) {
			try {
				$key %= 52;	
			} catch (Exception $e) {
				$key = -1;
			}
			return $key;
		}
	}
	
	function affineTTest($t) {
		$tArr = array("1", "3", "5", "7", "9", "17", "19", "21", "23", "25");
		if(in_array($t, $tArr, true)) {
			return true;
		} else {
			return false;
		}
	}
	
	function affineEnt($txt, $key) {
		
	}
	
    function affineVer($txt, $t, $key, $buchstaben=NULL) {
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
				$newPos = (($currentPos * $t + $key)% $count);
				$out[$x] = $buchstaben[$newPos];
			}
		}
		return implode('', $out);
	}
	function affineCipher($t, $key) {
	  for($i = 0; $i < 26; $i++) {
		echo chr($i + 65) . ' ' . chr(65 + ($t * $i + $key) % 26) . '<br>';
	  }
	}
	
	function tInverse($t) {
		$tIArr = array("1"=>1, "3"=>9, "5"=>21, "7"=>15, "17"=>23, "19"=>11, "21"=>5, "23"=>17, "25"=>25);
		return $tIArr[$t];
	}
	
	function invmod($a,$n){
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
	
	function keyInv ($t, $key, $n) {
		$key = (($t * $key) % $n);
		$key = $n - $key;
		return $key;
	}
		
	function affinePruefer($txt, $t, $key, $verEnt) {
		$key = affineKeyTest($key);
		if ($key < 0) {
			return affineError();
		} 
		if (!affineTTest($t)) {
			return affineError();
		}
		if ($verEnt == "verschluesseln") {
			try {
				return affineVer($txt, $t, $key);
			} catch (Exception $e) {
				echo "Verschlüsselung fehlgeschlagen ", $e->getMessage(), "\n";
			}
		} else if ($verEnt == "entschluesseln") {
			$t = invmod($t, 52);
			$key = keyInv($t, $key, 52);		
			try{
				return affineVer($txt, $t, $key);
			} catch (Exception $e) {
				echo "Entschlüsselung fehlgeschlagen ", $e->getMessage(), "\n";
			}
		}
	}
?>