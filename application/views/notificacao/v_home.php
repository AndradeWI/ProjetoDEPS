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
            
            <div class="col-md-7" style="text-align: right;">
            <form action="/notificacao/home/reload" method="post">
                <div>
					<button type="submit" class="btn btn-warning">Atualizar</button>
                </div>
            </div>
        </div>

        <br> 

				
		<div class="list-group">
            <? if ($notificacoes->num_rows() > 0): ?>
            
                <? foreach ($notificacoes->result() as $notificacao): ?>

                    <?php 
                        if ($notificacao->pendente == 1) {
                            echo "<div class='list-group-item list-group-item-action flex-column align-items-start active'>";   
                        } else {
                            $txtVerif = "Verificada";
                            echo "<div class='list-group-item list-group-item-action flex-column align-items-start' disabled>";                    
                        }
                    ?>
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= $notificacao->titulo ?></h5>
                            <small>
                                <?php
                                    $date = date_create($notificacao->data);
                                    echo date_format($date, 'd/m/Y'); 
                                ?>
                            </small>
                        </div>
                        <div class="d-flex w-100 justify-content-between">
                            <p class="mb-1"><?= $notificacao->mensagem ?></p>
                            <? if ($notificacao->pendente == 1) : ?>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="<?= $notificacao->id_notificacao ?>" name="marcadas[]">
                                    Marcar como lida
                                </label>
                            <? else : ?>
                                <small><?= $txtVerif ?></small>           
                            <? endif ?>
                        </div>         
                    </div>    
                    <br />

                <? endforeach; ?>
            
            </div>			
            <? else: ?>
                <div class="alert alert-dismissible alert-info">
                    Nenhuma notificação
                </div>
            <? endif; ?>
        </form>





				