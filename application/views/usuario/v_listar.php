
	<div class="container">
		<div class="col-md-10">
            <h1 class="text-center">Listar Submissões</h1>
            <? if($mensagem != null): ?>
                <div class="alert alert-success text-center">
                    <?= $mensagem; ?>
                </div>
            <? endif; ?>
			<div class="row">
				<a class="btn btn-success" href="<?= base_url(); ?>/home">Home</a>
					
			</div>

			<div class="row">
				<h3><?= $usuarios->num_rows(); ?> registro(s)</h3>
				
				<div class="row">
					<? if($usuarios->num_rows() > 0): ?>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Código</th>
									<th>Título</th>
									<th>Data submetida</th>
									<th>Status</th>
									<th>Destalhes</th>
								</tr>
							</thead>
							<tbody>
								<? foreach($usuarios->result() as $usuario): ?>
									<tr> 
										<td><?= $usuario->id_usuario ?></td>
										<td><?= $usuario->nome ?></td>
										<td><?= $usuario->email ?></td>
										<td><?= $usuario->papel ?></td>
										<td><a  href=" /usuario/listar/detalhes/<?= $usuario->id_submissao ?>">Detalhes</a></td>
										
										</tr>
									<? endforeach; ?>
								</tbody>
							</table>
						<? else: ?>
							<h4>Nenhum registro cadastrado.</h4>
						<? endif; ?>
					</div>
				</div>	
			</div>
		</div>	
	</div>		