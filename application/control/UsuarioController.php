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
    }

    public function editar() {
        return new ViewModel($this, array('a' => 10, 'b' => 20));
    }

    public function ajax() {
        echo json_encode(array(
            'valid' => 'true'
        ));

        return;
    }
    
    public function index(){
        return new ViewModel($this, array('a' => 10, 'b' => 20));
    }

}
