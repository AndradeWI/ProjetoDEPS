<?php 
	if($this->session->userdata('papel') != 'Gerente') {
		redirect('home');
	}
?>


			<div class="row">
				<div class="col-md-5">
					<h3>Lista de todas submissões</h3>
					<? if ($mensagem != null): ?>
						<div class="alert alert-success text-center">
							<?= $mensagem; ?>
						</div>
					<? endif; ?>
					<? if ($restricao != null): ?>
						<div class="alert alert-danger text-center">
							<?= $restricao; ?>
						</div>
					<? endif; ?>
				</div>
        	</div>
			<br />

					<? if($submissoes->num_rows() > 0): ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Código</th>
									<th>Título</th>
									<th>Data submetida</th>
									<th>Status</th>
									<th>Detalhes</th>
								</tr>
							</thead>
							<tbody>
								<? foreach($submissoes->result() as $submissao): ?>
									<tr> 
										<td><?= $submissao->id_submissao ?></td>
										<td><?= $submissao->titulo ?></td>
										<td><?= $submissao->data_submissao ?></td>
										<td><?= $submissao->status_sub ?>
											</td>
										<td style="text-align: center;"><a  href=" /submissao/listar/detalhes/<?= $submissao->id_submissao ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>
											</a></td>
										
										</tr>
									<? endforeach; ?>
								</tbody>
							</table>
						<? else: ?>
							<div class="alert alert-dismissible alert-info">
								Nenhum registro cadastrado
							</div>
						<? endif; ?>	