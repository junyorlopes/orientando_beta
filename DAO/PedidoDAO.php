<?php

include_once 'conexao.php';

Class PedidoDAO{
    
    public function __construct() {
        
    }
    
    
    
    public function registarpedido(Pedido $pedido){
        
         $conn = Conexao::getconexao();          
        
        try {               
                $conn->beginTransaction();
                $sql  = "INSERT INTO pedido (ra, nome, data, nomeprojeto, mensagem, doc, users_id, email,status)".
                        "VALUES (:ra, :nome, :data, :nomeprojeto, :mensagem, :doc, :users_id, :email,:status)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':ra', $pedido->getAluno()->getRa(), PDO::PARAM_INT);             
                $stmt->bindValue(':nome', $pedido->getAluno()->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(':data', $pedido->getData(), PDO::PARAM_STR);
                $stmt->bindValue(':nomeprojeto', $pedido->getNomeProjeto(), PDO::PARAM_STR);
                $stmt->bindValue(':mensagem', $pedido->getMensagem(), PDO::PARAM_STR);
                $stmt->bindValue(':doc', $pedido->getFile(), PDO::PARAM_STR);
                $stmt->bindValue(':users_id', $pedido->getDocente()->getId(), PDO::PARAM_STR);
                $stmt->bindValue(':email', $pedido->getAluno()->getEmail(), PDO::PARAM_STR);
                $stmt->bindValue(':status', 0, PDO::PARAM_INT);
                
                $result = $stmt->execute();
               // var_dump($result);
                
                if($result){
                    $conn->commit();
                    return true;
                }else{
                    return false;
                }
                
                
        }  catch (Exception $e){
            
            echo $e->getMessage();
            //$conn->rollBack();
            return false;
            
        }
    }
    
    
     public function listapedidos($status,$iddocente){
        
        //var_dump($iddocente);
        $conn = Conexao::getconexao();
        $i = 0;
        
        try {        
            
                if($status == "p"){
                     $sql  = "select * from pedido where status = 0 and users_id = '$iddocente'";
                }  else {
                    
                    if($status == "r"){
                        $sql  = "select *, v.status as vstatus, p.status as pstatus from pedido p, vinculos v where p.idpedido = v.idpedido and v.status = false and p.users_id = '$iddocente'";
                    }else{
                        
                        $sql  = "select * from pedido p, vinculos v where p.idpedido = v.idpedido and v.status = true and p.users_id = '$iddocente'";
                    }
                }
               
                $stmt = $conn->query($sql);                           
               
                $lista = array();
                $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //var_dump($query);
                
                foreach($query as $dados){
                    $pedido = new Pedido();
                    $alu = new Aluno();
                    $alu->setEmail($dados['email']);
                    $alu->setNome($dados['nome']);
                    $alu->setRa($dados['ra']);
                    
                    $doc = new Docente();
                    $doc->setId($dados['users_id']);
                    
                    $pedido->setIdpedido($dados['idpedido']);
                    $pedido->setFile($dados['doc']);
                    $pedido->setAluno($alu);
                    $pedido->setDocente($doc);
                    $pedido->setData($dados['data']);
                    $pedido->setMensagem($dados['mensagem']);
                    $pedido->setNomeProjeto($dados['nomeprojeto']);
                    $lista[$i++] = $pedido;
                }
                
               if($stmt->rowCount() > 0){
                    return $lista;
                }else{
                    return false;
                }
                
                
        }  catch (Exception $e){
            
            echo $e->getMessage();
            //$conn->rollBack();
            return false;
            
        }
    }
    
    function consultarid($id){
        
        $conn = Conexao::getconexao();
        $i = 0;
        
        try {               
                $sql  = "select * from pedido where idpedido = :id";
                $stmt = $conn->prepare($sql);                           
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);  
                if($stmt->execute()){
                    $dados = $stmt->fetch(PDO::FETCH_ASSOC);
                    //var_dump($dados);
                    
                    $pedido = new Pedido();
                    $alu = new Aluno();
                    $alu->setEmail($dados['email']);
                    $alu->setNome($dados['nome']);
                    $alu->setRa($dados['ra']);
                    //var_dump($alu);
                    
                    $doc = new Docente();
                    $doc->setId($dados['users_id']);
                    
                    $pedido->setIdpedido($dados['idpedido']);
                    $pedido->setFile($dados['doc']);
                    $pedido->setAluno($alu);
                    $pedido->setDocente($doc);
                    $pedido->setData($dados['data']);
                    $pedido->setMensagem($dados['mensagem']);
                    $pedido->setNomeProjeto($dados['nomeprojeto']);
                    
                    return $pedido;
                    
                }else{
                    return false;
                }
                
                
                
        }  catch (Exception $e){
            
            echo $e->getMessage();
            //$conn->rollBack();
            return false;
            
        }
        
    }
    
}
