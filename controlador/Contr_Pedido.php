<?php


include_once '/classe/Pedido.php';
include_once '/classe/Aluno.php';
include_once '/classe/Docente.php';
include_once '/include/config.php';
include_once '/DAO/PedidoDAO.php';

include_once '../classe/Pedido.php';
include_once '../classe/Aluno.php';
include_once '../classe/Docente.php';
include_once '../include/config.php';
include_once '../DAO/PedidoDAO.php';


Class Contr_Pedido{
    
    
    private $pedido;
    private $PedidoDAO;
    private $listaPedidos;
    
    


    public function __construct() {
        $this->pedido = new Pedido();
        $this->PedidoDAO = new PedidoDAO();
    }
    
    
    
    function getPedido() {
        return $this->pedido;
    }

    function getPedidoDAO() {
        return $this->PedidoDAO;
    }

    function getListaPedidos() {
        return $this->listaPedidos;
    }

    function setPedido($pedido) {
        $this->pedido = $pedido;
    }

    function setPedidoDAO($PedidoDAO) {
        $this->PedidoDAO = $PedidoDAO;
    }

    function setListaPedidos($listaPedidos) {
        $this->listaPedidos = $listaPedidos;
    }

        
    
    public function pedidovinculo($idprof, $nome, $ra, $email, $nomepj, $msg, $file, $data){
        
        $docente = new Docente();
        $docente->setId($idprof);
        
        $alu = new Aluno();
        $alu->setNome($nome);
        $alu->setRa($ra);
        $alu->setEmail($email);
        
                       
        $this->pedido->setMensagem($msg);
        $this->pedido->setData($data);
        $this->pedido->setAluno($alu);
        $this->pedido->setDocente($docente);        
        $this->pedido->setNomeProjeto($nomepj);
        $this->pedido->setData($data);
        
        $result = $this->EnviarDoc($file);
        //var_dump($result);
        if($result['result']){
            $this->pedido->setFile($result['name']);
            if($this->PedidoDAO->registarpedido($this->pedido)){
                
                return true;
                
            }else{
                
                return false;
            }          
                     
        }else{
            
            //var_dump($result);
            return false;
        }
        
    }
    
    
    
    function EnviarDoc($file){
        
        //var_dump($img);
        $msg = "";
        $erro = true;
        $vettype = array("application/pdf", "application/msword", "application/octet-stream", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        $tamanho = 1024 * 1024 * 10;
        
       // var_dump($file);
                
        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        if ($file['error'] != 0) {
          return array("msg" => "Não foi possível fazer o upload", "erro" => $file['erros'], "result" => false);
        }
        
        
        if($file["size"] >= $tamanho){
           
            return array("msg" => "O arquivo enviado é muito grande, envie arquivos de até 2Mb.", "erro" => $file['erros'], "result" => false);
            
        }
        
       
        if (!(in_array($file['type'], $vettype))) {
                       
            return array("msg" => "Por favor, envie arquivos com as seguintes extensões pdf, word", "erro" => $file['erros'], "result" => false);
            
        }
        
        $extensao = explode('.', $file["name"]);
        $extensao = strtolower(end($extensao));        
        $nome_final = md5(time()). '.'.$extensao;
        
        // Depois verifica se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($file['tmp_name'], PATHDOC2 . $nome_final)) {
         
            return array("msg" => "imagem enviada com sucesso", "erro" => $file['erros'], "result" => true, "name" => $nome_final);

        
        } else {
          // Não foi possível fazer o upload, provavelmente a pasta está incorreta
            
            return array("msg" => "Não foi possível enviar o arquivo, tente novamente", "erro" => $file['erros'], "result" => false);
        }
        
    }
    
    
    function  listarpedidos($status,$idpedido){
        
       $this->listaPedidos = $this->PedidoDAO->listapedidos($status,$idpedido);
       if($this->listaPedidos != false){
           return true;
       }else{
           
           return false;           
       }
        
    }
    
     function  consultarpedido($status){
        
        $this->pedido = $this->PedidoDAO->consultarid($status);
       if($this->pedido != false){
           return true;
       }else{
           
           return false;           
       }
        
    }
    
}