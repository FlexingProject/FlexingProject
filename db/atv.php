<?php

echo "Carregando...";
session_start();

if(isset($_SESSION["LOG"])){

        $mail = $_SESSION["LOG"]["Login"];
        $atv = $_POST["campo2"];

    } else {
        header('Location: login.php');
    }


include ('connect.php');


if (!$conectar) {
      die("Connection failed: " . mysqli_connect_error());
}

$atvs = null;

    $_SESSION["LOG"]["Atv"] = $atvs;


mysqli_query($conectar,"UPDATE usuarios SET atv = '$atv' WHERE email = '$mail';") or die ("Erro ao tentar cadastrar registro");
mysqli_close($conectar);
echo "Atv cadastrada!";
echo "<script>alert('Sua atv foi cadastrada');";

header("Location: /flexing/perfil.php");