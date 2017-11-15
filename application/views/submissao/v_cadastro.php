<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $titulo ?> - Submissão</title>
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
				<form method="post" action="<?= base_url(); ?>/submissao/cadastro/store" enctype="multipart/form-data">

					<div class="form-group">
						<label for="titulo_submissao">Título</label><span class="erro"><?php echo form_error('titulo_submissao') ?  : ''; ?></span>
						<input type="text" name="titulo_submissao" id="titulo_submissao" class="form-control" value="<?= set_value('titulo_submissao') ? : (isset($titulo_submissao) ? $titulo_submissao : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="categoria">Categoria</label><span class="erro"><?php echo form_error('categoria') ?  : ''; ?></span>
						<select class="form-control" id="categoria" name="categoria">
							<option value="<?= $id_categoria_atual ?>"><?= $categoria_atual ?> </option>
							<? foreach($categorias->result() as $categoria): ?>
								<?php echo "<option value=".$categoria->id_categoria." >".$categoria->nome_categoria."</option>"; ?>
							<?php endforeach; ?>
						</select>
					</div>
					<? if($id_submissao == null): ?>

						<div class="form-group">
							<label for="isb">Isbn</label><span class="erro"><?php echo form_error('isb') ?  : ''; ?></span>
							<input type="number" name="isb" id="isb" class="form-control" value="<?= set_value('isb') ? : (isset($isb) ? $isb : '') ?>" autofocus='true' />
						</div>
					<? endif; ?>
					<div class="form-group">
						<label for="n_pagina">Nº de páginas</label><span class="erro"><?php echo form_error('n_pagina') ?  : ''; ?></span>
						<input type="number" name="n_pagina" id="n_pagina" class="form-control" value="<?= set_value('isb') ? : (isset($n_pagina) ? $n_pagina : '') ?>" autofocus='true' />
					</div>
					
					<div class="form-group">
						<label for="sinopse">Sinopse</label><span class="erro"><?php echo form_error('sinopse') ?  : ''; ?></span>
						<textarea name="sinopse" id="sinopse" class="form-control" /><?= set_value('sinopse') ? : (isset($sinopse) ? $sinopse : ''); ?></textarea>
					</div>
					<div class="form-group">
						<label for="arquivo">Selecione um arquivo (pdf, doc)</label><span class="erro"><?php echo form_error('arquivo') ?  : ''; ?></span>
						<input type="file" name="arquivo" id="arquivo" class="form-control"  /><?= set_value('arquivo') ? : (isset($arquivo) ? $arquivo : ''); ?>
					</div>

					<div class="form-group text-right">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>

					<input type='hidden' name="id" value="<?= $id_submissao ?>">

				</form>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<a  href="<?= base_url(); ?>/submissao/home">Voltar</a>
			</div>
		</div>	
	</div>
</body>
</html>