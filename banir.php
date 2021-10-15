<?php 

require_once("conexao/conexao.php");

if((!isset($_SESSION['nome'])== true) AND (!isset($_SESSION['usuario'])==true))
	{
		session_unset();
		session_destroy();

		header("location:index.php");
	}

$id = $_GET['id'];



$comandoSQL = $con->prepare("UPDATE usuarios SET ban = 1 WHERE id = $id");

$comandoSQL->execute();

if($comandoSQL->rowCount() > 0)
	{
		header("location:painel_usuarios.php");
	}
else{

		echo "Erro ao banir usuario";
	}


 ?>