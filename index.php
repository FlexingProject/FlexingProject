<?php
    session_start();
    if(isset($_SESSION["LOG"])){
        $user = $_SESSION["LOG"]["User"];
        $pass = $_SESSION["LOG"]["Senha"];
        $mail = $_SESSION["LOG"]["Login"];

    

        
    } else {
        header('Location: login.php');
    }

include_once("base.php");

?>


<html>
  <head>
  	<meta charset="utf-8">
  	<title >Flexing</title> 



    <link rel="stylesheet" href="script.css"/>

    
    <!--Mapa API-->




    <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <!--Mapa API-->

    
    <link rel="sortcut icon" href="logo.png" type="image/png"/>




    
  </head>
  
  <body>

                                  <!--Mapa-->

      <div style="width: 720px; height: 720px; position: relative;   margin-left: auto; margin-right: auto; margin-top: 25px; border-radius: 50px" id="mapContainer">

    <script type="text/javascript">    
        // Criando o Mapa
        var platform = new H.service.Platform({
            'apikey': 'xGDdLfnKj480oY-njz1O3Oj3ANEKt31fsKqZew2-oWs'
        });
        var defaultLayers = platform.createDefaultLayers();

        // Centralizando o mapa
        var map = new H.Map(
            document.getElementById('mapContainer'),
            defaultLayers.vector.normal.map,
            {
                zoom: 12,
                center: { lng: -46.63, lat: -23.54 }
            });

        // UI de Zoom
        var ui = H.ui.UI.createDefault(map, defaultLayers, 'pt-BR');
        ui.getControl('mapsettings').setDisabled(true)

        // Frase em determinada coord

        var bubble = new H.ui.InfoBubble({ lng: -46.6307150, lat: -23.4575443 }, {
            content: '<div class="popup" onclick="myFunction()">Horto<span class="popuptext" id="myPopup">Rua xyz numero 123</span></div>'
        });


        // Add info bubble to the UI:
        ui.addBubble(bubble);
        var bubble1 = new H.ui.InfoBubble({ lng: -46.6707527, lat: -23.6125056 }, {
            content: 'a'
        });
        ui.addBubble(bubble1);


var icon = new H.map.Icon ('imgs/home.png') ;

// Create a marker using the previously instantiated icon:
var marker = new H.map.Marker({ lat: -23.4575443, lng: -46.6307150 }, { icon: icon });

// Add the marker to the map:
map.addObject(marker);


</script>

   

<script type="text/javascript">

        var markerHTML = '<div class="popup" onclick="myFunction2()"><span class="popuptext" id="myPopup1">';

        // Create a marker icon from an image URL:
        var icon = new H.map.Icon('');

        var marker = new H.map.Marker({ lat: -23.6125056, lng: -46.6707527 }, { icon: icon });

        map.addObject(marker);

        marker.addListener("click", () => {
            
        });

        var markerHTML2 = '</span></div>'

    </script>
    
    <script>
        // When the user clicks on <div>, open the popup
        function myFunction() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
        }
        function myFunction2() {
                var popup = document.getElementById("myPopup1");
                popup.classList.toggle("show");
            }
    </script>

</div>
</body>
</html>