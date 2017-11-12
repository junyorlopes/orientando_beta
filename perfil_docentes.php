<style>
	.boxDadosDocente{
		margin: 5px;
	}
	.boxDadosDocente h4 {
		margin: 20px;
	}
</style>

<?php
    //topo
    include_once("topo.php");
    
    $id = $_GET['id'];
    include_once '/Controlador/Contr_Docente.php';
    include_once '/classe/user.php';
    include_once '/controlador/Contr_Pedido.php';
    include_once './include/config.php';
    
    //echo IMG2;
    

    $controlador = new Contr_Docente();
    $controlador->Consultaid($id);
    ///var_dump($controlador->getDocente());
    
    $campo = "";
    foreach ($controlador->getDocente()->getPesquisa() as $pesquisa){
        
        $campo .= " <span>". $pesquisa->getNome() . "</span>  ";
    }
    
   
   //$iddocente = $controlador->getDocente()->getId();   
   $trabalhos =  $controlador->getTrabalhos($id);
   //var_dump($controlador->getDocente());
        
 
        
        
        
?>
<!-- Apresentação--> 
<div class="apresentacao-2 apresentacao-expansao a">
    <div class="container">
		<div class="row">
                        <?php
                            if($controlador->getDocente()->getImg() == ""){
                        ?>
                    
							<div class="col-md-3 circulo_img">
								<img class="img-responsive img-circle img_docente" src="imagens/icone_perfilX300.png" alt="imagem docente">
							</div>
							<div class="col-md-8 boxDadosDocente">
								<h2>Nome: <?php echo $controlador->getDocente()->getNome(); ?></h2>
								<h4>Área de especialização: <?php echo $controlador->getDocente()->getEspecialidade(); ?> </h4>
							</div>
                          
                        <?php }else{ ?>
                    
						<div class="col-md-3 circulo_img">
							<!--<img class="img-responsive img-circle img_docente" src="imagens/icone_perfilX300.png" alt="imagem docente"> -->
							<img class="img-responsive img-circle img_docente" src="<?php echo IMG2  . $controlador->getDocente()->getImg(); ?>" alt="imagem docente">
							
						</div>
						<div class="col-md-8 boxDadosDocente">
							<h2>Nome: <?php echo $controlador->getDocente()->getNome(); ?></h2>
							<h4>Área de especialização: <?php echo $controlador->getDocente()->getEspecialidade(); ?> </h4>
						</div>
                          
        
                               
                        <?php  } ?>
		</div>
    </div>
</div>
</br></br>
<?php

    if($_POST['veri'] == 1){
       
       if(empty($_POST['email']) && empty($_POST['ra']) && empty($_POST['nome']) && empty($_POST['msg']) && empty($_POST['nomepj']) && empty($_POST['idprof'])){
           
           echo "Informe todos os dados";
           
        }else{
           
       
           $email = $_POST['email'];
           $ra = $_POST['ra'];
           $nome = $_POST['nome'];
           $msg = $_POST['msg']       ;
           $nomepj = $_POST['nomepj'];
           $file = $_FILES['doc'];
           $idprof = $_POST['idprof'];
           $data = date("y-m-d");
           //var_dump($_FILES['doc']);
           
           
           //$idprof, $nome, $ra, $email, $nomepj, $msg, $file, $data
           $controladorpedido = new Contr_Pedido();
           if($controladorpedido->pedidovinculo($idprof, $nome, $ra, $email, $nomepj, $msg, $file, $data)){

               echo "Pedido regitrado com sucesso";

           }else{

               echo "Erro ao registrar pedido";
           }
       
       }
               
   }
	
	//conteudo			
	include_once("qualificacao.php");
			
	//requerimento
	include_once("requerer.php");

	//rodape
	include_once("rodape.php");
	

?>
