<?php

include "../php/config.php";

$buscar_dados = "select * from debcred ";
$buscar_dados = mysqli_query($conectou, $buscar_dados);

session_start();

if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    echo "<script>alert('usuario não conectado');</script>";
    header('location: ../index.php');
}

$logado = $_SESSION['email'];

$query = "select nome from usuario where email = '$logado' ";

$consulta = mysqli_query($conectou,$query);

$valor =  mysqli_fetch_array($consulta);


$usuario1 = $valor['nome'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Produtos Cadastrados</title>
    

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <?php  include "../view/Nav_bar.php"; ?>
</head>

<body>
<div class="d-flex" id="wrapper">
        <?php  include "../view/side_bar.php"; ?>
    <div id="page-content-wrapper">


   

      
     


        <div class="container-fluid ">
            <h1 class="mt-4 my-3 text-center">Produtos Cadastrados</h1>
            <div class=" border border-warning p-3">
                <div class="row">
                <div class="col-12 ">

                
                            <div class=" text-center">
                            <p><a href="../php/gerar_pdf">GERAR RELATÓRIO PDF</a></p>
                                <table class='table'>
                                    <thead>
                                    <tr>
                                        <th scope='col'>#</th>
                                        <th scope='col'>Produto</th>
                                        <th scope='col'>Tipo</th>
                                        <th scope='col'>Valor</th>
                                        <th scope='col'>Data</th>
                                        <th scope='col'>Descrição</th>
                                    </tr>
                                    </thead>
                                <?php
                                while ($linha = mysqli_fetch_array($buscar_dados)) {
                                    $descricao = $linha["descricao"];//$linha[1];
                                    $tipo = $linha["tipo"];
                                    $valor = $linha["valor"];
                                    $data = $linha["data"];
                                    $produto = $linha["produto"];
                                    ini_set('display_errors', 0 );
                                    error_reporting(0);
                                    $i++;
                                    echo "                       
                                                  <tbody>
                                                    <tr>
                                                      <th scope='row'>$i</th>
                                                      <td>$produto</td>
                                                      <td>$tipo</td>
                                                      <td>$valor </td>
                                                      <td>$data </td>
                                                      <td>$descricao </td>
                                                    </tr>           
                                                  </tbody>
                                              ";

                                }


                                ?>
                                </table>
                            </div>

                </div>

            </div>


         </div>
        <!--next-->
        </div>

    </div>
</div>


<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
