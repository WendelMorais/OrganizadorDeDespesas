<?php
header("Content-Type: text/html; charset=utf-8", true);

$telefone = $_POST["telefone"];
$nome = $_POST["nome"]; //
$cpf= $_POST["cpf"];
$data_nasc = $_POST["data_nasc"];//
$email = $_POST["email"];//
$senha =$_POST["senha"];
$senha_banco = md5($senha);
$genero = $_POST["Genero"];
$nivel = $_POST["nivel"];//

include("config.php");

$query = "select * from usuario where cpf = $cpf ";

$consulta = mysqli_query($conectou,$query);
$valor = mysqli_num_rows($consulta);

if ($valor>0){
    echo "<script>alert('Usuário ja cadastrado')</script>";
    echo "<script>window.location = 'primeiro_acesso.php'</script>";
}
else{
    $inseri = "insert into usuario values('','$nivel','$telefone','$nome','$data_nasc','$email','$cpf','$senha_banco','$genero')";
    $inserir = mysqli_query($conectou,$inseri);

    echo "<script>alert('Usuário cadastrado com sucesso')</script>";
    echo "<script>window.location = 'index.php'</script>";

}

mysqli_close($conectou);

?>