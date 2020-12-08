<?php

include("../php/config.php");

$cod_usuario = $_GET["cod_usuario"];



$busca_usuario = "select * from usuario where cod_usuario = $cod_usuario";
$busca_usuario = mysqli_query($conectou, $busca_usuario);
$busca_usuario = mysqli_fetch_array($busca_usuario);

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

    <title>Cadastro de Dados</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <?php  include "../view/Nav_bar.php"; ?>
</head>

<body >

<div class="d-flex" id="wrapper" >

    <!-- Sidebar -->
    <?php  include "../view/side_bar.php"; ?>




        <div class="container-fluid ">
            <h1 class="mt-4 text-center">Editar Usuário</h1>
            <div class="col">
                <h3 class="text-center"><?php echo $busca_usuario['nome']; ?></h3>
            </div>


            <div class="dados border border-warning p-3">
                <div class="row">
                    <div class="col-12 ">
                        <form action="salvar_edicao" method="post">
                            <input type="hidden" name="cod_usuario" value="--><?php echo $busca_usuario['cod_usuario']; ?><!--"-->
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group ">
                                    <label for="nome">Nome:</label>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $busca_usuario['nome']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" name="cpf" value="<?php echo $busca_usuario['cpf']; ?>" >
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="data">Data de Nascimento:</label>
                                    <input type="date" class="form-control" name="data" value="<?php echo $busca_usuario['data_nasc']; ?>">
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-info text-light " type="submit" value="Alterar">Salvar</button>
                            </div>
                        </form>
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
