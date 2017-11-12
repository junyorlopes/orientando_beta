<?php
    include_once '/Controlador/Contr_Docente.php';
    include_once '/classe/user.php';

    $controlador = new Contr_Docente();
   
    //var_dump($controlador->getDocente());
    
    
    if(isset($_POST['curso'])){
         $controlador->consulatarDocente($_POST['curso']);
         //echo "adsfsd";
    }else{
         $controlador->consulatarDocente(null);
    }
   
    $controlador->cursoall();
    //var_dump($controlador->getListaDocentes());
    //var_dump($controlador->getListaCurso());
    //var_dump($_POST['curso']);
    //var_dump($controlador->getListaDocentes());
  
    
?>


<div class="container">
	<div class="row titulo">
		<div class="col-md-8">
			<h1>Docentes</h1>
		</div>
                <form method="POST">
                    <div class="col-md-4">
                            <div class="curso_algn">
                                    <h4>Curso</h4>
                                     <select name="curso" class="form-control">
                                        <option value="null" >Todos</option>   
                                        <?php
                                        foreach ($controlador->getListaCurso() as $curso){
                                        ?>

                                             <option value="<?php echo $curso->getId(); ?>" ><?php echo $curso->getNome(); ?></option>                          


                                        <?php
                                            }
                                        ?>
                                    </select>
                            </div>
                            <input type="submit" class="btn-pesquisar" name="enviar" value="PESQUISAR">
                    </div>   
                    
                </form>
	</div>
	<hr class="featurette-divider">
	<div class="conteudo-box">
		<div class="container">
                    <?php
                          foreach ($controlador->getListaDocentes() as $docente){
                              
                              //var_dump($docente);
                    ?>
                    
                    
			<div class="row conteudo_listar_docentes">
				<div class=" thumb col-md-3 pdt-1">
					<img class="img-responsive img-circle img_docente" src="imagens/icone_perfil.png">
				</div>
				<div class="col-md-8">
					<h3 class="titulo"><?php echo $docente->getNome(); ?></h3>
                                        <p class="mg-l1">Área de especialização: <?php echo $docente->getEspecialidade(); ?> </p>
					<p class="mg-l1"> <a href="?link=perfil_docentes.php&id=<?php echo $docente->getId(); ?>">Perfil</a></p>
				</div>
			</div>		
			<hr class="featurette-divider">
			<?php
                          }
                        ?>
		</div>
	</div>
</div>



