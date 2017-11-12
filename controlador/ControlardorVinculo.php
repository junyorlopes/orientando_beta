<?php


include_once '../classe/Vinculo.php';
include_once '../classe/Email.php';
include_once '../DAO/VinculoDAO.php';



class ControlardorVinculo{
    
    
   private $vinculo;
   private $vinculoDAO;
   private $email;
  
           
   public function __construct() {
       $this->vinculo = new Vinculo();
       $this->email = new Email();
       $this->vinculoDAO = new VinculoDAO();
   }
   
   function getVinculo() {
       return $this->vinculo;
   }

   function getVinculoDAO() {      
       return $this->vinculoDAO;
   }

   function getEmail() {
       return $this->email;
   }

   
   function setVinculo($vinculo) {
       $this->vinculo = $vinculo;
   }

   function setVinculoDAO($vinculoDAO) {
       $this->vinculoDAO = $vinculoDAO;
   }

   function setEmail($email) {
       $this->email = $email;
   }


       
   function resposta($idpedido,$status,$msg,$email){
      
       $this->vinculo = new Vinculo();
       $this->email = new Email();
       if($status == "a"){
           $status = TRUE;
       }else{
           $status = false;
       }
       
       
       $pedido = new Pedido();
       $pedido->setIdpedido($idpedido);
       //var_dump($vinculo);
       $this->vinculo->setMsg($msg);
       $this->vinculo->setStatus($status);
       $this->vinculo->setPedido($pedido);
       
       $this->email->setDestino($email);
       $this->email->setMsg($msg);
       //var_dump($this->email);
	   
       $this->email->enviar();
       
       if($this->vinculoDAO->registarVinculo($this->vinculo)){
            return true;
       }else{
            return false;
       }
       
       
           
       
        
    }
    
    
    function consultarpedido($id){
        
        $this->vinculo =$this->vinculoDAO->consultapedidoId($id);
        
        if(!$this->vinculo){
            return false;
        }
        
    }
    
    
    
    
}