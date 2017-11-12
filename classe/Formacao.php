<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formacao
 *
 * @author igor
 */
class Formacao {
   
    private $id;
    private $nome;
    private $tipo;
    private $ano;
    private $instituicao;
    
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getAno() {
        return $this->ano;
    }

    function getInstituicao() {
        return $this->instituicao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

    function setInstituicao($instituicao) {
        $this->instituicao = $instituicao;
    }


    
}
