<?php
/**
 * Created by PhpStorm.
 * User: sshamseddin
 * Date: 04.11.20
 * Time: 13:26
 */

session_start();

$_SESSION['username'] = "shayanSession";

echo $_SESSION['username'];

if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {

    $dbname = "mhbjvvqf0";
    $user = "3airjxylbw";
    $password = "Isahamburg99##";
    $dbhost = "localhost";


    $link = mysqli_connect($dbhost, $user, $password, $dbname);

    if (mysqli_connect_error()) {
        die("Es gab einen Fehler beim Verbinden zur Datenbank");
    }

    $query = "SELECT * FROM benutzer";

//$query2 = "INSERT INTO `benutzer` (`vorname`, `nachname`) VALUES ('mark', 'market')";


    $query3 = "UPDATE benutzer SET `nachname` = 'marki' WHERE id = 4 LIMIT 1";
//mysqli_query($link, $query3);

    if ($result = mysqli_query($link, $query)) {
        while ($row = mysqli_fetch_array($result)) {
            print_r($row);
            echo "<br>";
        }

    }

    if ($_POST['email'] == '') {
        echo "<p>Emailadresse muss eingetrage werden</p>";
    } else if ($_POST['password'] == '') {
        echo "<p>Passwort muss eingetrage werden</p>";
    } else {
        $query = "SELECT `id` from `users` WHERE email ='"
        .mysqli_real_escape_string($link, $_POST['email']) ."'";

        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<p>Diese Email ist bereits registriert</p>";
        } else {
            echo "<p>Die Email ist nicht registriert</p>";
        }
    }

}

?>

<form method="post">

    <input name="name" type="text" placeholder="Emailadresse">
    <input name="password" type="password" placeholder="Passwort">
    <input type="submit" value="Sign up">

</form>
