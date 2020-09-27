<?php

include("config.php");
error_reporting(2);
session_start();

echo $email =$_POST["email"];

echo $senha =$_POST["senha"];

$query = "select * from usuario where email = '$email' and senha = '" .md5($senha)."'";

$consulta = mysqli_query($conectou,$query);

$valor = mysqli_num_rows($consulta);

if($valor>0){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    echo "<script>alert('usuario conectado');</script>";
    echo "<script>window.location = 'menu_usuario.php'</script>";
}
else{
    echo "<script>alert('usuario ou senha errado');</script>";
    echo "<script>window.location = 'index.php'</script>";
}

mysqli_close($conectou);