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
					<li class="list-group-item">Número de páginas: <?= $n_pagina ?></li>
					<li class="list-group-item">Status: <?= $status_sub ?></li>
                    <?php
                    if($status_sub == 'Avaliação') { ?>
                        <li class="list-group-item">Avaliador: </li>
                    <? } ?>
					<li class="list-group-item">Data: <?php
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
        <?php
        if (($this->session->userdata('papel') == 'Gerente') && ($avaliadores->num_rows() > 0) && ($status_sub == 'Enviado')){
        ?>
        <div class="card mb-3">
            <h3 class="card-header">Selecionar avaliador</h3>
            <div class="card-body">
                <form method="post" action="/submissao/listar/detalhes/<?= $id_submissao ?>">
                    <div class="form-group">
                        <label for="selectAvaliadores">Avaliadores disponíveis:</label>
                        <select class="form-control" name="selectAvaliadores">
                            <? foreach($avaliadores->result() as $avaliador): ?>
                                <option value="<?= $avaliador->id_usuario ?>"><?= $avaliador->nome ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>

                    <input type='hidden' name="id_submissao" value="<?= $id_submissao ?>">
                    <!--<input type='hidden' name="id_usuario" value="<?= $id_usuario ?>">-->
                    <input type='hidden' name="flag" value="1">

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-warning">Selecioar</button>
                    </div>
                </form>
            </div>
        </div>

        <? }elseif(($this->session->userdata('papel') == 'Gerente') && ($avaliadores->num_rows() < 1) && ($status_sub == 'Enviado')){
            ?>){ ?>
            <div class="alert alert-dismissible alert-info">
                Não existem avaliadores cadastrados na editora para realizar a avaliação.
            </div>
        <? } ?>
