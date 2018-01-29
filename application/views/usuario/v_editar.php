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
        <hr />

        <form method="post" action="<?= base_url(); ?>usuario/manter/store">

                <div class="form-group">
                    <label for="nome">Nome</label><span
                            style="color:#f00;"><?php echo form_error('nome') ?: ''; ?></span>
                    <input type="text" name="nome" id="nome" class="form-control"
                           value="<?= set_value('nome') ?: (isset($nome) ? $nome : '') ?>" autofocus='true'/>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label><span
                            style="color:#f00;"><?php echo form_error('email') ?: ''; ?></span>
                    <input type="text" name="email" id="email" class="form-control"
                           value="<?= set_value('email') ?: (isset($email) ? $email : '') ?>" autofocus='true'/>
                </div>


                <input type="hidden" name="login" id="login" class="form-control"
                           value="<?= set_value('login') ?: (isset($login) ? $login : '') ?>" autofocus='true'/>

                <input type="hidden" name="senha" id="senha" class="form-control"
                           value="<?= set_value('senha') ?: (isset($senha) ? $senha : '') ?>" autofocus='true'/>


                <div class="form-group">
                    <label for="editora">Editora</label><span
                            style="color: #f00;"><?php echo form_error('editora') ?: ''; ?></span>
                    <select class="form-control" id="editora" name="editora">
                        <option value="<?= $id_editora_atual ?>"><?= $editora_atual ?> </option>
                        <? foreach ($editoras->result() as $editora): ?>
                            <?php echo "<option value=" . $editora->id_editora . " >" . $editora->editora . "</option>"; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group text-right">
                    <a class="btn btn-primary " href="<?= base_url(); ?>usuario/home" role="button">Cancelar</a>

                    <input type="submit" value="Salvar" class="btn btn-success"/>
                </div>


                <input type='hidden' name="id" value="<?= set_value('id') ?: (isset($id) ? $id : ''); ?>">
                <input type='hidden' name="id" value="<?= $id_usuario ?>">
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

<script>
    $(function () {
        $('.confirma_exclusao').on('click', function (e) {
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

        $('#btn_excluir').click(function () {
            var id = $('#modal_confirmation').data('id');
            document.location.href = "/usuario/manter/delete/" + id;
        });
    });
</script>

</body>
</html>
