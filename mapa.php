<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <link href="script.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style type="text/css"> 

body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  color: white;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.right{
    float: right;


}
</style>
</head>

<body>

<div class="navbar">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div>
  </div> 
  <div class="right">
  <a>
        <?php
echo "Olá {$user}! ";
?>
  
</a>
<button>
 <a href="db/logout.php">Logout</a>
 </button>
    </div>
</div>


   
    <div style="width: 1280px; height: 720px" id="mapContainer">

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

       /**
 * Creates a new marker and adds it to a group
 * @param {H.map.Group} group       The group holding the new marker
 * @param {H.geo.Point} coordinate  The location of the marker
 * @param {String} html             Data associated with the marker
 */
function addMarkerToGroup(group, coordinate, html) {
  var marker = new H.map.Marker(coordinate);
  // add custom data to the marker
  marker.setData(html);
  group.addObject(marker);
}

/**
 * Add two markers showing the position of Liverpool and Manchester City football clubs.
 * Clicking on a marker opens an infobubble which holds HTML content related to the marker.
 * @param  {H.Map} map      A HERE Map instance within the application
 */
function addInfoBubble(map) {
  var group = new H.map.Group();

  map.addObject(group);

  // add 'tap' event listener, that opens info bubble, to the group
  group.addEventListener('tap', function (evt) {
    // event target is the marker itself, group is a parent event target
    // for all objects that it contains
    var bubble =  new H.ui.InfoBubble(evt.target.getGeometry(), {
      // read custom data
      content: evt.target.getData()
    });
    // show info bubble
    ui.addBubble(bubble);
  }, false);

  addMarkerToGroup(group, {lat:-23.6125056, lng:-46.6707527},
    '<div><a href="http://www.mcfc.co.uk" target="_blank">Manchester City</a>' +
    '</div><div >City of Manchester Stadium<br>Capacity: 48,000</div>');

  addMarkerToGroup(group, {lat:-23.6125056, lng:-46.6707527},
    '<div><a href="http://www.liverpoolfc.tv" target="_blank">Liverpool</a>' +
    '</div><div >Anfield<br>Capacity: 45,362</div>');

}

/**
 * Boilerplate map initialization code starts below:
 */

// initialize communication with the platform
// In your own code, replace variable window.apikey with your own apikey
var platform = new H.service.Platform({
  apikey: window.apikey
});
var defaultLayers = platform.createDefaultLayers();

// initialize a map - this map is centered over Europe
var map = new H.Map(document.getElementById('map'),
  defaultLayers.vector.normal.map,{
  center: {lat: -23.6125056, lng: -46.6707527},
  zoom: 7,
  pixelRatio: window.devicePixelRatio || 1
});
// add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// create default UI with layers provided by the platform
var ui = H.ui.UI.createDefault(map, defaultLayers);

// Now use the map as required...
addInfoBubble(map);
</script>

   

<script type="text/javascript">

        var markerHTML = '<div class="popup" onclick="myFunction2()"><span class="popuptext" id="myPopup1">';

        // Create a marker icon from an image URL:
        var icon = new H.map.Icon('/flexing/arvore.png');

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
</body>

</html>