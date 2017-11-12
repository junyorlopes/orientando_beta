<?php
 
//error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
//$conectar = @mysql_connect("localhost","root","") or die ("Erro na conexão com o banco de dados!");
//mysql_select_db("docentes_fatec") or die ("Base não encontrada");
 

define("LOGIN","root");
define("PWD","");
define("DB", "pj_fatec");
//define("DB", "virtual");
define("SERVER","localhost");

class Conexao {
    
    public static $conn = null;
    
   
   
   public static function getconexao() {
       
       
       if(self::$conn === null){
           
          try {
                self::$conn = new PDO('mysql:host='.SERVER.';dbname='.DB.';charset=UTF8', LOGIN, PWD);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $erro){
                echo "ERRO:" . $erro->getMessage() . var_dump(self::$conn);
          }
       }
       
       return self::$conn;  
        
        
       
   }


   
    
   
 }
?>
