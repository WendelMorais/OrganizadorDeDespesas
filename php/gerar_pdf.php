<?php

include "config.php";
include "../mpdf60/mpdf.php";

$buscar_dados = "select * from debcred ";
$buscar_dados = mysqli_query($conectou, $buscar_dados);

$row = mysqli_num_rows($buscar_dados);

$html = " <table>
<tr>    
   <th >Produto</th>
   <th >Tipo</th>
   <th >Valor</th>
   <th >Data</th>
   <th >Descrição</th> 
</tr>
";
if($row > 0){


while ($linha = mysqli_fetch_array($buscar_dados)) {
$html .= "
                            
                                   
                                                    <tr>
                                                        <td>".$linha["descricao"]."</td>
                                                        <td>".$linha["tipo"]."</td>
                                                        <td>".$linha["valor"]."</td>
                                                        <td>".$linha["data"]."</td>
                                                        <td>".$linha["produto"]."</td>
                                                     </tr>        
                                     
                                 ";
                                
                                }



$html .= "   </table> ";



                        }


                        
$arquivo = "Listagem.pdf";

$mpdf= new mPDF();
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($html);
$mpdf->Output($arquivo, 'I');



exit;
?>
