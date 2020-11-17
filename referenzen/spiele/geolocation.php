<?php

echo file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCrWhptsy2WMMNWGrnSHAxfIaUdlKDE-9A");


?>

<html>

<head>

    <title>Geocoding einer Adresse</title>

</head>

<body>






</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script type="text/javascript">

    var position = {};

    $.ajax({
        url:"https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCrWhptsy2WMMNWGrnSHAxfIaUdlKDE-9A",
        type: "GET",
        success: function(data){

            $.each(data["results"][0]["address_components"], function(key, value){

                if(value["types"][0] == "country"){

                    alert(value["long_name"]);

                }


            })

        }



    })


</script>


</html>



