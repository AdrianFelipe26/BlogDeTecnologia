<!-- Inicio da Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  		<a class="navbar-brand" href="inicio.php">OnFlux</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
	    	<ul class="navbar-nav mr-auto">
		      	<li class="nav-item active">
		       	 	<a class="nav-link" href="inicio.php">Inicio</a>
		      	</li>
		      	<li class="nav-item active">
		       		<a class="nav-link" href="posts_seguranca.php">Segurança da informação</a>
		     	</li>
		      	<li class="nav-item active">
		        	<a class="nav-link" href="posts_jogos.php">Jogos</a>
		      	</li>
	    	</ul>

  		<?php
  			$idsessao = $_SESSION['tipo'];

  			if($idsessao == 1){
		?>
			<a class="btn btn-success mr-1" href="inserirpostagem.php">
				<i class="fa fa-plus mr-2" style="font-size:15px;"></i>
				Criar postagem
			</a>
			<a class="btn btn-info mr-1" href="painel_usuarios.php">
				<i class="fa fa-gears mr-2" style="font-size:15px;"></i>
				Painel de usuarios
			</a>
			<a class="btn btn-warning mr-1" href="gerenciar_postagens.php">
				<i class="fa fa-sticky-note" style="font-size:15px;"></i>
				Gerenciar postagems
			</a>
			<a class="btn btn-danger mr-1" href="index.php">
				<i class="fa fa-times-circle mr-2" style="font-size:15px;"></i>
				Logout
			</a>
		<?php
			}else{
		?>

			<a class="btn btn-success mr-1" href="inserirpostagem.php">
				<i class="fa fa-plus mr-2" style="font-size:15px;"></i>
				Criar postagem
			</a>
			<a class="btn btn-danger mr-1" href="index.php">
				<i class="fa fa-times-circle mr-2" style="font-size:15px;"></i>
				Logout
			</a>

		<?php
			}
		?>

		</div>
	</nav>
<!-- Fim da Navbar -->