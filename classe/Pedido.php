<?php

Class Pedido{
    
    private $idpedido;
    private $data;
    private $nomeProjeto;
    private $file;
    private $mensagem;
    private $aluno;
    private $docente;
    
    function __construct() {
        
        $this->aluno = new Aluno();
        $this->docente = new Docente();
    }
       
    
    function getIdpedido() {
        return $this->idpedido;
    }

    function setIdpedido($idpedido) {
        $this->idpedido = $idpedido;
    }

        
    function getDocente() {
        return $this->docente;
    }

    function setDocente($docente) {
        $this->docente = $docente;
    }

        
    function getData() {
        return $this->data;
    }

    function getNomeProjeto() {
        return $this->nomeProjeto;
    }

    function getFile() {
        return $this->file;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getAluno() {
        return $this->aluno;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setNomeProjeto($nomeProjeto) {
        $this->nomeProjeto = $nomeProjeto;
    }

    function setFile($file) {
        $this->file = $file;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setAluno($aluno) {
        $this->aluno = $aluno;
    }


    
    
}
    
    
    



?>