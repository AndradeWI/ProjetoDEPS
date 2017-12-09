<?php
  if(!$this->session->userdata('logado')) {
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

  <title>Dashboard Template</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../../../includes/bootstrap/dist/css/bootstrap.min.css">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../../../includes/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../../../includes/bootstrap/assets/css/dashboard.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../../../../includes/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>

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
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <!-- -->
          <?php
              //Só mostra os botões para o gerente
              if($this->session->userdata('papel') == 'Gerente') {
          ?>
            <li><a href="/categoria/home">Categoria</a></li>
            <li><a href="/submissao/home">Submissão</a></li>
          <?php } ?>

         </ul>
        
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar list-group">
        
            <li class="list-group-item">
                <div class="dropdown" style="margin-top: 8px;">
                    <?php
                        if (isset($_SESSION["papel"])) { ?>
                            <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" disabled><? echo $_SESSION["papel"]; ?>
                        <? } else { ?>
                            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Entrar como
                        <? } ?>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                           <li><a href="/usuario/home/login/gerente">Gerente</a></li>
                           <li><a href="/usuario/home/login/editor">Editor</a></li>
                           <li><a href="/usuario/home/login/autor">Autor</a></li>
                        </ul>
                    <a href="/usuario/login/logoff" style="margin-left: 10px;">Sair</a>
                </div>
                 
            </li>
          
        </ul>

      </div>
      <div class="col-sm-9 col-md-offset-2 col-md-10 main">

        <div class="row placeholders">
          <div class="container" id="contents"><?= $contents ?></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="includes/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="includes/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="includes/bootstrap/assets/js/vendor/holder.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="includes/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
