<?php

class Vinculo{
    
    private $id;
    private $data;
    private $msg;
    private $status;
    private $pedido;
    
    
                
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getPedido() {
        return $this->pedido;
    }

    function setPedido($pedido) {
        $this->pedido = $pedido;
    }
       
    
    function getData() {
        return $this->data;
    }

    function getMsg() {
        return $this->msg;
    }

    function getStatus() {
        return $this->status;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setMsg($msg) {
        $this->msg = $msg;
    }

    function setStatus($status) {
        $this->status = $status;
    }


    
}