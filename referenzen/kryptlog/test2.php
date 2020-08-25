<?php
require 'Microservices_de/JsonUsers.php';

$c = new JsonUsers();

$c->add('shayan');
$c->add('amir');

echo count($c);
echo $c->jsonSerialize();

echo "<br>";
class Auto {
	public function fahren(Mensch $fahrer, $insassen ="") {
		echo "wir fahren";
	}
}

class Mensch {
	
}

class Hund {
	
}

$mensch = new Mensch();
$hund = new Hund();
$auto = new Auto();

$auto->fahren($mensch);
echo "<br>";
function affineCipher($a, $b) {
  for($i = 0; $i < 26; $i++) {
    echo chr($i + 65) . ' ' . chr(65 + ($a * $i + $b) % 26) . '<br>';
  }
}

affineCipher(5, 8);

/*
class Auto {
	protected $_farbe;
	protected $_ps;
	public $_tueren;
	
	public function __construct($farbe, $ps) {
		$this->_farbe = $farbe;
		$this->_ps = $ps;

	}
	
	public function __destruct() {

	}
	
	public function __get($str) {
		return $this->$str;
	}
	
	public function __set($str, $val) {
		$this->$str = $val;
	}
	
	public final function fahren() {
		echo "Ich fahre.." . "<br>";
	}
	
	public function anhalten() {
		echo "Anhalten!";
	}
	
}

class Mercedes extends Auto {
	public static $_name = "Mercedes";
	
	public function anhalten() {
		echo "sofort anhalten";
	}
	
	public function __construct() {
		parent::fahren();
	}
	
	public function __destruct() {
		parent::anhalten();
		echo "<br>";
		self::anhalten();
	}
}

class BMW extends Auto {
	

}

$auto = new BMW("rot", 116);
echo $auto->_farbe;
echo "<br>";
$auto->_farbe = "blau";
echo $auto->_farbe;
echo "<br>";
echo Mercedes::$_name;
echo "<br>";
$auto2 = new Mercedes();
Mercedes::$_name = "Ferrari";
echo Mercedes::$_name;
echo "<br>";
*/
?>