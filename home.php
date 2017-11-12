<!-- Inclusão páginas -->
<?php
	//Menu
    include_once("topo.php");
    
    if(isset($_GET['link'])){
        
        $filename = $_GET['link'];
        if(file_exists($filename)){
            include_once($filename);
        }else{
            echo "Pagina inexistente";
        }        
    }else{
        include_once('conteudo.php');
    }
	include_once("rodape.php");
?>

</body>
</html>