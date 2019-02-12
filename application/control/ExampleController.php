<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class ExampleController extends CrudController {

    public function __construct($parameters) {
        parent::__construct($parameters);
        $this->setHeadTitle('Example');
        $this->objDAO = new example();
    }

    public function index() {
        $list = $this->objDAO->findAll();
        return new ViewModel($this, array('lista' => $list));
    }

    public function novo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->objDAO->salvar($this->objDAO->setObjetctDAO($_POST));
                $this->SetMensagem();
                redirect('example');
                return;
            } catch (Exception $exc) {
                $this->SetMensagem('danger');
                return new ViewModel($this, array('dados' => $_POST));
            }
        }

        return new ViewModel($this, array('dados' => $this->objDAO->getObjetctDAO()));
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->objDAO->salvar($this->objDAO->setObjetctDAO($_POST));
                $this->SetMensagem();
                redirect('example');
                return;
            } catch (Exception $exc) {
                $this->SetMensagem('danger');
                return new ViewModel($this, array('dados' => $_POST));
            }
            return;
        }
        $dados = $this->objDAO->findHash($this->parametro);
        return new ViewModel($this, array('dados' => $dados));
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

}
