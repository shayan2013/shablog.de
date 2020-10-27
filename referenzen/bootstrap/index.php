<?php

$error = "";
$successMessage = "";

if($_POST){

    if(!$_POST["email"]){

        $error .= "Eine Emailadresse wird benötigt.<br>";

    }

    if(!$_POST["titel"]){

        $error .= "Ein Titel wird benötigt.<br>";

    }

    if(!$_POST["content"]){

        $error .= "Inhalt wird benötigt.<br>";

    }

    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
        $error .= "Die Emailadresse ist ungültig.<br>";
    }

    if($error != ""){

        $error = '<div class="alert alert-danger" role="alert"><p><b>Es gab fehler in deinem Formulars:</b></p>'.$error. '</div>';

    }else{

        $emailTo = "shayan2013@yahoo.com";

        $subject = $_POST['titel'];

        $content = $_POST['content'];

        $headers = "From: ".$_POST['email'];

        if(mail($emailTo, $subject, $content, $headers)){

            $successMessage=  '<div class="alert alert-success" role="alert"><p><b>Alles hat geklappt. Wir antworten dir so schnell wir k&ouml;nnen</b></p></div>';


        }else{

            $error = '<div class="alert alert-danger" role="alert"><p><b>Das Formular konnte nicht übertragen werden. Bitte versuche es noch einmal.</b></p></div>';

        }

    }

}


?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Template</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>
    <!-- Bootstrap -->
    <!-- Das neueste kompilierte und minimierte CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optionales Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Das neueste kompilierte und minimierte JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style>

        .jumbotron{

            background-image: url(background.jpg);

            text-align: center;
        }

        #zusammenfassung{

            text-align: center;

        }

        .card-img-top{

            width:100%;

        }

        #footer{

            background-color:aqua;
            text-align: center;
            padding-top: 50px;
            padding-bottom: 50px;
            margin-top: 50px;

        }


    </style>
</head>
<body data-spy="scroll" data-target="#navbar">

<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
    <div class="container-fluid">
        <!-- Titel und Schalter werden für eine bessere mobile Ansicht zusammengefasst -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Navigation ein-/ausblenden</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Titel</a>
        </div>

        <!-- Alle Navigationslinks, Formulare und anderer Inhalt werden hier zusammengefasst und können dann ein- und ausgeblendet werden -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#jumbotron">Home <span class="sr-only">(aktuell)</span></a></li>
                <li><a href="#mehrInfo">&Uuml;ber die App</a></li>
                <li><a href="#footer">App herunterladen</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="email">
                        <input type="password" class="form-control" placeholder="passwort">
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="jumbotron" id="jumbotron">
    <div class="container">
        <h1>Meine tolle App</h1>
        <p>Dies ist warum du dir die App unbedingt herunterladen musst!</p>
        <hr>

        <p>M&ouml;chtest Du mehr &uuml;ber die App erfahren? Dann trage Dich doch in unsere Mailingliste ein.</p>

        <form class="form-inline">
            <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="email" class="form-control" placeholder="Deine Emailadresse" aria-label="Summe (gerundet zum nächsten ganzen Euro)">
            </div>
            <button class="btn btn-primary">Eintragen</button>


        </form>
    </div>
</div>

<div class="container" id="mehrInfo">

    <div class="row" id="zusammenfassung">

        <h1>Darum ist diese App so toll!</h1>
        <p class="lead">Zusammenfassung der tollen Features!</p>
    </div>


</div>

<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="card-img-top" src="vorschau.jpg" alt="...">
            <div class="caption">
                <h3>Mehr Infos zur App</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</p>


            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="card-img-top" src="vorschau.jpg" alt="...">
            <div class="caption">
                <h3>Mehr Infos zur App</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</p>


            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img class="card-img-top" src="vorschau.jpg" alt="...">
            <div class="caption">
                <h3>Mehr Infos zur App</h3>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</p>


            </div>
        </div>
    </div>
</div>

<div class="container" id="kontakt">

    <div class="row">

        <h2>Kontaktformular</h2>
        <div id="error"><?php
            echo $successMessage;
            echo $error;

            ?></div>



        <form id="kontaktForm" method="post">
            <div class="form-group">
                <label for="beispielFeldEmail1">Email-Adresse</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email-Adresse">
            </div>
            <div class="form-group">
                <label for="titel">Titel</label>
                <input type="text" name="titel" class="form-control" id="titel" >
            </div>

            <div class="form-group">
                <label for="anliegen">Deine Frage an uns</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>


            <button type="submit" id="submit" class="btn btn-primary">Abschicken</button>
        </form>
    </div>

</div>

<div class="container" id="footer">

    <div class="row">

        <h2>Lade die App herunter!</h2>

        <p><a href=""><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Available_on_the_App_Store_%28black%29_SVG.svg/320px-Available_on_the_App_Store_%28black%29_SVG.svg.png"></a></p>

    </div>

</div>


<script type="text/javascript">

    $("#kontaktForm").submit(function( event ) {

        event.preventDefault();

        var error = "";

        if($("#email").val() == ""){

            error += "<p>Der Email ist leer. Bitte trage sie ein.</p>";

        }

        if($("#titel").val() == ""){

            error += "<p>Der Titel ist leer. Bitte trage ihn ein.</p>";

        }if($("#content").val() == "" ){

            error += "<p>Das Inhaltfeld ist leer, bitte trage etwas ein. </p>";

        }

        if(error != ""){

            $("#error").html('<div class="alert alert-danger" role="alert"><p><b>Es gab fehler in deinem Formular:</b></p>' + error + '</div>');


        }else{

            $("#kontaktForm").unbind('submit').submit();

        }


    });




</script>

</body>
</html>