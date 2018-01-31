<?php 
	if(!$this->session->userdata('logado')) {
		redirect('home');
	}
?>
		<div class="row">
            <div class="col-md-5">
                <h3>Notificações</h3>
                <? if ($mensagem != null): ?>
                    <div class="alert alert-success text-center">
                        <?= $mensagem; ?>
                    </div>
                <? endif; ?>
            </div>
        </div>

        <br> 

				
		<div class="list-group">

            <? if ($notificacoes->num_rows() > 0): ?>
            
                <? foreach ($notificacoes->result() as $notificacao): ?>

                    <?php 
                        if ($notificacao->pendente == 1) {
                            $txtVerif = "Não verificada";
                            echo "<a href='/notificacao/listar/detalhes/$notificacao->id_notificacao' class='list-group-item list-group-item-action flex-column align-items-start active'>";   
                        } else {
                            $txtVerif = "Verificada";
                            echo "<a href='/notificacao/listar/detalhes/$notificacao->id_notificacao' class='list-group-item list-group-item-action flex-column align-items-start'>";                    
                        }
                    ?>
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= $notificacao->titulo ?></h5>
                            <small><?= $notificacao->data ?></small>
                        </div>
                        <small><?= $txtVerif ?></small>
                    </a>    
                    <br />

                <? endforeach; ?>
            
            </div>			
            <? else: ?>
                <div class="alert alert-dismissible alert-info">
                    Nenhuma notificação
                </div>
            <? endif; ?>





				