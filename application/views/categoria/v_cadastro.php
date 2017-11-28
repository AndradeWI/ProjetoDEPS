
	<div class="container">
		<div class="col-md-6 col-md-offset-2">
            <h1 class="text-center"><?= $titulo ?></h1>
            <? if($mensagem != null && $nome != null): ?>
                <div class="alert alert-danger text-center">
                    <?= $mensagem; ?>
                </div>
            <? endif; ?>
            
			<div class="row">
				<form method="post" action="/categoria/cadastro/store">
					
					<div class="form-group">
						<label for="nome">Nome</label><span style="color:#f00;"><?php echo form_error('nome') ?  : ''; ?></span>
						<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
					</div>
					
					<div class="form-group">
						<label for="descricao">Descrição</label><span style="color:#f00;"><?php echo form_error('descricao') ?  : ''; ?></span>
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
				<a  href="/categoria/home">Voltar</a>
			</div>
		</div>	
	</div>