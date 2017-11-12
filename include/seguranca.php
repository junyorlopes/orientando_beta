<?php
	
	if(($_SESSION['usuarioNome'] == "") ||
		($_SESSION['usuarioNivelAcesso'] == "")){
			//Removendo todas as informações contidas nas variáveis globais.
			unset($_SESSION['usuarioId'],			
				  $_SESSION['usuarioNome'], 		
				  $_SESSION['usuarioNivelAcesso'], 		
				  $_SESSION['usuarioSenha']);
		//Mensagem de erro.
		$_SESSION['loginErro'] = "Área restrita para usuários cadastrados";
		//Redirecionar para tela de login.
		header("Location: ../login.php");
	}
?>