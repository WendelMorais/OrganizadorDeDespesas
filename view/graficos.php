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

    <title>Menu Principal</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                //$query = "select sum(valor) as valor, descricao from debcred where data between '2020-01-01' and '2020-12-31' group by descricao ASC";
                $query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo "" ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras no Ano",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>



    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-03-01' and '2020-03-31' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Março",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("março"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-04-01' and '2020-04-30' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Abril",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("abril"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-05-01' and '2020-05-31' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Maio",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("maio"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-06-01' and '2020-06-30' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Junho",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("junho"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-07-01' and '2020-07-31' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Julho",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("julho"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-08-01' and '2020-08-31' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Agosto",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("agosto"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-09-01' and '2020-09-30' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Setembro",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("setembro"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-10-01' and '2020-10-31' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em outubro",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("outubro"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-11-01' and '2020-11-30' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Novembro",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("novembro"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-12-01' and '2020-12-31' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Dezembro",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("dezembro"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-01-01' and '2020-01-31' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em janeiro",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("janeiro"));
            chart.draw(view, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Descricao", "Valor", { role: "style" } ],

                <?php
                $query = "select sum(valor) as valor, descricao from debcred where data between '2020-02-01' and '2020-02-28' group by descricao ASC";
                ///$query="SELECT descricao,valor from debcred";
                $buscar = mysqli_query($conectou, $query);
                while($dados = mysqli_fetch_array($buscar))
                {
                $descricao = utf8_encode($dados['descricao']);
                $valor  	= $dados['valor'];
                ?>

                ["<?php echo $descricao ?>", <?php echo $valor ?>, "#k65788"],

                <?php
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Compras em Fevereiro",
                width: 1600,
                height: 600,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("fevereiro"));
            chart.draw(view, options);
        }
    </script>



    <style type="text/css">
    .hidden{
        display: none;
    }
    input{
        display: block;
    }
</style>
    <script>

        function mostrar(id){
            if( document.getElementById(id).style.display == 'block'){
                document.getElementById(id).style.display='none';
            }else
                document.getElementById(id).style.display='block';

        }
    </script>
    
<?php  include "../view/Nav_bar.php"; ?>
</head>

<body>

<div id="page-content-wrapper">

  

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php  include "../view/side_bar.php"; ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-lg-12 ml-5">
                        <h1 class="mt-4 ">Graficos</h1>
                    <input type="button" value="Despesas do Ano" class="btn btn-primary" onclick="mostrar('fu')">
                    <div id="fu" class="hidden" >
                        <div id="columnchart_values" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Março" class="btn btn-primary" onclick="mostrar('mr')">
                    <div id="mr" class="hidden">
                        <div id="março" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Abril" class="btn btn-primary" onclick="mostrar('ab')">
                    <div id="ab" class="hidden">
                        <div id="abril" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Maio" class="btn btn-primary" onclick="mostrar('mai')">
                    <div id="mai" class="hidden">
                        <div id="maio" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Junho"class="btn btn-primary"  onclick="mostrar('jn')">
                    <div id="jn" class="hidden">
                        <div id="junho" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Julho" class="btn btn-primary"  onclick="mostrar('jl')">
                    <div id="jl" class="hidden">
                        <div id="julho" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Agosto" class="btn btn-primary" onclick="mostrar('ag')">
                    <div id="ag" class="hidden">
                        <div id="agosto" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Setembro" class="btn btn-primary" onclick="mostrar('set')">
                    <div id="set" class="hidden">
                        <div id="setembro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Outubro" class="btn btn-primary" onclick="mostrar('ou')">
                    <div id="ou" class="hidden">
                        <div id="outubro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Novembro" class="btn btn-primary"  onclick="mostrar('nv')">
                    <div id="nv" class="hidden">
                        <div id="novembro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Dezembro" class="btn btn-primary" onclick="mostrar('dz')">
                    <div id="dz" class="hidden">
                        <div id="dezembro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Janeiro" class="btn btn-primary" onclick="mostrar('jn')">
                    <div id="jn" class="hidden">
                        <div id="janeiro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Fevereiro" class="btn btn-primary" onclick="mostrar('fv')">
                    <div id="fv" class="hidden">
                        <div id="fevereiro" style="width: auto; height: 600px;"></div>
                    </div>

                </div>
                <div class="container">
                    <div class=" my-5 center-block">
                        <hr color="black">
                        <input type="button" value="Debito/Credito" class="btn btn-primary" onclick="mostrar('db') ">
                        <div id="db" class="hidden">
                            <form name="teste" action="#" method="GET"> <!--ano, mes, tipo (mercado, farmacia,...., todos)-->
                                <label> Selecione periodo inicial</label>
                                <select class="form-control" name="mesi">
                                    <option value="">Selecione</option>
                                    <option value="2020-01-01">Janeiro</option>
                                    <option value="2020-02-01">Fevereiro</option>
                                    <option value="2020-03-01">Março</option>
                                    <option value="2020-04-01">Abril</option>
                                    <option value="2020-05-01">Maio</option>
                                    <option value="2020-06-01">Junho</option>
                                    <option value="2020-07-01">Julho</option>
                                    <option value="2020-08-01">Agosto</option>
                                    <option value="2020-09-01">Setembro</option>
                                    <option value="2020-10-01">Outubro</option>
                                    <option value="2020-11-01">Novembro</option>
                                    <option value="2020-12-01">Dezembro</option>
                                </select>
                                <br>
                                <label> Selecione periodo final</label>
                                <select class="form-control" name="mesf">
                                    <option value="">Selecione</option>
                                    <option value="2020-01-31">Janeiro</option>
                                    <option value="2020-02-28">Fevereiro</option>
                                    <option value="2020-03-31">Março</option>
                                    <option value="2020-04-30">Abril</option>
                                    <option value="2020-05-31">Maio</option>
                                    <option value="2020-06-30">Junho</option>
                                    <option value="2020-07-31">Julho</option>
                                    <option value="2020-08-31">Agosto</option>
                                    <option value="2020-09-30">Setembro</option>
                                    <option value="2020-10-31">Outubro</option>
                                    <option value="2020-11-30">Novembro</option>
                                    <option value="2020-12-31">Dezembro</option>
                                </select>
                                <input type="submit" value="gerar" class="form-control form-control-sm my-5 btn-success">
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script type="text/javascript">
                                    google.charts.load("current", {packages:['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);
                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ["Categoria", "Valor", { role: "style" } ],

                                            <?php

                                            $mes_inicial 	= $_GET['mesi'];
                                            $mes_final = $_GET['mesf'];

                                            $query = "select sum(valor) as valor, tipo, data from debcred where data between '$mes_inicial' and '$mes_final' group by tipo ASC";
                                            $buscar = mysqli_query($conectou, $query);
                                            while($dados = mysqli_fetch_array($buscar))
                                            {
                                            $categoria = utf8_encode($dados['tipo']);
                                            $valor  	= $dados['valor'];
                                            $mes_final = $dados['data'];
                                            $mes_inicial = $dados['data'];
                                            ?>

                                            ["<?php echo $categoria ?>", <?php echo $valor ?>, "#k65788"],

                                            <?php
                                            }
                                            ?>
                                        ]);

                                        var view = new google.visualization.DataView(data);
                                        view.setColumns([0, 1,
                                            { calc: "stringify",
                                                sourceColumn: 1,
                                                type: "string",
                                                role: "annotation" },
                                            2]);

                                        var options = {
                                            title: "Gráfico de gastos",
                                            width: 600,
                                            height: 400,
                                            bar: {groupWidth: "95%"},
                                            legend: { position: "none" },

                                        };
                                        var chart = new google.visualization.ColumnChart(document.getElementById("debitocredito"));
                                        chart.draw(view, options);
                                    }
                                </script>
                            </form>
                            <div id="debitocredito" style="width: 900px; height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

</body>

</html>
