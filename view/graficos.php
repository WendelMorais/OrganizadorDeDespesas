<?php

include "../php/config.php";


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
                    <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
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
                <a href="cadastrar_dados.php" class="list-group-item list-group-item-action bg-light">Cadastrar Dados</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Ver Despesas</a>
                <a href="listar_usuarios.php" class="list-group-item list-group-item-action bg-light">Listar Usuários</a>
                <a href="Listar_Produtos.php" class="list-group-item list-group-item-action bg-light">Produtos Cadastrados</a>
                <a href="graficos.php" class="list-group-item list-group-item-action bg-dark text-light">Gráficos</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-lg-12">
                        <h1 class="mt-4 ">Graficos</h1>
                    <input type="button" value="Despesas do Ano" onclick="mostrar('fu')">
                    <div id="fu" class="hidden" >
                        <div id="columnchart_values" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Março" onclick="mostrar('mr')">
                    <div id="mr" class="hidden">
                        <div id="março" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Abril" onclick="mostrar('ab')">
                    <div id="ab" class="hidden">
                        <div id="abril" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Maio" onclick="mostrar('mai')">
                    <div id="mai" class="hidden">
                        <div id="maio" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Junho" onclick="mostrar('jn')">
                    <div id="jn" class="hidden">
                        <div id="junho" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Julho" onclick="mostrar('jl')">
                    <div id="jl" class="hidden">
                        <div id="julho" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Agosto" onclick="mostrar('ag')">
                    <div id="ag" class="hidden">
                        <div id="agosto" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Setembro" onclick="mostrar('set')">
                    <div id="set" class="hidden">
                        <div id="setembro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Outubro" onclick="mostrar('ou')">
                    <div id="ou" class="hidden">
                        <div id="outubro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Novembro" onclick="mostrar('nv')">
                    <div id="nv" class="hidden">
                        <div id="novembro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Dezembro" onclick="mostrar('dz')">
                    <div id="dz" class="hidden">
                        <div id="dezembro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Janeiro" onclick="mostrar('jn')">
                    <div id="jn" class="hidden">
                        <div id="janeiro" style="width: auto; height: 600px;"></div>
                    </div>

                    <input type="button" value="Fevereiro" onclick="mostrar('fv')">
                    <div id="fv" class="hidden">
                        <div id="fevereiro" style="width: auto; height: 600px;"></div>
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
