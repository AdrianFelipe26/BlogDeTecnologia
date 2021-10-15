<?php 
	
	session_start();
	require_once("conexao/conexao.php");

	$usuario = filter_input(INPUT_POST, "usuario",FILTER_SANITIZE_STRING); //usuario se refere ao name //sanitize limpa os campos
	$senha = filter_input(INPUT_POST, "senha",FILTER_SANITIZE_STRING); //senha se refere a senha


	if(!filter_var($senha, FILTER_SANITIZE_STRING)){ 

		header("location:index.php?erro=1");

	}else{

		$comandoSQL = $con->prepare("SELECT * FROM usuarios WHERE (usuario=:usuario AND senha =:senha)");

		$comandoSQL->execute(array(
			':usuario'=>$usuario,
			':senha'=>$senha

		));

		$resultado = $comandoSQL->fetch(PDO::FETCH_ASSOC);

		if($comandoSQL->rowCount() > 0 ){


			$_SESSION['nome'] = $resultado['nome'];
			$_SESSION['id'] = $resultado['id'];
			$_SESSION['usuario'] = $resultado['usuario'];
			$_SESSION['ban'] = $resultado['ban'];
			$_SESSION['tipo'] = $resultado['tipo'];
			header("location:inicio.php");
			

		}else{
			header("location:index.php?erro=1");
		}
	}

 ?>
