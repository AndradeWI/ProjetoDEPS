<?php
if (!$this->session->userdata('logado')) {
    redirect('home');
}
?>


<h3><?= $titulo ?></h3>
<? if ($mensagem != null && $email != null): ?>
    <div class="alert alert-danger text-center">
        <?= $mensagem; ?>
    </div>
<? endif; ?>
<hr/>


<form method="post" action="<?= base_url(); ?>usuario/manter/store">
    <input type='hidden' name="id" value="<?= $id_usuario ?>">
    <input type='hidden' name="nome" value="<?= $nome ?>">
    <input type='hidden' name="email" value="<?= $email ?>">
    <input type='hidden' name="login" value="<?= $login ?>">
    <input type='hidden' name="editora" value="<?= $id_editora_atual ?>">
    <input type="hidden" name="flag" value="1"><!--Apenas para o método identificar que esse é o alterar senha-->

    <div class="form-group">
        <label for="senha">Nova senha</label><span
                style="color:#f00;"><?php echo form_error('senha') ?: ''; ?></span>
        <input type="password" name="senha" id="senha" class="form-control"
               placeholder="Digite sua nova senha" autofocus='true'/>
    </div>

    <div class="form-group text-right">
        <a class="btn btn-primary " href="<?= base_url(); ?>usuario/home" role="button">Cancelar</a>
        <input type="submit" value="Salvar" class="btn btn-success"/>
    </div>
</form>


<!-- Bootstrap core JavaScript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url(); ?>/includes/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="<?= base_url(); ?>/includes/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="<?= base_url(); ?>/includes/bootstrap/assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?= base_url(); ?>/includes/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>