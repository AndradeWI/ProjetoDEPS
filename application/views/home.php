<?php 
    if(!$this->session->userdata('logado')) {
        redirect('home');
    }
?>

        <div class="row">
            <div class="col-md-5">
                <h3>Dashboard</h3>
                <? if ($mensagem != null): ?>
                    <div class="alert alert-success text-center">
                        <?= $mensagem; ?>
                    </div>
                <? endif; ?>
            </div>
            <div class="col-md-7" style="text-align: right;">
                <?php 
                    if($this->session->userdata('papel') == 'Autor') { ?>
                        <a href="/submissao/cadastro/create" role="button" class="btn btn-warning">Nova submissão</a>
                <?php } ?>
                
            </div>
        </div>

    <hr>


        <?php 
            if(isset($submissoes)) { ?>     
                        <? if($submissoes->num_rows() > 0): ?>
                            <table class="table table-striped" style="text-align: left;">
                                <thead>
                                    <th>Novas submissões</th>
                                    <th>Data</th>
                                    <th>Situação</th>
                                </thead>
                                <tbody>
                                    <? foreach($submissoes->result() as $submissao): ?>
                                        <?php if ($submissao->status_sub == "Cancelado") { 
                                            echo "<tr class='danger'>";
                                        } else {
                                            echo "<tr>";
                                        }?>
                                        
                                            <td><a  href="/submissao/listar/detalhes/<?= $submissao->id_submissao ?>"><?= $submissao->titulo ?></a></td>
                                            <td><?= $submissao->data_submissao ?></td>
                                            <td><?= $submissao->status_sub ?></td>
                                
                                        </tr>
                                        <? endforeach; ?>
                                    </tbody>
                                </table>
                            <? else: ?>
                                <div class="alert alert-dismissible alert-info">
                                    Nenhum registro cadastrado
                                </div>
                            <? endif; ?>
            <?php } ?>



 



