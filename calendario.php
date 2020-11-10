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

<!DOCTYPE html>
<html lang="en" >
<head>

 	<meta charset="UTF-8">

 <meta name="viewport" content="width=device-width, initial-scale=1"><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
 <link rel="stylesheet" href="calendario.css">
<title >Flexing</title> 






    <link href="script.css" rel="stylesheet">
  </head>
  
  <body>


                          <!--Navbar-->
<nav>
    <ul>
                     <!--Esquerda da Navbar-->
                     <li><img src="imgs/flexing.png" width="180px" height="90px"></li>

<li><a href="index.php"><div>
  <img src="imgs/home.png" width="50px" width="50px"></div>Home</a></li>

<li><a href="perfil.php"><div>
  <img src="imgs/perfil2.png" width="50px" width="50px"></div>Perfil</a></li>

<li><a href="amigos.php"><div>
  <img src="imgs/amigos.png" width="50px" width="50px"></div>Amigos</a></li>

<li><a href="calendario.php"><div>
  <img src="imgs/calendario.png" width="50px" width="50px"></div>Calendario</a></li>


  


  <li style="float: right;"><a href="notificacoes.html"><div>
    <img src="imgs/noti.png" width="50px" height="50px"></div><span class="w3-badge">5</span></a>
  </li>

<li class="dropdown" style="float: right"><a href="#" class="dropdown-btn"><div>
  <img src="imgs/seta.png" width="50px" width="50px"></div> </a>
  <div class="dropdown-menu">
    <a href="config.php">Configurações</a>
    <a href="info.php" style="background-color: #3b3bdb">Info</a>
    <a href="premium.php">Premium</a>
    <a href="https://www.instagram.com/flexing_projeto/">Instagram</a>
    <a href="https://www.instagram.com/flexing_projeto/">Twitter</a></li>
          


          </div>
        </ul>
      </nav>



	<br><br>
<!-- partial:index.partial.html -->
<div class="calendar-rectangleb">
  <div id="calendar-content" class="calendar-contentb">
    a
  </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.4.1/react-with-addons.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/react/15.6.1/react-dom.min.js'></script>
<script src='https://momentjs.com/downloads/moment.min.js'></script><script  src="./calendario.js"></script>


</body></html>