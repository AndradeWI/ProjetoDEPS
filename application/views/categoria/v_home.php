<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categoria</title>
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap-theme.min.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Categoria</h1>
		<? if($mensagem != null): ?>
			<div class="alert alert-success text-center">
				<?= $mensagem; ?>
			</div>
		<? endif; ?>
		<? if($restricao != null): ?>
			<div class="alert alert-danger text-center">
				<?= $restricao; ?>
			</div>
		<? endif; ?>
		<div class="col-md-12">
			<div class="row">
				<a class="btn btn-success" href="<?= base_url(); ?>/home">Home</a>
				<a class="btn btn-success" href="<?= base_url(); ?>categoria/cadastro/create">Novo Cadastro</a>
			</div>

			<div class="row">
				<h3><?= $categorias->num_rows(); ?> registro(s)</h3>
				
				<div class="row">
					<? if($categorias->num_rows() > 0): ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nome</th>
									<th>Descrição</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								<? foreach($categorias->result() as $categoria): ?>
									<tr>
										<td><?= $categoria->id_categoria ?></td>
										<td><?= $categoria->nome_categoria ?></td>
										<td><?= $categoria->descricao_categoria ?></td>
										<td><a  href="<?= base_url(); ?>/categoria/cadastro/edit/<?= $categoria->id_categoria ?>" >Editar</a>
											| <a href="#" class='confirma_exclusao' data-id="<?= $categoria->id_categoria ?>" data-nome="<?= $categoria->nome_categoria ?>" />Excluir</a></td>
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
						document.location.href = "<?= base_url(); ?>/categoria/cadastro/delete/"+id;
					});					
				});
			</script>

		</body>
		</html>