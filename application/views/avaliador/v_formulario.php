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
<br>

<form method="post" action="/avaliador/home/store">
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>Pergunta</th>
                <th>Concordo totalmente</th>
                <th>Concordo parcialmente</th>
                <th>Não concordo</th>
                <th>Não se aplica</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>O tema é relevante?</td>
                <td><label class="radio-inline"><input type="radio" name="o_tema_e_relevante" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_tema_e_relevante" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_tema_e_relevante" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_tema_e_relevante" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>O tema é atual?</td>
                <td><label class="radio-inline"><input type="radio" name="o_tema_e_atual" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_tema_e_atual" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_tema_e_atual" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_tema_e_atual" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>A obra comunica pesquisa original?</td>
                <td><label class="radio-inline"><input type="radio" name="a_obra_comunica_pesquisa_original" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_obra_comunica_pesquisa_original" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_obra_comunica_pesquisa_original" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_obra_comunica_pesquisa_original" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>A pesquisa é predominantemente qualitativa?</td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_e_predominantemente_qualitativa" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_e_predominantemente_qualitativa" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_e_predominantemente_qualitativa" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_e_predominantemente_qualitativa" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>A pesquisa é predominantemente quantitativa?</td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_e_predominantemente_quantitativa" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_e_predominantemente_quantitativa" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_e_predominantemente_quantitativa" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_e_predominantemente_quantitativa" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>A pesquisa apresenta rigor científico?</td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_apresenta_rigor_cientifico" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_apresenta_rigor_cientifico" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_apresenta_rigor_cientifico" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_pesquisa_apresenta_rigor_cientifico" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>A abordagem do tema é inovadora?</td>
                <td><label class="radio-inline"><input type="radio" name="a_abordagem_do_tema_e_inovadora" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_abordagem_do_tema_e_inovadora" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_abordagem_do_tema_e_inovadora" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_abordagem_do_tema_e_inovadora" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>O título é adequado?</td>
                <td><label class="radio-inline"><input type="radio" name="o_titulo_e_adequado" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_titulo_e_adequado" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_titulo_e_adequado" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="o_titulo_e_adequado" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>A escrita é clara e objetiva?</td>
                <td><label class="radio-inline"><input type="radio" name="a_escrita_e_clara_e_objetiva" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_escrita_e_clara_e_objetiva" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_escrita_e_clara_e_objetiva" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="a_escrita_e_clara_e_objetiva" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>As ilustrações estão bem preparadas?</td>
                <td><label class="radio-inline"><input type="radio" name="as_ilustracoes_estao_bem_preparadas" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="as_ilustracoes_estao_bem_preparadas" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="as_ilustracoes_estao_bem_preparadas" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="as_ilustracoes_estao_bem_preparadas" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>A bibliografia utilizada é representativa dos estudos relevantes sobre o tema?</td>
                <td><label class="radio-inline"><input type="radio" name="biblio_e_representativa_dos_estudos_relevantes_sobre_o_tema" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="biblio_e_representativa_dos_estudos_relevantes_sobre_o_tema" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="biblio_e_representativa_dos_estudos_relevantes_sobre_o_tema" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="biblio_e_representativa_dos_estudos_relevantes_sobre_o_tema" value="4"></label></td>
            </tr>
            <tr class="text-center">
                <td>A bibliograria utilizada é atual?</td>
                <td><label class="radio-inline"><input type="radio" name="biblio_utilizada_e_atual" value="1"></label></td>
                <td><label class="radio-inline"><input type="radio" name="biblio_utilizada_e_atual" value="2"></label></td>
                <td><label class="radio-inline"><input type="radio" name="biblio_utilizada_e_atual" value="3"></label></td>
                <td><label class="radio-inline"><input type="radio" name="biblio_utilizada_e_atual" value="4"></label></td>
            </tr>
        </tbody>
    </table>

    <div>
        <label>Existem uma ou mais obras semelhante publsicada nos últimos 5 anos?</label>
        <div class="radio">
            <label><input type="radio" name="obras_semelhantes_nos_ultimos_cinco_anos" value="1">Sim</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="obras_semelhantes_nos_ultimos_cinco_anos" value="2">Não</label>
        </div>
    </div

    <div class="form-group">
        <label for="aspectosPositivos">Comente os aspectos positivos:</label>
        <textarea class="form-control" rows="5" id="aspectosPositivos" name="aspectosPositivos"></textarea>
    </div>

    <div class="form-group">
        <label for="aspectosNegativos">Comente os aspectos negativos:</label>
        <textarea class="form-control" rows="5" id="aspectosNegativos" name="aspectosNegativos"></textarea>
    </div>

    <div>
        <label>Parece:</label>
        <div class="radio">
            <label><input type="radio" name="parecer" value="1">Sim</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="parecer" value="2">Não</label>
        </div>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>