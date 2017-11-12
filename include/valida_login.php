<?php
	session_start();
	$emailt = $_POST['email'];
	$senhat = $_POST['senha'];
	
	//Conexão com o banco de dados
	//include_once("../DAO/conexao.php");
	
	//instituição
	$result1 = mysql_query("SELECT * FROM instituicao WHERE email='$emailt' AND senha='$senhat' LIMIT 1");
	$resultado1 = mysql_fetch_assoc($result1);
	//docentes
	$result2 = mysql_query("SELECT * FROM docentes WHERE email='$emailt' AND senha='$senhat' LIMIT 1");
	$resultado2 = mysql_fetch_assoc($result2);
	
	if((empty($resultado1)) && (empty($resultado2))){
		//Mensagem de Erro
		$_SESSION['loginErro'] = "Email ou senha inválido";
		header("Location: login.php");
		
	}
	else{
		if((isset($resultado1)) && (empty($resultado2))){
			$_SESSION['usuarioNome'] = $resultado1['nome'];
			$_SESSION['usuarioNivelAcesso'] = $resultado1['nivel_acesso_id'];
		
			if($_SESSION['usuarioNivelAcesso'] == 1){
				header("Location: ../pag_administrativa/administrativo.php");
				//echo $_SESSION['usuarioNome']." ".$_SESSION['usuarioNivelAcesso'];
			}
			else{
				$_SESSION['loginErro'] = "Não encontrado";
			}
		}
		else if((empty($resultado1)) && (isset($resultado2))){
			
			$_SESSION['usuarioNome'] = $resultado2['nome'];
			$_SESSION['usuarioNivelAcesso'] = $resultado2['nivel_acesso_id'];
				
			if($_SESSION['usuarioNivelAcesso'] == 2){
				header("Location: ../pag_docentes/perfil_docente_logon.php");
			}
			else{
				$_SESSION['loginErro'] = "Não encontrado";
			}
		}
	}
?>