<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Curso
 *
 * @author igor
 */
class Curso {
    
    private $id;
    private $nome;
    private $tempo;
    
          
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTempo() {
        return $this->tempo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTempo($perido) {
        $this->tempo = $perido;
    }


    
   
}
