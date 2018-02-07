        <form action="/portal/pesquisa" method="post">
            <fieldset>
                <legend>Pesquisar livros</legend>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="search" class="form-control" id="pesquisa" name="pesquisa" aria-describedby="emailHelp" placeholder="Digite o título do livro">
                        <button type="submit">&#128269;</button>
                    </div>
                    <small id="emailHelp" class="form-text text-muted">É autor? <a href="#">cadastre-se</a> no sistema e publique seu livro na nossa Editora</small>
                </div>
            </fieldset>
        </form>

        

<h2>Lançamentos</h2>
<hr />
<!--
<div class="alert alert-info">Sem resultados para a busca</a> -->




<div class="row">
    <?php 
        if(isset($submissoes)) { ?>     
            <? if($submissoes->num_rows() > 0): ?>
                <? foreach($submissoes->result() as $submissao): ?>

    <div class="col-md-3">
        <a href= "/portal/detalhes/<?= $submissao->id_submissao ?>" style="text-decoration: none;">
            <div class="card mb-3">
                <div style="height: 100px;" class="card-header"><?= $submissao->titulo ?></div>
                <div class="card-body">
                    <h6 class="card-subtitle text-muted"><?= $submissao->sinopse ?></h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $submissao->data_submissao ?></li>
                </ul>
            </div>
        </a>
    </div>

             <? endforeach; ?>
             <? else: ?>
                    <div class="alert alert-dismissible alert-info">
                        Nenhum registro cadastrado
                    </div>
            <? endif; ?>                
            <?php } ?>

</div>



