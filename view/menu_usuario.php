<?php
include "../php/config.php";
include "../php/funcoes.php";
// sessão //
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

// Fim sessão //


//itens do mes anterior //

// itens do mes anterior//


?>

<!DOCTYPE html>

<html lang="pt-br">


<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Menu Principal</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">
  <link href="../css/stylemenu.css" rel="stylesheet">
<?php  include "../view/Nav_bar.php"; ?>

</head>

<style>

  </style>

<body style="background-color: grey">
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php  include "../view/side_bar.php"; ?>




<div id="page-content-wrapper">



    <div class="container-fluid bg-light">
      
            <div class="row text-center ">

                  <div class="col-12 mt-4 float-left"> 
                        <h1>Bem-vindo ao Sistema de Despesas</h1>
                  </div>
              </div>
              <div class="container"> 
              <div class="row">
                <div class="col-12 text-center" id="galeria">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators ">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-30 img-responsive" src="../bg/2684520-01.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-30 img-responsive" src="../bg/2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-30 img-responsive" src="../bg/3.png" alt="Third slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                </div>

              </div>
              </div>
          <div class="row text-center mt-4 text-dark">
                  <div class="col-12 ">
                
                    <p>Essa página esta sendo contruida para ser uma sistema de despesas pessoas, onde o usuario cadastra os valores e pode ir acompanhando suas economias mês a mês</p>
                    <p>Presente trabalho sendo desenvolvida durante a matéria de Linguagens de Programação, ministrada pelo Profº Rodrigo Antoniazzi. Desenvolvimento Wendel Moura.</p>
                      <p>Para utilização do sistema, selecione alguma opção no side-bar da esquerda. Obrigado!</p>
                  </div>
          </div>
          <div class="row text-center mt-4 text-dark">
                  <div class="col-6">
                
                  <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">Gastos até o momento</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Valor:</th>
                              <td><?php echo 'R$ '.vTotal(); ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Saldo:</th>
                              <td>R$ 10000</td>
                            </tr>
                            <tr>
                              <th scope="row">Status Saldo:</th>
                              <td>Positivo</td>
                            </tr>
                          </tbody>
                        </table>
                        
                  </div>
                  <div class="col-6">
                
                  <table class="table table-bordered ">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">Lista de itens comprados</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Esse mês:</th>
                              <td><?php echo ItensData() ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Mês anterior:</th>
                              <td><?php echo ItensMesAnterior() ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Nº itens no Ano:</th>
                              <td><?php echo tItens(); ?></td>
                            </tr>
                          </tbody>
                        </table> 
                 <div class="row" >
                 <label class="col-12"> Aqui futuramente vai o footer</label>
                 </div>
          </div>
            
    </div>
      
</div>

</div>

  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>

 
  <script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$('.carousel').carousel({
  interval: 2000
})
  </script>

    <script type="text/javascript">
        function insereTexto()
        {document.getElementById('divTeste').innerHTML = 'https://home.unicruz.edu.br/';}
    </script>

</body>

</html>
