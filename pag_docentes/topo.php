
<?php
    session_start();
    

    if(isset($_SESSION['login'])){
        
        if(!($_SESSION['login']['logado'] == 1 && $_SESSION['login']['nivel'] == 2) ){

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
            <link rel="icon" href="../imagens/icone_pagina.png">
            <title>Docente</title>
            
            <!-- Inclusão CSS-->
            <link href="../css/bootstrap.css" rel="stylesheet">
            <link href="../css/style.css" rel="stylesheet">
            <link href="../css/igor.css" rel="stylesheet">
            <script type="text/javascript" src="../js/jquery-3.1.0.js"></script>
            <script type="text/javascript" src="../js/bootstrap.js" > </script>
            <script type="text/javascript" src="../js/script.js" > </script>
		
    </head>
	<body>
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                  
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="home.php">Instituição</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Editar <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="home.php?link=crud/cad_docentes.php">Perfil</a></li>
                        <li role="separator" class="divider"></li>
                        
                      </ul>
                    </li>
                            <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Requisições <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="home.php?link=crud/listarpedidos.php&op=p">Pendentes</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="home.php?link=crud/listarpedidos.php&op=r">Recusadas</a></li>
                      </ul>
                    </li>
                            <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Orientandos <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="home.php?link=crud/listarpedidos.php&op=a">Ativos</a></li>
                      </ul>
                    </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sessão<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="../sair.php">Finalizar</a></li>
                      </ul>
                    </li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
         