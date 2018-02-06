<?php
if ($this->session->userdata('papel') != 'Avaliador') {
    redirect('home');
}
?>

<div class="row">
    <div class="col-md-5">
        <h3>Avaliações</h3>
    </div>
    <div class="col-md-7" style="text-align: right;"></div>
</div>

<? if ($avaliacoes->num_rows() > 0): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Observações</th>
                <th>Submissão</th>
                <th>Avaliador</th>
                <th>Autor</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody class="text-left">
            <? foreach ($avaliacoes->result() as $avaliacao): ?>
                <tr>
                    <td><?= $avaliacao->id_avaliacao ?></td>
                    <td>
                        <? if ($avaliacoes->observacao != null): ?>
                            <?= $avaliacao->observacao ?>
                        <? else: ?>
                            -
                        <? endif; ?>
                    </td>
                    <td><?= $avaliacao->fk_id_submissao ?></td>
                    <td>
                        <? foreach ($avaliadores->result() as $avaliador): ?>
                            <? if ($avaliador->id_avaliador == $avaliacao->fk_id_avaliador): ?>
                                <? foreach ($usuarios->result() as $usuario): ?>
                                    <? if ($avaliador->fk_id_usuario == $usuario->id_usuario): ?>
                                        <?= $usuario->nome ?>
                                    <? endif; ?>
                                <? endforeach; ?>
                            <? endif; ?>
                        <? endforeach; ?>
                    </td>
                    <td>
                        <? foreach ($usuarios->result() as $usuario): ?>
                            <? if ($avaliacao->fk_id_usuario == $usuario->id_usuario): ?>
                                <?= $usuario->nome ?>
                            <? endif; ?>
                        <? endforeach; ?>
                    </td>
                    <td><a href="<?= base_url(); ?>/avaliador/home/formulario/<?= $avaliacao->id_avaliacao ?>">Ficha de avaliação</a></td>
                </tr>
            <? endforeach; ?>
        </tbody>
    </table>
<? else: ?>
    <div class="alert alert-dismissible alert-info">
        Nenhuma avaliação designada para você.
    </div>
<? endif; ?>