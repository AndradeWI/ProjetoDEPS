<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $titulo ?> - Categoria</title>
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap-theme.min.css">
	<style>
	.erro {
		color: #f00;
	}
</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center"><?= $titulo ?></h1>
		<? if($mensagem != null): ?>
			<div class="alert alert-danger text-center">
				<?= $mensagem; ?>
			</div>
		<? endif; ?>
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<form method="post" action="<?= base_url(); ?>/categoria/cadastro/store">
					
					<div class="form-group">
						<label for="nome">Nome</label><span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
						<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
					</div>
					
					<div class="form-group">
						<label for="descricao">Dscrição</label><span class="erro"><?php echo form_error('descricao') ?  : ''; ?></span>
						<textarea name="descricao" id="descricao" class="form-control" /><?= set_value('descricao') ? : (isset($descricao) ? $descricao : ''); ?></textarea>
					</div>
					<div class="form-group text-right">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
					
				</form>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<a  href="<?= base_url(); ?>/categoria/home">Voltar</a>
			</div>
		</div>	
	</div>
</body>
</html>