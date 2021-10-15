<?php 

session_start();


	if((!isset($_SESSION['nome'])== true) AND (!isset($_SESSION['usuario'])==true))
	{
		session_unset();
		session_destroy();

		header("location:index.php");
	}


if($_SESSION['ban'] == 1){



	//Mostra mensagenzinha de ban
	header('location:telabanido.php');
	

}else{

	//location para o sistema
	//echo 'Acessou o sistema';
}


require_once("conexao/conexao.php");

if($_SESSION['tipo'] != 1)
	{
		session_unset();
		session_destroy();

		header("location:index.php");
	}


 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>OnFlux - Painel usuários</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" integrity="sha384-9+PGKSqjRdkeAU7Eu4nkJU8RFaH8ace8HGXnkiKMP9I9Te0GJ4/km3L1Z8tXigpG" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>

	<style type="text/css">
		.center{
    		text-align: left;
    		margin-left: auto;
    		margin-right: auto;
		}

		.jumbotron{
			-webkit-box-shadow: 0px 0px 17px 5px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 17px 5px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 17px 5px rgba(0,0,0,0.75);
		}

	</style>

</head>

<body style="padding-bottom: 60px;">
	<?php require_once("_navbar.php"); ?>

	<!-- INPUT de pesquisa -->
	<div class="form-group input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
		<input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control my-5 mx-5">
   </div>

	<div class="container">
		<table class="table table-bordered mb-10 table-hover table-dark" id="tabela">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Nome</th>
		        <th>Usuario</th>
		        <th>Status</th>
		        <th width="30">Banir</th>
		        <th width="30">Desbanir</th>
		        <th width="30" >Mutar</th>
		        <th width="30">Desmutar</th>
		       
		      </tr>
		    </thead>

		    <tbody>


		      <?php  

		      		$numLinhasPagina = 10;//numeros de registros que vao ser exibidos

		      		if(isset($_GET["pagina"]))
		      		{
		      			$pagina = $_GET["pagina"]; //a pagina que estou
		      			$pagina *= $numLinhasPagina;
		      		}
		      		else
		      		{
		      			$pagina = 0;
		      		}

		      		 

		      		$comandoSQL = "SELECT * FROM usuarios"; //traz todos registros do meu banco de dados

		      		$totalPaginas = ceil($con->query($comandoSQL)->rowCount()/$numLinhasPagina); //conto quantas linhas (registros) vou ter, para eu saber quantas paginas eu vou ter.


		      		$comandoSQL = "SELECT * FROM usuarios LIMIT $pagina, $numLinhasPagina"; //LIMIT, o primeiro parametro é apartir da onde, e o outro é quantos eu quero mostrar.

		      		


		      		$selecionados = $con->query($comandoSQL); //executa o comando, a query
		      		$resultado = $selecionados->fetchAll(); //converte meus dados do banco em uma tabela/matriz

		      		if($resultado)
		      		{


		      			foreach ($resultado as $linha) 
		      			{
		      				
		      			
		      ?>
					      <tr>
					        <td><?php echo $linha['id'] ;?></td>


					        <td><?php echo $linha['nome'] ;?></td>


					        <td><?php echo $linha['usuario']; ?></td>

					         <td><?php echo $linha['ban']; ?></td>

					        <td> <a href="banir.php?id=<?php echo $linha['id'] ;?>">  <i class="material-icons">&#xe5c9;</i>  </a> </td>

					        <td> <a href="desbanir.php?id=<?php echo $linha['id'] ;?>">  <i class="fa fa-check"></i>  </a> </td>
					        <td> <a href="mutar.php?id=<?php echo $linha['id'] ;?>">  <i class="fa fa-check"></i>  </a> </td>
					        <td> <a href="desmutar.php?id=<?php echo $linha['id'] ;?>">  <i class="fa fa-check"></i>  </a> </td>




					      </tr>
		      <?php 
		      			}
		      	     }
		      	     else
		      	     {
		      	     	echo("<div class='alert alert-danger' role='alert'>Não há usuarios.</div>");
		      	     }

		       ?>

		      
		    </tbody>
  		</table>

	  		<ul class="pagination justify-content-center">

	  			<?php 
	  				for ($i=0 ; $i < $totalPaginas  ; $i++ ) { 
	  					
	  			?>
	  				<li class="page-item"><a class="page-link" href="painel_usuario.php?pagina=<?php echo $i ;?>"><?php echo $i+1; ?></a></li>

	  			<?php
	  				}
	  			 ?>
			    
	  		</ul>

  	</div>
	<footer class="page-footer font-small mt-5 fixed-bottom">

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3 text-white" style="background-color: black;">© 2020 Copyright
			<a href="http://onflux.epizy.com/?i=1" class="text-white"> OnFlux</a>
		</div>
		<!-- Copyright -->

	</footer>

  	<script>
		$('input#txt_consulta').quicksearch('table#tabela tbody tr');
	 </script>
</body>
</html>