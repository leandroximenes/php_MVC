<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class UsuarioController extends CrudController {

    public function __construct($parameters) {
        parent::__construct($parameters);
        $this->setHeadTitle('Usuário');
        $this->objDAO = new usuarios();
    }

    public function alterarSenha() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->objDAO->salvar(
                        array(
                            'id' => $_POST['id'],
                            'senha' => md5($_POST['senha'])
                        )
                );
                $this->SetMensagem();
                redirect('usuario', 'alterarSenha');
                return;
            } catch (Exception $exc) {
                $this->SetMensagem('danger');
                return new ViewModel($this);
            }
        }
        return new ViewModel($this);
    }

}
