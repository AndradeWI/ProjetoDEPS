


            <h3><?= $titulo ?></h3>
            <hr>
            <? if($mensagem != null && $email != null): ?>
                <div class="alert alert-danger text-center">
                    <?= $mensagem; ?>
                </div>
            <? endif; ?>
            

				<form method="post" action="<?= base_url(); ?>usuario/cadastro/store">
					
					<div class="form-group">
						<label for="nome">Nome</label><span style="color:#f00;"><?php echo form_error('nome') ?  : ''; ?></span>
						<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="email">E-mail</label><span style="color:#f00;"><?php echo form_error('email') ?  : ''; ?></span>
						<input type="text" name="email" id="email" class="form-control" value="<?= set_value('email') ? : (isset($email) ? $email : '') ?>" autofocus='true' />
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
							<option value="<?= $id_editora_atual ?>"><?= $editora_atual ?> </option>
							<? foreach($editoras->result() as $editora): ?>
								<?php echo "<option value=".$editora->id_editora." >".$editora->editora."</option>"; ?>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group text-right">
						<a class="btn btn-danger " href="<?= base_url(); ?>home" role="button">Cancelar</a>
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
					
				</form>

