<?php

include_once 'conexao.php';

class VinculoDAO {
    
    
    
    function registarVinculo(Vinculo $vinculo){
        
        $conn = Conexao::getconexao();
        $conn->beginTransaction();
        $sql = "INSERT INTO vinculos (data, status, resposta, idpedido) values"
                . "(:data, :status, :resposta, :idpedido)";
        $inserir = $conn->prepare($sql);
        $inserir->BindValue(":data", date("y-m-d"));
        $inserir->BindValue(":status", $vinculo->getStatus());
        $inserir->BindValue(":resposta", $vinculo->getMsg());
        $inserir->BindValue(":idpedido", $vinculo->getPedido()->getIdpedido());
        
        $sql2 = "UPDATE pedido set status = 1 where idpedido = :id";
        $upd = $conn->prepare($sql2);
        $upd->BindValue(":id", $vinculo->getPedido()->getIdpedido());
        $upd = $upd->execute();
        
        
        if($inserir->execute() && $upd){
            $conn->commit();
            return true;
            
        }else{
            $conn->rollBack();
            return false;
        }

        
        
        
    }
    
    
    
    function consultapedidoId($id){
            
        $conn = Conexao::getconexao();        
        $sql = "SELECT * from vinculos where idpedido = :id";
        $inserir = $conn->prepare($sql);
        $inserir->BindValue(":id", $id);   
        $result = $inserir->execute();
        //var_dump($result);
        $dados = $inserir->fetch(PDO::FETCH_OBJ);
        
        if($result & $inserir->rowCount() > 0){
            
            //var_dump($dados);
            
            $vinculo  = new Vinculo();
            $vinculo->setMsg($dados->resposta);
            $vinculo->setId($dados->id);
            $vinculo->setStatus($dados->status);
            $vinculo->setData($dados->data);
           // var_dump($vinculo);
            return $vinculo;         
            
            
        }else{
            return false;
        }
        
    }
    
    
   
}
