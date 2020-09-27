<?php

header("Content-Type: text/html; charset=utf-8", true);

$tipo = $_POST["pagamento"];
$produto= $_POST["produto"]; //
$valor = $_POST["valor"];
$descricao = $_POST["descricao"];//
$data = $_POST["data"];//


include("config.php");


    $inseri = "insert into debcred values('','$descricao','$tipo','$valor','$data','$produto')";
    $inserir = mysqli_query($conectou, $inseri);

    echo "<script>alert('Cadastro de produto efetuado com sucesso')</script>";
    echo "<script>window.location = 'cadastrar_dados.php'</script>";



mysqli_close($conectou);

?>