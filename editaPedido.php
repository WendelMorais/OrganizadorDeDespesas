<!DOCTYPE html>
<html>

<head>

<style>
	body 
	{
		-moz-transform: scale(0.7, 0.7); /* Moz-browsers */
		zoom: 0.7; /* Other non-webkit browsers */
		zoom: 70%; /* Webkit browsers */ 
	}
	
	fieldset {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

table {
	 font-size: 13px;
}
table tr {
	 font-size: 13px;
	 te
}
table td {
	 font-size: 17px;
}

legend {
	font-size: 14px;
	font-weight: bold;
}

.dataTables_length {
float: right;
}
.dataTables_filter {
float: left;
text-align: left;
}

table.dataTable tbody tr.selected td{
    color: white;
    background-color: #000000;
	font-size: 20px;
	
}




	</style>
	
    <?php include "../verificasessao.php";?>
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Consulta Pedidos</title>

    <!-- Bootstrap Core CSS -->
     <link href="../css/bootstrap.min.css" rel="stylesheet">
	 <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet"/> 
	 <link href="../css/keyTable.bootstrap.min.css" rel="stylesheet"/> 
	

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
	
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

  <!-- Bootstrap select Core JavaScript -->
    <script src="../js/bootstrap-select.min.js"></script>
	
	<style>
    .modal-lg {
        width: 90%;
		}
		


table.dataTable th.focus,
table.dataTable td.focus {
 outline: none;
}

table.KeyTable tr.focus {
outline: 3px solid #3366FF;
outline-offset: -3px;
}

table.KeyTable th.focus {
outline: 3px solid #3366FF;
outline-offset: -3px;
}

td.details-control {
    background: url('img/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('img/details_close.png') no-repeat center center;
}
	</style>
    
	
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php 
include "../verificasessao.php";
include ("init3.php");
$menu=3;
$libera=0;

if(isset($_GET ["cd_pedido"])) {$CD_PEDIDO  = $_GET ["cd_pedido"];}
if(isset($_GET ["libera"])) {$libera  = $_GET ["libera"];}


if(!strpos($CD_PEDIDO,'WEB'))
{
	ECHO "
<SCRIPT>
alert('Pedido $CD_PEDIDO não é um pedido WEB');
setTimeout('location.href=\"pedidosporcontrole.php\";', 0);				
</SCRIPT>
";
}


$StrsqlBuscaEstado = oci_parse($conn,"select CD_CLIENTE,CAMPO102 from fapedido where cd_pedido = trim('$CD_PEDIDO')");
	oci_execute($StrsqlBuscaEstado);				
	while($resposta = oci_fetch_array($StrsqlBuscaEstado)) 
		{			
		//$ESTADO = $resposta["CAMPO102"];
		$CD_CLIENTE_TB = $resposta["CD_CLIENTE"];
		}
	$StrsqlBuscatb = oci_parse($conn,"select PR_TABELA_DE from GEEMPRES where CD_EMPRESA ='$CD_CLIENTE_TB'");
	oci_execute($StrsqlBuscatb);				
	while($resposta = oci_fetch_array($StrsqlBuscatb)) 
		{			
		
		$PR_TABELA_DE = $resposta["PR_TABELA_DE"];
		}
	
	$StrsqlBuscatb = oci_parse($conn,"SELECT dado_alpha from gecfg where gecfg.sequencia='47'");
	oci_execute($StrsqlBuscatb);				
	while($resposta = oci_fetch_array($StrsqlBuscatb)) 
		{			
		
		$PR_TABELA_PADRAO = $resposta["DADO_ALPHA"];
		}




if($PR_TABELA_DE<>' ')
{
$tbpreco=$PR_TABELA_DE;
}
else
{
$tbpreco=$PR_TABELA_PADRAO;	
}



/*$sqlProduto = "select T1.CD_MATERIAL,T1.DESCRICAO,SUM(T2.QT_ONLINE)AS QT_ONLINE,T1.CD_UNIDADE_MEDI,SUM(T2.QUANTIDADE) AS QUANTIDADE,
case when quant_venda.quantidade is null then 0 else quant_venda.quantidade end as quant
from ESMATERI T1 
left outer join srv_web_mvend quant_venda on quant_venda.cd_material=t1.cd_material
JOIN ESESTOQU T2 ON T2.CD_MATERIAL = T1.CD_MATERIAL WHERE T1.CD_MATERIAL <>' ' and t2.cd_centro_armaz=t1.campo83  AND T2.CD_UNIDADE_DE_N='$unidadeUsuario'
 GROUP BY T1.CD_MATERIAL,DESCRICAO,T1.CD_UNIDADE_MEDI,QUANT_VENDA.QUANTIDADE order by quant desc";*/
 
/* $sqlProduto = "SELECT T1.CD_MATERIAL,T1.DESCRICAO,T1.CD_UNIDADE_MEDI,
case when quant_venda.quantidade is null then 0 else quant_venda.quantidade end as quant
FROM ESMATERI T1 LEFT OUTER JOIN SRV_WEB_MVEND QUANT_VENDA ON QUANT_VENDA.CD_MATERIAL = T1.CD_MATERIAL
where T1.tipo IN ('O','A') ORDER BY t1.descricao asc"; 


$sqlProduto = "SELECT CD_MATERIAL,RESUMO_TEC,IMG_MAT,CD_REDUZIDO,QT_ONLINE_SM AS QT_ONLINE_SM,QT_ONLINE_PF AS QT_ONLINE_PF,CD_CENTRO_ARMAZ,TEM_ALTER,CD_UNIDADE_MEDI,DESCRICAO,LOCAL_DE_ARMAZENAGEM,CAMPO85,
tb_preco,to_char(pr_unitario , 'fm9999999999999999999990D00')  as pr_unitario
FROM (
     select t1.cd_material,RT.HISTORICO AS RESUMO_TEC,get_filename(IMG.HISTORICO) AS IMG_MAT,T1.CD_REDUZIDO,pre.pr_unitario,pre.tb_preco,
     case when T2.QT_ONLINE IS NOT NULL then t2.QT_ONLINE ELSE 0 END AS QT_ONLINE_SM,
     case when T22.QT_ONLINE IS NOT NULL then t22.QT_ONLINE ELSE 0 END AS QT_ONLINE_PF,
     CASE WHEN t2.cd_centro_armaz IS NOT NULL THEN T2.CD_CENTRO_ARMAZ ELSE '0' END AS CD_CENTRO_ARMAZ,
   CASE WHEN ALTERN.CD_MATERIAL IS NOT NULL THEN 1 ELSE 0 END AS TEM_ALTER,
   T1.CD_UNIDADE_MEDI,replace(t1.descricao,'''','')as descricao,case when t1.localizacao<>' ' then t1.localizacao
     else esmxarma.local_de_armazenagem 
     end as local_de_armazenagem,T1.CAMPO85 from esmateri t1 
   LEFT JOIN ESACOMPA RT ON TRIM(RT.MATERIAL_BEM)=TRIM(T1.CD_MATERIAL) AND RT.tipo_acomp='R'
   LEFT JOIN ESACOMPA IMG ON TRIM(IMG.MATERIAL_BEM)=TRIM(T1.CD_MATERIAL) AND IMG.tipo_acomp='M' AND IMG.REAVALIACOES='10'
   LEFT JOIN ESALTERN ALTERN ON TRIM(ALTERN.CD_MATERIAL)=TRIM(T1.CD_MATERIAL)
      left outer join ESESTOQU T2 ON T2.CD_MATERIAL = T1.CD_MATERIAL AND T2.CD_CENTRO_ARMAZ='001' AND T2.CD_UNIDADE_DE_N='001'
      left outer join ESESTOQU T22 ON T22.CD_MATERIAL = T1.CD_MATERIAL AND T22.CD_CENTRO_ARMAZ='001' AND T22.CD_UNIDADE_DE_N='002'
      LEFT OUTER JOIN ESMXARMA ON ESMXARMA.CODIGO_MATERIAL=t1.CD_MATERIAL 
      left join geprecta pre on pre.tb_preco=(select t9.dado_alpha from gecfg t9 where t9.sequencia='47') and trim(pre.elemento)=t1.cd_material
       where t1.cd_material<>' ')T
       
  GROUP BY CD_MATERIAL,CD_REDUZIDO,CD_CENTRO_ARMAZ,QT_ONLINE_SM,QT_ONLINE_PF,TEM_ALTER,RESUMO_TEC,IMG_MAT,CD_UNIDADE_MEDI,DESCRICAO,LOCAL_DE_ARMAZENAGEM,CAMPO85,tb_preco,pr_unitario 
   ORDER BY T.CD_MATERIAL,T.CD_CENTRO_ARMAZ,QT_ONLINE_SM,QT_ONLINE_PF
   ";
*/

$sqlProduto = "SELECT T.CD_MATERIAL,T.RESUMO_TEC,T.IMG_MAT,T.CD_REDUZIDO,
CASE WHEN TT1.qt_saldo IS NOT NULL THEN QT_ONLINE_SM-TT1.QT_SALDO ELSE QT_ONLINE_SM  END AS QT_ONLINE_SM,
CASE WHEN TT2.qt_saldo IS NOT NULL THEN QT_ONLINE_PF-TT2.QT_SALDO ELSE QT_ONLINE_PF  END AS QT_ONLINE_PF,
QT_ONLINE_SM AS QT_ONLINE_SM_,
QT_ONLINE_PF AS QT_ONLINE_PF_,
CD_CENTRO_ARMAZ,TEM_ALTER,CD_UNIDADE_MEDI,DESCRICAO,LOCAL_DE_ARMAZENAGEM,CAMPO85,
tb_preco,to_char(pr_unitario , 'fm9999999999999999999990D00')  as pr_unitario,
t.classificacao_f
FROM (
     select t1.cd_material,RT.HISTORICO AS RESUMO_TEC,get_filename(IMG.HISTORICO) AS IMG_MAT,T1.CD_REDUZIDO,pre.pr_unitario,pre.tb_preco,
     case when T2.QT_ONLINE IS NOT NULL then t2.QT_ONLINE ELSE 0 END AS QT_ONLINE_SM,
     case when T22.QT_ONLINE IS NOT NULL then t22.QT_ONLINE ELSE 0 END AS QT_ONLINE_PF,
     CASE WHEN t2.cd_centro_armaz IS NOT NULL THEN T2.CD_CENTRO_ARMAZ ELSE '0' END AS CD_CENTRO_ARMAZ,
   CASE WHEN ALTERN.CD_MATERIAL IS NOT NULL THEN 1 ELSE 0 END AS TEM_ALTER,
   T1.CD_UNIDADE_MEDI,replace(t1.descricao,'''','')as descricao,case when t1.localizacao<>' ' then t1.localizacao
     else esmxarma.local_de_armazenagem 
     end as local_de_armazenagem,T1.CAMPO85,t1.classificacao_f from esmateri t1 
   LEFT JOIN ESACOMPA RT ON TRIM(RT.MATERIAL_BEM)=TRIM(T1.CD_MATERIAL) AND RT.tipo_acomp='R'
   LEFT JOIN ESACOMPA IMG ON TRIM(IMG.MATERIAL_BEM)=TRIM(T1.CD_MATERIAL) AND IMG.tipo_acomp='M' AND IMG.REAVALIACOES='10'
   LEFT JOIN ESALTERN ALTERN ON TRIM(ALTERN.CD_MATERIAL)=TRIM(T1.CD_MATERIAL)
      left outer join ESESTOQU T2 ON T2.CD_MATERIAL = T1.CD_MATERIAL AND T2.CD_CENTRO_ARMAZ='001' AND T2.CD_UNIDADE_DE_N='001'
      left outer join ESESTOQU T22 ON T22.CD_MATERIAL = T1.CD_MATERIAL AND T22.CD_CENTRO_ARMAZ='001' AND T22.CD_UNIDADE_DE_N='002'
      LEFT OUTER JOIN ESMXARMA ON ESMXARMA.CODIGO_MATERIAL=t1.CD_MATERIAL 
      left join geprecta pre on pre.tb_preco='$tbpreco' and trim(pre.elemento)=t1.cd_material
       where t1.cd_material<>' ' and t1.tipo='A')T
left join srv_demandas_pedidos TT1 ON TT1.cd_material=T.CD_MATERIAL and TT1.cd_unid_de_neg='001'
left join srv_demandas_pedidos TT2 ON TT2.cd_material=T.CD_MATERIAL and TT2.cd_unid_de_neg='002'
 
       
  GROUP BY TT1.qt_saldo,TT2.qt_saldo,T.CD_MATERIAL,T.CLASSIFICACAO_F,T.CD_REDUZIDO,T.CD_CENTRO_ARMAZ,T.QT_ONLINE_SM,T.QT_ONLINE_PF,T.TEM_ALTER,T.RESUMO_TEC,T.IMG_MAT,T.CD_UNIDADE_MEDI,T.DESCRICAO,T.LOCAL_DE_ARMAZENAGEM,T.CAMPO85,T.tb_preco,T.pr_unitario 
   ORDER BY T.CD_MATERIAL,T.CD_CENTRO_ARMAZ,T.QT_ONLINE_SM,T.QT_ONLINE_PF";


$STRselectProduto = oci_parse($conn, $sqlProduto);
 										 oci_execute($STRselectProduto);
										 $vContLinha=1;
										 $stringProdutos.="<option value=0>Escolher Material</option>\n";
										 while($resposta = oci_fetch_array($STRselectProduto))
										 {
											 $alternativos="";
											 $relacionados="";
											 $CD_MATERIAL = 	  $resposta ["CD_MATERIAL"];
											  $TEM_ALTER = 	  $resposta ["TEM_ALTER"];
											  IF($TEM_ALTER!=0)
											  {
												$STRselectAlter = oci_parse($conn,"SELECT ESALTERN.CD_MATERIAL,CD_MATERIAL_ALT,DESCRICAO FROM ESALTERN JOIN ESMATERI ON TRIM(ESMATERI.CD_MATERIAL)=TRIM(ESALTERN.CD_MATERIAL_ALT) WHERE ESALTERN.CAMPO33 IN (' ','R') and trim(ESALTERN.CD_MATERIAL)='$CD_MATERIAL'");
												oci_execute($STRselectAlter);
												while($respostaAlter = oci_fetch_array($STRselectAlter))
												{
													$alternativos.="$respostaAlter[CD_MATERIAL_ALT] - $respostaAlter[DESCRICAO]";
													$alternativos.="<br>";
												}
												$STRselectRela = oci_parse($conn,"SELECT ESALTERN.CD_MATERIAL,CD_MATERIAL_ALT,DESCRICAO FROM ESALTERN JOIN ESMATERI ON TRIM(ESMATERI.CD_MATERIAL)=TRIM(ESALTERN.CD_MATERIAL_ALT) WHERE ESALTERN.CAMPO33 IN ('A') and trim(ESALTERN.CD_MATERIAL)='$CD_MATERIAL'");
												oci_execute($STRselectRela);
												while($respostaRela = oci_fetch_array($STRselectRela))
												{
													$relacionados.="$respostaRela[CD_MATERIAL_ALT] - $respostaRela[DESCRICAO]";
													$relacionados.="<br>";
												}
											  }
											 
											 
											 
											//$Descricao =  $resposta ["CD_REDUZIDO"];
											$Descricao =  $resposta ["DESCRICAO"];
											
											$TB_PRECO= 	$resposta["TB_PRECO"];
											$PR_UNITARIO= 	$resposta["PR_UNITARIO"];
											//$PR_UNITARIO= 	str_replace(',','.',$PR_UNITARIO);
											//$PR_UNITARIO = number_format($PR_UNITARIO, 2, '.', '');
											
											$QT_ONLINE= 	$resposta["QT_ONLINE_SM"];
											$QT_ONLINE_PF= 	$resposta["QT_ONLINE_PF"];
											$RESUMO_TEC= 	$resposta["RESUMO_TEC"];
											$IMG_MAT= 	$resposta["IMG_MAT"];
											if ($IMG_MAT==""||$IMG_MAT==" ")
											{$IMG_MAT='CGSobre.jpg';}
											$RESUMO_TEC=  STR_REPLACE(chr(10),"<br>",$RESUMO_TEC);
											$QT_ONLINE=  str_replace (',','.',$QT_ONLINE);
											$QT_ONLINE = number_format($QT_ONLINE, 2, ',', '');
											$QT_ONLINE_PF=  str_replace (',','.',$QT_ONLINE_PF);
											$QT_ONLINE_PF = number_format($QT_ONLINE_PF, 2, ',', '');
											//$QT_ONLINE= STR_REPLACE('.',',',$QT_ONLINE);
											$CD_CENTRO_ARMAZ = $resposta["CD_CENTRO_ARMAZ"];
											if ($CD_CENTRO_ARMAZ=="0")
											{$CD_CENTRO_ARMAZ='SEM REGISTRO DE ESTOQUE';}
											
											$local_de_armazenagem = 	  $resposta ["LOCAL_DE_ARMAZENAGEM"];
											if ($local_de_armazenagem!="")
											{$local_de_armazenagem="LOCAL: $local_de_armazenagem / ";}
											if ($resposta["CD_CENTRO_ARMAZ"]!="")
											{$estoque="C.A.  $resposta[CD_CENTRO_ARMAZ] Estoque: $QT_ONLINE $resposta[CD_UNIDADE_MEDI]";}
											else{$estoque="SEM REGISTRO DE ESTOQUE ";}
											
											 $detalhes="<table border='2'><tr style='font-size: 22px;'><td style='font-size: 22px;'>Resumo Tecnico</td><td align='center' style='font-size: 22px;'>Imagem</td><td style='font-size: 22px;'>Materiais Alternativos</td><td style='font-size: 22px;'>Materiais Relacionados</td></tr><tr><td width='600' style='font-size: 18px;'>$RESUMO_TEC</td><td align='center' width='600'><img src='img/$IMG_MAT' height='200'></td><td width='600' style='font-size: 18px;'>$alternativos</td><td width='600' style='font-size: 18px;'>$relacionados</td></tr></table>";
											 
											 echo "<!-- ".$detalhes."-->";
											 
											 
											
											 
											 
											 $Descricao = str_replace("'","",$resposta["DESCRICAO"]);
											 $Descricao.= " >>NCM - ".$resposta ["CLASSIFICACAO_F"];
											 
											 //aqui
											$stringProdutos.="<option value=$resposta[CD_MATERIAL]>$resposta[CD_MATERIAL] - $Descricao - $resposta[CD_UNIDADE_MEDI]</option>\n";
											
											$stringMateriais.="<tr id='$resposta[CD_MATERIAL]'>
											<td>$resposta[CD_MATERIAL]</td>
											<td><input type='checkbox' name='itemP_".$vContLinha."' id='itemP_".$vContLinha."' class='cbMaterial' value='".$CD_MATERIAL."|".$PR_UNITARIO."' ></td>
											<td><b>$resposta[CD_MATERIAL] - $Descricao </b></td>
											<td>$PR_UNITARIO</td>
											<td>$CD_CENTRO_ARMAZ</td>
											<td>$QT_ONLINE</td>
											<td>$QT_ONLINE_PF</td>
											<td> $resposta[CD_UNIDADE_MEDI]</td>
											<td class='details-control'> </td>
											 <td >".$detalhes."</td> 
											</tr>\n";

											//$stringProdutos.="+'<option value=$resposta[CD_MATERIAL]>$resposta[CD_MATERIAL] - ".str_pad($Descricao,50,"_",STR_PAD_RIGHT)."&nbsp|&nbspEstoque: $resposta[QT_ONLINE] $resposta[CD_UNIDADE_MEDI] ==> $resposta[BARRA] $resposta[UNIDADE_MEDIDA]</option>'";
$vContLinha++;
										 }



$consultaOs = "SELECT 
(select observacao from geobsemp where geobsemp.sequencia=99 and geobsemp.cd_empresa=ge.cd_empresa)obsemp,
(SELECT EMAIL FROM VECEMPRE WHERE CD_EMPRESA=GE.CD_EMPRESA AND SEQUENCIA_CONTA='0')EMAIL1,
(SELECT EMAIL FROM VECEMPRE WHERE CD_EMPRESA=GE.CD_EMPRESA AND SEQUENCIA_CONTA='1')EMAIL2,
GE.CD_EMPRESA,GE.NOME_COMPLETO,GE.FANTASIA,GE.MUNICIPIO,GE.ENDERECO,GE.FONE,GE.FAX_FONE,
GE.CNPJ_CPF ,GE.INSCRICAO,fa.observacao,fa.cd_cliente,GE.INSCRITO,FA.CD_TRANSPORTADO,FA.TIPO_FRETE,fa.total_pedido,FA.VL_IPI,FA.VL_FRETE,fa.cd_pedido,to_char(dt_pedido,'dd/mm/yyyy')dt_pedido,to_char(fa.dt_prazo_progra,'dd/mm/yyyy')dt_prazo_progra,FA.cd_condicao_pag as cod_cond,FA.cd_condicao_pag||' - '||FA.desc_cond_pagto as CONDICAO,fa.situacao,fa.controle as controle2,fa.controle||' - '||(SELECT DESCRICAO FROM FACONTRO WHERE FACONTRO.CONTROLE = FA.CONTROLE) AS CONTROLE,ge.nome_completo AS EMPRESA FROM FAPEDIDO fa join geempres ge on ge.cd_empresa=fa.cd_cliente  WHERE fa.CD_PEDIDO = '$CD_PEDIDO'";

$consultaAtiv = "SELECT case when sal.SALDO_VW_BON is null then 0 else sal.SALDO_VW_BON end as SALDO_VW_BON,FAITEMPE.CONTROLE,(SELECT DESCRICAO FROM FACONTRO WHERE FACONTRO.CONTROLE=FAITEMPE.CONTROLE)DESC_CONTROLE,FAITEMPE.VL_IPI,TRIM(FAITEMPE.DESCRICAO) AS DESCRICAO_ITEM,EM.DESCRICAO,EM.CD_MATERIAL,FAITEMPE.QUANTIDADE,FAITEMPE.PR_UNITARIO,
FAITEMPE.VL_TOTAL_ITEM_L,FAITEMPE.SEQUENCIA,FAITEMPE.CD_PEDIDO,(select cg_pk_descr_ident.monta_descr_ident
       (i.identificador,cg_pk_descr_ident.monta_descr_ident(i.identificador,' ',1),0) descricao
from ppident i where i.identificador=faitempe.cd_especif1)as descricao_ident
FROM FAITEMPE 
join esmateri em on em.cd_material=faitempe.cd_material
left join SRV_SALDO_BONIFICACAO sal on sal.cd_cliente=faitempe.cd_empresa
 WHERE CD_PEDIDO = '$CD_PEDIDO' AND CD_ESPECIE='R' 
 order by faitempe.sequencia asc
 ";

//para implementacao em cliente $consultaOs.= " where gmo.cd_cliente=$codigoUsuario";
//$consultaOs.= "where GMO.CD_NUMERO_OS=GMO.CD_NUMERO_OS";
//if ($nivelUsuario==0){
//$consultaOs.= " and gmo.cd_cliente=$codigoUsuario";
//}

//if($checkIni!=""||$checkPen!=""||$checkCon!=""||$checkFat!="")
//{
//$consultaOs.= " and GMI.SITUACAO IN ('Z'";
//	if($checkIni!=""){$consultaOs.=",'$checkIni'";}
//	if($checkPen!=""){$consultaOs.=",'$checkPen'";}
//	if($checkCon!=""){$consultaOs.=",'$checkCon'";}
//	if($checkFat!=""){$consultaOs.=",'$checkFat'";}
//$consultaOs.= ") ";
//}

//if($nivelUsuario=="0")
//{
//$consultaOs.="and GMI.SITUACAO <> 'F' and GMI.TIPO_OS IN ('0','1') ";
//}

//if($dataIni!=""||$dataFim!="")
////{
//$dataIni = date("d/m/Y",strtotime($dataIni));
//$dataFim = date("d/m/Y",strtotime($dataFim));
//$consultaOs.= " and GMI.DT_PRAZO_SOLICI BETWEEN '$dataIni' and '$dataFim' ";
//}

//if($osIni!=""||$osFim!="")
//{
//$consultaOs.= " and GMO.CD_NUMERO_OS BETWEEN $osIni and $osFim ";
//}

//{
//$consultaOs.= " and GMI.TIPO_OS = '$selTip' ";
//}
//if($selTip!="Todas"&&$selTip!="")

//IF($ordemPor!=""){
//$consultaOs.= " order by $ordemPor $radioOrdem";
//}

//if($NUMOS!="")
//{
//$consultaOs.= " and GMI.CD_NUMERO_OS=$NUMOS and GMI.ITEM=$ITE ";
//}

//ECHO $consultaOs;

//senha do libera desconto gaia=webGaia2017

?>



<script src="../js/atualizaComConfigurador2.js"></script>  
<script src="../js/bootbox.all.js"></script> 
<script src="../js/sha256.js"></script>  
<SCRIPT>

function habilitaTroca()
{
	var senhaCli=<?php ECHO "'".hexdec(substr(sha1($CD_PEDIDO),0,4))."'"; ?>;
	var senhaNeg=<?php ECHO "'".hexdec(substr(sha1($CD_PEDIDO),4,4))."'"; ?>;
	
	var locale = {
    OK: 'OK',
    CONFIRM: 'CONFIRMAR',
    CANCEL: 'CANCELAR'
};
            
bootbox.addLocale('custom', locale);
            
	bootbox.prompt({ 
		title: "Senha necessaria para troca de cliente, informe logo abaixo:", 
		locale: 'custom',
		size: 'small',
		callback: function (result) {
			if (result==senhaCli)
			{
				//alert('Senha p/ Quant.Neg: '+senhaNeg+'\nSenha p/ Troca.Cli:'+senhaCli);
				$('#troca_cliente_mod').modal('show')
			}
			else
			{
				alert('Senha incorreta');
			}
			//console.log('This was logged in the callback: ' + result);
		}
	});
	//alert('Senha p/ Quant.Neg: '+senhaNeg+'\nSenha p/ Troca.Cli:'+senhaCli);
}


function habilitaTrocaMaterial()
{
	var senhaCli=<?php ECHO "'".hexdec(substr(sha1($CD_PEDIDO),0,4))."'"; ?>;
	var senhaNeg=<?php ECHO "'".hexdec(substr(sha1($CD_PEDIDO),4,4))."'"; ?>;
	var retorno = false;
	var locale = {
    OK: 'OK',
    CONFIRM: 'CONFIRMAR',
    CANCEL: 'CANCELAR'
};
            
bootbox.addLocale('custom', locale);
            
	bootbox.prompt({ 
		title: "Senha necessaria para inserir material, informe logo abaixo:", 
		locale: 'custom',
		size: 'small',
		callback: function (result) {
			if (result==senhaNeg)
			{
				//alert('Senha p/ Quant.Neg: '+senhaNeg+'\nSenha p/ Troca.Cli:'+senhaCli);
				retorno = true;
			}
			else
			{
				alert('Senha incorreta');
				retorno = false;
			}
			//console.log('This was logged in the callback: ' + result);
		}
	});
	//alert('Senha p/ Quant.Neg: '+senhaNeg+'\nSenha p/ Troca.Cli:'+senhaCli);
return retorno;
}


function validaForm() 
	{
    var desconto = $("#desconto1").val();
	  var quantidade = $("#quantidade1").val();
	var senhaDesconto = '852b98cbdc53153b88562e65c6490204f86eeb22f9e098a38fd9b60adabdb69e';
		if (desconto >0)
		 {
			bootbox.alert
			({
				title: "Atenção",
				message: "Desconto Excedido",
				size: 'small',
				backdrop: true				
			});
		
		 }
		 else if (quantidade<=0)
		 {
			bootbox.alert
			({
				title: "Atenção",
				message: "quantidade negativa",
				size: 'small',
				backdrop: true				
			});
			return false;
		 }
		 else 
		 if (desconto<=0)
		 {
			document.getElementById("formUpdPedido").submit(); 
		 }
	return false;
	}


</SCRIPT>

</head>

<body>
<input type="hidden" name="id_modifica" id="id_modifica" value="1">	
	
<!-- MODAL PARA BUSCAR MATERIAIS -->
<div class="modal troca_mat" tabindex="-1" role="dialog" id='idModalTrocaMat' aria-labelledby="troca_mat_modal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				
				<button type="button" id='botaoFecharModal' class="close" data-dismiss="modal" aria-label="Close">
				 
				 
				</button>
			</div>
			<div class="modal-body">
			
				<br>
				
				<div class="col-lg-12">
					<div class="table">
						<!--data-order='[[ 0, "desc" ]]' data-page-length='10'table table-hover-->
						<table   id="example" class="table table-hover" cellspacing="0" width="100%">
						<thead>
													<tr>
														<th >CD MATERIAL</th>
														<th>CheckBox</th>	
														<th>DESCRICAO MATERIAL</th>	
														<th>PR UNITARIO</th>
														<th>C.A.</th>
														<th>ESTOQUE SM</th>
														<th>ESTOQUE PF</th>
														<th>U.M.</th>
														<th>DET.</th>
														
													</tr>
												</thead>
												<tbody>
					<?php echo "$stringMateriais"; ?>
												</tbody>
						</table>
					</div>
				</div>
			<label> </label>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<a href="javascript:AdicionaItens();" > <button type="button" class="btn btn-secondary">Adicionar itens selecionados</button> </a>
			</div>
		</div>
	</div>
</div>
<!-- FIM MODAL PARA BUSCAR MATERIAIS -->

	
	
	
    <div id="wrapper">

        <!-- menu-->
        <?php 
		$menu=3;
		include "../menu.php";
		include "init3.php";
		  
		?>
        <!-- cabo o menu -->

        <div id="page-wrapper">
	
            <div class="container-fluid">           
				

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Inicio</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> Visualiza Pedido
                            </li>
                            <li>
                            
                                        
                            </li>
                        </ol>
                    </div>
                </div>
                
                <!-- /.row -->
                
 
<!---------------------------------->
<?php 	
		//echo "$consultaOs";
		$STRconsultaOs2 = oci_parse($conn, $consultaOs);
		oci_execute($STRconsultaOs2);
		while($resposta = oci_fetch_array($STRconsultaOs2)) 
		{
			$COD_COND = $resposta["COD_COND"];
			$CD_PEDIDO = $resposta["CD_PEDIDO"];
			$OBSERVACAO = $resposta["OBSERVACAO"];
			$CONTROLE2 = $resposta["CONTROLE2"];
			$CD_CLIENTE = $resposta["CD_CLIENTE"];
			$POSSUI_INSCRICAO = $resposta["INSCRITO"];
			$DT_PEDIDO = $resposta["DT_PEDIDO"];
			$DT_PRAZO_PROGRA = $resposta["DT_PRAZO_PROGRA"];
			$TOTAL_PEDIDO = $resposta["TOTAL_PEDIDO"];
			$valor2 = $resposta["TOTAL_PEDIDO"];
			$PRIORIDADE = $resposta["CD_PORTADOR"];
			$CD_TRANSPORTADO = $resposta["CD_TRANSPORTADO"];
			$CONDICAO = $resposta["CONDICAO"];
			$SITUACAO = $resposta["SITUACAO"];
			$VL_IPI_PE = $resposta["VL_IPI"];
			$VALOR_FRETE = $resposta["VL_FRETE"];
			$TIPO_FRETE = $resposta["TIPO_FRETE"];
			$CONTROLE = $resposta["CONTROLE"];
			$EMPRESA = $resposta["EMPRESA"];
			$TOTAL_PEDIDO = $resposta["TOTAL_PEDIDO"];
			$VALOR_FRETE=number_format(str_replace(',','.',$VALOR_FRETE),2);
			$TOTAL_PEDIDO=number_format(str_replace(',','.',$TOTAL_PEDIDO),2);
			
			
			IF ($SITUACAO=='P')
			{$SITUACAOdesc='PENDENTE';}
		ELSE IF($SITUACAO=='C')
			{$SITUACAOdesc='CANCELADO';}
		ELSE IF($SITUACAO=='F')
			{$SITUACAOdesc='FATURADO';}
		ELSE IF($SITUACAO=='L')
			{$SITUACAOdesc='LIBERADO';}
		ELSE IF($SITUACAO=='A')
			{$SITUACAOdesc='ABERTO';}
		else {$SITUACAOdesc=$SITUACAO;}
		
		 $CD_EMPRESA_INS=$resposta["CD_EMPRESA"];
		 $EMPRESA_INS=$resposta["NOME_COMPLETO"];
		 $FANTASIA_INS=$resposta["FANTASIA"];
		 $MUNICIPIO_INS =$resposta["MUNICIPIO"];
	     $ENDERECO_INS =$resposta["ENDERECO"];
		 $FONE_INS =$resposta["FONE"];
		 $FAX_FONE_INS =$resposta["FAX_FONE"];
		 $CNPJ_CPF_INS =$resposta["CNPJ_CPF"];
		 $INSCRICAO_INS =$resposta["INSCRICAO"];
		 $EMAIL1=$resposta["EMAIL1"];
		 $EMAIL2=$resposta["EMAIL2"];
		  $obsEmpresa=$resposta["OBSEMP"];
		}
			//$ITEM = $resposta["ITEM"];
			//$DESCRICAO_RECLA = $resposta["DESCRICAO_RECLA"];
			//$DESCRICAO_SOLUC = $resposta["DESCRICAO_SOLUC"];
		
			
?>    

<!-- MODAL PARA BUSCAR info empresas -->
<div class="modal infoClientesModall" tabindex="-1" role="dialog" id='infoClientesModal' aria-labelledby="modal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				
				Informações do Cliente:
			</div>
			<div class="modal-body">
	
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Cliente:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$CD_EMPRESA_INS - $EMPRESA_INS ";?>" class="form-control"></b> 
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Fantasia:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$FANTASIA_INS"; ?>" class="form-control"></b>
				</div>
			</div>
			
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Cidade:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$MUNICIPIO_INS"; ?>" class="form-control"></b>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Endereço:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$ENDERECO_INS"; ?>" class="form-control"></b>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Telefone:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$FONE_INS"; ?>" class="form-control"></b>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Telefone2:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$FAX_FONE_INS"; ?>" class="form-control"></b>
				</div>
			</div>	
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Email:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$EMAIL1"; ?>" class="form-control"></b>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Email2:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$EMAIL2"; ?>" class="form-control"></b>
				</div>
			</div>
			
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Cnpj:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$CNPJ_CPF_INS"; ?>" class="form-control"></b>
				</div>
			</div>
			
			
			<div class="col-lg-4">
				<div class="input-group">
				<span class="input-group-addon">Inscrição:</span> 
				
					<b><input type="text" readonly="" value="<?PHP ECHO "$INSCRICAO_INS"; ?>" class="form-control"></b>
				</div>
			</div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" onClick="onClick=$('#infoClientesModal').hide();">Fechar</button>
			</div>
		</div>
	</div>
</div>
<!-- FIM MODAL PARA BUSCAR info empresas -->





          
			 
                <div class="row">
                    <div class="col-lg-12">                    
                        <div class="panel panel-green">                         
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i><?php echo "$CD_PEDIDO";?> <?php if ($CD_PEDIDO!='0'&&$valor2>0){?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../relatorios/imprimePedido.php?PEDIDO=<?PHP ECHO "$CD_PEDIDO";?>"><i class="fa fa-print"></i>  Imprimir</a>  &nbsp;&nbsp;&nbsp;&nbsp;<a href="Atualizaprecopedito.php?CD_PEDIDO=<?PHP ECHO "$CD_PEDIDO";?>"><i class="fa fa-refresh"></i> Atualizar preço</a> <?php } ?> </h3>
                            </div>                         
                            <div class="panel-body">
                                
                                <div class="form-group">
                                	<div class="row">
  					  <div class="col-lg-0">
                                          </div>
                                    	  <div class="col-lg-3" id="ositem">
                                        	<div class="input-group">
                                    			<span class="input-group-addon" id="tOs">Cd_Pedido:</span>
                                        		<input type="text" name="tOs" readonly value="<?php echo $CD_PEDIDO;?> " class="form-control">
                                                </div>
                                    		
                                          </div>
                                    	  <div class="col-lg-6" id="ositem">
                                        	<div class="input-group">
                                    			<span class="input-group-addon" id="tItem">Cliente:</span>
												<?php IF($SITUACAO!='P'){?><input type="text" readonly name="tItemm" value="<?php echo $CD_CLIENTE.' - '.$EMPRESA;?> " class="form-control"><?php } ?>
												<?php IF($SITUACAO=='P'){?><button type="button" class="btn btn-sm btn-block btn-default" onClick='habilitaTroca()'><?php echo $CD_CLIENTE.' - '.$EMPRESA;?></button><?php } ?>
 
                                        		<input type="hidden" name="tItem" readonly value="<?php echo $CD_CLIENTE.' - '.$EMPRESA;?> " class="form-control">
                                    		</div>
                                          </div>
										  <div class="col-lg-1" id="Info">
                                        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onClick="$('#infoClientesModal').show();" class='btn btn-light'>&nbsp;&nbsp;&nbsp;<i class="fa fa-2x fa-list-alt">&nbsp;</i><b>F10<br></b></button>	
											
                                          </div>
										  <div class="col-lg-2" id="lol">
                                        	<div class="input-group">
                                    			<span class="input-group-addon" id="tOs">Tabela:</span>
                                        		<input type="text" name="tabela" readonly value="<?php if($PR_TABELA_DE<>' '){echo $PR_TABELA_DE;}else{echo $PR_TABELA_PADRAO;}?> " class="form-control">
                                                </div>
                                    		
                                          </div>
			               </div>
                                </div>
                                    
                                    <div class="form-group">
                                    <div class="row">
                                        
                                        
                                    	<div class="col-lg-3" id="data">
                                    		<div class="input-group">
                                    			<span class="input-group-addon" id="tPrazoS">Data:</span>
                                        		<input type="text" name="tPrazoS" readonly value="<?php echo $DT_PEDIDO;?> " class="form-control">
                                    		</div>
                                        </div>
                                    	<div class="col-lg-3" id="data">
                                    		<div class="input-group">
                                    			<span class="input-group-addon" id="tPrazoP">Prazo Prog:</span>
                                        		<input type="text" name="tPrazoP" readonly value="<?php echo $DT_PRAZO_PROGRA;?> " class="form-control">
                                    		</div>
                                        </div>
                                   
                                    	<div class="col-lg-6">
                                        	<div class="input-group">
                                    			<span class="input-group-addon" id="tProduto">Condicao Pagamento:</span> 
<?php IF($SITUACAO!='P'){?><input type="text" name="tProduto" value="<?php echo $CONDICAO;?> " class="form-control"><?php } ?>
<?php IF($SITUACAO=='P'){?><button type="button" class="btn btn-sm btn-block btn-default" data-toggle="modal" data-target=".troca_cond_paga"><?php echo $CONDICAO;?></button><?php } ?>
                                  			</div>
                                        </div>
					</div>

				    </div>
                                    
                                    <div class="row">
                                        
                                    	<div class="col-lg-3" id="ossituacao">
                                    		<div class="input-group">
                                    			<span class="input-group-addon" id="tTipoOs">Controle:</span>
                                        		<input type="text" name="tTipoOs" readonly value="<?php echo $CONTROLE;?> " class="form-control">
                                    		</div>
                                        </div>
                                        <div class="col-lg-3" id="ossituacao">
                                    		<div class="input-group">
                                    			<span class="input-group-addon" id="tTipoOs">Situacao:</span>
                                        		<input onfocus="hidebtn()" type="text" name="tSituacao" readonly value="<?php echo $SITUACAOdesc;?> " class="form-control">
                                    		</div>
                                        </div>
										<div class="col-lg-6">
											<div class="input-group">
											<span class="input-group-addon" id="tTipoOs">Transportadora:</span>
											<select name="TRANSPORTADORA" onclick='$("#troca_valor_frete").modal("show")' readonly id="TRANSPORTADORA" class="form-control">
											<?php
											$STRselectTrans = oci_parse($conn,"SELECT NOME_COMPLETO,CD_EMPRESA,CNPJ_CPF FROM GEEMPRES WHERE ativo=1 and CD_EMPRESA='$CD_TRANSPORTADO'");
											oci_execute($STRselectTrans);
											
											while($resposta = oci_fetch_array($STRselectTrans))
											{
												if ($CD_TRANSPORTADO==$resposta['CD_EMPRESA'])
												{
												echo "<option SELECTED value='$resposta[CD_EMPRESA]'>$resposta[CD_EMPRESA] - $resposta[NOME_COMPLETO]......$resposta[CNPJ_CPF]</option>";
												}
											 ELSE 
												{
												echo "<option value='$resposta[CD_EMPRESA]'>$resposta[CD_EMPRESA] - $resposta[NOME_COMPLETO]......$resposta[CNPJ_CPF]</option>";
												}
										 }//caso exista controle padrao na config 415 , selecionar o mesmo
										?> 
											</select>
										</div>
										</div>
                                        
                                    	
                                    </div>
                                    
                                   
									<div class="row">
  										<div class="col-lg-12">
                                	
                                    <?php 
									echo "<div class='table-responsive'>
									       <table class='table table-hover table-striped'>
										         <thead>
											         <tr>
									                     <th width='10px'>Seq.</th>
														 <th width='10px'>Situação</th>
														 <th>Material</th>
														 <th>Quantidade</th>
														 <th>Preco Unit.</th>
														 
									                     <th>Total</th>
														 <th>Acoes</th>
									                 </tr>
												 </thead>
											     <tbody>";				
									$consultaAtivp="$consultaAtiv";
									$arrayJS='';
									$STRconsultaAtivp = oci_parse ($conn, $consultaAtivp);
									oci_execute($STRconsultaAtivp);
									$CONTiTEM=0;
									while($resposta2 = oci_fetch_array($STRconsultaAtivp))
										{
											$CONTiTEM++;		
										if($arrayJS!='')
										{
											$arrayJS.=',';
										}
										$CD_MATERIAL = $resposta2 ["CD_MATERIAL"];
										$DESCRICAO = $resposta2 ["DESCRICAO"];
										$DESCRICAO_ITEM = $resposta2 ["DESCRICAO_ITEM"];
										$QUANTIDADE = $resposta2 ["QUANTIDADE"];
										$CONTROLE = $resposta2 ["CONTROLE"];
										$DESC_CONTROLE = $resposta2 ["DESC_CONTROLE"];
										$PR_UNITARIO = $resposta2 ["PR_UNITARIO"];
										$VL_TOTAL_ITEM_L = $resposta2 ["VL_TOTAL_ITEM_L"];
										$VL_IPI = $resposta2 ["VL_IPI"];
										$SEQUENCIA = $resposta2 ["SEQUENCIA"];
										$CD_PEDIDO = $resposta2 ["CD_PEDIDO"];
										$DESCRICAO_IDENT = $resposta2 ["DESCRICAO_IDENT"];
										$SALDO_VW_BON = $resposta2 ["SALDO_VW_BON"];
										$SALDO_VW_BON = str_replace(',','.',$SALDO_VW_BON);
										$arrayJS.=$SEQUENCIA;
										//$DT_INICIO_P = $resposta2 ["DT_INICIO_PREVI"];
										//--$DT_FINAL_P = $resposta2 ["DT_FINAL_PREVIS"];
										//$DT_INI = $resposta2 ["DT_INICIO"];
										//$DT_FIM = $resposta2 ["DT_TERMINO "];
										//$HORA_IN = $resposta2 ["HORA_INICIO"];
										//$HORA_FI = $resposta2 ["HORA_TERMINO"];
										//$QUANTIP = $resposta2 ["QUANTIDADE_PREV"];
										//$QUANTI = $resposta2 ["QUANTIDADE"];
										$VL_IPI=str_replace(',','.',$VL_IPI);
										$VL_TOTAL_ITEM_L=str_replace(',','.',$VL_TOTAL_ITEM_L);
										$QUANTIDADEF=number_format(str_replace(',','.',$QUANTIDADE),2);
										
										
										ECHO"<tr><td width='10px'>$SEQUENCIA</td>
										<td id='SIT$SEQUENCIA' width='10px' style='font-size: 12px;'>$CONTROLE.$DESC_CONTROLE</td>
										<td>$CD_MATERIAL - $DESCRICAO</td>";
										IF($SITUACAO=='P' && $CONTROLE=='15')
										{
										echo "<td> <input onfocus='showbtn($SEQUENCIA)' class='input-md col-lg-4' type=\"number\" name=\"quantTroca$SEQUENCIA\" value=\"$QUANTIDADE\" id=\"quantTroca$SEQUENCIA\">  <button  id=\"btnTroca$SEQUENCIA\" onClick=\"trocaQuantidade($SEQUENCIA)\"><i class=\"fa fa-check\"></i></button></td>";
										}
										ELSE
										{
										echo '<td>'.number_format(str_replace(',','.',$QUANTIDADE),0).' </td>';
										}
										echo '<td>'.number_format(str_replace(',','.',$PR_UNITARIO),2).' </td>';
										echo '<td>'.number_format(str_replace(',','.',$VL_IPI),2).' </td>';
										echo '<td>'.number_format(str_replace(',','.',$VL_TOTAL_ITEM_L+$VL_IPI),2).' </td>';//acoes
										IF($SITUACAO=='P')
										{echo "<td><a tabindex='-1' href=excluiItem.php?CD_MATERIAL=$CD_MATERIAL&SEQUENCIA=$SEQUENCIA&CD_PEDIDO=$CD_PEDIDO>Excluir</a></BR><a href='javascript:mostradiveditaitem(".$SEQUENCIA.")'> OBS</a>&nbsp;&nbsp;</td>";
										}//echo <td>'.money_format('%.2n',$VL_TOTAL_ITEM_L).' </td>;
										
										echo" </tr>";
										$mostraDescricao="";
										if($DESCRICAO_ITEM!='')
										{
											
										echo"<tr style='$mostraDescricao' height='1'><td width='1px'></td><td colspan='5'> <div style='display: block;' id='dvEditaItemobs_".$SEQUENCIA."'>Obs:<input type='text' name='edtobs_".$SEQUENCIA."' id='edtobs_".$SEQUENCIA."' value='".trim($DESCRICAO_ITEM)."'>  <a href='javascript:trocaObs(".$SEQUENCIA.")' class='btn-success btn'> OK</a>&nbsp<a href='javascript:escondediveditaitem(".$SEQUENCIA.")' class='btn-success btn'> Ocultar</a> </div></td><td>$DESCRICAO_IDENT</td></tr>";
 										 											
											 
										}
										else{
										
									       echo"<tr style='$mostraDescricao' height='1'><td width='1px'></td><td colspan='5'> <div style='display: none;' id='dvEditaItemobs_".$SEQUENCIA."'>Obs:<input type='text' name='edtobs_".$SEQUENCIA."' id='edtobs_".$SEQUENCIA."' value='".trim($DESCRICAO_ITEM)."'>  <a href='javascript:trocaObs(".$SEQUENCIA.")' class='btn-success btn'> OK</a>&nbsp<a href='javascript:escondediveditaitem(".$SEQUENCIA.")' class='btn-success btn'> Ocultar</a> </div></td><td>$DESCRICAO_IDENT</td></tr>";
										}
										}
										if($CONTiTEM==0&&$obsEmpresa!='')
										{
											echo "<script>alert('$obsEmpresa');</script>";
											echo "<script>alert('$obsEmpresa');</script>";
										}
									echo "		  </tbody>
									         </table>
									
													
                                         </div></DIV>
                                    ";
                                   

									
									
									
									
									
									
									
									
									
									
									
									
									?>
                                	
                                </div>
								<?PHP 
								IF($SITUACAO=='P'){ ?>
								<form method="post" name="formUpdPedido" id="formUpdPedido" action="UpdPedido.php">
								<div class="form-group">
                                    <div class="row">
										<input type="hidden" name="pedido" value="<?php echo $CD_PEDIDO ?>">
                                        
                                         <div class="col-lg-4">
                                    		<label>Codigo:</label>
											<input type="hidden" name="produto[]" id="produto1" value =" ">
											<button onfocus="hidebtn()"  type="button" data-toggle="modal" data-target=".troca_mat" name="materialBtn" data-size="8" id="produtoBtn1" class="form-control" value=" " onclick="foca(1);">seleciona material</button>
                                            <!-- <select name="produtox[]" data-size="8" id="produtoX" class="selectpicker form-control" data-size="8" data-live-search="true">
                                            <?php //echo $stringProdutos; ?>
                                            </select> -->
                                         </div>
										  <div class="col-lg-2">
										  <label>&nbsp;</label>
										  <input type="text" class="form-control" onChange="gatilhoMaterial();" placeholder="Ou digite o codigo: Ex:001001" id="produtotab">
										  
										  </div>
										 <div class="col-lg-0" id="identificador1">
											
										 </div>
                                         <div class="col-lg-1">
                                    		<label>Quantidade:</label>
                                            <div class="input-group">
    										<span class="input-group-addon" id="pedido-quantidade1"></span>
    										<input type="number" name="quantidade[]"  min='1' required id="quantidade1" step="1" class="form-control" aria-describedby="pedido-quantidade1">
    										</div>
                                         </div>
                                         <div class="col-lg-1">
                                    		<label>Preco:</label>
                                           <?PHP if($POSSUI_INSCRICAO=="1"){ ?> <input type="text" name="preco[]" readonly required id="preco1" class="form-control"> <?PHP }
										   else { ?> <input type="text" name="preco[]" readonly required id="preco1" class="form-control"> <?PHP } ?>
                                         </div>
										 <div class="col-lg-1">
                                    		<label>Desconto:</label>
											<div class="input-group">
                                            <input type="number" step="0.001" name="desconto[]" id="desconto1" class="form-control">
											<span class="input-group-addon">%</span>
											</div>
                                         </div>
                                         <div class="col-lg-2">
                                    		<label>Total Item:</label>
                                            <input type="text" name="total[]" required readonly id="total1" class="form-control">
											 <input type="hidden" name="cod_cliente" id="cod_cliente" class="form-control" value="<?php echo $CD_CLIENTE;?>">
                                         </div>
									</DIV>
								</DIV>
                                <div class="form-group">
                                     <div class="row">
										<div class="col-lg-11">
											<div class="input-group">
											<span class="input-group-addon" id="obs1">Obs: </span>
											<input type="text" name="observacao[]" value=' ' id="observacao1" maxlength="200" class="form-control" aria-describedby="obs1">
											</div>
										</DIV>
										 
                                     </div>
								</DIV>
										<div id="Add">
											<label><input class="form-control alert-success"
											type="button" name="butao" onClick="validaForm();" value="Adicionar Item" /></label>
										</div>
                                </div>
								</form>
								<?PHP 
								}?>
                            </div>
               
                            <div class="panel-footer">     
                                <div class="form-group">
                                        <div class="row">
										
										<div class="col-lg-3">
											<label></label>
											<?PHP IF($SITUACAO=='P'){ ?>
											<!--<a href="trocaControle.php?PEDIDO=<?php echo $CD_PEDIDO;?>&ACAO=liberar" class="btn-lg btn-success btn-block">Finalizar Pedido</a>
											-->
											<a href="PedidosPorControle.php" id="btnFecharPedido" class="btn-lg btn-success btn-block">Fechar Pedido (f4)</a>
											<div class="modal troca_cond_paga" tabindex="-1" role="dialog" aria-labelledby="troca_cond_paga_modal" aria-hidden="true">
													<div class="modal-dialog modal-md">
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title">Alterar Condicao Pagamento</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form method="get" action="trocaControle.php">
													<input type="hidden" name="ACAO" value="condicao">
													<input type="hidden" name="PEDIDO" value="<?php echo $CD_PEDIDO ?>">
														<br>
														
														<div class="col-lg-12">
															<label>Condicao de Pagamento:</label>
															<select name="CONDICAO" required id="CONDICAO" class="selectpicker form-control" data-live-search="true">
																<?php
													 //$STRselectTrans = oci_parse($conn,"select * from FACPAGAM WHERE CD_TIPO_PARA_FI = 'R' AND CAMPO63<>'0'");
													 	if($unidadeUsuario == "001") {
														$sqlQuery="select fc.* from 
														FACPAGAM fc 
														join geempres esm on esm.cd_empresa='$CD_CLIENTE'
														 WHERE fc.CD_TIPO_PARA_FI = 'R' AND fc.CAMPO63<>'0' and fc.campo58='S' and
														to_number(substr(esm.campo83,0,1))>=to_number(case when substr(fc.campo61,0,1)=' ' then '0' else substr(fc.campo61,0,1) end) and DESCRICAO  not like '%FILIAL%'";
														}
														else{
															$sqlQuery="select fc.* from 
														FACPAGAM fc 
														join geempres esm on esm.cd_empresa='$CD_CLIENTE'
														 WHERE fc.CD_TIPO_PARA_FI = 'R' AND fc.CAMPO63<>'0' and fc.campo58='S' and
														to_number(substr(esm.campo83,0,1))>=to_number(case when substr(fc.campo61,0,1)=' ' then '0' else substr(fc.campo61,0,1) end) and DESCRICAO  NOT like '%MATRIZ%,' ";
														}
														
													 
														$STRselectCondPag = oci_parse($conn, $sqlQuery);
														oci_execute($STRselectCondPag);
														echo "'<option value='$COD_COND'>$CONDICAO</option>'";
														while($resposta = oci_fetch_array($STRselectCondPag))
														 {											 
															echo "<option value='$resposta[CD_CONDICAO_PAG]'>$resposta[DESCRICAO]</option>";
														 }//caso exista condiçao padrao no cadastro de empresa,selecionar a mesma
													?> 
															</select>
														</div>
													<label> </label>
													<button class="btn-success btn-lg btn-block" type="submit" name="submit">Alterar</button></form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
													 </div>
													</div>
												</div>
											</div>
											
											
											<?PHP } ?>
											
										</div>
										
										 <div class="col-lg-3">
										 <label></label>
										 <?PHP IF(($SITUACAO=='P')||($CONTROLE=='20 - APROVADO')){ ?>
											<button type="button" id="btnSituacaoPedido" class="btn-lg btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-sm">Alterar Situacao (f5)</button>

											<div class="modal bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title">Alterar Situacao</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<a href="trocaControle.php?ACAO=Contato&PEDIDO=<?php echo $CD_PEDIDO;?>" class="btn-lg btn-primary btn-block">Orcamento</a>
													<?php if ($CONTROLE2=='15'&&$COD_COND!=' '){ ?><a href="editapedido.php?cd_pedido=<?php echo $CD_PEDIDO;?>&libera=1" class="btn-lg btn-secondary btn-block">Libera Pedido</a><?php }
													else
													{
													echo "<br><a href=\"#\" class=\"btn-lg btn-secondary btn-danger\">Informe uma Condição de Pagamento para liberar o pedido</a><br><br>";	
													}?>
													
													
													<?php if ($CONTROLE2!='15'){ ?><a href="trocaControle.php?ACAO=Analise&PEDIDO=<?php echo $CD_PEDIDO;?>" class="btn-lg btn-secondary btn-block">Analise Financeira</a>
													<!--<a href="trocaControle.php?ACAO=Aguardando&PEDIDO=<?php echo $CD_PEDIDO;?>" class="btn-lg btn-warning btn-block">Aguardando Pagamento</a>-->
													<?php } ?>
													<a href="trocaControle.php?ACAO=cancelado&PEDIDO=<?php echo $CD_PEDIDO;?>" class="btn-lg btn-danger btn-block">Cancelar Pedido</a>
													<?php if ($CONTROLE2!='15'){ ?>
														<?php if($CONTROLE!='20 - APROVADO'){ ?><a href="trocaControle.php?PEDIDO=<?php echo $CD_PEDIDO;?>&ACAO=liberar" class="btn-lg btn-success btn-block">Aprovar Pedido</a> <?PHP } ?>
														<?php if($CONTROLE=='20 - APROVADO'){ ?><a href="trocaControle.php?PEDIDO=<?php echo $CD_PEDIDO;?>&ACAO=Separacao" class="btn-lg btn-success btn-block">Enviar p/ separacao</a> <?PHP } ?>
													<?php } ?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
													 </div>
													</div>
													</div>
											</div>
											
											<div class="modal troca_valor_frete" id='troca_valor_frete' tabindex="-1" role="dialog" aria-labelledby="troca_frete_modal" aria-hidden="true">
													<div class="modal-dialog modal-md">
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title">Alterar Frete</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form method="get" action="trocaControle.php">
													<label>Valor do Frete:</label>
													<input type="hidden" name="ACAO" value="frete">
													<input type="hidden" name="PEDIDO" value="<?php echo $CD_PEDIDO ?>">
														<input class="form-control" type="text" name="FRETE" value="<?php echo $VALOR_FRETE; ?>"><br>
														<div class="col-lg-12">
														<label>Tipo do Frete:</label>
															<select name="TIPO_FRETE" required id="TIPO_FRETE" class="form-control">
															<?php if($valor2>=1500){?> <option value='1' <?php if ($TIPO_FRETE=='1'){echo "SELECTED";} ?>>CIF</option> <?php } ?>
															<option value='2' <?php if ($TIPO_FRETE=='2'){echo "SELECTED";} ?>>FOB</option>
															</select>
														</div>
														<div class="col-lg-12">
															<label>Transportadora:</label>
															<select name="TRANSPORTADORA" required id="TRANSPORTADORA" class="selectpicker form-control" data-live-search="true">
																<?php
													 $STRselectTrans = oci_parse($conn,"SELECT NOME_COMPLETO,FANTASIA,CD_EMPRESA,CNPJ_CPF FROM GEEMPRES WHERE  (DIVISAO IN ('70','75') OR CD_EMPRESA='002826' OR CD_EMPRESA = '$CD_CLIENTE') AND ATIVO='1'");
													 oci_execute($STRselectTrans);
													 echo "'<option value=''>Selecione a transportadora </option>'";
													 while($resposta = oci_fetch_array($STRselectTrans))
													 {
														 if ($CD_TRANSPORTADO==$resposta['CD_EMPRESA'])
														 {
														echo "<option SELECTED value='$resposta[CD_EMPRESA]'>$resposta[CD_EMPRESA] - $resposta[NOME_COMPLETO]......$resposta[CNPJ_CPF]</option>";
														 }
														 ELSE 
														 {
														echo "<option value='$resposta[CD_EMPRESA]'>$resposta[CD_EMPRESA] - $resposta[NOME_COMPLETO]......$resposta[CNPJ_CPF]</option>";
														 }
													 }//caso exista controle padrao na config 415 , selecionar o mesmo
													?> 
															</select>
														</div>
													<label> </label>
													<button class="btn-success btn-lg btn-block" type="submit" name="submit">Alterar</button></form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
													 </div>
													</div>
												</div>
											</div>
											
											<div class="modal troca_cliente" id="troca_cliente_mod" tabindex="-1" role="dialog" aria-labelledby="troca_cliente_modal" aria-hidden="true">
													<div class="modal-dialog modal-md">
													<div class="modal-content">
													<div class="modal-header">
														<h3 class="modal-title">Alterar Cliente</h3>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														  <span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													<form method="get" action="trocaControle.php">
													<label>Cliente atual:</label>
													<input type="hidden" name="ACAO" value="cliente">
													<input type="hidden" name="PEDIDO" value="<?php echo $CD_PEDIDO ?>">
														<input class="form-control" type="text" name="CLIENTE" value="<?php echo "$CD_CLIENTE - $EMPRESA"; ?>"><br>
														
														<div class="col-lg-12">
															<label>Cliente novo:</label>
															<select name="CLIENTENOVO" required id="CLIENTENOVO" class="selectpicker form-control" data-live-search="true">
																<?php
													 $STRselectTrans = oci_parse($conn,"SELECT NOME_COMPLETO,CD_EMPRESA,CNPJ_CPF FROM GEEMPRES WHERE  ativo=1 and DIVISAO IN (' ','10','20') OR CD_EMPRESA = '$CD_CLIENTE'");
													 oci_execute($STRselectTrans);
													 echo "'<option value=''>Selecione o cliente </option>'";
													 while($resposta = oci_fetch_array($STRselectTrans))
													 {
														 if ($CD_CLIENTE==$resposta['CD_EMPRESA'])
														 {
														echo "<option SELECTED value='$resposta[CD_EMPRESA]'>$resposta[CD_EMPRESA] - $resposta[NOME_COMPLETO]......$resposta[CNPJ_CPF]</option>";
														 }
														 ELSE 
														 {
														echo "<option value='$resposta[CD_EMPRESA]'>$resposta[CD_EMPRESA] - $resposta[NOME_COMPLETO]......$resposta[CNPJ_CPF]</option>";
														 }
													 }//caso exista controle padrao na config 415 , selecionar o mesmo
													?> 
															</select>
														</div>
													<label> </label>
													<button class="btn-success btn-lg btn-block" type="submit" name="submit">Alterar</button></form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
													 </div>
													</div>
												</div>
											</div>
											
										<?PHP } ?>
										</div>
										<div class="col-lg-2">
										<label>Frete: </label>
										 <?PHP IF($SITUACAO=='P'){ ?>
										 <button type="button" style="font-size:18pt"  class="btn btn-lg btn-block" data-toggle="modal" data-target=".troca_valor_frete"><b><i class="fa fa-truck" aria-hidden="true"></i> R$ <?php echo $VALOR_FRETE;?></b></button>
                                    	 <?php } else { ?> <button type="button" style="font-size:18pt"  class="btn btn-lg btn-block"><b><i class="fa fa-truck" aria-hidden="true"></i> R$ <?php echo $VALOR_FRETE;?></b></button> <?php } ?>	
										</DIV>
										 <div class="col-lg-3">
										 <label>Total Pedido:</label>
										 <button type="button" style="font-size:18pt"  class="btn btn-lg btn-block"><b>R$ <?php echo $TOTAL_PEDIDO;?></b></button>
                                    		
										</div>
										
										 
                                         
										</div>
								</div>
                                
                            </div>
							
							 <div class="panel-footer">     
                                <div class="form-group">
									<form method="get" name="atualizaOBS" action="trocaControle.php">
									<input type="hidden" name="ACAO" value="observacao">
									<input type="hidden" name="PEDIDO" value="<?php echo $CD_PEDIDO ?>">
									<div class="row">
										<div class="col-lg-8">
											<p>Observação do Pedido</p>
											<textarea class="form-control" name="ObsPedido" maxlength="499" id="solucao"> <?php echo "$OBSERVACAO";?></textarea>
										</div>
										<div class="col-lg-3">
												<label>Bonificação:</label>
												<button type="button" style="font-size:18pt"  class="btn btn-lg btn-block"><b>R$ <?php echo number_format(str_replace(',','',$SALDO_VW_BON),2,',','.');?></b></button>
                                    	 </div>
										<div id='mostraAtividades' class="col-lg-12">
											
										</div>
									</DIV>
									<button class="btn btn-lg btn-success" type="submit" value="">Salvar Observação</button> 
									</form>
								</DIV>
							</DIV>
            
                         
                        </div>
                    </div>                    
                </div>
            
                <!-- /.row -->
<?php  echo "$libera"; ?>
                <!-- Morris Charts -->
                
                
                <!-- /.row -->
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    

    <script src="../js/jquerydataTables.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/dataTables.keyTable.min.js"></script>
	
	<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	//$('#example').dataTable( {
	  //"dom": 'flrtip'
	//} );
	
	$('#example')
	.removeClass( 'display' )
	.removeClass( 'input-sm' )
	.addClass('table table-striped table-bordered');
	
	$('.dataTables_filter .input-sm')
	.removeClass( 'input-sm' );
	
	
</script>
		

		<!--<script type="text/javascript">
			$(document).ready(function() {
  $('#example').DataTable();
});
		</script>-->
<SCRIPT>
function format ( d ) 
{
	//console.dir();
	// `d` is the original data object for the row
	return d[8];
}

var arrayJS=[<?php echo $arrayJS;?>];
arrayJS.forEach(function (item, indice, array) {
  $("#btnTroca"+item).hide();
});


function foca(num)
{
	javascript:$('#id_modifica').val(num);
	$('#quantidade1').focus();
	
	//setTimeout(myFunction, 300);
}

function trocaObs(num)
{
	var pedido='<?php echo $CD_PEDIDO;?>';
	//var arrayJS=[<?php echo $arrayJS;?>];
	var seq = num;
	var quantSeq=$("#edtobs_"+num).val();
	//if (confirm("deseja mudar a descrição?"))
	//{
		setTimeout('location.href="trocaControle.php?ACAO=OBSITEM&PEDIDO='+pedido+'&pOBSERVACAO='+quantSeq+'&SEQ_ITEM='+seq+'";', 0);		
		//alert("SEQ "+num+" - QUANT "+quantSeq);
	//}
}

function AdicionaItens()
{
	
	var pedido='<?php echo $CD_PEDIDO;?>';
	var cliente = '<?php echo $CD_CLIENTE;?>';
	$('.cbMaterial').each(function () {
         if (this.checked==true){
     //alert(this.value);   
	 var resultado = this.value.split('|');
	var cdmaterial=resultado[0];
	var precodata=resultado[1];
	
      precodata=precodata.replace(',','.');
	var qntMaterial = 1;
	
	 $.ajax({
      type:'POST',
      url:'updPedidosMult.php',
      async:false,
      cache:false,
      dataType:"text",
      data: 'pedido='+pedido+'&produto='+cdmaterial+'&cod_cliente='+cliente+'&preco='+precodata+'&total='+precodata+'&observacao=&identificador=',
      processData:false,
      ContentType:false,
      success: function(msg){
       //
	   //alert("Foii");
      },
      error: function(msg){ alert(msg);  }
   });
	 
    }
  });
  
  //alert("Produtos Adicionados");
  document.location.reload(true);
  }



function trocaQuantidade(num)
{
	var pedido='<?php echo $CD_PEDIDO;?>';
	//var arrayJS=[<?php echo $arrayJS;?>];
	var seq = num;
	var quantSeq=$("#quantTroca"+num).val();
	if (confirm("deseja trocar a quantidade?"))
	{
		setTimeout('location.href="trocaControle.php?ACAO=QUANTIDADE&PEDIDO='+pedido+'&QUANTIDADE='+quantSeq+'&SEQ_ITEM='+seq+'";', 0);		
		//alert("SEQ "+num+" - QUANT "+quantSeq);
	}
}

function hidebtn(num)
{
	var arrayJS=[<?php echo $arrayJS;?>];
	arrayJS.forEach(function (item, indice, array) {
	  $("#btnTroca"+item).hide();
	});
}
function showbtn(num)
{
	var arrayJS=[<?php echo $arrayJS;?>];
	//$("#btnTroca"+num).show();
	arrayJS.forEach(function (item, indice, array) 
	{
	  if(item!=num)
		{
			$("#btnTroca"+item).hide();
		}
		else
		{
			$("#btnTroca"+num).show();
		}
	});
}


function gatilhoMaterial()
{
	var unidadeFat=<?php echo "'$unidadeUsuario'"; ?>;
	var empMat=4;
	if(unidadeFat=='001')	{		empMat=4; 	}
	else if(unidadeFat=='002')	{		empMat=5;	}
	var controle2=<?php echo $CONTROLE2;?>;
	var produt=$('#produtotab').val();
	var tableX = $('#example').DataTable();
	var rowX = tableX.row('#'+produt);
	var data = rowX.data();
	

	quant_estoque=data[empMat];
	quant_estoque2=quant_estoque.replace(',','.');
	quant_estoque=parseFloat(quant_estoque2);
	var id_modifica=$('#id_modifica').val();
	
	
	//alert (id_modifica);
	
	var precodata=data[2];
	precodata=precodata.replace(',','.');
	var produtodata=data[1];
	produtodata=produtodata.replace('<b>','');
	produtodata=produtodata.replace('</b>','');
	produtodata=produtodata.replace('&gt;','-');
	produtodata=produtodata.replace('&gt;','-');
	//alert(produtodata);
	if (quant_estoque>0 ||  controle2=='15')
	{
		$('#produto'+id_modifica).val(data[0]);
		$('#produtotab').val(data[0]);
		$('#produtoBtn'+id_modifica).text(produtodata);
		$('#produtoBtn'+id_modifica).val(data[0]);
		$('#produto'+id_modifica).trigger('change');
		$('#preco'+id_modifica).val(precodata);
		$('#botaoFecharModal').click();
		$('#quantidade1').focus();
		
	//alert( 'Codigo do material: '+data[0]+' ;'+quant_estoque+'.' );
	}
	else if (quant_estoque<=0)
	{
	//alert(habilitaTrocaMaterial());
	
		var senhaCli=<?php ECHO "'".hexdec(substr(sha1($CD_PEDIDO),0,4))."'"; ?>;
		var senhaNeg=<?php ECHO "'".hexdec(substr(sha1($CD_PEDIDO),4,4))."'"; ?>;
		var retorno = false;
		var locale = {
		OK: 'OK',
		CONFIRM: 'CONFIRMAR',
		CANCEL: 'CANCELAR'
		};
				
		bootbox.addLocale('custom', locale);
			
		bootbox.prompt({ 
			title: "Material sem estoque <br>Senha é necessaria para inserir o material,<br> informe logo abaixo ou cancele:", 
			locale: 'custom',
			size: 'small',
			callback: function (result) {
				if (result==senhaNeg)
				{
					var precodata=data[2];
					precodata=precodata.replace(',','.');
					var produtodata=data[1];
					produtodata=produtodata.replace('<b>','');
					produtodata=produtodata.replace('</b>','');
					produtodata=produtodata.replace('&gt;','-');
					produtodata=produtodata.replace('&gt;','-');
					//alert('Senha p/ Quant.Neg: '+senhaNeg+'\nSenha p/ Troca.Cli:'+senhaCli);
					//retorno = true;
					$('#produto'+id_modifica).val(data[0]);
					$('#produtotab').val(data[0]);
					$('#produtoBtn'+id_modifica).text(produtodata);
					$('#produtoBtn'+id_modifica).val(data[0]);
					$('#produto'+id_modifica).trigger('change');
					$('#preco'+id_modifica).val(precodata);
					//$('#botaoFecharModal').click();
					$('#quantidade1').focus();
				}
				else
				{
					alert('Senha incorreta');
					alert( 'Material  '+data[0]+' '+data[1]+' não disponivel em estoque.' );
					//retorno = false;
				}
				//console.log('This was logged in the callback: ' + result);
			}
		});
	
	}
	else
	{
		alert(quant_estoque);
	}
		
}







$(document).on('shown.bs.modal','#idModalTrocaMat', function () {
 // alert('hi');
  javascript:$('div.dataTables_filter input').focus();
})



 
$(document).ready(function() 
	{
    var table = $('#example').DataTable( {
		"keys": true,
		  keys: {
           keys: [ 13 /* ENTER */, 38 /* UP */, 40 /* DOWN */,70 ]
        },
		"dom": '<"row"<"col-lg-6"f>>rt<"bottom"pl><"clear"i>',
		"language": {
		"processing": "Procesando...",
		"search": "Buscaar:"},
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": true,
				"orderable": false
            }, {
                "targets": [ 1 ],
                "visible": true,
                "searchable": false,
				"orderable": false
            }
			, {
                "targets": [ 2 ],
                "visible": true,
                "searchable": true,
				"orderable": true
            }
			, {
                "targets": [ 3 ],
                "visible": true,
                "searchable": false,
				"orderable": true
            }
			, {
                "targets": [ 4 ],
                "visible": false,
                "searchable": false,
				"orderable": false
            }
			, {
                "targets": [ 5 ],
                "visible": true,
                "searchable": false,
				"orderable": true
            }, {
                "targets": [ 6 ],
                "visible": true,
                "searchable": false,
				"orderable": true
            }, {
                "targets": [ 7 ],
                "visible": true,
                "searchable": false,
				"orderable": true
            }, {
                "targets": [ 8 ],
                "visible": true,
                "searchable": false,
				"orderable": false
            },{
                "targets": [ 9 ],
                "visible": false,
                "searchable": false,
				"orderable": false
            }
			],
		"order": [[1, 'asc']],
		"lengthMenu": [[16, 30, 50, -1], [16, 30, 50, "Todos"]]
    } );
     
    // Add event listener for opening and closing details
  $('#example tbody').on('click', 'td.details-control', function () {
    var tr = $(this).parents('tr');
    var row = table.row( tr );
 
    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
    }
    else {
        // Open this row (the format() function would return the data to be shown)
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
    }
} );

	//teste
	// Handle event when cell gains focus
	$('#example').on('key-focus.dt', function(e, datatable, cell){
		// Select highlighted row
		$(table.row(cell.index().row).node()).addClass('selected');
	});

	// Handle event when cell looses focus
	$('#example').on('key-blur.dt', function(e, datatable, cell){
		// Deselect highlighted row
		$(table.row(cell.index().row).node()).removeClass('selected');
	});
	
	var unidadeFat=<?php echo "'$unidadeUsuario'"; ?>;
	var empMat=4;
	if(unidadeFat=='001')
	{
		empMat=4;
	}
	else if(unidadeFat=='002')
	{
		empMat=5;
	}
	//alert(empMat);                


	
	
	
	
	
	
	// Handle key event that hasn't been handled by KeyTable
	$('#example').on('key.dt', function(e, datatable, key, cell, originalEvent){
		// If ENTER key is pressed
		var controle2=<?php echo $CONTROLE2;?>;
		
		if(key === 70){
			
			AdicionaItens();
			
		}
		
		
		if(key === 13){
			// Get highlighted row data
			/*var data = table.row(cell.index().row).data();

			// FOR DEMONSTRATION ONLY
			$("#example-console").html(data.join(', '));
			*/
		
			
			var data = table.row(cell.index().row).data();
			quant_estoque=data[empMat];
			quant_estoque2=quant_estoque.replace(',','.');
			quant_estoque=parseFloat(quant_estoque2);
			var id_modifica=$('#id_modifica').val();
			var precodata=data[3]; //input preco
			precodata=precodata.replace(',','.');
			var produtodata=data[2];
			produtodata=produtodata.replace('<b>','');
			produtodata=produtodata.replace('</b>','');
			produtodata=produtodata.replace('&gt;','-');
			produtodata=produtodata.replace('&gt;','-');
	
			if (quant_estoque>0 ||  controle2=='15')
			{
				$('#produto'+id_modifica).val(data[0]);
				$('#produtotab').val(data[0]);
				$('#produtoBtn'+id_modifica).text(produtodata);
				$('#produtoBtn'+id_modifica).val(data[0]);
				$('#produto'+id_modifica).trigger('change');
				$('#preco'+id_modifica).val(precodata);
				$('#botaoFecharModal').click();
				$('#quantidade1').focus();
				
			alert( 'Codigo do material: '+data[0]+' ;'+quant_estoque+'.' );
			
			}
			else if (quant_estoque<=0)
			{
			//alert(habilitaTrocaMaterial());
			
				var senhaCli=<?php ECHO "'".hexdec(substr(sha1($CD_PEDIDO),0,4))."'"; ?>;
				var senhaNeg=<?php ECHO "'".hexdec(substr(sha1($CD_PEDIDO),4,4))."'"; ?>;
				var retorno = false;
				var locale = {
				OK: 'OK',
				CONFIRM: 'CONFIRMAR',
				CANCEL: 'CANCELAR'
				};
						
				bootbox.addLocale('custom', locale);
					
				bootbox.prompt({ 
					title: "Material sem estoque <br>Senha é necessaria para inserir o material,<br> informe logo abaixo ou cancele:", 
					locale: 'custom',
					size: 'small',
					callback: function (result) {
						if (result==senhaNeg)
						{
							var precodata=data[2];
							precodata=precodata.replace(',','.');
							var produtodata=data[1];
							produtodata=produtodata.replace('<b>','');
							produtodata=produtodata.replace('</b>','');
							produtodata=produtodata.replace('&gt;','-');
							produtodata=produtodata.replace('&gt;','-');
							//alert('Senha p/ Quant.Neg: '+senhaNeg+'\nSenha p/ Troca.Cli:'+senhaCli);
							//retorno = true;
							$('#produto'+id_modifica).val(data[0]);
							$('#produtotab').val(data[0]);
							$('#produtoBtn'+id_modifica).text(produtodata);
							$('#produtoBtn'+id_modifica).val(data[0]);
							$('#produto'+id_modifica).trigger('change');
							$('#preco'+id_modifica).val(precodata);
							//$('#botaoFecharModal').click();
							$('#quantidade1').focus();
						}
						else
						{
							alert('Senha incorreta');
							alert( 'Material  '+data[0]+' '+data[1]+' não disponivel em estoque.' );
							//retorno = false;
						}
						//console.log('This was logged in the callback: ' + result);
					}
				});
			
			}
			else
			{
				alert(quant_estoque);
			}
			
		
	}
	});       
	
	//teste


} );

$('.dataTables_filter .input-sm')
			.removeClass( 'input-sm' );
			
			
$(document).ready(function()
 {
	  $('#produtoBtn1').focus();
      var table = $('#example').DataTable();
	  
	  
	  
	function remapTeclas(e)
 { 
	if ([113,114,115,116,121].includes(e.which || e.keyCode)) 
	{
		e.preventDefault();
		if(e.which == '113')
		{
			$('#produtoBtn1').click();
			//alert('para de apertar os potãmzin');
		}
		if(e.which == '115')
		{
			//$('#btnFecharPedido').click();
			document.getElementById('btnFecharPedido').click();
			//alert('para de apertar os potãmzin');
		}
		if(e.which == '116')
		{
			$('#btnSituacaoPedido').click();
			//alert('para de apertar os potãmzin');
		}
		if(e.which == '121')
		{
			//$('#btnSituacaoPedido').click();
			
			$('#infoClientesModal').modal('toggle');
		}
	}
};

	
	
	
	// To disable f5
		/* jQuery < 1.7 */
	//$(document).bind("keydown", remapTeclas);
	/* OR jQuery >= 1.7 */
	$(document).on("keydown", remapTeclas);
	  var unidadeFat=<?php echo "'$unidadeUsuario'"; ?>;
	 var empMat=4;
	if(unidadeFat=='001')
	{
		empMat=4;
	}
	else if(unidadeFat=='002')
	{
		empMat=5;
	} 
	  
	  
	  
     
    $('#example tbody').on('dblclick', 'tr', function () {
		var controle2=<?php echo $CONTROLE2;?>;
        var data = table.row( this ).data();
		quant_estoque=data[empMat];
		quant_estoque2=quant_estoque.replace(',','.');
		quant_estoque=parseFloat(quant_estoque2);
		var id_modifica=$('#id_modifica').val();
		var precodata=data[3];
			precodata=precodata.replace(',','.');
		var produtodata=data[2];
		produtodata=produtodata.replace('<b>','');
		produtodata=produtodata.replace('</b>','');
		produtodata=produtodata.replace('&gt;','-');
		produtodata=produtodata.replace('&gt;','-');
		
		if (quant_estoque>0 || controle2=='15')
		{
			$('#produto'+id_modifica).val(data[0]);
			$('#produtotab').val(data[0]);
			$('#produtoBtn'+id_modifica).text(produtodata);
			$('#produtoBtn'+id_modifica).val(data[0]);
			$('#produto'+id_modifica).trigger('change');
			$('#preco'+id_modifica).val(precodata);
			$('#botaoFecharModal').click();
			$('#quantidade1').focus();
		
			
			
			
        //alert( 'Codigo do material: '+data[0]+' ;'+quant_estoque+'.' );
		}
		else if (quant_estoque<=0)
		{
		habilitaTrocaMaterial();
        alert( 'Material  '+data[0]+' '+data[1]+' '+quant_estoque+' não disponivel em estoque.' );
		}
		else
		{
			alert(quant_estoque);
		}
    });
} );

</SCRIPT>
	
   
   <?php @oci_close();?> 
   <script>
   function setConfigurador(conf,material,seq) {
	 //alert('Itemx '+material+' sequencia '+seq+' com Configurador '+conf+' deu certo');
	 document.getElementById("identificador1").innerHTML = "<label>Identificador:</label><input type='text' required name='identificador[]' readonly id='configurador1' value='"+conf+"' class='form-control'>";
	 }
	
	
</SCRIPT>


<!-- document.getElementById('SIT2').innerHTML='LIBERADO';-->

 <form method="post" name="myform" id="myform" action="liberaPedido.php">
	<input type="hidden" name="submit" value="true">
	<input type="hidden" name="cd_pedido" value="<?php echo "$CD_PEDIDO"; ?>">	
 </form>
 
 
 <script>
	document.addEventListener('keydown', logKey);
	document.addEventListener('click', logKey);
	document.addEventListener('wheel', logKey);
	document.addEventListener('dblclick', logKey);
	document.addEventListener('mousemove', logKey);
	
	
	
 
 
	<?php
	

	if($libera=="1")
	{ 
		echo "var myVar = setInterval(function(){ atualizaDados() }, 5000); "; 
	}
	
	
	if(1==1)
	{ 
		echo "var myVar2 = setInterval(function(){ atualizaDados2() }, 60000); "; 
	}
	?>
	
	function logKey(e) {
	console.log(e.code);
	clearInterval(myVar2);
	myVar2 = setInterval(function(){ atualizaDados2() }, 60000);
	}
	
	
	function atualizaDados(){
	//	$("#user").val(Math.random());
	//	var formData = $("#myform").serialize();  //or
		var formData = $("#myform").serializeArray();
		var URL = $("#myform").attr('action');
		$.post(URL,
			formData,
			function(data, textStatus, jqXHR)
			{
					$("#mostraAtividades").html(data);
			}).fail(function(jqXHR, textStatus, errorThrown) 
			{
					$("#mostraAtividades").html('AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown);
			});
	
	}
	
	function atualizaDados2(){
	//	$("#user").val(Math.random());
	//	var formData = $("#myform").serialize();  //or
		location.reload();
	
	}

</script>
<script>
function mostradiveditaitem(pSeq){

   $("#dvEditaItemobs_"+pSeq).show("slow");

}

function escondediveditaitem(pSeq){
	$("#dvEditaItemobs_"+pSeq).hide("slow");
}
</script>

</body>

</html>
