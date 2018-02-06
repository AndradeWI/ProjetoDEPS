	<?php 
		if($this->session->userdata('papel') != 'Gerente') {
			redirect('home');
		}
	?>
            

	<h3><?= $titulo ?></h3>
	<? if($mensagem != null): ?>
		<div class="alert alert-danger text-center">
			<?= $mensagem; ?>
		</div>
	<? endif; ?>
	<hr />			

	<form method="post" action="/categoria/cadastro/store">		
		<div class="form-group">
			<label for="nome">Nome</label><span style="color:#f00;"><?php echo form_error('nome') ?  : ''; ?></span>
			<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
		</div>
					
		<div class="form-group">
			<label for="descricao">Dscrição</label><span style="color:#f00;"><?php echo form_error('descricao') ?  : ''; ?></span>
			<textarea name="descricao" id="descricao" class="form-control" /><?= set_value('descricao') ? : (isset($descricao) ? $descricao : ''); ?></textarea>
		</div>
		<div class="form-group text-right">
			<a class="btn btn-danger " href="<?= base_url(); ?>categoria/home" role="button">Cancelar</a>
				<input type="submit" value="Salvar" class="btn btn-success" />
		</div>
		<input type='hidden' name="fk_id_avaliacao" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
	</form>