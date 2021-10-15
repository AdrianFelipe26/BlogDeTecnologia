<?php

		$comandoSQL2 = $con->prepare("SELECT * from postagens WHERE aprovacao = 1 ORDER BY data LIMIT 10");
		$comandoSQL2->execute();


		$resultado2 = $comandoSQL2->fetchALL();

	?>

	<div class="wrapper">
    <!-- Sidebar -->
	    <nav id="sidebar">
	        <div class="sidebar-header">
	            <h3 class="my-4 ml-2 text-white" style="text-shadow: black 0.1em 0.1em 0.2em">Posts Recentes</h3>
	        </div>
	        <ul class="list-group">
	        	<?php 
					foreach($resultado2 as $pubRecente){
				?>
	            <li class="ml-4 text-white" style="margin-bottom: 5px;">
						<a class="text-white texto-sombreado" style="font-weight: bold;" href="postagem.php?id_postagem=<?php echo $pubRecente['id_postagem'] ?>"><?php echo $pubRecente['titulo']; ?> ~ <?php echo $pubRecente['publicador']; ?></a>
				<?php 
					}
				?>
				</li>
	        </ul>
	    </nav>
	</div>