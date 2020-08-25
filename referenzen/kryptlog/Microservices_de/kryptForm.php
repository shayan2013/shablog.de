<?php require 'caesarChiffre.php';?>
<?php require 'substitutionChiffre.php';?>
<?php require 'affineChiffre.php';?>
<?php require 'multiplikativeChiffre.php';?>
<?php require 'permutationChiffre.php';?>

<?php
// variablen deklarieren
$verfahren = $verEntRadio = $text = $key = $t = "";
$verfahrenErr = $verEntErr = $keyErr = $tErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["key"])) {
    $keyErr = "bitte Schlüssel eingeben!";
  } else {
    $key = test_input($_POST["key"]);
  }
  
  if (empty($_POST["verEntRadio"])) {
    $verEntErr = "bitte auswählen!";
  } else {
    $verEntRadio = test_input($_POST["verEntRadio"]);
  }
  
  if (empty($_POST["verfahren"])) {
    $verfahrenErr = "bitte Verfahren auswählen!";
  } else {
    $verfahren = test_input($_POST["verfahren"]);
  }
  
  if (empty($_POST["t"])) {
    $tErr = "bitte für Affine Chiffre T eingeben!";
  } else {
    $t = test_input($_POST["t"]);
  }  
  
  if (empty($_POST["text"])) {
    $text = "";
  } else {
    $comm = test_input($_POST["text"]);
	$comm = krypto($key, $t, $comm, $verEntRadio, $verfahren);
	$text = $comm;
	//$text = caesarPruefer($comm, 3, $verEntRadio);
  }
  
}

function krypto($key, $t, $comm, $verEntRadio, $verfahren) {
	switch ($verfahren) {
		case "caesarChiffre":
			return caesarPruefer($comm, $key, $verEntRadio);
			break;
		case "multiplikativeChiffre":
			return multiplikativePruefer($comm, $key, $verEntRadio);
			break;
		case "einfacheSubstitution":
			return substitutionPruefer($comm, $key, $verEntRadio);
			break;
		case "affineChiffre":
			return affinePruefer($comm, $t, $key, $verEntRadio);
			break;
		case "permutationsChiffre":
			return permutationPruefer($comm, $key, $verEntRadio);
			break;
		default:
			echo "Your favorite color is neither red, blue, nor green!";
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
function verfahrenBeschreibung() {
	echo '	<h2>Caesar-Chiffre</h2>
			<p>' . caesarBeschreibung() . '</p>
			<h2>Multiplikative-Chiffre</h2>
			<p>' . multiplikativeBeschreibung() . '</p>
			<h2>Einfache Substitution</h2>
			<p>' . substitutionBeschreibung() . '</p>
			<h2>Affine-Chiffre</h2>
			<p>' . affineBeschreibung() . '</p>
			<h2>Permutation-Chiffre</h2>
			<p>' . permutationBeschreibung() . '</p>';
}

function schluesselBeschreibung() {
	echo '	<h2>Caesar-Schlüssel</h2>
			<p>' . caesarError() .'</p>
			<h2>Multiplikative-Schlüssel</h2>
			<p>' . multiplikativeError() . '</p>
			<h2>Substitution-Schlüssel</h2>
			<p>' . substError() . '</p>
			<h2>Affine-Schlüssel</h2>
			<p>' . affineError() . '</p>
			<h2>Permutation-Schlüssel</h2>
			<p>' . permutationError() . '</p>';
}

?>

