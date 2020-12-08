<?php
include "../php/config.php";
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

<body>


<div class="d-flex" id="wrapper">
<?php  include "../view/side_bar.php"; ?>

<div id="page-content-wrapper">

        <div class="container-fluid ">
            <h1 class="mt-4 text-center">Preencha os Campos Abaixo</h1>
            <div class="col">
                <h3 class="text-center">Oque você comprou?</h3>
            </div>


            <div class="dados border border-warning p-3">
                <div class="row">
                    <div class="col-12 ">
                        <form action="../php/salvar_dados" method="post">
                            <div class="col-md-6 offset-md-3 ">
                                <div class="form-group">
                                    <label for="pagamento">Tipo de pagamento:</label>
                                    <select class="form-control" data-size="5" data-live-search="true" data-width="100%" name="pagamento" required>
                                        <option selected disabled>Escolha uma opção</option>
                                        <option value="Debito">Débito</option>
                                        <option value="Credito">Crédito</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group ">
                                    <label for="produto">Produto:</label>
                                    <input type="text" class="form-control" name="produto" placeholder="Produto" required>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="valor">Valor:</label>
                                    <input type="text" class="form-control" name="valor" placeholder="R$" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="descricao">Descrição do Produto:</label>
                                    <input type="text" class="form-control" name="descricao" placeholder="Descrição" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <label for="data">Data:</label>
                                    <input type="date" class="form-control" name="data" required>
                                </div>
                            </div>
                            <div class="text-center">

                                <br/>
                                <br/>
                            <button class="btn btn-info text-light " type="submit">Salvar</button>
                            <button class="btn btn-warning text-light" type="submit">Limpar Campos</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!--next-->
        </div>

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
