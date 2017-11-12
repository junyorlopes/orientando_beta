<?php
    
    include_once("../controlador/Contr_Curso.php");
    $contoladorCurso = new Contr_Curso();
    //$redirecionar = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    
    if(isset($_POST['nome']) && isset($_POST['carga_horaria'])){
        if($_POST['nome'] != "" &&  $_POST['carga_horaria'] != ""){
           $resul =  $contoladorCurso->insert($_POST['nome'], $_POST['carga_horaria']);
           if($resul){
               
               echo "cadastrado com sucesso";
               unset($_POST['carga_horaria']);
               unset($_POST['nome']);               
                                             
           }else{
                echo "erro ao cadastrar";

           }
           
            
        }else{
            echo "infome os dados";
        }
    }
 ?>
 

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Cadastro de cursos</h1>
                
	</div>
	<div class="row">
		<div class="pull-right">
                    <a href="administrativo.php?link=crud/report_cursos.php" class="btn btn-success">Listar</a>
		</div>
	</div>
	</br>
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="administrativo.php?link=crud/cad_cursos.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="nome" placeholder="Nome Completo">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Dura&ccedil;&atilde;o</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="carga_horaria" placeholder="Quantidade de semestres">
					</div>
				</div>
				<div class="form-group pdt-2">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>