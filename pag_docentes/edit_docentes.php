<?php
		$id = $_GET['id'];
		//Consulta
		$result = mysql_query("SELECT * FROM cursos WHERE id = '$id' LIMIT 1");
		$resultado = mysql_fetch_assoc($result); 
?>	

<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Editar cursos</h1>
		</div>
		<div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=8&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-info'>Listar</button></a>
			<a href='include/proc_apg_usuario.php?link=9&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
		</div>
		</div>
		<div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" method="POST" action="include/proc_edit_usuario.php">
		  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="nome" placeholder="Nome Completo" value="<?php echo $resultado['nome']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Dura&ccedil;&atilde;o</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="duracao" placeholder="Carga horária" value="<?php echo $resultado['duracao']; ?>">
					</div>
				</div>
				
			  
		</div>
			  <input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-success">Alterar</button>
				</div>
			  </div>
			</form>
        </div>
		</div>
    </div>