<?php
if (!$this->session->userdata('logado')) {
    $this->load->view('usuario/login');
}
?>
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
            <a class="navbar-brand" href="/home">Editora</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
              
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <?php
                    //Só mostra os botões para o gerente
                    if ($this->session->userdata('papel') == 'Gerente') {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="/usuario/home">Usuários</a></li>
                        <li class="nav-item"><a class="nav-link" href="/categoria/home">Categoria</a></li>
                        <li class="nav-item"><a class="nav-link" href="/submissao/home">Submissão</a></li>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/usuario/login/logoff" style="margin-left: 10px;">Logout</a></li>       
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
      <div class="page-header" id="banner">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <ul class="nav nav-sidebar list-group">
                        <li class="list-group-item">
                            <div style="margin-top: 8px;" class="list-group-item list-group-item-action disabled">
                                <?php
                                if (isset($_SESSION["papel"])) { ?>
                                    Logado como: <strong><? echo $_SESSION["papel"]; ?></strong>
                                <? } ?>
                                
                                <span class="caret"></span></button>              
                            </div>
                        </li>

                        <?php
                        if ($this->session->userdata('papel') == 'Autor') {
                            ?>
                            <li class="list-group-item">
                                <a href="/home/submissoes">Minhas submissões</a>
                            </li>
                            <li class="list-group-item">
                                <a href="<?= base_url(); ?>usuario/manter/edit/<?= $this->session->userdata('usuario') ?>">Editar
                                    conta</a>
                            </li>
                        <?php } ?>

                        <?php
                        if ($this->session->userdata('papel') == 'Gerente') {
                            ?>
                            <li class="list-group-item">
                                <a href="/home/canceladas">Cancelamentos</a>
                            </li>
                            <li class="list-group-item">
                                <a href="<?= base_url(); ?>usuario/manter/edit/<?= $this->session->userdata('usuario') ?>">Editar
                                    conta</a>
                            </li>
                        <?php } ?>

                        <?php
                        if ($this->session->userdata('papel') == 'Usuario') {
                            ?>
                            <li class="list-group-item">
                                <a href="<?= base_url(); ?>usuario/manter/edit/<?= $this->session->userdata('usuario') ?>">Editar
                                    conta</a>
                            </li>
                        <?php } ?>

                        <?php
                        if ($this->session->userdata('papel') == 'Usuario' || $this->session->userdata('papel') == 'Autor') {
                            ?>
                            <li class="list-group-item">
                                <a href="<?= base_url(); ?>usuario/manter/del/<?= $this->session->userdata('usuario') ?>">Cancelar
                                    conta</a>
                            </li>
                        <?php } ?>

                    </ul>   
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6">

                        <div id="contents"
                        style="padding-top: 20px;">
                            <?= $contents ?></div>
                    
                </div>
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
