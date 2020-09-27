<?php

$local_server = "localhost";
$usuario_server = "root";
$senha_server = "";
$base_dados = "sistemalp";

$conectou = mysqli_connect($local_server,$usuario_server,$senha_server,$base_dados);


if(!$conectou){
    echo "Erro: Falha ao estabelecer conexão";
    exit;
}



?>