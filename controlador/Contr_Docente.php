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

include_once '../include/config.php';
include_once ('../DAO/conexao.php');

include_once '../classe/user.php';
include_once '../classe/Docente.php';
include_once('../classe/Formacao.php');
include_once('../classe/Pesquisa.php');
include_once('../classe/FuncaoDados.php');
include_once('../classe/Curso.php');


include_once('../DAO/CursoDAO.php');
include_once('../DAO/DocenteDAO.php');
include_once('../DAO/FormacaoDAO.php');
include_once('../DAO/PesquisaDAO.php');

include_once('classe/Docente.php');
include_once('classe/user.php');

include_once '/DAO/CursoDAO.php';
include_once '/DAO/DocenteDAO.php';
include_once '/DAO/FormacaoDAO.php';
include_once '/DAO/PesquisaDAO.php';
include_once('/classe/Curso.php');




class Contr_Docente {
    
    
    private $docenteDAO;
    private $cursoDAO;
    private $docente;
    private $listaDocentes;
    private $listaCurso;
    private $erroimg;




    /*private $listaCurso;*/
            
    function __construct() {
        
       $this->docenteDAO = new DocenteDAO();
       $this->docente= new Docente();
       $this->cursoDAO = new CursoDAO();
       $this->setErroimg(TRUE);
       
    }
    
    
    function getDocenteDAO() {
        return $this->docenteDAO;
    }

    function getDocente() {
        return $this->docente;
    }

    function getListaDocentes() {
        return $this->listaDocentes;
    }

    function getListaCurso() {
        if(empty($this->listaCurso)){
            $this->cursoall();            
        }
        return $this->listaCurso;
    }

    function setDocenteDAO($docenteDAO) {
        $this->docenteDAO = $docenteDAO;
    }

    function setDocente($docente) {
        $this->docente = $docente;
    }

    function setListaDocentes($listaDocentes) {
        $this->listaDocentes = $listaDocentes;
    }

    function setListaCurso($listaCurso) {
        $this->listaCurso = $listaCurso;
    }

    
    function getCursoDAO() {
        return $this->cursoDAO;
    }

    function getErroimg() {
        return $this->erroimg;
    }

    function setCursoDAO($cursoDAO) {
        $this->cursoDAO = $cursoDAO;
    }

    function setErroimg($erroimg) {
        $this->erroimg = $erroimg;
    }
 
    function setCurso($curso) {
        $this->curso = $curso;
    }

    
    function editar($id,$nome, $email,$curso,$senha,$especialidade, $formacao, $pesquisa){
        
       
        $this->docente->setId($id);
        $this->docente->setEmail($email);
        $this->docente->setEspecialidade($especialidade);
        $this->docente->setSenha($senha);
        $this->docente->setCurso($curso);
        $this->docente->setNome($nome);       
        
        return $this->docenteDAO->Editar($this->docente,$formacao,$pesquisa);        
    }
    
    
    function ExcluirFormacoes($listaid){
        $formacao = new FormacaoDAO();
        return $formacao->Excluir($listaid);
    }
    
    function ExcluirPesquisa($listaid){
        $pesquisa = new PesquisaDAO();
        return $pesquisa->Excluir($listaid);
    }
    
    function Consultaid($id){
    
        $this->docente = $this->docenteDAO->ConsultarId($id);
        if($this->docente == false){
            return false;
        }
        
    }
    
       
    
    function excluir($id){
        $this->docente->setId($id);
        return $this->docenteDAO->Excluir($this->docente);
    }
    
    
    function getId($login){
        return $this->docenteDAO->getId($login);
    }
    
    function gravarFoto($img,$id){
        
        //var_dump($img);
        $msg = "";
        $vettype = array("image/jpg", "image/png", "image/jpeg");
        $tamanho = 1024 * 1024 * 2;
        
       
                
        // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
        if ($img['error'] != 0) {
          $msg = "Não foi possível fazer o upload, erro:" . $img['erros'];
          $this->erroimg = TRUE;
          return $msg;
        }
        
        
        if($img["size"] >= $tamanho){
           
            $msg = "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
            $this->erroimg = TRUE;
            return $msg;
            
        }
        
       
        if (!(in_array($img['type'], $vettype))) {
            $msg =  "Por favor, envie arquivos com as seguintes extensões: jpg, png";
            $this->erroimg = TRUE;
            return $msg;
        }
        
        $extensao = explode('.', $img["name"]);
        $extensao = strtolower(end($extensao));        
        $nome_final = md5(time()). '.'.$extensao;
        
        // Depois verifica se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($img['tmp_name'], IMG . $nome_final)) {
          // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
            //$msg = "Upload efetuado com sucesso!";
            $this->docente->setId($id);
            $this->docente->setImg($nome_final);
            if($this->docenteDAO->insertImg($this->docente)){
                $this->erroimg = FALSE;
                return null;
            }else{
                $msg = "Não foi possível enviar o arquivo, tente novamente";
                $this->erroimg = TRUE;
                return $msg;
            }
           
        
        } else {
          // Não foi possível fazer o upload, provavelmente a pasta está incorreta
            $msg = "Não foi possível enviar o arquivo, tente novamente";
            $this->erroimg = TRUE;
            return $msg;
            
        }
        
    }
 
  



    function ordernarDados($vet){
        
       
        $i=0;
        $j=0;
        $lista = array();
        $aux;
        $campos = array('tipo','nome','instituicao','ano');
       
        if($vet != ""){
            foreach ($vet as $linha){
               foreach ($linha as $key ){
                   $aux[$j][$i] = $key;
                   $i++;
                   $j++;
                }                
                $j=0;
                
            } 
            
            $i=0;
            foreach ($aux as $key => $vet){
                foreach ($vet as $linha => $value ){
                    $lista[$key][$campos[$i]] = $value;
                    $i++;
                }
                $i=0;
                
            }
            
            return $lista;
            
        }else{
            return null;
        }
        
    }
    
    
    function consulatarDocente($id = null){
       //var_dump($id);
      // $this->listaDocentes = null;
        if($id == null || $id == "null"){
            //echo "sdfsd";
            $this->listaDocentes =  $this->docenteDAO->Consultar();
        }  else {
            $this->listaDocentes =  $this->docenteDAO->ConsultaDocenteCurso($id);
            //var_dump($this->docenteDAO->ConsultaDocenteCurso($id));
            
        }
        
    }
    
    function cursoall(){
        
        $this->listaCurso =  $this->cursoDAO->cursoConsulta();
        
    }
    
    
    function getTrabalhos($iddocente){
        
        return $this->docenteDAO->consultartrabalho($iddocente);
    }
    
}
