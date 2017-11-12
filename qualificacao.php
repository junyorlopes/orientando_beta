<?php
   
    
?>


<!-- Descrição do docente -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h2>Qualificações</h2>
                </div>
            </div>
		                    
            
            <!--Graduação(ões) -->
            <div class="row">
		
                <div class="col-md-8 col-lg-offset-2">
                    
                    <table class="table">
                        <thead>
                            <tr>
                            	<th>Graduação(ões)</th>
                            </tr>
                        </thead>
			
                        <tbody>
                            
                            <?php
                                foreach ($controlador->getDocente()->getFormacao() as $formacao){
                                    
                                    if($formacao->getTipo() == "Graduação"){
                            ?>
                                    
                            <tr>
                                <td><?php echo $formacao->getNome() . " - ". $formacao->getInstituicao(). ", ". $formacao->getAno() ?></td>
                            </tr>
                            
                            <?php
                                } }
                            ?>
                        </tbody>
                    </table>
		</div>
            </div>
			
			<!--Mestrado -->
            <div class="row">
		<div class="col-md-8 col-lg-offset-2">
			<table class="table table-striped">
                            <thead>
				<tr>
                                    <th>Mestrado(s), Doutorado e Pós-Graduação</th>
				 </tr>
                            </thead>
                            <tbody>
                                
                                 <?php
                                foreach ($controlador->getDocente()->getFormacao() as $formacao){
                                    
                                    if($formacao->getTipo() == "Mestrado" || $formacao->getTipo() == "Doutorado"){
                                ?>

                                <tr>
                                    <td><?php echo $formacao->getTipo() .": ". $formacao->getNome() . " - ". $formacao->getInstituicao(). ", ". $formacao->getAno() ?></td>
                                </tr>

                                <?php
                                    } }
                                ?>
                                
                                <!--<tr>
                                    <td>Tecnologia em Análise e Desenvolvimento de Sistemas - FATEC Presidente Prudente.</td>
				</tr>-->
					 
                            </tbody>
			</table>
                </div>
            </div>
			<!--Doutorado -->
           
            <!--Outros -->
            <div class="row">
				<div class="col-md-8 col-lg-offset-2">
				  <table class="table table-striped">
					<thead>
					  <tr>
						<th>Outro(s)</th>
					  </tr>
					</thead>
					<tbody>
                                            
                                        <?php
                                                foreach ($controlador->getDocente()->getFormacao() as $formacao){

                                                    if($formacao->getTipo() != "Mestrado" and $formacao->getTipo() != "Doutorado" and $formacao->getTipo() != "Graduação" ){
                                        ?>

                                                <tr>
                                                    <td><?php echo $formacao->getTipo() .": ". $formacao->getNome() . " - ". $formacao->getInstituicao(). ", ". $formacao->getAno() ?></td>
                                                </tr>

                                        <?php
                                            } }
                                        ?>
                                
                                            
                                            
                                            
					  <!--<tr>
						
						<td>Tecnologia em Análise e Desenvolvimento de Sistemas - FATEC Presidente Prudente.</td>
					  </tr>-->
					  
					</tbody>
				  </table>
				</div>
			</div>
			<div class="text-center">
				<!-- Abrir em uma nova guia -->
				<a class="btn btn-lg btn-outline" href="http://www.fatecpp.edu.br/" title="Clique aqui para saber mais" target="_blank">Mais</a></a>
                        </div>
        </div>
    </section></br/></br/></br/>


    <!-- Áreas de pesquisa do docente -->
<div class="jumbotron ">
	<div class="container" id="page-top" align="center">
		<div class="row">
			<div class="text-center">
				<h2>Áreas de pesquisa</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-lg-offset-1" id="pesquisa-lista">
				<table class="table">
					<thead>
						<tr>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $campo ?> </td>
						</tr>
						<tr>
                                                    <td></td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Tabela de alunos sob orientação do docente -->
    <section id="portfolio" >
		<div class="container">
			<div class="row">
                <div class="text-center">
					<h2>Alunos sob orientação do docente</h2>
                </div>
            </div>
			<div class="row">
				<div class="col-md-10 col-lg-offset-1">
				  <table class="table table-striped">
					<thead>
					  <tr>
                                              <th class="col-md-5">Nome</th>
						<th>Tema</th>						
					  </tr>
					</thead>
					<tbody>
                                            <?php
                                                
                                                foreach($trabalhos as $trabalho){
                                            ?>
                                            
					  <tr>
						<td><?php echo $trabalho->nome; ?></td>
                                                <td><?php echo $trabalho->nomeprojeto ;?></td>
					  </tr>
                                          <?php
                                                }
                                          ?>          
                                                    
					  
					</tbody>
				  </table>
				</div>
			</div>
		</div>
	</section></br/></br/></br/>