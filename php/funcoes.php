<?php

// Valor total //
function vTotal(){
    include "config.php";
    $query2 = "select sum(valor) from debcred";

    $consulta = mysqli_query($conectou,$query2);
    $linhas = mysqli_num_rows($consulta);

    while ($linhas = mysqli_fetch_array($consulta)) 
    {
                $valortotal=  $linhas['sum(valor)'];
    }
 $valortotal = round($valortotal, 2);
 return $valortotal;

}
// numero de itens total //
function tItens(){
    include "config.php";
    $consulta = mysqli_query($conectou,"select count(*) from debcred");
$vLinhas =   mysqli_num_rows($consulta);
while ($linhas = mysqli_fetch_array($consulta)) {

  $vLinhas=  $linhas['count(*)'];

}
return $vLinhas;
}

//itens por data atual //

function ItensData(){
    include "config.php";
    $dataI    = date('Y-m-01');
        $dataF    = date('Y-m-d');
        $consulta = mysqli_query($conectou,"SELECT count(*) FROM `debcred` where data BETWEEN '$dataI' and '$dataF'");
        $vItens   =   mysqli_num_rows($consulta);
        while ($linhas = mysqli_fetch_array($consulta)) {

        $vItens=  $linhas['count(*)'];

        }
return $vItens;
}

function ItensMesAnterior(){
    include "config.php";
    $dateI = date('Y-m-d', strtotime('first day of last month'));
    $dateF = date('Y-m-d', strtotime('last day of last month'));
    $query3 = "SELECT count(*) FROM debcred where data BETWEEN '$dateI' and '$dateF'";
    $consulta = mysqli_query($conectou,$query3);
    $vItensA =   mysqli_num_rows($consulta);
    while ($linhas = mysqli_fetch_array($consulta)) {

    $vItensA=  $linhas['count(*)'];

    }
return $vItensA;
}





?>