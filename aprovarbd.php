<?php  

session_start();
require_once("conexao/conexao.php");



if((!isset($_SESSION['nome'])== true) AND (!isset($_SESSION['usuario'])==true))
	{
		session_unset();
		session_destroy();

		header("location:index.php");
	}


$id = $_GET['id_postagem'];


$comandoSQL = $con->prepare("UPDATE postagens SET aprovacao = 1 WHERE id_postagem = $id");
$comandoSQL->execute();


if($comandoSQL->rowCount() > 0 ){



	header("location: gerenciar_postagens.php");
}







?>