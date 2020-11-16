<?php
    error_reporting(E_ALL);

    $error = "";
    $weather = "";

    if($_GET["stadt"]){

        $_GET['stadt'] = str_replace(' ', '', $_GET['stadt']);

        function url_check($url) {
            $hdrs = @get_headers($url);
            return is_array($hdrs) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$hdrs[0]) : false;
        };

        $url = "http://api.weatherstack.com/current?access_key=d23d6216cca9d3b2e112e8756025721e&query=";
        $stadt = $_GET["stadt"];
        $url .= $stadt;

        //$urt = "http://api.weatherstack.com/current?access_key=d23d6216cca9d3b2e112e8756025721e&query=nh";
        //$ergebnist = file_get_contents($urt);
        //echo $ergebnist;

        if(url_check($url)) {
            $ergebnis = file_get_contents($url);
            //echo $ergebnis;

            if (strlen($url) < 150) {
                $error = "Die Stadt konnte nicht gefunden werden.";
            }

           //$weatherArray = json_decode($url, true);
           //echo $weatherArray;

            $teile = explode(",", $ergebnis);


           // $localtime = preg_grep("/^\"localtime\"/i", $teile);

           // $temp = preg_grep("/^\"temperature\"/i", $teile);

           // $wind_speed = preg_grep("/^\"wind_speed\"/i", $teile);


            foreach ($teile as $key => $value) {
                if (($key == 11) || ($key == 15) || ($key == 19))
                    $weather .= $value . "<br>";
            }
        } else{

            $error = "Die Stadt konnte nicht gefunden werden.";

        }

    }


?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wisth=device-width, initial-scale=1">

    <title>Wetter-API PHP</title>

    <!-- Das neueste kompilierte und minimierte CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optionales Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Das neueste kompilierte und minimierte JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style type="text/css">

        html {
            background: url("wolken.jpg") no-repeat center center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {
            background: none;
        }

        .container {
            text-align: center;
            padding-top: 200px;
        }

        #wetter{

            margin-top: 20px;

        }

    </style>

</head>

<body>

    <div class="container">
        <h1>Wie ist das Wetter?</h1>

        <form>
            <div class="form-group">
                <label for="stadt">Trage den Namen einer Stadt ein!</label>
                <input type="text" class="form-control" name="stadt" id="stadt" placeholder="z.B. Berlin, Tokyo, London">
            </div>
            <button type="submit" class="btn btn-primary">Wetter vorhersagen</button>
        </form>

        <div id="wetter">
            <?php

            if ($weather){

                echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';

            }else if($error){

                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';

            }


            ?>
        </div>

    </div>

</body>

</html>
