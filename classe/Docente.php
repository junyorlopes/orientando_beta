<?php

include_once 'User.php';
include_once 'Formacao.php';
include_once 'Pesquisa.php';

class Docente extends User{
    
    
    
    private $img;
    private $especialidade;
    private $formacao;
    private $pesquisa;
    private $curso;
    
    
    function __construct() {
        $this->formacao = new Formacao();
        $this->pesquisa = new Pesquisa();
    }
    
          
    function getCurso() {
        return $this->curso;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

       
    function getImg() {
        return $this->img;
    }

    function getEspecialidade() {
        return $this->especialidade;
    }

    function getFormacao() {
        return $this->formacao;
    }

    function getPesquisa() {
        return $this->pesquisa;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    function setFormacao($formacao) {
        $this->formacao = $formacao;
    }

    function setPesquisa($pesquisa) {
        $this->pesquisa = $pesquisa;
    }


    
    
   
    
    
    
}



?>
