<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../controlador/Contr_Pedido.php';


$iddocente = $_SESSION['login']['id'];
$controladorpedido = new Contr_Pedido();
$result = $controladorpedido->listarpedidos($_GET['op'], $iddocente);
//var_dump($_GET['op']);

//var_dump($controladorpedido->getListaPedidos());


?>



<div class="container">
    <div class="row " id="lista-pedidos">
    <?php
        if($result){
            foreach ($controladorpedido->getListaPedidos() as $pedido){
    ?>
    
    
        <!--<div class="col-md-8 box-pedido" >
           
            <div class="col-md-8">Pedido: 12545666</div>
            <div class="col-md-8">Nome: Igor henrique martin dos santos</div>
            <div class="col-md-8">Nome do projeto: Lorem ipsum dolor sit amet.</div>
            <div class="col-md-8"><a href="#">Responder</a></div>            
            
        </div>-->
        
        <div class="col-md-8 box-pedido" >
           
            <div class="col-md-8">Pedido: <?php echo $pedido->getIdpedido() ?></div>
            <div class="col-md-8">Nome: <?php echo $pedido->getAluno()->getNome(); ?></div>
            <div class="col-md-8">Nome do projeto: <?php echo $pedido->getNomeProjeto(); ?></div>
            <div class="col-md-8"><a href="?link=crud/dadospedidos.php&id=<?php echo $pedido->getIdpedido() ?>">Responder</a></div>            
            
        </div>
   
      
    <?php
            }}else{
            echo "Nenhum pedido Pendente";
        }
    ?>
    </div>
    
</div>