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
    <link href="script.css" rel="stylesheet">
  </head>
  
  <body>


                          <!--Navbar-->



</body>
</html>