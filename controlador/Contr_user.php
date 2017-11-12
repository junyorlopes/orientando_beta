<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contr_Curso
 *
 * @author igor
 */
include_once('../classe/user.php');
include_once('../DAO/UserDAO.php');
include_once('../DAO/conexao.php');

include_once('/classe/user.php');
include_once('/DAO/UserDAO.php');
include_once('/DAO/conexao.php');

class Contr_user {
    
    private $user;
    private $userDAO;
    private $lista;
   
    function __construct() {
       $this->userDAO = new UserDAO();
         $this->user = new user();
    }

    function getUser() {
        return $this->user;
    }

    function getUserDAO() {
        return $this->userDAO;
    }

    function getLista() {
        return $this->lista;
    }

    function setUser($user) {
        $this->user = $user;
    }

    
    function setLista($lista) {
        $this->lista = $lista;
    }

    
        
    function insert($nome,$login,$senha, $tipo){
                
        $this->user->setNome($nome);
        $this->user->setEmail($login);
        $this->user->setNivel($tipo);
        $this->user->setSenha($senha);
        return $this->userDAO->insert($this->user);      
    }
    
    function editar($id, $nome, $email, $senha){
        $this->user->setId($id);
        $this->user->setNome($nome);
        $this->user->setSenha($senha);
        $this->user->setEmail($email);
        //$this->user->setNivel($tipo);
    
        return $this->userDAO->Editar($this->user);        
    }
    
    function ConsultaId($id){
    
        $this->user = $this->userDAO->ConsultaId($id);        
    }
    
    function ConsultaAll(){
        
        $this->lista = $this->userDAO->Consulta();
        
    }
    
    
    function excluir($id){
        return $this->userDAO->Excluir($id);
    }
    
    
    function  consultaLogin($email, $senha){
       
    }
    
    function Logar($email,$senha){
                
        $this->user->setEmail($email);
        $this->user->setSenha($senha);
        
        $this->user = $this->userDAO->consultarLogin($this->user);
        
        if($this->user != false){
            return true;
        }
        else{
            return false;
        }
        
    }
}
