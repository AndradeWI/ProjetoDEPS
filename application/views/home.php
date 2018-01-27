<?php
if (!$this->session->userdata('logado')) {
    redirect('home');
}
?>
<div class="container" style="padding-right: 15%;">
    <div class="row">
        <div class="col-md-6">
            <h5 style="text-align: left;">Dashboard</h5>
        </div>

        <?php
        if ($this->session->userdata('papel') == 'Autor') { ?>

            <div class="col-md-6">
                <a href="/submissao/cadastro/create" role="button" style="float: right;" class="btn btn-success">Nova
                    submissão</a>
            </div>

        <?php } ?>

    </div>
    <hr>
    <?php if (isset($mensagem)) { ?>
        <div class="alert alert-success"><?= $mensagem ?></div>
    <? } ?>

    <?php
    if (isset($submissoes)) { ?>
    <div class="row" style="margin-left: 10px;">
        <div class="row">
            <? if ($submissoes->num_rows() > 0): ?>
                <table class="table table-striped" style="text-align: left;">
                    <thead>
                    <th>Novas submissões</th>
                    <th>Data</th>
                    <th>Situação</th>
                    </thead>
                    <tbody>
                    <? foreach ($submissoes->result() as $submissao): ?>
                        <?php if ($submissao->status_sub == "Cancelado") {
                            echo "<tr class='danger'>";
                        } else {
                            echo "<tr>";
                        } ?>

                        <td>
                            <a href="/submissao/listar/detalhes/<?= $submissao->id_submissao ?>"><?= $submissao->titulo ?></a>
                        </td>
                        <td><?= $submissao->data_submissao ?></td>
                        <td><?= $submissao->status_sub ?></td>

                        </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>
            <? else: ?>
                <div class="alert alert-warning">Nenhum registro encontrado.</div>
            <? endif; ?>
        </div>
    </div>
</div>


<?php } ?>
</div>



 



