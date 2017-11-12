<?php
    include_once("../controlador/Contr_Curso.php");
    $contoladorCurso = new Contr_Curso();
    //$redirecionar = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    
    if(isset($_POST['id']) && $_POST['editar'] != ""){
        if($_POST['id'] != ""){
           $resul =  $contoladorCurso->editar($_POST['id'],$_POST['nome'], $_POST['duracao']);
           if($resul){
               
               echo "cadastrado alterado com sucesso";
               unset($_POST['carga_horaria']);
               unset($_POST['nome']);
               $contoladorCurso->Consultaid($_POST['id']);
                                             
           }else{
                echo "erro ao cadastrar";

           }            
        }else{
            echo "infome os dados";
        }
    }else {
        if(isset($_POST['id'])){
            
            $contoladorCurso->Consultaid($_POST['id']);
        }
    }
    
    
?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
			<h1>Editar cursos</h1>
		</div>
		<div class="row">
                    <div class="pull-right">
                        <a href="administrativo.php?link=crud/report_cursos.php" class="btn btn-success">Listar</a>
                    </div>
	</div>
        <div class="row">
                <div class="col-md-12">
                  <form class="form-horizontal" method="POST" action="administrativo.php?link=crud/edit_cursos.php">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value="<?php echo $contoladorCurso->getCurso()->getNome(); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Dura&ccedil;&atilde;o</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="duracao" placeholder="Carga horária" value="<?php echo $contoladorCurso->getCurso()->getTempo(); ?>">
                            </div>
                        </div>


                        </div>
                            <input type="hidden" name="id" value="<?php echo $contoladorCurso->getCurso()->getId(); ?>">
                            <input type="hidden" name="editar" value="1">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                     <button type="submit" class="btn btn-success">Alterar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
 </div>