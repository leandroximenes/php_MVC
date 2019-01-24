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

    public function index() {
        $list = $this->objDAO->findAll();
        return new ViewModel($this, array('lista' => $list));
    }

    public function novo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $ativo = isset($_POST['ativo']) ? 1 : 0;
                $this->objDAO->salvar(
                        array(
                            'hash_id' => uniqid(time()),
                            'nome' => $_POST['nome'],
                            'email' => $_POST['email'],
                            'perfil' => 2,
                            'senha' => md5($_POST['senha']),
                            'ativo' => $ativo
                        )
                );
                $this->SetMensagem();
                redirect('usuario');
                return;
            } catch (Exception $exc) {
                $this->SetMensagem('danger');
                return new ViewModel($this, array('usuario' => $_POST));
            }
        }

        return new ViewModel($this);
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $ativo = isset($_POST['ativo']) ? 1 : 0;
                $this->objDAO->salvar(
                        array(
                            'id' => $_POST['id'],
                            'nome' => $_POST['nome'],
                            'email' => $_POST['email'],
                            'ativo' => $ativo
                        )
                );
                $this->SetMensagem();
                redirect('usuario');
                return;
            } catch (Exception $exc) {
                $this->SetMensagem('danger');
                return new ViewModel($this, array('usuario' => $_POST));
            }
            return;
        }
        $usuario = $this->objDAO->findHash($this->parametro);
        return new ViewModel($this, array('usuario' => $usuario));
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

    public function excluir() {
        $linhasAfetadas = $this->objDAO->deleteHash($this->parametro);
        if ($linhasAfetadas == 0) {
            if (strpos($_SERVER['HTTP_ACCEPT'], 'json')) {
                header('HTTP/1.1 500');
                echo 'Não foi possivel excluir o registro';
                return;
            } else {
                $this->SetMensagem('danger', "Não foi possivel excluir o registro.");
                redirect('usuario');
            }
        } else {
            if (strpos($_SERVER['HTTP_ACCEPT'], 'json')) {
                echo json_encode(array(
                    'result' => 'Registro excluído com sucesso'
                ));
                return;
            } else {
                $this->SetMensagem('success', "Registro excluído com sucesso");
                redirect('usuario');
            }
        }
    }

    public function ajax() {
        echo json_encode(array(
            'valid' => 'true'
        ));

        return;
    }

}
