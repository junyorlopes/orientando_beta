<?php
session_start();

if(isset($_SESSION['login'])){
    
    if(!($_SESSION['login']['logado'] == 1 && $_SESSION['login']['nivel'] == 1) ){
       
        header("LOCATION: ../login.php");
    }
          
}else{
        
         header("LOCATION: ../login.php");
}


?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Página de Perfil">
		<meta name="author" content="">
		<!-- Icone -->
		<link rel="icon" href="imagens/icone_pagina.png">
		<title>Docente</title>
		<!-- Inclusão CSS-->
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<!----><link href="../css/igor.css" rel="stylesheet">
		<script src="../js/jquery-3.1.0.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script type="text/javascript" src="js/script.js" > </script>
	</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-menu1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="administrativo.php">    FATEC - PP<?php //echo $_SESSION['usuarioNome'] ?></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-menu1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="administrativo.php?link=crud/cad_user.php">Cadastrar user</a></li>                      
            <li role="separator" class="divider"></li>
            <li><a href="administrativo.php?link=crud/cad_cursos.php">Cadastro de curso</a></li>
          </ul>
        </li>
	
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consulta <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="administrativo.php?link=crud/report_user.php">Users</a></li>
             <li role="separator" class="divider"></li>
            <li><a href="administrativo.php?link=crud/report_cursos.php">Curso</a></li>
            
          </ul>
        </li>
		<!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Requisi&ccedil;&otilde;es <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Gerar</a></li>
			<li role="separator" class="divider"></li>
            <li><a href="#">Pendentes</a></li>
			<li role="separator" class="divider"></li>
            <li><a href="#">Recusados</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vinculos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Ativos</a></li>
			<li role="separator" class="divider"></li>
            <li><a href="#">Recusados</a></li>
			<li role="separator" class="divider"></li>
            <li><a href="#">Inativos</a></li>
          </ul>
        </li>-->
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nome do docente">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sess&atilde;o <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../sair.php">Finalizar</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>