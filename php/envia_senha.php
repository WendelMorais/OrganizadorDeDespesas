<?php

//INCLUDES
include "config.php";

//POSTS
$cpf=$_POST['cpf'];
$email=$_POST['email'];

//VERIFICA SE SÃO COMPATÍVEIS
$sql="Select nome,cpf,email,ra from aluno where email = '$email' and cpf='$cpf'";

$consulta = mysqli_query($sql);
$linhas = mysqli_num_rows($consulta);

if($linhas==0)
{
		echo "<script>alert('E-mail ou CPF inválidos!');</script>";
		echo "<script>window.history.go(-1);</script>";
		exit;
}else{
$valores = mysqli_fetch_assoc($consulta);

$senha_nova= rand(100000 , 999999);
//SE SIM, ENVIA E-MAIL COM A SENHA	
		$cript = md5($senha_nova);
		mysqli_query("update aluno set senha = '$cript' where email = '$email' and cpf = '$cpf' ") or die(mysqli_error());

		//ENVIA EMAIL
				$headers = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=utf-8\n";
				$headers .= "From: Sistema... <rantoniazzi@unicruz.edu.br>";
	 
				$subject = "Senha do Sistema..."; 
$mensagem = "<div>Prezado {$valores['nome']},<br />
Conforme solicitado, seguem as informações de login do sistema...<BR><br>

<strong>CPF</strong>: {$cpf}<br />
<strong>Senha</strong>: {$senha_nova}<br /> <br />

Acesse o link a seguir para efetuar o Login:<br>
<a href='http://comp.unicruz.edu.br/linguagemP'> Linguagens de Programação</a><br><br>

Obrigado!<br /> <br />

Administrador do Sistema <br /> <br />

Esta é uma mensagem automática, por favor não responda!</div>";

$mail = $valores['email'];
 
@mail($mail, $subject, $mensagem, $headers);
echo "<script>alert('Um email foi enviado para ".$mail." com a sua senha! Por favor, cheque a caixa de entrada ou spam!');</script>";
echo "<script>window.location = 'index.php'</script>";

exit;



}

?>