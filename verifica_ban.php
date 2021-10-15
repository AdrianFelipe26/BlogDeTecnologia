<?php 

	require_once("conexao/conexao.php");

    if((!isset($_SESSION['nome'])== true) AND (!isset($_SESSION['usuario'])==true))
    {
        session_unset();
        session_destroy();

        header("location:index.php");
    }



$nome = $_SESSION['nome'];
$verificaSQL= $con->prepare("SELECT * FROM usuarios WHERE ban = 1 AND usuario = :nome");
$verificaSQL->execute(array(


':nome'=>$nome

));


if($verificaSQL->rowCount() > 0){


    header("location: telabanido.php");


}

if($_SESSION['ban'] == 1){

    //Mostra mensagenzinha de ban

    header('location:telabanido.php');

}

 ?>