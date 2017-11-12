<?php


include_once('../classe/Curso.php');
include_once('../DAO/conexao.php');
include_once('../classe/Curso.php');
include_once('../DAO/CursoDAO.php');

class Contr_Curso {
    
    private $curso;
    private $cursoDAO;
    private $lista;
            
    function __construct() {
       $this->cursoDAO = new CursoDAO();
         $this->curso = new Curso();
    }

    
    public function getCurso(){
        return $this->curso;
    }
        
    public function getLista(){
        return $this->lista;
    }
    
    function insert($nome,$tempo){
                
        $this->curso->setNome($nome);
        $this->curso->setTempo($tempo);
        return $this->cursoDAO->cursoInsert($this->curso);        
    }
    
    function editar($id, $nome, $tempo){
        
      
        $this->curso->setId($id);
        $this->curso->setNome($nome);
        $this->curso->setTempo($tempo);
        return $this->cursoDAO->cursoEditar($this->curso);        
    }
    
    function Consultaid($id){
    
        $this->curso = $this->cursoDAO->cursoConsultaId($id);        
    }
    
    function Consultaall(){
        
        $this->lista = $this->cursoDAO->cursoConsulta();
        
    }
    
    
    function excluir($id){
        $this->curso->setId($id);
        return $this->cursoDAO->Excluir($this->curso);
    }
}
