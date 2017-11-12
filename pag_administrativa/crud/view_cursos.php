<?php

    include_once("../controlador/Contr_Curso.php");
    $contoladorCurso = new Contr_Curso();
   
   
    if(isset($_POST['vizualizar'])){
        
        $contoladorCurso->Consultaid($_POST['vizualizar']);
            
    }
    //$contoladorCurso->Consultaid(2);
    
?>	

    <div class="container theme-showcase" role="main">
            <div class="page-header">
                    <h1>Vizualizar curso</h1>
            </div>

           
            <div class="container">
                
                
                <!--<div class="col-md-7 view-box teste4 ">
                    <div class="col-sm-3 col-md-1"><b>ID</b></div>
                    <div class="col-sm-7 col-md-11"> 10000</div>
                    <div class="col-sm-3 col-md-1"> <p><b>Nome</b></p></div>
                    <div class="col-sm-7 col-md-11"><p>Igor henrique martin dos santos</p> </div>
                    <div class="col-sm-7 col-md-5 teste-5"><b>Duração (semestres)</b></div>
                    <div class="col-sm-7 col-md-5"> <p>6</p> </div>
                </div>
                
                <div class="col-md-4 view-box teste4">
                    <a href='administrativo.php?link=9&id=<?php //echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
                    <a href=''><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
                </div>-->
                
                <div class="col-md-10 view-box teste4">
                    <div class="col-md-7">
                        <div class="col-sm-3 col-md-1"><p><b>ID:</b></p></div>
                        <div class="col-sm-7 col-md-11"><p><?php echo $contoladorCurso->getCurso()->getId();  ?></p></div>
                        <div class="col-sm-3 col-md-1"> <p><b>Nome:</b></p></div>
                        <div class="col-sm-7 col-md-11"><p><?php echo $contoladorCurso->getCurso()->getNome(); ?></p> </div>
                        <div class="col-sm-3 col-md-5 view-mx-1"><p><b>Duração (semestres):</b></p></div>
                        <div class="col-sm-7 col-md-5"> <p><?php echo $contoladorCurso->getCurso()->getTempo(); ?></p> </div>
                    </div>
                    <div class="col-md-3 pull-right">
                        <form action="administrativo.php?link=crud/edit_cursos.php" method="POST">
                            <button type="submit"  name="id" value="<?php echo $contoladorCurso->getCurso()->getId();  ?>" class='btn btn-sm btn-warning'>Editar</button>                            
                        </form>
                        
                         <form action="administrativo.php?link=crud/report_cursos.php" method="POST">
                             <button type="submit" name="excluir" value="<?php echo $contoladorCurso->getCurso()->getId();  ?>" class='btn btn-sm btn-danger'>Apagar</button>                       
                        </form>
                    
                    </div>
                 </div>
                
                <!--<div class="col-md-4 view-box teste4">
                    <a href='administrativo.php?link=9&id=<?php //echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
                    <a href=''><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
                </div>-->
                
                
            </div>

    </div>