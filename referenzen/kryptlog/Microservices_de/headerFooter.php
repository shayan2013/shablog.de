<?php
	function headi(){
		getDateTime(); 
	}

	function footi(){
		echo "&copy;2016-" . date("Y") . " -Bachelorarbeit";		
	}

?>
<?php 
	function getDateTime(){
		echo "Datum : " .date("Y/m/d");
		echo "<br>Zeit : " .date("h:i") ."<br><br>";
	}
?>