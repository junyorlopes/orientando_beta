<?php
    include_once("../controlador/Contr_user.php");
    $contolador = new Contr_user();
    //var_dump($contolador);
    
    //var_dump($_POST['nivel']);
    //var_dump($contolador);
    
    
    if(isset($_POST['id']) && $_POST['editar'] != ""){
        if($_POST['id'] != ""){
           $resul =  $contolador->editar($_POST['id'],$_POST['nome'],$_POST['email'], $_POST['senha']);
           if($resul){
               
               echo "cadastrado alterado com sucesso";
               $contolador->ConsultaId($_POST['id']);              
                                             
           }else{
                echo "erro ao cadastrar";

           }            
        }else{
            echo "infome os dados";
        }
    }else {
        if(isset($_POST['id'])){
            
            $contolador->ConsultaId($_POST['id']);
        }
       
    }
?>


<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Cadastro de usuários</h1>
		</div>
		<div class="row">
			<div class="pull-right">
				<a href="administrativo.php?link=crud/report_user.php" class="btn btn-sm btn-info">Listar</a>			
			</div>
		</div>
		</br>
		<div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" method="POST" action="administrativo.php?link=crud/edit_user.php">
		  
			  <div class="form-group">
				<label for="nome" class="col-sm-2 control-label">Nome</label>
				<div class="col-sm-10">
                                    <input type="text" class="form-control" name="nome"  placeholder="Nome Completo" value="<?php echo $contolador->getUser()->getNome(); ?>">
				</div>
			  </div>
              
                          
			  
			  <div class="form-group">
				<label for="email" class="col-sm-2 control-label">E-mail</label>
				<div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $contolador->getUser()->getEmail(); ?>">
				</div>
				
			  </div>
			 			  
			  <div class="form-group">
				<label for="senha" class="col-sm-2 control-label">Senha</label>
				<div class="col-sm-10">
                                    <input type="password" class="form-control" name="senha" value="<?php echo $contolador->getUser()->getSenha(); ?>" placeholder="Senha">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Nivel de Acesso</label>
				<div class="col-sm-10">
                                    <select class="form-control" name="nivel" disabled>
                                        <?php
                                            if($contolador->getUser()->getNivel() == 1){
                                                
                                                echo "<option value=\"1\">Administrativo</option>";
                                                
                                                
                                            }else{
                                                echo "<option value=\"2\">Docentes</option>";
                                            }
                                        ?>				  
					  
                                    </select>
				</div>
			  </div>
			  
			  <div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
                                    <input type="hidden" name="id" value="<?php echo $contolador->getUser()->getId(); ?>">
                                    <input type="hidden" name="editar" value="1">
				  <button type="submit" class="btn btn-success">Salvar</button>
				</div>
			  </div>
			</form>
        </div>
		</div>
    </div>