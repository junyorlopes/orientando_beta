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
include_once('classe/user.php');
include_once('DAO/UserDAO.php');
include 'DAO/conexao.php';
class Contr_Login {
    
    private $user;
    private $userDAO;
    private $logago;
    
    
            
            
    function __construct() {
       $this->userDAO = new UserDAO();
         $this->user = new user();
    }
    
    
    function getLogago() {
        return $this->logago;
    }

    function setLogago($logago) {
        $this->logago = $logago;
    }

    
    function getUser() {
        return $this->user;
    }

    function getUserDAO() {
        return $this->userDAO;
    }

    
    function setUser($user) {
        $this->user = $user;
    }

    
   
    function  consultaLogin($email, $senha){
        $users = new user();
        $users->setLogin($email);
        $users->setSenha($senha);
        $this->user = $this->userDAO->validaLogin($users);
        
        if($this->user){
            $this->logado = true;
            
        }
        else{
            $this->logado = false;
        }
    }
    
    function isUserLogado(){
        return $this->logado;
    }
}
