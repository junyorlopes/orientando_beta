<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CursoDAO
 *
 * @author igor
 */

include_once('../classe/Formacao.php');
include_once('conexao.php');


class PesquisaDAO {
    
          
     
    function ConsultaId($id){
        $conn = Conexao::getconexao();
        $user = new User();
        try {
            
            $sql  = "SELECT * FROM users u, login l where u.id = l.users_id and u.id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id , PDO::PARAM_INT);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            $user->setId($linha['id']);
            $user->setLogin($linha['login']);
            $user->setEmail($linha['email']);
            $user->setNome($linha['nome']);
            $user->setSenha($linha['senha']);
            $user->setNivel($linha['nivel']);
            return $user;
            
        } catch( Exception $e ){
             echo $e->getMessage();
             $conn->rollBack();
             return false;
         }
    }
    
    
    function ConsultaAll($iddocente){
       
               
       
    }
    
    
    
    function Excluir($id){
        $conn = Conexao::getconexao();
        try {
            
            
            foreach ($id as $key => $value ){
                
                if($key == 0){
                    $params = "(?";
                }else{
                    $params .= ",?";
                }                 
            }
            
            $params .= ")";
            $sql  = "DELETE FROM pesquisa where idpesquisa in ";
            $sql .= $params;
            //var_dump($sql);
            $conn->beginTransaction();            
            $stmt = $conn->prepare($sql);
            
            
            if($stmt->execute($id)){
                $conn->commit();
                return true;
                
            }  else {
                
                $conn->rollBack();
                return false;
            }      
                   
            
        } catch( Exception $e ){
             echo $e->getMessage();
             $conn->rollBack();
             return false;
         }
         
    }
    
    
    
    
}
