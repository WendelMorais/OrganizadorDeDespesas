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

</head>

<body>

<div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom ">
        <button class="btn btn-light " id="menu-toggle">Ocultar menu lateral</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="menu_usuario.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Preferencias</a>
                        <a class="dropdown-item" href="#">Sair</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Linguagens de Programação</div>
            <div class="list-group list-group-flush">
                <a href="cadastrar_dados.php" class="list-group-item list-group-item-action bg-light text-dark">Cadastrar Dados</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Ver Despesas</a>
                <a href="listar_usuarios.php" class="list-group-item list-group-item-action  bg-light text-dark">Listar Usuarios</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Produtos Cadastrados</a>
                <a href="graficos.php" class="list-group-item list-group-item-action bg-light">Gráficos</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>


        <div class="container-fluid ">
            <h1 class="mt-4 my-3 text-center">Produtos Cadastrados</h1>
            <div class=" border border-warning p-3">
                <div class="row">
                <div class="col-12 ">


                            <div class=" text-center">
                                <table class='table'>
                                    <thead>
                                    <tr>
                                        <th scope='col'>#</th>
                                        <th scope='col'>Produto</th>
                                        <th scope='col''>Tipo</th>
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
