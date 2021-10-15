<?php 



require_once("conexao/conexao.php");
require_once("cadastrar.php");

// echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
// echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>';
// echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';

$usuario =filter_input(INPUT_POST, "usuario",FILTER_SANITIZE_STRING); //usuario se refere ao name //sanitize limpa os campos
$nome = filter_input(INPUT_POST, "nome",FILTER_SANITIZE_STRING); //usuario se refere ao name //sanitize limpa os campos
$senha1 = filter_input(INPUT_POST, "senha1",FILTER_SANITIZE_NUMBER_INT); //senha se refere a senha
$senha2=  filter_input(INPUT_POST, "senha2",FILTER_SANITIZE_NUMBER_INT); //senha se refere a senha

$cadastra = 1; //valor padrao de cadastrar '1- cadastra, 0 = nao cadastra';

//Verifica se o usuario

$verifica_userSQL = $con->prepare("SELECT * from usuarios WHERE usuario = :usuario");
$verifica_userSQL->execute(array(

	':usuario'=> $usuario

));

if($verifica_userSQL->rowCount() > 0){

	header("location:cadastrar.php?erro=1");

}else{

	//CASO O USUARIO PARA CADASTRAR, NAO EXISTA, ELE CRIA UM USUARIO NORMALMENYE
	if($senha1 != $senha2){

		$cadastra = 0;
    }

    if(!filter_input(INPUT_POST, "nome",FILTER_SANITIZE_STRING)){

		echo "nome inválido";
	}else{

		if(!filter_input(INPUT_POST, "usuario",FILTER_SANITIZE_STRING)){

			echo "usuario inválido";
		}else{

			if(!filter_input(INPUT_POST, "senha1",FILTER_SANITIZE_NUMBER_INT)){

				echo "senha1 inválida";
			}else{

				if(!filter_input(INPUT_POST, "senha2",FILTER_SANITIZE_NUMBER_INT)){

						echo "senha2 inválida";
				    }else{

				    	if($cadastra == 1)
				    	{
				    		$comandoSQL = $con->prepare("INSERT INTO usuarios (nome,usuario,senha) VALUES (:nome,:usuario,:senha1) ");

				    	$comandoSQL->execute(array(
							':nome'=>  $nome,
							':usuario'=> $usuario,
							':senha1'=>$senha1
					    ));

					    if($comandoSQL->rowCount() > 0)
						{
							header("location:index.php");
							echo '<div class="alert alert-success">Cadastrado com sucesso</div>';
						}
						else{

							echo "Erro ao inserir um novo cliente.";
							}

				    	}else{

				    		echo'<div class="alert alert-danger"> As senhas não conferem.</div>'; //mensagem

				    	}
				    }
				}
			}
		}	

}
?>