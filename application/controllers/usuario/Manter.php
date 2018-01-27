<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manter extends CI_Controller
{

    /**
     * Carrega o formulário para novo cadastro
     * @param nenhum
     * @return view
     */
    public function create()
    {

        $variaveis['titulo'] = 'Novo Cadastro';
        $variaveis['editoras'] = $this->m_editoras->get();
        $this->template->load('templating/base', 'usuario/v_editar', $variaveis);
    }

    /**
     * Salva o registro no banco de dados.
     * Caso venha o valor id, indica uma edição, caso contrário, um insert.
     * @param campos do formulário
     * @return view
     */
    public function store()
    {

        $this->load->library('form_validation');

        $regras = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required'
            ),
            array(
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'required'
            ),
            array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($regras);

        $email = $this->input->post('email');
        $usuario = $this->m_usuario->busca($email);
        $id = $this->input->post('id');
        $usuario_atual = $this->m_usuario->get($id);

        if (($this->form_validation->run() == FALSE) || (($usuario->num_rows() >= 1) && $email != $usuario_atual->row()->email)) {
            $variaveis['titulo'] = 'Novo Registro';
            $variaveis['email'] = $email;
            $variaveis['id_usuario'] = $id;
            $variaveis['mensagem'] = 'Usuário já está cadastrado!';
            $variaveis['editoras'] = $this->m_editoras->get();
            $this->template->load('templating/base', 'usuario/v_editar', $variaveis);
        } else {
            if ($this->input->post('flag') != 1) {
                $id = $this->input->post('id');
                $papel = 'Autor';
                $dados = array(

                    "nome" => $this->input->post('nome'),
                    "email" => $this->input->post('email'),
                    "papel" => $papel,
                    "login" => $this->input->post('login'),
                    "senha" => md5($this->input->post('senha')),
                    "fk_id_editora" => $this->input->post('editora')
                );
                if ($this->m_usuario->store($dados, $id)) {
                    $variaveis['usuarios'] = $this->m_usuario->get();
                    $variaveis['mensagem'] = "Cadastro realizado com sucesso!";
                    $this->template->load('templating/base', 'usuario/v_home', $variaveis);
                } else {
                    $variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
                    $this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
                }
            } else {//Atualizar senha
                $id = $this->input->post('id');
                $papel = 'Autor';
                $dados = array(

                    "nome" => $this->input->post('nome'),
                    "email" => $this->input->post('email'),
                    "papel" => $papel,
                    "login" => $this->input->post('login'),
                    "senha" => md5($this->input->post('senha')),
                    "fk_id_editora" => $this->input->post('editora')
                );
                if ($this->m_usuario->store($dados, $id)) {
                    $variaveis['usuarios'] = $this->m_usuario->get();
                    $variaveis['mensagem'] = "Senha alterada com sucesso.";
                    $variaveis['titulo'] = 'Alteração de senha';
                    $this->template->load('templating/base', 'usuario/v_alterar_senha', $variaveis);
                } else {
                    $variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
                    $this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
                }
            }
        }
    }

    /**
     * Chama o formulário com os campos preenchidos pelo registro selecioando.
     * @param $id do registro
     * @return view
     */
    public function edit($id = null)
    {

        if ($id) {
            $usuario = $this->m_usuario->get($id);

            if ($usuario->num_rows() > 0) {
                $ideditora = $usuario->row()->fk_id_editora;
                $editora = $this->m_editoras->get($ideditora);

                $variaveis['titulo'] = 'Edição de Registro';
                $variaveis['id_usuario'] = $usuario->row()->id_usuario;
                $variaveis['nome'] = $usuario->row()->nome;
                $variaveis['id_editora_atual'] = $ideditora;
                $variaveis['editora_atual'] = $editora->row()->editora;
                $variaveis['email'] = $usuario->row()->email;
                $variaveis['login'] = $usuario->row()->login;
                $variaveis['papel'] = $usuario->row()->papel;
                $variaveis['senha'] = $usuario->row()->senha;

                $variaveis['editoras'] = $this->m_editoras->get();
                $this->template->load('templating/base', 'usuario/v_editar', $variaveis);
            } else {
                $variaveis['mensagem'] = "Registro não encontrado.";
                $this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
            }

        }

    }

    /**
     * Função que exclui o registro através do id.
     * @param $id do registro a ser excluído.
     * @return boolean;
     */
    public function delete($id = null)
    {
        if ($this->m_usuario->delete($id)) {
            $variaveis['usuarios'] = $this->m_usuario->get();
            $variaveis['mensagem'] = "Registro excluído com sucesso!";
            $this->template->load('templating/base', 'usuario/v_home', $variaveis);
        }
    }

    public function del($id = null)
    {
        if ($this->m_usuario->delete($id)) {
            redirect('usuario/login/logoff');
        }
    }

    public function atualizarSenha($id = null)
    {
        if ($id) {
            $usuario = $this->m_usuario->get($id);

            if ($usuario->num_rows() > 0) {
                $ideditora = $usuario->row()->fk_id_editora;
                $editora = $this->m_editoras->get($ideditora);

                $variaveis['titulo'] = 'Alteração de senha';
                $variaveis['id_usuario'] = $usuario->row()->id_usuario;
                $variaveis['nome'] = $usuario->row()->nome;
                $variaveis['id_editora_atual'] = $ideditora;
                $variaveis['editora_atual'] = $editora->row()->editora;
                $variaveis['email'] = $usuario->row()->email;
                $variaveis['login'] = $usuario->row()->login;
                $variaveis['papel'] = $usuario->row()->papel;
                $variaveis['senha'] = $usuario->row()->senha;

                $variaveis['editoras'] = $this->m_editoras->get();
                $this->template->load('templating/base', 'usuario/v_alterar_senha', $variaveis);
            } else {
                $variaveis['mensagem'] = "Registro não encontrado.";
                $this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
            }
        }
    }
}
