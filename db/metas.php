<?php

echo "Carregando...";
session_start();

if(isset($_SESSION["LOG"])){

        $mail = $_SESSION["LOG"]["Login"];
        $meta = $_POST["campo1"];

    } else {
        header('Location: login.php');
    }


include ('connect.php');


if (!$conectar) {
      die("Connection failed: " . mysqli_connect_error());
}

$metas = null;

    $_SESSION["LOG"]["Metas"] = $metas;


mysqli_query($conectar,"UPDATE usuarios SET metas = '$meta' WHERE email = '$mail';") or die ("Erro ao tentar cadastrar registro");
mysqli_close($conectar);
echo "Meta cadastrada!";
echo "<script>alert('Sua meta foi cadastrada');";

header("Location: /flexing/perfil.php");