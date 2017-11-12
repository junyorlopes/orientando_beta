<?php

/*
 * serve para organizar funções genericas
 * 
 * 
 */

/**
 * Description of FuncaoDados
 *
 * @author igor
 */
class FuncaoDados {
    
    static  function pdoMultiInsert($tableName, $data, $pdoObject){
    
        //Will contain SQL snippets.
         $rowsSQL = array();

        //Will contain the values that we need to bind.
        $toBind = array();

        //Get a list of column names to use in the SQL statement.
        $columnNames = array_keys($data[0]);

            //Loop through our $data array.
        foreach($data as $arrayIndex => $row){
            $params = array();
            foreach($row as $columnName => $columnValue){
                $param = ":" . $columnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $columnValue; 
            }
             
            $rowsSQL[] = "(" . implode(", ", $params) . ")";
        }
        
        
       
        
            //Construct our SQL statement
            $sql = "INSERT INTO `$tableName` (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
            

            //Prepare our PDO statement.
            $pdoStatement = $pdoObject->prepare($sql);
            
            //var_dump($sql);
            

            //Bind our values.
            foreach($toBind as $param => $val){
                $pdoStatement->bindValue($param, $val);
            }
             
                        
            //Execute our statement (i.e. insert the data).
            return $pdoStatement->execute();
    }
    
    
    static function addLinha($vet, $novalinha){
        
        $lista;
        $i = 0;
        if(is_array($vet[0])){
            foreach($vet as $key => $linha){

                foreach($linha as $colunaName => $colunaValor){

                    $lista[$key][$colunaName] = $colunaValor;
                }

                foreach($novalinha as $novalinhakey => $novalinhavalue){

                    $lista[$key][$novalinhakey] = $novalinhavalue;

                }

            }
        }else{
            
            foreach($vet as $key => $value){

                $lista[$i++] = $value;
                

                foreach($novalinha as $novalinhakey => $novalinhavalue){

                    $lista[$i++] = $novalinhavalue;

                }

            }
        }
        
        return $lista;
    }    
    
  

}
