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


class FormacaoDAO {
    
    
    
    function Insert(User $users){
        $conn = Conexao::getconexao();
        try {
                
            $conn->beginTransaction();
            $sql  = "INSERT INTO users (email, nome) VALUES (:email, :nome)";
            $stmt = $conn->prepare($sql);
            //$stmt->bindValue(':senha', $users->getSenha(), PDO::PARAM_STR);
            //$stmt->bindValue(':nivel', $users->getNivel(), PDO::PARAM_INT);
            $stmt->bindValue(':email', $users->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $users->getNome(), PDO::PARAM_STR);
            $result[1] = $stmt->execute();
            
           

            if($stmt->execute()){
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
        $conn = Conexao::getconexao();
        
        $lista = array();
        $i=0;
        try {
           
            $sql  = "select * from formacoes where docentes_id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $iddocente , PDO::PARAM_INT);
            $stmt->execute();
            //$query = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $linha){
                $formacao = new Formacao();
                $formacao->setId($linha['id']);
                $formacao->setNome($linha['nome']);
                $formacao->setInstituicao($linha['instituicao']);
                $formacao->setTipo($linha['tipo']);
                $formacao->setAno($linha['ano']);
                $lista[$i++] = $formacao;                
            }
            
            $docente->setFormacao($lista);
            //var_dump($query);
            
                       
            if($query){
                foreach ($query as $linha ){
                    $user = new User();
                    $user->setId($linha['id']);
                    $user->setLogin($linha['login']);
                    $user->setEmail($linha['email']);
                    $user->setNome($linha['nome']);
                    $user->setSenha($linha['senha']);
                    $user->setNivel($linha['nivel']);
                    $lista[$i++] = $user;
                }          
              
                return $lista;
                
            }else{
                
                return null;
            }
               
        } catch( Exception $e ){
             echo $e->getMessage();
             $conn->rollBack();
             return false;
         }
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
            $sql  = "DELETE FROM formacoes where id in ";
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
