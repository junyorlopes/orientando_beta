<?php
    include_once("../controlador/Contr_user.php");
    $contoladoruser = new Contr_user();
    //$redirecionar = $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    
    if(isset($_POST['nome']) && isset($_POST['nivel'] )){
        if($_POST['nome'] != "" &&  $_POST['nivel'] != ""){
           
            $resul =  $contoladoruser->insert($_POST['nome'],$_POST['email'], $_POST['senha'], $_POST['nivel']);
           
           if($resul){
               
               echo "cadastrado com sucesso";                
                                             
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
          <form class="form-horizontal" method="POST" action="administrativo.php?link=crud/cad_user.php">
		  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="nome" placeholder="Nome Completo">
				</div>
			  </div>
              
                           		  
			  <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">login</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" name="email" placeholder="E-mail">
				</div>
				
			  </div>
			 			  
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" name="senha" placeholder="Senha">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Nivel de Acesso</label>
				<div class="col-sm-10">
				  <select class="form-control" name="nivel">
					  <option value="1">Administrativo</option>
					  <option value="2">Docentes</option>
					</select>
				</div>
			  </div>
			  
			  <div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-success">Cadastrar</button>
				</div>
			  </div>
			</form>
        </div>
		</div>
    </div>