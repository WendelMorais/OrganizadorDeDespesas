<?php
include("./php/config.php");
error_reporting(0);
$mes_inicial 	= $_GET['mesi'];
$mes_final = $_GET['mesf'];

?>

<!doctype html>
<html>
<head>
  </head>
  <body>
  <br>
  <br>
  <form name="teste" action="#" method="GET"> <!--ano, mes, tipo (mercado, farmacia,...., todos)-->
  <label> Selecione periodo inicial</label>
	<select name="mesi">
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
	<select name="mesf">
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
    <input type="submit" value="gerar">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Categoria", "Valor", { role: "style" } ],
		
		<?php
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
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
		</form>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>