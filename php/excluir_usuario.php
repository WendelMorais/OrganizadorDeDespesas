<?php
echo $cod_usuario = $_GET["cod_usuario"];


include("config.php");

$sql = "DELETE FROM usuario WHERE cod_usuario = $cod_usuario";

mysqli_query($conectou, $sql) or die("<script>alert('Erro ao excluir usuário, tente novamente')</script>");

echo "<script>window.location = '../view/listar_usuarios'</script>";

mysqli_close($conectou);


?>