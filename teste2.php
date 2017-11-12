<?php

 /*include('DAO/conexao.php');
 include 'classe/FuncaoDados.php';*/

include 'classe/Formacao.php';
include('DAO/FormacaoDAO.php');
 
 
 //$con = Conexao::getconexao();
 /*$query = $con->query("SELECT * FROM cadfun");
  echo 'Registros afetados: ' . $query->fetch_row();
 var_dump($con);*/
 


$dsn = 'mysql:host=localhost;port=3306;dbname=mydb';
$usuario = 'root';
$senha = '';
$opcoes = array(
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_CASE => PDO::CASE_LOWER
);

try {
    $pdo = new PDO($dsn, $usuario, $senha, $opcoes);
} catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();
}
 
 for($i=0; $i<5; $i++){
     
     $params[] = 1;
     
 }
 
 var_dump($params);
 
 
 $vet = array(
                array(
                      'nome' =>'analise de sistema',
                      'tipo' => 'Graduação',
                      'ano' => '1011',
                      'instituicao' => 'FATEC',
                      'docentes_id' => 1
                      ),
                      
                array(
                      'nome' =>'analise de sistema',
                      'tipo' => 'Graduação',
                      'ano' => '1011',
                      'instituicao' => 'FATEC',
                      'docentes_id' => 1
                      )
             );
 
 
 
 $FDAO = new FormacaoDAO();
 
 $dados = array(1,2);
 $stmt = $pdo->prepare("DELETE FROM alunos WHERE ra in (?,?)");
 $resu = $stmt->execute($dados);
 var_dump($resu);
 
 $resu = $FDAO->Excluir(array(1,2,3), $pdo);
 var_dump($resu);
 
    
            //$a = FuncaoDados::pdoMultiInsert("formacoes", $vet, $con);
            //var_dump(FuncaoDados::addLinha($vet,array('id' => 1, 'adas' => 12 )));