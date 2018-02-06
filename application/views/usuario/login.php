
<div class="container" style="width: 65%; margin-top: 100px;">

    <div class="panel panel-info">
        <div class="panel-heading">Sistema DEPS - Editora</div>

        <div class="panel-body">

            <?php if (isset($error) && $error != null) { ?>
                <div class="alert alert-danger">
                    <?= $error; ?>
                </div>
            <?php } ?>
            <?php if (isset($mensagem)) { ?>
                <div class="alert alert-success"><?= $mensagem ?></div>
            <? } ?>
            <form id="loginform" method="post" action="<?= base_url(); ?>usuario/login/validar" class="form-horizontal"
                  role="form">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="login" value=""
                           placeholder="Login">
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="senha" placeholder="Senha">
                </div>

                <center>
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
  
                            <button type="submit" id="btn-fblogin" style="width: 100%;" class="btn btn-primary">Logar
                            </button>

                    </div>
                </center>

                <div class="form-group">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                            Caso não tenha conta,
                            <a href="<?= base_url(); ?>usuario/cadastro/create"
                               onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                Cadastre-se aqui
                            </a>
                        </div>
                </div>
            </form>
        </div>
        </div>
    </div>


