
		<div class="card mb-5">
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


