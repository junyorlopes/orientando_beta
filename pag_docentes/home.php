<?php
include_once('topo.php');
?>

<?php

    if(isset($_GET['link'])){
        $filename = $_GET['link'];
        if(file_exists($filename)){
            include_once($filename);
        }else{
            echo "Pagina inexistentew";
            
        }
        
    }else{
        
        include_once('conteudo.php');
    }




?>




<?php
include_once('rodape.php')
?>