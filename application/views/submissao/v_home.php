<?php 
	if($this->session->userdata('papel') != 'Gerente') {
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
                <? if ($restricao != null): ?>
                    <div class="alert alert-danger text-center">
                        <?= $restricao; ?>
                    </div>
                <? endif; ?>
            </div>
            <div class="col-md-7" style="text-align: right;">
                <div>
					<a class="btn btn-warning" href="<?= base_url(); ?>/submissao/cadastro/create">Nova submissão</a>
					<a class="btn btn-warning" href="<?= base_url(); ?>/submissao/listar/listar_sub">Listar todas submissões</a>
                </div>
            </div>
        </div>

        <br> 


				<!--<h3><//?= $submissoes->num_rows(); ?> registro(s)</h3>-->
				
					<? if($submissoes->num_rows() > 0): ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Título</th>
									<th>Data submetida</th>
									<th>Status</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody class="text-left">
								<? foreach($submissoes->result() as $submissao): ?>
									<tr> 
										<td><?= $submissao->titulo ?></td>
										<td><?= $submissao->data_submissao ?></td>
										<td><?= $submissao->status_sub ?></td>

										<td>
											<a target="_blank" href="<?= $submissao->arquivo ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
											|
											<a  href="<?= base_url(); ?>/submissao/cadastro/edit/<?= $submissao->id_submissao ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></a>
											| <a href="#" class='confirma_exclusao' data-id="<?= $submissao->id_submissao ?>" data-nome="<?= $submissao->titulo ?>"/><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
										</tr>
									<? endforeach; ?>
								</tbody>
							</table>
						<? else: ?>
							<div class="alert alert-dismissible alert-info">
								Nenhum registro cadastrado
							</div>
						<? endif; ?>
		
			<div class="modal fade" id="modal_confirmation">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Confirmação de Exclusão</h4>
						</div>
						<div class="modal-body">
							<p>Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
							<button type="button" class="btn btn-danger" id="btn_excluir">Sim. Acabe com ele</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<script src="<?= base_url(); ?>/assets/js/jquery.js"></script>
			<script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>

			<script>


				$(function(){	

					$('.confirma_exclusao').on('click', function(e) {
						e.preventDefault();

						var nome = $(this).data('nome');
						var id = $(this).data('id');

						$('#modal_confirmation').data('nome', nome);
						$('#modal_confirmation').data('id', id);
						$('#modal_confirmation').modal('show');
					});

					$('#modal_confirmation').on('show.bs.modal', function () {
						var nome = $(this).data('nome');
						$('#nome_exclusao').text(nome);
					});	

					$('#btn_excluir').click(function(){
						var id = $('#modal_confirmation').data('id');
						document.location.href = "/submissao/cadastro/delete/"+id;
					});	

				});

			</script>








				