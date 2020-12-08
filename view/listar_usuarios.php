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

    <title>Listar Usuarios</title>

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

        <div class="container ">
            <h1 class="mt-4 text-center">Lista de Clientes</h1>


            <div class="  row border border-warning p-3">
             
               
                    <section>
                        <div class="col-md-12 ">
                            <div class=" text-center">

                                <?php

                                $buscar_dados = "select * from usuario order by nome ASC";
                                $buscar_dados = mysqli_query($conectou, $buscar_dados);
                                while ($linha = mysqli_fetch_array($buscar_dados)) {
                                    $cod_usuario = $linha["cod_usuario"]; //$linha[0];
                                    $nome = $linha["nome"];//$linha[1];
                                    $cpf = $linha["cpf"];
                                    $telefone = $linha["telefone"];
                                    $email = $linha["email"];

                                    echo "  <div class='row'>
                                                    <div class='col-md-6'>
                                                          <label for='produto'>Nome($linha[0]):</label></br>
                                                          <input type='text' class='form-control' maxlength='100' name='nome' value='$nome'>  
                                                   </div>
                                                   
                                                    <div class='col-md-6'>
                                                           <label for='cpf'>CPF:</label>
                                                           <input type='number' class='form-control' name='cpf' value='$cpf' >   <br/>
                                                    </div>
                                                 
                                                    
                                                    <div class='col-md-6'>
                                                       <label for='telefone'>Telefone:</label>
                                                        <input type='number' class='form-control' name='telefone' value='$telefone'>
                                                    </div>
                                                    
                                                    <div class='col-md-6'>
                                                        <label for='email'>Email:</label>
                                                        <input type='text' class='form-control' name='email' value='$email'>
                                                    </div>
                                                      
                                                       
                                                    <div class='text-center col-md-12 mt-4'>  
                                                        <a href='../view/editar_usuario.php?cod_usuario=$cod_usuario'><button  class='btn btn-info text-light' type='submit'>Editar</button></a>
                                                        <a href='../php/excluir_usuario.php?cod_usuario=$cod_usuario'<button  class='btn btn-warning text-light' type='submit'>Excluir</button></a>
                                                        <hr>
                                                    </div>  
                                                   
                                           </div>";
                                }
                                ?>
                            </div>
                        </div>
                            
                    </section>
                

        


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
