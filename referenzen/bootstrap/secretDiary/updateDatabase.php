<?php
    
    session_start();

    if(array_key_exists("content", $_POST)){
        
        include("connection.php");
        
        $query = "UPDATE `secretdiary` SET `diary` = '".mysqli_real_escape_string($link, $_POST['content']).
            "' WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
        
        if(mysqli_query($link, $query)){

            
        }else{
            
            echo "Versenden an die Datenbank ist schiefgegangen. Melde dich beim Admin.";
            
        }
        
        
        
    }





?>