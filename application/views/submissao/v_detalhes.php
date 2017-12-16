<?php 
	if(!$this->session->userdata('logado')) {
		redirect('home');
	}
?>
	<div class="container">
		<div class="col-md-6 col-md-offset-2">
            <h1 class="text-center">Detalhes  </h1>
            <? if($mensagem != null): ?>
                <div class="alert alert-danger text-center">
                    <?= $mensagem; ?>
                </div>
            <? endif; ?>
			<div class="row">
				<form method="post" action="<?= base_url(); ?>/submissao/listar/detalhes" enctype="multipart/form-data">

					<div class="form-group">
						<label for="titulo_submissao">Título</label><span style="color: #f00;"><?php echo form_error('titulo_submissao') ?  : ''; ?></span>
						<input type="text" name="titulo_submissao" id="titulo_submissao" class="form-control" value="<?= set_value('titulo_submissao') ? : (isset($titulo_submissao) ? $titulo_submissao : '') ?>" disabled  />
					</div>

					<div class="form-group">
						<label for="categoria">Categoria</label><span style="color: #f00;"><?php echo form_error('categoria') ?  : ''; ?></span>						
						<select class="form-control" id="categoria" name="categoria" disabled="disabled">
							<option value="<?= $id_categoria_atual ?>"><?= $categoria_atual ?> </option>
							<? foreach($categorias->result() as $categoria): ?>
								<?php echo "<option value=".$categoria->id_categoria." >".$categoria->nome_categoria."</option>"; ?>
							<?php endforeach; ?>
						</select>
					</div>
					<? if($id_submissao == null): ?>

						<div class="form-group">
							<label for="isb">Isbn</label><span style="color: #f00;"><?php echo form_error('isb') ?  : ''; ?></span>
							<input type="number" name="isb" id="isb" class="form-control" value="<?= set_value('isb') ? : (isset($isb) ? $isb : '') ?>" disabled />
						</div>
					<? endif; ?>
					<div class="form-group">
						<label for="n_pagina">Nº de páginas</label><span class="erro"><?php echo form_error('n_pagina') ?  : ''; ?></span>
						<input type="number" name="n_pagina" id="n_pagina" class="form-control" value="<?= set_value('isb') ? : (isset($n_pagina) ? $n_pagina : '') ?>" disabled />
					</div>
					
					<div class="form-group">
						<label for="sinopse">Sinopse</label><span class="erro"><?php echo form_error('sinopse') ?  : ''; ?></span>
						<textarea name="sinopse" id="sinopse" class="form-control" disabled="disabled" /><?= set_value('sinopse') ? : (isset($sinopse) ? $sinopse : ''); ?></textarea>
					</div>
										

					<input type='hidden' name="id" value="<?= $id_submissao ?>">

				</form>
			</div>
			<div class="row"><hr></div>
			<div class="row">
			<?php 
				if($this->session->userdata('papel') == "Autor") { ?>
					<a href="/submissao/cadastro/cancelamento/<?= $id_submissao ?>" class="btn btn-danger" style="float: right;" role="button">Solicitar cancelamento</a>
				<?php } ?>
			</div>
		</div>	
	</div>
 