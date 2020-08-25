
<?php
$servername = "localhost";
$username = "3airjxylbw";
$password = "Isahamburg99##";
$dbname = "mhbjvvqf0";

try {
    $pdo = new PDO("mysql:host={$servername};dbname={$dbname}", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
}
catch(PDOException $e) {
    die("Konnte keine Verbindung mit Datenbank aufbauen");
}

// Datenbank erstellen
function create(){
	global $pdo;
	// MySQL Verbindung
//	$link = mysql_connect($servername, $username, $password);
//	mysql_set_charset("utf8", $link);
//	if (!$link) {
//		die('Could not connect: ' . mysql_error());
//	}

	//echo "Verbindung erfolgreich erstellt";

	// Datenbank auswaehlen
//	$db_selected = mysql_select_db($dbname, $link);
//	if (!$db_selected) {
//	  // Wenn Db nicht ausgewaehlt wwerden kann dann existiert sie  entweder nicht oder wir koennen es nicht sehen
//	  $sql = "CREATE DATABASE IF NOT EXISTS " .$dbname;
//	  if (!mysql_query($sql, $link)) {
//		  echo "Error Datenbankerstellung: " . mysql_error() . "\n";
//	  }
//	}


	// tebelle erstellen
	$sql = "CREATE TABLE IF NOT EXISTS users ( `id` INT(6) UNSIGNED NOT NULL AUTO_INCREMENT ,
	`username` VARCHAR(30) NOT NULL , `email` VARCHAR(50) NOT NULL , 
	`kennwort` VARCHAR(30) NOT NULL , `website` VARCHAR(50) NOT NULL ,
	`kommentar` VARCHAR(100) NOT NULL , `geschlecht` VARCHAR(9) NOT NULL ,
	`reg_date` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	PRIMARY KEY (`id`)) ENGINE = InnoDB; ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

/*
	
    $conn = new mysqli($servername, $username, $password, $dbname);
	$conn->query($sql);
	echo " Verbindung zur Tabelle erfolgreich erstellt";
	$conn->close();*/
}


//Daten einfuegen
function createData($uname, $eMail, $kenn, $webseite, $komment, $gesch){
	global $pdo;
	$sql = "INSERT INTO users (username, email, kennwort, website, kommentar, geschlecht) VALUES (:name, :email, :kenn,
:website, :komment, :geschlecht)";
	$stmt = $pdo->prepare($sql);
    $stmt->bindParam(":name", $uname, PDO::PARAM_STR);
    $stmt->bindParam(":email", $eMail, PDO::PARAM_STR);
    $stmt->bindParam(":kenn", $kenn, PDO::PARAM_STR);
    $stmt->bindParam(":website", $webseite, PDO::PARAM_STR);
    $stmt->bindParam(":komment", $komment, PDO::PARAM_STR);
    $stmt->bindParam(":geschlecht", $gesch, PDO::PARAM_STR);
	try {
        $stmt->execute();
        echo "Daten erfolgreich eingetragen.";
        $last_id = $pdo->lastInsertId();
        return $last_id;
	}
	catch(PDOException $e) {
		echo "Daten wurden nicht eingetragen!";
	}
}

//alles ausgeben
function selectAll(){
	global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM `users`");
    $stmt->execute();
    $users = $stmt->fetchAll();

    ob_start();
    echo "<table id='selectAllTable'>
		  	<tr>
    			<th>id</th>
    			<th>username</th> 
    			<th>email</th>
				<th>kennwort</th>
				<th>website</th>
				<th>kommentar</th>
				<th>geschlecht</th>
				<th>reg_date</th>
  			</tr>
		 ";
    
    $content = ob_get_contents();
    ob_end_clean();
	
	
	if (!empty($users)){
		foreach($users as $user){
			echo "<tr>";
			echo "<td>" . $user["id"]. "</td><td>" . $user["username"]. "</td><td>" . $user["email"]. "</td><td>" . $user["kennwort"].
			 "</td><td>" . $user["website"]. "</td><td>" . $user["kommentar"]. "</td><td>" . $user["geschlecht"]. "</td><td>" . $user["reg_date"]. "</td>";
			echo "</tr>";
		}
	}else {
		echo "<tr>ergebnis 0</tr>";
	}
	echo "</table>";
}

//eine auswaehlen
function selectOne($id){
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `id`=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $user = $stmt->fetch();

    if (!empty($user)) {
        ob_start();
        return "id: " . $row["id"]. " - username: " . $user["username"]. " - email: " . $row["email"]. " - kennwort: " . $row["kennwort"]. "\n" .
            " - website: " . $row["website"]. " - kommentar: " . $row["kommentar"]. " - geschlecht: " . $row["geschlecht"]. " - reg_date: " . $row["reg_date"]. "\n";
        $content = ob_get_contents();
        ob_end_clean();
    }else {
        return "ergebnis 0";
    }
}

//loeschen
function deleteData($id){
	global $pdo;
	$sql = "DELETE FROM users WHERE `id`=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);

    try {
    	$stmt->execute();
        return "Daten erfolgreich geloescht.";
	}
	catch(PDOException $e) {
        return "Daten nicht geloescht!";
    }
}

//Daten aktuallisieren
function updateData($uname, $eMail, $kenn, $id) {
	global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `id`=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $user = $stmt->fetch();
	if (!empty($user)) {
			if (empty($uname)){
				$uname = $user["username"];
			}
			if (empty($eMail)){
				$eMail = $user["email"];
			}
			if (empty($kenn)){
				$kenn = $user["kennwort"];
			}

	} else {
		return false;
	}

    $stmt = $pdo->prepare("UPDATE users SET `username`=:name, 
        `email`=:email, 
        `kennwort`=:kennwort WHERE `id`=:id");

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":name", $uname);
    $stmt->bindParam(":email", $eMail);
    $stmt->bindParam(":kennwort", $kenn);

    $stmt->execute();
}

function logInCheck($uname, $kenn){
	global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username`=:name");
    $stmt->bindParam(":name", $uname);
	$stmt->execute();
	$user = $stmt->fetch();
	if (!empty($user)) {
        $kn = $user["kennwort"];
        if ($kn == $kenn) {
            return 1;
        }else {
            echo "nicht eingeloggt";
        }
    }
	
}

function changeBlog($uname, $blog) {
	global $pdo;
    $stmt = $pdo->prepare("UPDATE users SET `kommentar`=:komment WHERE `username`=:name");

    $stmt->bindParam(":komment", $blog);
    $stmt->bindParam(":name", $uname);
	$stmt->execute();

	try {
        $stmt->execute();
        return true;
	}
	catch(PDOException $e) {
        return false;
    }
}

function selectPerson($uname) {
	global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username`=:name");
    $stmt->bindParam(":name", $uname);
	$user = $stmt->execute();
	if (!empty($user)) {
		echo "<table id='selectAllTable'>
			  	<tr>
	    			<th>id</th>
	    			<th>username</th> 
	    			<th>email</th>
					<th>kennwort</th>
					<th>website</th>
					<th>kommentar</th>
					<th>geschlecht</th>
					<th>reg_date</th>
	  			</tr>
			 ";
		foreach ($user as $user) {
			echo "<tr>";
			echo "<td>" . $user["id"]. "</td><td>" . $user["username"]. "</td><td>" . $user["email"]. "</td><td>" . $user["kennwort"].
			 "</td><td>" . $user["website"]. "</td><td>" . $user["kommentar"]. "</td><td>" . $user["geschlecht"]. "</td><td>" . $user["reg_date"]. "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

}

function getKomment($uname) {
	global $pdo;
    $stmt = $pdo->prepare("SELECT kommentar FROM `users` WHERE `username`=:name");
    $stmt->bindParam(":name", $uname);
    $user = $stmt->execute();

	if (!empty($user)) {
		echo "<table id='selectAllTable'>
			  	<tr>	
	    			<th>username</th>
					<th>kommentar</th>	
	  			</tr>
			 ";
		foreach ($user as $user) {
			echo "<tr>";
			echo "<td>" . $uname . "</td><td>" . $user["kommentar"]. "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}


?> 
