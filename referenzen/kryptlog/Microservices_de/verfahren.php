<?php
$verfahren = array("caesarChiffre", "multiplikativeChiffre", "einfacheSubstitution", "affineChiffre", "permutationsChiffre");
$arrlength = count($verfahren);
//sort($verfahren);
for($x = 0; $x < $arrlength; $x++) {
    echo '<input type="radio" id="v1"  name="verfahren"';
	if (isset($verfahren) && $verfahren==$verfahren[$x]) {
		echo "checked";
	}  
	echo 'value='.$verfahren[$x].' checked>'.$verfahren[$x].'<br>';
}

?>