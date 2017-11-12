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


class CursoDAO {
    
    
    
    function cursoInsert(Curso $cur){
        $conn = Conexao::getconexao();
        try {
                $conn->beginTransaction();
                $sql  = "INSERT INTO cursos (nome,duracao) VALUES (:nome,:duracao)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':nome', $cur->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(':duracao', $cur->getTempo(), PDO::PARAM_INT);
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
    
    function cursoEditar(Curso $cur){
        $conn = Conexao::getconexao();
        try {
                $conn->beginTransaction();
                $sql  = "UPDATE cursos set nome = :nome, duracao = :duracao where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $cur->getId(), PDO::PARAM_INT);
                $stmt->bindValue(':nome', $cur->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(':duracao', $cur->getTempo(), PDO::PARAM_INT);
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
    
    function cursoConsultaId($id){
        $conn = Conexao::getconexao();
        $curso = new Curso();
        try {
           
            $sql  = "select * from cursos where id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id , PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $curso->setId($resultado['id']);
            $curso->setNome($resultado['nome']);
            $curso->setTempo($resultado['duracao']);
            return $curso;
               
        } catch( Exception $e ){
             echo $e->getMessage();
             $conn->rollBack();
             return false;
         }
    }
    
    
    function cursoConsulta(){
        $conn = Conexao::getconexao();
        
        $lista = array();
        $i=0;
        try {
           
            $sql  = "select * from cursos";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($query);
            if($query){
                foreach ($query as $linha ){
                    $curso = new Curso();
                    $curso->setId($linha['id']);
                    $curso->setNome($linha['nome']);
                    $curso->setTempo($linha['duracao']);
                    $lista[$i++] = $curso;
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
    
    
    
    function Excluir(Curso $cur){
        $conn = Conexao::getconexao();
        try {
                $conn->beginTransaction();
                $sql  = "DELETE FROM cursos where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $cur->getId(), PDO::PARAM_INT);
                //var_dump($stmt);
                //var_dump($stmt->execute());
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
    
    
    
    
}
