
	<div class="container">
		<div class="col-md-6 col-md-offset-2">
            <h1 class="text-center"><?= $titulo ?></h1>
            <? if($mensagem != null && $nome != null): ?>
                <div class="alert alert-danger text-center">
                    <?= $mensagem; ?>
                </div>
            <? endif; ?>
            
			<div class="row">
				<form method="post" action="/home/home/store">
					
					<div class="form-group">
						<label for="nome">Nome</label><span style="color:#f00;"><?php echo form_error('nome') ?  : ''; ?></span>
						<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="email">E-mail</label><span style="color:#f00;"><?php echo form_error('email') ?  : ''; ?></span>
						<input type="text" name="email" id="email" class="form-control" value="<?= set_value('email') ? : (isset($email) ? $email : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="papel">Papel</label><span style="color:#f00;"><?php echo form_error('papel') ?  : ''; ?></span>
						<input type="text" name="papel" id="papel" class="form-control" value="<?= set_value('papel') ? : (isset($papel) ? $papel : '') ?>" autofocus='true' />
					</div>
					
					<div class="form-group">
						<label for="login">Login</label><span style="color:#f00;"><?php echo form_error('login') ?  : ''; ?></span>
						<input type="text" name="login" id="login" class="form-control" value="<?= set_value('login') ? : (isset($login) ? $login : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="senha">Senha</label><span style="color:#f00;"><?php echo form_error('senha') ?  : ''; ?></span>
						<input type="password" name="senha" id="senha" class="form-control" value="<?= set_value('senha') ? : (isset($senha) ? $senha : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="editora">Editora</label><span style="color: #f00;"><?php echo form_error('editora') ?  : ''; ?></span>
						<select class="form-control" id="editora" name="editora">
							<option value="<?= $fk_id_editora ?>"><?= $editora ?> </option>
							<? foreach($usuarios->result() as $usuario): ?>
								<?php echo "<option value=".$usuario->fk_id_editora." >".$usuario->editora."</option>"; ?>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group text-right">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
					
				</form>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<a  href="/usuario/home">Voltar</a>
			</div>
		</div>	
	</div>