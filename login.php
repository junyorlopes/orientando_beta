<?php
       include_once 'topo.php';

        
	session_start();
        
        include_once("controlador/Contr_user.php");
        if(isset($_POST['email']) && isset($_POST['senha'])){
            
            $controlador = new Contr_user();
            $result = $controlador->Logar($_POST['email'], $_POST['senha']);
            //var_dump($controlador->getUser());
            
            
            if($result){
                
              
                
                $_SESSION['login'] = array('logado' => 1, 'id' => $controlador->getUser()->getId(), 'nivel' =>   $controlador->getUser()->getNivel());
                var_dump($_SESSION['login']);
                
                if( $_SESSION['login']['nivel'] == 1){
                    
                    header("LOCATION: pag_administrativa/administrativo.php");
                }else{
                    
                    header("LOCATION: pag_docentes/home.php");
                }
               
                //var_dump($_SESSION['login']);
               
            }else{
                $loginErro = "Usuário ou senha inválido";
            }
        }
        
    
        
         
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Acesso de usuário</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  </head>

  <body>
	<?php
		
	?>
    <div class="container">
        <form class="form-signin" method="POST" action="login.php">
        <h2 class="form-signin text-center">Acessar</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus><br/>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
		</br>
        <button class="btn  btn-primary btn-block" type="submit">Entrar</button>
      </form>
	<p class="text-center text-danger">
		<?php
                    echo @$_SESSION['loginErro'];
		?>
	</p>
	
    </div> <!-- /container -->
  </body>
</html>