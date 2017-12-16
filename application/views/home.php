<div class="container" style="padding-right: 15%;">
    <div class="row">
        <div class="col-md-6">
            <h5 style="text-align: left;">Dashboard</h5>
        </div>

        <?php 
            if($this->session->userdata('papel') == 'Autor') { ?>

                <div class="col-md-6">
                    <a href="/submissao/cadastro/create" role="button" style="float: right;" class="btn btn-success">Nova submissão</a>
                </div>

            <?php } ?>

    </div>
    <hr>
</div>



 



