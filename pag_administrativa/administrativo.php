<?php
	include_once("topo_adm.php");

	if(isset($_GET['link'])){
		$filename = $_GET['link'];
		if(file_exists($filename)){
			include_once($filename);
		}else{
			echo "Pagina inexistentew";
		}        
	 }else{
		include_once('bem_vindo.php');
	 }
	include_once("rodape_adm.php");
?>