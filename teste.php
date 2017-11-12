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
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<script src="js/script.js" ></script>

		<style type="text/css">
			
			.navbar ul{

			}

			.navbar ul li{
				display: inline-block;
			}

			#itens-formacao {
				min-height: 300px;
				float: left;
				border: 1px solid #ccc;
				width: 100%;
			}


			.iten {
				width: 100%;
				float: left;
				margin:5px;
				display: block;;
			}

		</style>

  </head>
	<body>
		<div class="">

			<div id="itens-formacao">
				<p>Formação:</p>
				<div id="lista-fomacao">
					<div class="iten">
						<p>graduação em Tecnologia em Processamento de Dados pela Universidade Estadual Paulista Júlio de Mesquita Filho (1991)</p>
					</div>

					

				</div>
			</div>
				
			<label>Formação</label>
			<input type="text" name="formacao" id="formacao">

			<label>Instituição</label>
			<input type="text" name="instituicao" id="instituicao">

			<select name="tipos" id="tipos">
				<option value="1">Graduação</option>
				<option value="2">Mestrado</option>
				<option value="3">Doutorado</option>
				<option value="4">Outros</option>
			</select>

			<button id="btnadd">Adicionar</button>

			<form name="form" id="form" action="administracao/Controlador/Controlador_docentes.php" method="POST">
				
				</br></br></br>
				<input type="submit" name="teste">

			</form>


		</div>
	<script src="js/jquery-3.1.0.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>