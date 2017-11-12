<?php

    include_once '../controlador/Contr_Pedido.php';
    include_once '../include/config.php';
    include_once '../controlador/ControlardorVinculo.php';
    
    $idpedido = $_GET['id'];

    $controladorpedido = new Contr_Pedido();
    $controladorvinculo = new ControlardorVinculo();
    
     if(isset($_POST['status']) & isset($_POST['msg']) & isset($_POST['idpedido']) && isset($_POST['email'])){
        
              
        $result = $controladorvinculo->resposta($_POST['idpedido'],$_POST['status'],$_POST['msg'],$_POST['email']);
        //var_dump($result);
        
    }
        
    $controladorpedido->consultarpedido($idpedido);
    //var_dump($controladorpedido->getPedido());
    $pedido = $controladorpedido->getPedido();
    //var_dump($pedido);
    
    
    
    
    $controladorvinculo->consultarpedido($idpedido);
    $vinculo = $controladorvinculo->getVinculo();
    //var_dump($vinculo);
    
    
    
   
    
    if($vinculo != FALSE){
    
    
?>



<div class="container">
    
    <div class="row ">
        <div class="col-md-8 box-pedido" id="lista-pedidos">
           
            <!--<div class="col-md-8">Pedido: 12545666</div>
            <div class="col-md-8">RA: 2155486668</div>
            <div class="col-md-8">Nome: Igor henrique martin dos santos</div>
            <div class="col-md-8">Nome do projeto: Lorem ipsum dolor sit amet.</div>
            <div class="col-md-8">Data: 24/12/2016</div>
             <div class="col-md-8">Mensagem: </div>            
            <div class="col-md-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac efficitur erat. Curabitur euismod pharetra felis, in pulvinar lectus pulvinar ut. Nunc sollicitudin in lorem eget ornare. Fusce vestibulum, neque ac dictum facilisis, turpis magna faucibus purus, et semper velit velit et nulla. Proin pharetra rhoncus orci, id commodo elit euismod eu. Morbi turpis urna, iaculis nec aliquet vel, sollicitudin a erat. Fusce sodales turpis vitae volutpat placerat. Praesent placerat varius erat, in pellentesque ipsum mattis at. Suspendisse eu elementum sapien. Vestibulum dignissim nec est at lobortis. Cras ullamcorper, libero eleifend efficitur bibendum, dui sem viverra lacus, eu vestibulum leo mi non neque. Duis finibus eros a aliquam varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.<br/>
                Morbi malesuada, odio in convallis aliquam, urna magna finibus ipsum, nec facilisis quam ante non diam. Vestibulum feugiat eu ante nec posuere. Vivamus facilisis aliquam feugiat. Suspendisse non orci ultricies neque hendrerit tempus at ac urna. Vivamus laoreet mi scelerisque eros dapibus, quis hendrerit nulla tincidunt. Nam quam libero, mattis eget sagittis eu, luctus a odio. Aliquam eu turpis id felis euismod tempor sed ac eros.
            </div>
             
            <div class="col-md-8"><a href="#">Baixar pré-projeto</a></div>
            
            <form action="" method="POST">
            <div class="col-md-8">
                                   
                <input type="radio" name="gender" value="a" checked> Aprovar  
                <input type="radio" name="gender" value="r"> Reprovar                               
              
            </div>
                
            <div class="col-md-8">
                <p>Responder:</p>                 
                <textarea rows="10" cols="100">
                        At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies. 
                </textarea>               
              
            </div>
            
            
            <div class="col-md-8">
                <input type="submit" name="" value="Salvar">      
            </div>
            
                 
            </form>-->
            
                     
            <div class="col-md-8">Pedido: <?php echo $pedido->getIdpedido(); ?></div>
            <div class="col-md-8">RA: <?php echo $pedido->getAluno()->getRa(); ?></div>
            <div class="col-md-8">Nome: <?php echo $pedido->getAluno()->getNome(); ?></div>
            <div class="col-md-8">Nome do projeto: <?php echo $pedido->getNomeProjeto(); ?></div>
            <div class="col-md-8">Data: <?php echo $pedido->getData(); ?></div>
             <div class="col-md-8">Mensagem: </div>            
            <div class="col-md-12"><?php echo $pedido->getMensagem(); ?></div>
             
            <div class="col-md-8"><a href="../<?php echo PATHDOC2 . $pedido->getFile(); ?>">Baixar pré-projeto</a></div>
            
            <form action="" method="POST">
            <div class="col-md-8">
                <?php
                    if($vinculo->getStatus()){
                        
//                      
                ?>                
                
                <input type="radio" name="status" value="a" checked> Aprovar  
                <input type="radio" name="status" value="r"> Reprovar   
                
                <?php }else {?>
                
                <input type="radio" name="status" value="a" checked> Aprovar  
                <input type="radio" name="status" value="r"> Reprovar   
                
                <?php } ?>

              
            </div>
                
            <div class="col-md-8">
                <p>Responder:</p>                 
                <textarea name="msg" rows="10" cols="100"><?php echo $vinculo->getMsg(); ?></textarea>               
              
            </div>
            
            
            <div class="col-md-8">
                <input type="submit" name="" value="Salvar" disabled>      
            </div>
                
                <input type="hidden" name="idpedido" value="<?php echo $pedido->getIdpedido(); ?>" />               
                <input type="hidden" name="email" value="<?php echo $pedido->getAluno()->getEmail(); ?>"/>
             
                 
            </form>
        </div>
        
    </div>
      
    
</div>


<?php 

    }else{

?>

<div class="container">
    
    <div class="row ">
        <div class="col-md-8 box-pedido" id="lista-pedidos">
                               
                  
            <div class="col-md-8">Pedido: <?php echo $pedido->getIdpedido(); ?></div>
            <div class="col-md-8">RA: <?php echo $pedido->getAluno()->getRa(); ?></div>
            <div class="col-md-8">Nome: <?php echo $pedido->getAluno()->getNome(); ?></div>
            <div class="col-md-8">Nome do projeto: <?php echo $pedido->getNomeProjeto(); ?></div>
            <div class="col-md-8">Data: <?php echo $pedido->getData(); ?></div>
             <div class="col-md-8">Mensagem: </div>            
            <div class="col-md-12"><?php echo $pedido->getMensagem(); ?></div>
             
            <div class="col-md-8"><a href="../<?php echo PATHDOC2 . $pedido->getFile(); ?>">Baixar pré-projeto</a></div>
            
            <form action="" method="POST">
            <div class="col-md-8">
               
                <input type="radio" name="status" value="a" > Aprovar  
                <input type="radio" name="status" value="r"> Reprovar              

              
            </div>
                
            <div class="col-md-8">
                <p>Responder:</p>                 
                <textarea name="msg" rows="10" cols="100"></textarea>               
              
            </div>
            
            
            <div class="col-md-8">
                <input type="submit" name="" value="Salvar">      
            </div>
                
                <input type="hidden" name="idpedido" value="<?php echo $pedido->getIdpedido(); ?>" />               
                <input type="hidden" name="email" value="<?php echo $pedido->getAluno()->getEmail(); ?>"/>
             
                 
            </form>
        </div>
        
    </div>
      
    
</div>



















<?php } ?>
