<?php
if (!$this->session->userdata('logado')) {
    redirect('home');
}
?>

<div class="container">
    <div class="col-md-6 col-md-offset-2">
        <h1 class="text-center"><?= $titulo ?></h1>
        <? if ($mensagem != null && $email != null): ?>
            <div class="alert alert-danger text-center">
                <?= $mensagem; ?>
            </div>
        <? endif; ?>

        <div class="row">
            <form method="post" action="<?= base_url(); ?>usuario/manter/atualizarSenha/<?= $id_usuario ?>">
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
        </div>
    </div>
</div>