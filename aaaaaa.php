<?php
session_start();
if(isset($_SESSION["LOG"])){
 header("Location: /flexing/mapa.php");
}
?>
<html>
<head>
	<link href="login.css" rel="stylesheet">
</head>

<div class="login-page">
  <div class="form">
    <form class="login-form" action="db/entrar.php" method="post">
        EMAIL: <input type=email required="required" name=mail><br>
        SENHA: <input type=password required="required" name=senha><br>
      <a href=""><button>Logar</button></a>
      <p class="message">Criar Conta <a href="registro.html">Create an account</a></p>
    </form>
  </div>
</div>


</html>
