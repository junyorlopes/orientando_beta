	<?php
		$resultado=mysql_query("SELECT * FROM cursos ORDER BY 'id'");
		$linhas=mysql_num_rows($resultado);
	?>	
    <div class="container theme-showcase" role="main">      
      <div class="page-header">
        <h1>Relat&oacute;rio de cursos</h1>
      </div>
	  <div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=../pag_cursos/cad_cursos.php&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-success'>Cadastrar</button></a>
		</div>
		</div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Duracao (semestre)</th>
				<th>Ações</th>
              </tr>
            </thead>
            <tbody>
				<?php 
					while($linhas = mysql_fetch_array($resultado)){
						echo "<tr>";
							echo "<td>".$linhas['id']."</td>";
							echo "<td>".$linhas['nome']."</td>";
							echo "<td>".$linhas['duracao']."</td>";
				?>
							<td> 
							<a href='administrativo.php?link=../pag_cursos/view_cursos.php&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>
							
							<a href='administrativo.php?link=&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
							
							<a href='pags_usuario/processa/proc_apg_usuario.php?link=4&id=<?php echo $linhas['id']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
							
				<?php
						echo "</tr>";
					}
				?>
            </tbody>
          </table>
        </div>
		</div>
    </div> <!-- /container -->


  