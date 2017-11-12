<?php


Class Aluno {
    
    private $ra;
    private $nome;
    private $email;
    
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

        
    function getRa() {
        return $this->ra;
    }

    function getNome() {
        return $this->nome;
    }

    function setRa($ra) {
        $this->ra = $ra;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }


    
}