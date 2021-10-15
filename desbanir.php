<?php 

require_once("conexao/conexao.php");



$id = $_GET['id'];



$comandoSQL = $con->prepare("UPDATE usuarios SET ban = 0 WHERE id = $id");

$comandoSQL->execute();

if($comandoSQL->rowCount() > 0)
	{
		header("location:painel_usuarios.php");
	}
else{

		echo "Erro ao banir usuario";
	}


 ?>