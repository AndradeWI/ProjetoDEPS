<?php 
	if(!$this->session->userdata('logado')) {
		redirect('home');
	}
?>

		<div class="row">
            <div class="col-md-5">
                <h3>Submissão</h3>
                <? if ($mensagem != null): ?>
                    <div class="alert alert-success text-center">
                        <?= $mensagem; ?>
                    </div>
                <? endif; ?>
            </div>
            <div class="col-md-7" style="text-align: right;">
                <div>
					<?php 
					if($this->session->userdata('papel') == "Autor") { ?>

						<a href="/submissao/cadastro/cancelamento/<?= $id_submissao ?>" class="btn btn-danger" style="float: right;" role="button">Solicitar cancelamento</a>
					<?php } else if ($this->session->userdata('papel') == "Gerente") { 
						if ($status_sub == "Cancelado") { ?>
						<a href="/submissao/cadastro/delete/<?= $id_submissao ?>" class="btn btn-danger" style="float: right;" role="button">Excluir submissão</a>
					<?php } } ?>
                </div>
            </div>
        </div>
		
		<br>

		<div class="card mb-3">
				<h3 class="card-header"><?= $titulo_submissao ?></h3>
				<div class="card-body">
					<h5 class="card-title">Categoria: <?= $categoria_atual ?></h5>
					<h6 class="card-subtitle text-muted">ISBN: <?= $isbn ?></h6>
				</div>
				<div class="card-body">
					<p class="card-text"><?= $sinopse ?></p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Numero de paginas: <?= $n_pagina ?></li>
					<li class="list-group-item">Status <?= $status_sub ?></li>
					<li class="list-group-item">Data <?php 
														$date = date_create($data_submissao);
														echo date_format($date, 'd/m/Y');
													?>
													</li>
				</ul>
				<div class="card-body">
					<a role="button" target="_blank" href="<?= $arquivo ?>" type="button" class="btn btn-secondary">
						<i class="fa fa-download" aria-hidden="true"></i>
						Baixar livro 
					</a>
				</div>
		</div>
	