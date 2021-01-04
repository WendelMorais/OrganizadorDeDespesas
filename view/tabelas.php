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

<body >
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php  include "../view/side_bar.php"; ?>




<div id="page-content-wrapper">



    <div class="container-fluid bg-light">
    

          <div class="row text-center mt-4 text-dark ">
          <div class="col-12 mt-4 float-left"> 
                        <h1>Tabelas por Meses</h1>
                  </div>
                  <div class="col-4">
                
                  <table class="table table-bordered table-dark">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Janeiro</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Gasto:</th>
                              <td>Mark</td>
                            </tr>
                            <tr>
                              <th scope="row">Total:</th>
                              <td>Jacob</td>
                            </tr>
                            <tr>
                              <th scope="row">Saldo:</th>
                              <td>Larry</td>
                            </tr>
                          </tbody>
                        </table>
                        
                  </div>
                  <div class="col-4">
                
                  <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Fevereiro</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Gasto:</th>
                              <td>Mark</td>
                            </tr>
                            <tr>
                              <th scope="row">Total:</th>
                              <td>Jacob</td>
                            </tr>
                            <tr>
                              <th scope="row">Saldo:</th>
                              <td>Larry</td>
                            </tr>
                          </tbody>
                        </table> 
                  </div>
                  <div class="col-4">
                
                  <table class="table table-bordered table-dark">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Março</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Gasto:</th>
                              <td>Mark</td>
                            </tr>
                            <tr>
                              <th scope="row">Total:</th>
                              <td>Jacob</td>
                            </tr>
                            <tr>
                              <th scope="row">Saldo:</th>
                              <td>Larry</td>
                            </tr>
                          </tbody>
                        </table>
                        
                  </div>
                  <div class="col-4">
                
                  <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Abril</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row">Gasto:</th>
                              <td>Mark</td>
                            </tr>
                            <tr>
                              <th scope="row">Total:</th>
                              <td>Jacob</td>
                            </tr>
                            <tr>
                              <th scope="row">Saldo:</th>
                              <td>Larry</td>
                            </tr>
                          </tbody>
                        </table>
                        
                  </div>
                  <div class="col-4">
                
                <table class="table table-bordered table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Maio</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Gasto:</th>
                            <td>Mark</td>
                          </tr>
                          <tr>
                            <th scope="row">Total:</th>
                            <td>Jacob</td>
                          </tr>
                          <tr>
                            <th scope="row">Saldo:</th>
                            <td>Larry</td>
                          </tr>
                        </tbody>
                      </table>
                      
                </div>
                <div class="col-4">
                
                <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Junho</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Gasto:</th>
                            <td>Mark</td>
                          </tr>
                          <tr>
                            <th scope="row">Total:</th>
                            <td>Jacob</td>
                          </tr>
                          <tr>
                            <th scope="row">Saldo:</th>
                            <td>Larry</td>
                          </tr>
                        </tbody>
                      </table>
                      
                </div>
                <div class="col-4">
                
                <table class="table table-bordered table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Julho</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Gasto:</th>
                            <td>Mark</td>
                          </tr>
                          <tr>
                            <th scope="row">Total:</th>
                            <td>Jacob</td>
                          </tr>
                          <tr>
                            <th scope="row">Saldo:</th>
                            <td>Larry</td>
                          </tr>
                        </tbody>
                      </table>
                      
                </div>
                <div class="col-4">
                
                <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Agosto</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Gasto:</th>
                            <td>Mark</td>
                          </tr>
                          <tr>
                            <th scope="row">Total:</th>
                            <td>Jacob</td>
                          </tr>
                          <tr>
                            <th scope="row">Saldo:</th>
                            <td>Larry</td>
                          </tr>
                        </tbody>
                      </table>
                      
                </div>
                <div class="col-4">
                
                <table class="table table-bordered table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Setembro</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Gasto:</th>
                            <td>Mark</td>
                          </tr>
                          <tr>
                            <th scope="row">Total:</th>
                            <td>Jacob</td>
                          </tr>
                          <tr>
                            <th scope="row">Saldo:</th>
                            <td>Larry</td>
                          </tr>
                        </tbody>
                      </table>
                      
                </div>
                <div class="col-4">
                
                <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Outubro</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Gasto:</th>
                            <td>Mark</td>
                          </tr>
                          <tr>
                            <th scope="row">Total:</th>
                            <td>Jacob</td>
                          </tr>
                          <tr>
                            <th scope="row">Saldo:</th>
                            <td>Larry</td>
                          </tr>
                        </tbody>
                      </table>
                      
                </div>
                <div class="col-4">
                
                <table class="table table-bordered table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Novembro</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Gasto:</th>
                            <td>Mark</td>
                          </tr>
                          <tr>
                            <th scope="row">Total:</th>
                            <td>Jacob</td>
                          </tr>
                          <tr>
                            <th scope="row">Saldo:</th>
                            <td>Larry</td>
                          </tr>
                        </tbody>
                      </table>
                      
                </div>
                <div class="col-4">
                
                <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dezembro</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">Gasto:</th>
                            <td>Mark</td>
                          </tr>
                          <tr>
                            <th scope="row">Total:</th>
                            <td>Jacob</td>
                          </tr>
                          <tr>
                            <th scope="row">Saldo:</th>
                            <td>Larry</td>
                          </tr>
                        </tbody>
                      </table>
                      
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
