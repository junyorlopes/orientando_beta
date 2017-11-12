
<?php
   
    //include_once('classe/Docente.php');
    include_once("../controlador/Contr_Docente.php");
   
    $controlador = new Contr_Docente();
    $id = $_SESSION['login']['id'];
    //var_dump($id);
    
    if(isset($_POST['delete-formacao']) && $_POST['delete-formacao'] != ""){
        $listaid = explode(",",$_POST['delete-formacao']);
        $result = $controlador->ExcluirFormacoes($listaid);
        if($result){
            echo "<div>Fomações excluidas com sucesso</div>";
        }else{
           echo "<div>Erro ao excluidas formacoes</div>";

        }
    }
    
    if(isset($_POST['delete-pesquisa']) && $_POST['delete-pesquisa'] != ""){
        $listaid = explode(",",$_POST['delete-pesquisa']);
        $result = $controlador->ExcluirPesquisa($listaid);
        if($result){
            echo "<div>Pesquisa excluidas com sucesso</div>";
        }else{
           echo "<div>Erro ao excluidas Peqsuisa</div>";

        }
    }
    
    
    if (isset($_FILES['img'])){
        //var_dump($_FILES['img']['name']);
        $fileimg = $_FILES['img'];  
        if($fileimg['name'] != ""){
        
            $msg = $controlador->gravarFoto($fileimg,$id);        
            if($controlador->getErroimg() == FALSE){

                echo "Upload efetuado com sucesso!";

            }else{
                echo $msg;
            } 
        }
        
        
        
    }
    
    
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']))    
    {
                
        
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $especialidade = $_POST['especialidade'];
        //$pesquisa = $_POST['pesquisa'];
        $curso = $_POST['curso'];
        
        
        if(isset($_POST['formacao']) && $_POST['formacao'] != ""){
            $listaformacao = $controlador->ordernarDados($_POST['formacao']);
            //var_dump($listaformacao);
            
           
            
        }else{
                $listaformacao = null; 
        }
       
        if(isset($_POST['pesquisa']) && !empty($_POST['pesquisa'])){
            
            $pesquisa = $_POST['pesquisa'];
           
        }else{   
            $pesquisa = null; 
        }
        
       
        $result = $controlador->editar($id, $nome, $email,$curso, $senha,$especialidade,$listaformacao,$pesquisa);
        if($result == true){
                echo "<div> Perfil alterado con sucesso</div>";
                //echo "<meta http-equiv=\"refresh\" content=\"15\">";
        }else{
                 echo "<div> Erro ao alterar Perfil</div>";
                // echo "<meta http-equiv=\"refresh\" content=\"15\">";
        }
        
              
    }
        
        
    
    if($id){
        
        $controlador->Consultaid($id);
        //var_dump($controlador->getDocente());        
        
    }else{
        echo "erro Informe o usuario";
    }
    
  ?>


<div class="container theme-showcase">
    <div class="page-header">
		<h1>Perfil</h1>
    </div>

   
    </br>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" id="form-add" method="POST" action="home.php?link=crud/cad_docentes.php" enctype="multipart/form-data">
                    
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nome" placeholder="Nome Completo" value="<?php echo $controlador->getDocente()->getNome(); ?>">
                    </div>
                </div>
                          
                
			  
		<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" placeholder="E-mail institucional" value="<?php echo $controlador->getDocente()->getEmail(); ?>">
                    </div>
		</div>
			 			  
		<div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" name="senha" placeholder="Senha" value="<?php echo $controlador->getDocente()->getSenha(); ?>">
                    </div>
		</div>
		
                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-7">
                        <input type="file" id="img" name="img">
                    </div>
                    <p class="col-sm-4 help-block">Escolha uma imagem para o perfil.</p>
                </div>
                
                <div class="form-group">
                    <label for="input3" class="col-sm-2 control-label">Especialidade</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="especialidade" value="<?php echo $controlador->getDocente()->getEspecialidade(); ?>">
                    </div>
                    
                    
		</div>
		
                <?php
                    
                  //var_dump($controlador->getListaCurso());
                
                ?>
                
                
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Curso</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="curso">
                        <?php                                                                    
                         
                           if(!empty($controlador->getListaCurso())){
                            
                                foreach ($controlador->getListaCurso() as $curso){
                                    
                                  if($curso->getId()== $controlador->getDocente()->getCurso()){
                                    echo  "<option value=\" {$curso->getId()} \" selected> {$curso->getNome()}</option>";
                                  }else{
                                      echo  "<option value=\" {$curso->getId()}\" > {$curso->getNome()}</option>";
                                  }
                                  
                                }
                           }
                        ?>
                        </select>
                    </div>
		</div>
  
                <div class="form-group">
                    <label for="tipo" class="col-sm-2 control-label">Formação: </label>
                    
                    <div class="col-sm-4">
                        <select class="form-control" name="tipo" id="tipos" >
                            <option value="Graduação">Graduação</option>
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select>
                    </div>
		</div>
                
                            
                          
                <div class="form-group">
                    <label for="fomacao" class="col-sm-2 control-label">Curso: </label>
                    <div class="col-sm-5">
                        <input type="text" id="formacao" class="form-control">
                    </div>
		</div>
                           
		
                <div class="form-group">
                    <label for="fomacao" class="col-sm-2 control-label">Instituição: </label>
                    <div class="col-sm-5">
                        <input type="text" id="instituicao" class="form-control">
                    </div>                                
                </div>
                
                <div class="form-group">
                    <label for="fomacao" class="col-sm-2 control-label">Data de formação: </label>
                    <div class="col-sm-2">
                        <input type="text" id="data" class="form-control">                                    
                    </div>
                    <button type="button" id="btnadd" class="btn btn-success">Adcionar</button>
                </div>
			  
                
                <div id="lista-formacao" class="form-group">
                 <?php
                 
                    //var_dump($controlador->getDocente()->getFormacao());
                    if($controlador->getDocente()->getFormacao()){
                           
                        foreach ($controlador->getDocente()->getFormacao() as $linha){
                        
                            
                ?>
                        <div class="grupo-formacao" onclick="" id="teste1">
                            <p class="legenda">Tipo: </p>
                            <p><?php echo $linha->getTipo(); ?></p>
                            <p class="legenda">Instituição: </p>
                            <p> <?php echo $linha->getInstituicao(); ?></p>
                            <p class="legenda">Curso: </p>
                            <p><?php echo $linha->getNome();  ?></p>
                            <p class="legenda">Ano de Formação: </p>
                            <p><?php echo $linha->getAno();  ?></p>


                            <button type="button" id="btn-remove-formacao" value="<?php echo $linha->getId();  ?>" onclick="remover(this);" >Remover</button>

                        </div>
                    
                <?php
                     
                    }}
                ?>
                    
               <input type="hidden" name="delete-formacao" id="delete-formacao" value="">
                                 
                 
                </div>
                
                <div class="form-group">
                    <label for="fomacao" class="col-sm-2 control-label">Campos de Pesquisa: </label>
                    <div class="col-sm-2">
                        <input type="text" id="pesquisa" class="form-control">
               
                    </div>
                    <button type="button" id="btnpesquisa" class="btn btn-success">Adcionar</button>
                </div>
                
                
                
                
                
                <p class="legenda">Area de pesquisa: </p>
                <div id="lista-pesquisa" class="form-group">
                                      
                   <ul>
                <?php
                
                        //var_dump($controlador->getDocente()->getPesquisa());
                
                        if($controlador->getDocente()->getPesquisa() != null){
                            $pesquisa = $controlador->getDocente()->getPesquisa();

                            foreach ($pesquisa as $key => $linha){
                    
                ?>
                       
                                            
                       <li class="pesquisa-itens">
                        <button type="button" id="btn-remove-pesquisa" class="btn btn-danger" onclick="remover(this);" value="<?php echo $linha->getId(); ?>">X</button>
                        <?php echo $linha->getNome(); ?>
                       </li>
                       
                       
                       
                    <?php
                     }}
                    ?>
                    </ul>                                
                     
                    <input type="hidden" name="delete-pesquisa" id="delete-pesquisa" value="">
                </div>                
                
                
		
                <div class="form-group pdt-2">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
		</div>			           
            </form>
        </div>
    </div>
</div>
