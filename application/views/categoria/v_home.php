<?php
    if ($this->session->userdata('papel') != 'Gerente') {
        redirect('home');
    }
?>
        <div class="row">
            <div class="col-md-5">
                <h3>Categoria</h3>
                <? if ($mensagem != null): ?>
                    <div class="alert alert-success text-center">
                        <?= $mensagem; ?>
                    </div>
                <? endif; ?>
                <? if ($restricao != null): ?>
                    <div class="alert alert-danger text-center">
                        <?= $restricao; ?>
                    </div>
                <? endif; ?>
            </div>
            <div class="col-md-7" style="text-align: right;">
                <div>
                    <a class="btn btn-warning" href="<?= base_url(); ?>/categoria/cadastro/create">Novo Cadastro</a>
                </div>
            </div>
        </div>

        <br>    
                <? if ($categorias->num_rows() > 0): ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody class="text-left">
                        <? foreach ($categorias->result() as $categoria): ?>
                            <tr>
                                <td><?= $categoria->nome_categoria ?></td>
                                <td><?= $categoria->descricao_categoria ?></td>
                                <td><a href="<?= base_url(); ?>/categoria/cadastro/edit/<?= $categoria->id_categoria ?>">
                                                             <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    |                         
                                    <a href="#" class='confirma_exclusao' data-id="<?= $categoria->id_categoria ?>"
                                    data-nome="<?= $categoria->nome_categoria ?>"/><i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a></td>
                            </tr>
                        <? endforeach; ?>
                        </tbody>
                    </table>
                <? else: ?>
                    <div class="alert alert-dismissible alert-info">
						Nenhum registro cadastrado
					</div>
                <? endif; ?>
    <div class="modal fade" id="modal_confirmation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmação de Exclusão</h4>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
                    <button type="button" class="btn btn-danger" id="btn_excluir">Sim. Acabe com ele</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script src="<?= base_url(); ?>/assets/js/jquery.js"></script>
    <script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>

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
                document.location.href = "<?= base_url(); ?>/categoria/cadastro/delete/" + id;
            });
        });
    </script>
