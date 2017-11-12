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

//include_once('conexao.php');

class UserDAO {
    
    
    
    function Insert(User $users){
        $conn = Conexao::getconexao();
        try {
                
            $conn->beginTransaction();
            $sql  = "INSERT INTO users (email, nome, senha, nivel) VALUES (:email, :nome, :senha, :nivel)";
            $stmt = $conn->prepare($sql);
           
            $stmt->bindValue(':email', $users->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(':nome', $users->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(':senha', $users->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(':nivel', $users->getNivel(), PDO::PARAM_STR);
            $result = $stmt->execute();
            
            
            $id =  $conn->lastInsertId();
            if($users->getNivel() == 1){
                $sql  = "INSERT INTO adm (users_id) VALUES (:users_id)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':users_id', $id, PDO::PARAM_INT);
                
                
            }else{
                $sql  = "INSERT INTO docentes (users_id) VALUES (:users_id)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':users_id', $id, PDO::PARAM_INT);
            }

            if($result && $stmt->execute()){
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
    
    function Editar(User $users){
        
        $conn = Conexao::getconexao();
        //$resul = TRUE;
        try {   
           
              
                $conn->beginTransaction();
                $sql  = "UPDATE users set email = :email, nome = :nome, senha = :senha where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $users->getId(), PDO::PARAM_INT);
                $stmt->bindValue(':email', $users->getEmail(), PDO::PARAM_STR);
                $stmt->bindValue(':nome', $users->getNome(), PDO::PARAM_STR);              
                $stmt->bindValue(':senha', $users->getSenha(), PDO::PARAM_STR);                   
                $resul = $stmt->execute();
               
                           
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
            
            $sql  = "SELECT * FROM users where id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id , PDO::PARAM_INT);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            $user->setId($linha['id']);
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
    
    
    function Consulta(){
        $conn = Conexao::getconexao();
        
        $lista = array();
        $i=0;
        try {
           
            $sql  = "SELECT * FROM users;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($query);
            
                       
            if($query){
                foreach ($query as $linha ){
                    $user = new User();
                    $user->setId($linha['id']);
                    $user->setEmail($linha['email']);
                    $user->setNome($linha['nome']);
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
            
            $conn->beginTransaction();
            $sql  = "DELETE FROM users where id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
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
    
    
    function consultarLogin(User $user){
        $conn = Conexao::getconexao();
        
        try {
            $sql  = "SELECT * FROM users WHERE email = :email AND senha = :senha LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $user->getEmail() , PDO::PARAM_STR);
            $stmt->bindValue(':senha', $user->getSenha() , PDO::PARAM_STR);
            $stmt->execute();
            
            
            
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
           
            if($linha){
                $user = new User();
                $user->setId($linha['id']);         
                $user->setNome($linha['nome']);
                $user->setNivel($linha['nivel']);
                return $user;
            }  else {
                return false;
               
            }
            
            
        } catch( Exception $e ){
            echo $e->getMessage();
            $conn->rollBack();
            return false;
         }
    }
    
    
    
    
}
