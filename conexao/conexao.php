<?php 

	$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "flux";
	$driver = "mysql:host=$host;dbname=$banco;";

	try{

		//conexao usando o PDO
		$con = new PDO($driver,$user,$pass);
		//atribuindo a conexão o modo de tratamento de erros
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}
	catch(PDOException $erro){

		echo "Falha na conexão com o banco ".$erro->getMessage();
	}


 ?>