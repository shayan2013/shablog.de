<?php
/**
 * Created by PhpStorm.
 * User: sshamseddin
 * Date: 06.11.20
 * Time: 12:42
 */


    setcookie("customerId", "1234", time() + 60 * 60 * 24);

    setcookie("customerId", "", time() - 60 * 60);

    echo $_COOKIE["customerId"];

    session_start();

    if ($_SESSION['email']) {
        echo "Du bust eingelogt";
    } else {
        header("Location: index.php");
    }






?>