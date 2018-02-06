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
    <!-- @@@ <link rel="stylesheet" href="<?= base_url(); ?>/includes/bootstrap/dist/css/bootstrap.min.css"> -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?= base_url(); ?>/includes/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="<?= base_url(); ?>/includes/bootstrap/assets/css/dashboard.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?= base_url(); ?>/includes/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.3/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-xpQNcoacYF/4TKVs2uD3sXyaQYs49wxwEmeFNkOUgun6SLWdEbaCOv8hGaB9jLxt" crossorigin="anonymous">
    <link href="<?= base_url(); ?>/assets/css/ajustes.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://use.fontawesome.com/d8d43e75c4.js"></script>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>portal">Editora</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
              
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>usuario/cadastro/create">Cadastre-se aqui</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>usuario/login" style="margin-left: 10px;">Logar</a></li>       
                </ul>
            </div>
            <form action="<?= base_url(); ?>portal/pesquisa" method="post">
                <input type="search" id="pesquisa" name="pesquisa" placeholder="Buscar">
                <button type="submit">&#128269;</button>
            </form>

        </div>
    </nav>
    
<div class="row">
    <div class="col-md-8">
        <?php  ?>
        <? if($pesquisa): ?>
                <h3>Sistema Editorial: <?= $submissoes->num_rows() ?> 
                    Livro(s) Encontrado(s) com a busca de "<?= $pesquisa ?>"</h3>
        <? else: ?>
                <h3>Sistema Editorial: <?= $submissoes->num_rows() ?> 
                    Livro(s) Publicado(s)</h3>
        <? endif; ?>
        <?php  ?>

        <?php 
            if(isset($submissoes)) { ?>     
                <? if($submissoes->num_rows() > 0): ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Data submetida</th>
                                    <th>Sinopse</th>
                                    <th>Destalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach($submissoes->result() as $submissao): ?>
                                    <tr>
                                        <td><?= $submissao->titulo ?></td>
                                        <td><?= $submissao->data_submissao ?></td>
                                        <td><?= $submissao->sinopse ?></td>
                                        <td style="text-align: center;"><a  href="/portal/detalhes/<?= $submissao->id_submissao ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>
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
            <?php } ?>
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
            

   


       