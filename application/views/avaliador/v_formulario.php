<?php
if ($this->session->userdata('papel') != 'Avaliador') {
    redirect('home');
}
?>

<div class="row">
    <div class="col-md-5">
        <h3>Formulário de avaliação</h3>
    </div>
    <div class="col-md-7" style="text-align: right;"></div>
</div>

<p><?= $id_avaliacao ?></p>