<?php 
	if(!$this->session->userdata('logado')) {
		redirect('home');
	}
?>

		<div class="row">
            <div class="col-md-5">
                <h3>Notificacao</h3>
            </div>
                <? if ($mensagem != null): ?>
                    <div class="alert alert-success text-center">
                        <?= $mensagem; ?>
                    </div>
                <? endif; ?>
        </div>
		
		<br>

		<div class="card mb-3">
				<h3 class="card-header">Notificação do sistema</h3>
				<div class="card-body">
					<h5 class="card-title"><?= $titulo ?></h5>
					<h6 class="card-subtitle text-muted"><?= $data ?></h6>
				</div>
				<div class="card-body">
					<p class="card-text"><?= $msg ?></p>
				</div>
				<div class="card-body">
					<a role="button" target="_blank" href="<?= $action_path ?>" type="button" class="btn btn-primary">
						<i class="fa fa-level-up" aria-hidden="true"></i>
						Verificar 
					</a>
				</div>
		</div>
	