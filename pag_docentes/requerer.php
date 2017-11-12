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
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group ">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Nome</label>
								<input type="text" class="form-control" placeholder="Nome" id="nome" required data-validation-required-message="Porfavor informe seu nome.">
								<p class="help-block text-danger"></p>
							</div>
						</div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Porfavor informe seu email.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensagem</label>
                                <textarea rows="5" class="form-control" placeholder="Menssagem" id="messagem" required data-validation-required-message="Porfavor digite a mensagem requerida ao docente."></textarea>
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
                    </form>
                </div>
            </div>
        </div>
	</div>
    </section>