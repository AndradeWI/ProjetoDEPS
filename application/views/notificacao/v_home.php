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
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Você tem uma avliação pendente</h5>
                    <small>Ontem</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small>Notificação pendente</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Nova solicitação de cancelamento</h5>
                    <small class="text-muted">Há 5 dias</small>
                </div>
                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                <small class="text-muted">Notificação lida</small>
            </a>
        </div>			







				