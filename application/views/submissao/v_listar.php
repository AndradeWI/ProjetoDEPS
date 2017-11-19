
	<div class="container">
		<div class="col-md-10">
            <h1 class="text-center">Listar Submissões</h1>
            <? if($mensagem != null): ?>
                <div class="alert alert-success text-center">
                    <?= $mensagem; ?>
                </div>
            <? endif; ?>
			<div class="row">
				<a class="btn btn-success" href="<?= base_url(); ?>/home">Home</a>
					
			</div>

			<div class="row">
				<h3><?= $submissoes->num_rows(); ?> registro(s)</h3>
				
				<div class="row">
					<? if($submissoes->num_rows() > 0): ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Código</th>
									<th>Título</th>
									<th>Data submetida</th>
									<th>Status</th>
									<th>Destalhes</th>
								</tr>
							</thead>
							<tbody>
								<? foreach($submissoes->result() as $submissao): ?>
									<tr> 
										<td><?= $submissao->id_submissao ?></td>
										<td><?= $submissao->titulo ?></td>
										<td><?= $submissao->data_submissao ?></td>
										<td><?= $submissao->status_sub ?></td>
										<td><a  href=" /submissao/listar/detalhes/<?= $submissao->id_submissao ?>">Detalhes</a></td>
										
										</tr>
									<? endforeach; ?>
								</tbody>
							</table>
						<? else: ?>
							<h4>Nenhum registro cadastrado.</h4>
						<? endif; ?>
					</div>
				</div>	
			</div>
		</div>	
	</div>		