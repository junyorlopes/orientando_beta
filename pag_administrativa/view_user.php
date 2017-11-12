<?php
	//$id = $_GET['id'];
	//Consulta
	//$result = mysql_query("SELECT * FROM cursos WHERE id = '$id' LIMIT 1");
	//$resultado = mysql_fetch_assoc($result); 
?>	

    <div class="container theme-showcase" role="main">
            <div class="page-header">
                    <h1>Vizualizar curso</h1>
            </div>

           
            <div class="container">
                
                
                <!--<div class="col-md-7 view-box teste4 ">
                    <div class="col-sm-3 col-md-1"><b>ID</b></div>
                    <div class="col-sm-7 col-md-11"> 10000</div>
                    <div class="col-sm-3 col-md-1"> <p><b>Nome</b></p></div>
                    <div class="col-sm-7 col-md-11"><p>Igor henrique martin dos santos</p> </div>
                    <div class="col-sm-7 col-md-5 teste-5"><b>Duração (semestres)</b></div>
                    <div class="col-sm-7 col-md-5"> <p>6</p> </div>
                </div>
                
                <div class="col-md-4 view-box teste4">
                    <a href='administrativo.php?link=9&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
                    <a href=''><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
                </div>-->
                
                <div class="col-md-10 view-box teste4">
                    <div class="col-md-7">
                        <div class="col-sm-3 col-md-1"><b>ID:</b></div>
                        <div class="col-sm-7 col-md-11"> 10000</div>
                        <div class="col-sm-3 col-md-1"> <p><b>Nome:</b></p></div>
                        <div class="col-sm-7 col-md-11"><p>Igor henrique martin dos santos</p> </div>
                        <div class="col-sm-7 col-md-5 teste-5"><b>Duração (semestres):</b></div>
                        <div class="col-sm-7 col-md-5"> <p>6</p> </div>
                    </div>
                    <div class="col-md-3 pull-right">
                        
                    <a href='administrativo.php?link=9&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
                    <a href=''><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
               
                </div>
                
                <!--<div class="col-md-4 view-box teste4">
                    <a href='administrativo.php?link=9&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>
                    <a href=''><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
                </div>-->
                
                
            </div>

    </div>