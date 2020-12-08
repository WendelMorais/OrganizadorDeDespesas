<?php

include("config.php");
error_reporting(2);
session_start();

echo $email =$_POST["email"];

echo $senha =$_POST["senha"];

$query = "select * from usuario where email = '$email' and senha = '" .md5($senha)."'";

$consulta = mysqli_query($conectou,$query);

$valor = mysqli_num_rows($consulta);

$linha = mysqli_fetch_object($valor);
$coduser = $linha->idUsuario;
$_SESSION["codusuario"] = $coduser;
if($valor>0){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    echo "<script>alert('usuario conectado');</script>";
    echo "<script>window.location = '../view/menu_usuario'</script>";
    //header('location:menu_usuario.php');
}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    echo "<script>alert('usuario ou senha errado');</script>";
    echo "<script>window.location = '../index'</script>";

}

mysqli_close($conectou);