<!-- Contato -->
<div class="jumbotron ">
    <section id="contact">
        <div class="container" id="page-top">
            <div class="row">
                <div class="text-center">
                    <h2>Requerer</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-offset-3">
                    <form name="sentMessage" id="contactForm" action="" method="POST" enctype="multipart/form-data">
                        <div class="row control-group ">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nome</label>
				<input type="text" name="nome" class="form-control" placeholder="nome" id="nome">
				<p class="help-block text-danger"></p>
                            </div>
			</div>
                        
                        <div class="row control-group ">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>RA</label>
				<input type="text" class="form-control" name="ra" id="ra">
				<p class="help-block text-danger"></p>
                            </div>
			</div>
                        
                        
                        <div class="row control-group ">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nome do projeto</label>
                                <input type="text" class="form-control" name="nomepj" placeholder="Nome do projeto" id="nomepj">
				<p class="help-block text-danger"></p>
                            </div>
			</div>
                        
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                          <div class="row control-group ">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Pré-projeto</label>
				<input type="file" class="form-control" name="doc" placeholder="doc" id="doc">
				<p class="help-block text-danger"></p>
                            </div>
			</div>
                        
                        
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensagem</label>
                                <textarea rows="5" class="form-control" name="msg" placeholder="Menssagem" id="messagem"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                            </div>
                        </div>
                        
                        
                        <input type="hidden" name="idprof" value="<?php echo $id ?>">
                        <input type="hidden" name="veri" value="1">
                    </form>
                </div>
            </div>
        </div>
	</div>
    </section>