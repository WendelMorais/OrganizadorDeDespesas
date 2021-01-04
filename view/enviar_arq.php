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
$usuario1 = explode(" ", $usuario1);



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





 

        <div class="container">
            <h1 class="mt-4 text-center">Nessa sessão você pode enviar arquivos. </h1>
            <div class="col">
                <h3 class="text-center">Extenções aceitas: jpg, png, gif, pdf</h3>
            </div>


            <div class="dados border border-warning p-3">
                <div class="row">
                    <div class="col-12 ">
                            <div class="col-md-6 offset-md-3 ">
                                <form method="post" action="../php/recebe_upload" enctype="multipart/form-data">
                                    <label>Arquivo:</label>
                                    <input type="file" class="btn btn-info text-light " name="arquivo" />
                                    <br>
                                    <br>
                                    <input type="submit" class="btn btn-success text-light " value="Enviar" />
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
