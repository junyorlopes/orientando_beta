<?php
	session_start();
	session_destroy();
	
	//Removendo todas as informações contidas nas variáveis globais.
	unset($_SESSION['usuarioId'],			
		      $_SESSION['usuarioNome'], 		
		      $_SESSION['usuarioNivelAcesso'], 		
		      $_SESSION['usuarioSenha']);
	
	//Redirecionar para tela de login.
	header("Location: login.php");
?>