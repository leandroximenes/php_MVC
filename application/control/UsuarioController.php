<?php

/**
 * TutsupMVC - Gerencia Models, Controllers e Views
 *
 * @package TutsupMVC
 * @since 0.1
 */
class UsuarioController extends CrudController {

    public function __construct() {
        $this->setHeadTitle('Usuário');
    }

    public function index() {
        parent::__construct();
    }

    public function editar() {
        $this->formData = array('dados_banco' => 2);
    }

}
