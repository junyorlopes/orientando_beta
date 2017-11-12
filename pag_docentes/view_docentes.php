<?php

?>	

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Vizualizar curso</h1>
	</div>
	
	<div class="row">
		<div class="pull-right">
			
							
			<a href='administrativo.php?link=9&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
			
			<a href=''><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="col-sm-3 col-md-1">
				<b>ID</b>
			</div>
			<div class="col-sm-9 col-md-11">
				<?php echo $resultado['id']; ?>
			</div>
			<div class="col-sm-3 col-md-1">
				<b>Nome</b>
			</div>
			<div class="col-sm-9 col-md-11">
				<?php echo $resultado['nome']; ?>
			</div>
			<div class="col-sm-3 col-md-1">
				<b>Duração (semestres)</b>
			</div>
			<div class="col-sm-9 col-md-11">
				<?php echo $resultado['duracao']; ?>
			</div>
		</div>
    </div>
	
</div>