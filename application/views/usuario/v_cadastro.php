<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="includes/favicon.ico">

  <title>Editora</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/includes/bootstrap/dist/css/bootstrap.min.css">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="<?= base_url(); ?>/includes/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url(); ?>/includes/bootstrap/assets/css/dashboard.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="<?= base_url(); ?>/includes/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="/home">Editora Report</a>

        </div>
    </div>
  </nav>


	<div class="container">
		<div class="col-md-6 col-md-offset-2">
            <h1 class="text-center"><?= $titulo ?></h1>
            <? if($mensagem != null && $email != null): ?>
                <div class="alert alert-danger text-center">
                    <?= $mensagem; ?>
                </div>
            <? endif; ?>
            
			<div class="row">
				<form method="post" action="<?= base_url(); ?>usuario/cadastro/store">
					
					<div class="form-group">
						<label for="nome">Nome</label><span style="color:#f00;"><?php echo form_error('nome') ?  : ''; ?></span>
						<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="email">E-mail</label><span style="color:#f00;"><?php echo form_error('email') ?  : ''; ?></span>
						<input type="text" name="email" id="email" class="form-control" value="<?= set_value('email') ? : (isset($email) ? $email : '') ?>" autofocus='true' />
					</div>
					
					<div class="form-group">
						<label for="login">Login</label><span style="color:#f00;"><?php echo form_error('login') ?  : ''; ?></span>
						<input type="text" name="login" id="login" class="form-control" value="<?= set_value('login') ? : (isset($login) ? $login : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="senha">Senha</label><span style="color:#f00;"><?php echo form_error('senha') ?  : ''; ?></span>
						<input type="password" name="senha" id="senha" class="form-control" value="<?= set_value('senha') ? : (isset($senha) ? $senha : '') ?>" autofocus='true' />
					</div>

					<div class="form-group">
						<label for="editora">Editora</label><span style="color: #f00;"><?php echo form_error('editora') ?  : ''; ?></span>
						<select class="form-control" id="editora" name="editora">
							<option value="<?= $id_editora_atual ?>"><?= $editora_atual ?> </option>
							<? foreach($editoras->result() as $editora): ?>
								<?php echo "<option value=".$editora->id_editora." >".$editora->editora."</option>"; ?>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group text-right">
						<a class="btn btn-danger " href="<?= base_url(); ?>home" role="button">Cancelar</a>
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
					
				</form>
			</div>
		</div>	
	</div>
	 <!-- Bootstrap core JavaScript ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?= base_url(); ?>/includes/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="<?= base_url(); ?>/includes/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="<?= base_url(); ?>/includes/bootstrap/assets/js/vendor/holder.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="<?= base_url(); ?>/includes/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
