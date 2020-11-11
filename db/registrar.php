<?php

echo "Carregando...";
session_start();
$nome = $_POST["campo1"];
$email = $_POST["campo2"];
$senha = $_POST["campo3"];
$hoje = date('d/m/Y');

$cript = password_hash($senha, PASSWORD_BCRYPT);

$sql = mysqli_connect("135.148.6.5", "u950_wyuTVa3RL3", "6Ixxl0b!+aEIUb^+KwS+r2iL", "s950_db") or die ('Erro ao conectar ao banco de dados');
$check_user = mysqli_num_rows($sql->query("SELECT username FROM usuarios WHERE username = '$nome';"));
$check_mail = mysqli_num_rows($sql->query("SELECT email FROM usuarios WHERE email = '$email';"));


$hoje = date('d/m/Y');

if (!$sql) {
      die("Connection failed: " . mysqli_connect_error());
}

if($check_user != 0){
    echo "<script>alert('Esse nome de usuario ja e usado.');";
    echo "location.href='/flexing/registro.php'</script>";
    return;
}
if(strlen($nome) < 3){
    echo "<script>alert('O nome de usuario deve conter ao menos 3 caracters.');";
    echo "location.href='/flexing/registro.php'</script>";
    return;
}
if($check_mail != 0){
    echo "<script>alert('Esse email ja esta sendo usado.');";
    echo "location.href='/flexing/registro.php'</script>";
    return;
}
if(strlen($senha) < 8){
    echo "<script>alert('A senha precisa conter no minimo 8 digitos.');";
    echo "location.href='/flexing/registro.php'</script>";
    return;
}
if(is_numeric($senha)){
    echo "<script>alert('A senha precisa conter letras.');";
    echo "location.href='/flexing/registro.php'</script>";
    return;
}
    $senha_real = null;
    $user = null;

    $_SESSION["LOG"]["Login"] = $email;
    $_SESSION["LOG"]["User"] = $user;
    $_SESSION["LOG"]["Senha"] = $senha_real;

mysqli_query($sql,"INSERT INTO usuarios (username, email, senha, num_follows, data_inscri) VALUES ('$nome', '$email', '$cript', '0', '$hoje')") or die ("Erro ao tentar cadastrar registro");
mysqli_close($sql);
echo "Cliente cadastrado com sucesso!";
echo "<script>alert('Você foi cadastrado com sucesso');";

unset($_SESSION["LOG"]);
header("Location: /flexing/login2.php");