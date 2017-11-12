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


class DocenteDAO {
    
    
    
    function Insert(Docente $docente){
       
    }
    
    
    //$id,$nome, $email, $img, $especilidade, $fomacao, $pesquisa
    function Editar(Docente $docente, $lista_formacao, $lista_pesquisa){
        $conn = Conexao::getconexao();          
        
        try {               
                $conn->beginTransaction();
                $sql  = "UPDATE users set nome = :nome, email = :email, senha = :senha where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $docente->getId(), PDO::PARAM_INT);             
                $stmt->bindValue(':nome', $docente->getNome(), PDO::PARAM_STR);
                $stmt->bindValue(':email', $docente->getEmail(), PDO::PARAM_STR);
                $stmt->bindValue(':senha', $docente->getSenha(), PDO::PARAM_STR);
                $result[1] = $stmt->execute();
               
                
                $sql  = "UPDATE docentes set especialidade = :especialidade, cursos_id = :cursos_id  where users_id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $docente->getId(), PDO::PARAM_INT);             
                $stmt->bindValue(':especialidade', $docente->getEspecialidade(), PDO::PARAM_STR);
                $stmt->bindValue(':cursos_id', $docente->getCurso(), PDO::PARAM_INT);
                $result[0] = $stmt->execute();
                
                                             
                if($lista_formacao != null){
                    
                    $lista_formacao = FuncaoDados::addLinha($lista_formacao, array('users_id' => $docente->getId()));
                
                    $result[2] = FuncaoDados::pdoMultiInsert("formacoes", $lista_formacao,$conn);
                }else{
                    
                    $result[2] = true;
                }
                
                                
                if($lista_pesquisa != null){
                    
                    
                    foreach ($lista_pesquisa as $key => $value ){
                        $params[] = "(?,?)";
                       
                    }                 
                    $sql  = "INSERT INTO pesquisa (nome, users_id) VALUES ";
                    $sql .= implode(",",$params);
                    
                                     
                    $lista_pesquisa = FuncaoDados::addLinha($lista_pesquisa, array('users_id' => $docente->getId()));                   
                    $stmt = $conn->prepare($sql);
                    $result[3] = $stmt->execute($lista_pesquisa);
                
                    
                }else{
                    
                    $result[3] = true;
                }
                                                     
                
                
                
                if($result[0] == true && $result[1] == true && $result[2] == true && $result[3] == true){
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
    
    
    //passa o id do usuario
    function ConsultarId($id){
        $conn = Conexao::getconexao();
        $docente = new Docente();
        $lista;
        $i=0;
        
        try {
            
            
                    
            $sql  = "SELECT * from users u, docentes d where u.id = d.users_id and u.id = :id";
            
            $conn->query('SET NAMES utf8');
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id , PDO::PARAM_INT);
           
            if($stmt->execute()){
                
                $linha = $stmt->fetch(PDO::FETCH_ASSOC);
                //var_dump($linha);
                $docente->setId($linha['id']);           
                $docente->setEmail($linha['email']);
                $docente->setNome($linha['nome']);
                $docente->setSenha($linha['senha']);
                $docente->setNivel($linha['nivel']);
                $docente->setCurso($linha['cursos_id']);
                $docente->setEspecialidade($linha['especialidade']);
                $docente->setImg($linha['img']);
              

                $sql  = "select * from formacoes where users_id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id , PDO::PARAM_INT);
                $stmt->execute();

                $lista = array();
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

                $sql  = "select * from pesquisa where users_id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();

                $lista = array();
                $i = 1;
                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $linha){
                    $pesquisa = new Pesquisa();
                    $pesquisa->setId($linha['idpesquisa']);
                    $pesquisa->setNome($linha['nome']);

                    $lista[$i++] = $pesquisa;                
                }


                $docente->setPesquisa($lista);

                return $docente;
            }  else {
                
                return false;
            }
               
        } catch( Exception $e ){
             echo $e->getMessage();           
             return false;
         }
    }
    
    
    function Consultar(){
        $conn = Conexao::getconexao();
        //var_dump($conn);
        
        $lista = array();
        $i=0;
        try {
            
           
            $sql  = "select *, u.id AS uid from users u, docentes d where u.id = d.users_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($query);
            if($query){
                foreach ($query as $linha ){
                    
                    $user = new Docente();
                    $user->setId($linha['uid']);                    
                    $user->setEmail($linha['email']);
                    $user->setNome($linha['nome']);
                    $user->setSenha($linha['senha']);
                    $user->setNivel();
                    $user->setEspecialidade($linha['especialidade']);
                    $lista[$i++] = $user;
                }
                return $lista;
                
                
            }else{
                
                return null;
            }
               
        } catch( Exception $e ){
             echo $e->getMessage();             
             return false;
         }
    }
    
     function ConsultaDocenteCurso($id){
         
        $conn = Conexao::getconexao();        
        $lista = array();
        $i=0;
        try {
            
            //var_dump($id);
            $sql  = "select *, u.id AS uid from users u, docentes d where u.id = d.users_id and d.cursos_id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id , PDO::PARAM_INT);
            $stmt->execute();
            $query = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($query);
            if($query){
                foreach ($query as $linha ){
                    $user = new Docente();
                    $user->setId($linha['uid']);                    
                    $user->setEmail($linha['email']);
                    $user->setNome($linha['nome']);
                    $user->setSenha($linha['senha']);
                    $user->setNivel();
                    $user->setEspecialidade($linha['especialidade']);
                    $lista[$i++] = $user;
                }
                return $lista;
                
                
            }else{
                
                return null;
            }
               
        } catch( Exception $e ){
             echo $e->getMessage();             
             return false;
         }
    }
    
    function Excluir($id){
        $conn = Conexao::getconexao();
        try {
                $conn->beginTransaction();
                $sql  = "DELETE FROM user where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
    
    function getId($login){
        $conn = Conexao::getconexao();
        try{
            $conn->beginTransaction();
            $sql  = "select * from login where login = :login";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':login', $login , PDO::PARAM_STR);
            $stmt->execute();
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            return $linha['users_id'];
            
        }catch( Exception $e ){
             echo $e->getMessage();
             $conn->rollBack();
             return false;
         }
    }
    
    
    function insertImg(Docente $docente){
        $conn = Conexao::getconexao();          
        
        try {               
            
                $conn->beginTransaction();
                $sql  = "UPDATE users set img = :img  where id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(':id', $docente->getId(), PDO::PARAM_INT);             
                $stmt->bindValue(':img', $docente->getImg(), PDO::PARAM_STR);        
                //var_dump($stmt->execute());
                
                if($stmt->execute()){
                    $conn->commit();
                    return true;                
                }else{                    
                    $conn->rollBack();
                     return false;
                }
                
        }catch( Exception $e ){
             echo $e->getMessage();
             $conn->rollBack();
             return false;
         }   
    }
    
    
     function consultartrabalho($iddocente){
        
        $conn = Conexao::getconexao();        
        $sql = "SELECT * from pedido p, vinculos v where p.idpedido = v.idpedido and  p.users_id = :id and v.status = true LIMIT 3";
               
        $inserir = $conn->prepare($sql);
        $inserir->BindValue(":id", $iddocente);
        $result = $inserir->execute();
        //var_dump($result);
        $dados = $inserir->fetchall(PDO::FETCH_OBJ);
        return $dados;
        
    }
    
    
}
    
