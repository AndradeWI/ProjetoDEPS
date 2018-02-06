<?php 
	if($this->session->userdata('papel') != 'Gerente') {
		redirect('home');
	}
?>


			<div class="row">
				<div class="col-md-5">
					<h3>Lista de todas Submissões</h3>	
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
									<th>Destalhes</th>
								</tr>
							</thead>
							<tbody>
								<? foreach($submissoes->result() as $submissao): ?>
									<tr> 
										<td><?= $submissao->id_submissao ?></td>
										<td><?= $submissao->titulo ?></td>
										<td><?= $submissao->data_submissao ?></td>
										<td><?php 
												if ($submissao->status_sub == "Submetido") { ?>
													<span class="badge badge-primary"><?= $submissao->status_sub ?></span>
												<?php } else if ($submissao->status_sub == "Cancelado") { ?>
													<span class="badge badge-danger"><?= $submissao->status_sub ?></span>
												<?php } else if ($submissao->status_sub == "Publicado") { ?>
													<span class="badge badge-success"><?= $submissao->status_sub ?></span>
												<?php } ?>					
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