<?php
   
   include_once("../controlador/Contr_user.php");
   $contolador = new Contr_user();
   $contolador->ConsultaAll();
  //var_dump($contolador);
   
   if(isset($_POST['excluir']) && $_POST['excluir'] > 0){
       
       $resu = $contolador->excluir($_POST['excluir']);
       if($resu){
           echo "Item excluido com sucesso";
           //header("Location: ")
           echo "<meta HTTP-EQUIV='refresh' CONTENT='5;'>";
           
       }else{
           
           echo "erro ao excluir";
       }
              
       
   }
   
?>	
    <div class="container theme-showcase" role="main">      
      <div class="page-header">
        <h1>Relatório de Usuarios</h1>
      </div>
	  <div class="row">
		<div class="pull-right">
			<a href="administrativo.php?link=crud/cad_user.php" class="btn btn-success">Cadastrar</a>
		</div>
		</div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">ID</th>
                    <th class="">Nome</th>
                    <th class="">login</th>
                    <th class="col-md-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                
                
            <?php
                //var_dump($contolador);
                if($contolador->getlista() != null){
                    foreach($contolador->getlista() as $user){
                   
                   
                    
            ?>
                
                <tr class="">
                    <td class=""><?php echo $user->getId(); ?></td>
                    <td class=""><?php echo $user->getNome(); ?> </td>
                    <td class=""><?php echo $user->getEmail(); ?> </td>
                    <td class="">
                        <form method="POST" class="view-box-fom" action="administrativo.php?link=crud/view_user.php">
                            <button type='submit' value="<?php echo $user->getId(); ?>" name="vizualizar" class='btn btn-sm btn-primary'>Visualizar</button>
                        </form>
                        <form method="POST" class="view-box-fom"  action="administrativo.php?link=crud/edit_user.php">
                            <button type='submit' name="id" value="<?php echo $user->getId(); ?>" class='btn btn-sm btn-warning'>Editar</button>
                        </form>
                        <form method="POST" class="view-box-fom"  action="administrativo.php?link=crud/report_user.php">
                            <button type='submit' name="excluir" value="<?php echo $user->getId(); ?>" class='btn btn-sm btn-danger'>Apagar</button>
                        </form>
                    </td>	
                </tr>
                
                
                <?php
                
                }}
                ?>
                
               
                		
				
            </tbody>
          </table>
        </div>
		</div>
    </div> <!-- /container -->


  