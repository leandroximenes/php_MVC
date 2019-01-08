<?php

/**
 * TutsupMVC - Gerencia Models, Controllers e Views
 *
 * @package TutsupMVC
 * @since 0.1
 */
class CrudController {

    /**
     * $headTitle
     *
     * Receberá o título da página.
     * @access private
     */
    private $headTitle;

    /**
     * $formData
     *
     * Receberá um array dos parâmetros (Também vem da URL):
     * exemplo.com/controlador/acao/param1/param2/param50
     *
     * @access private
     */
    public $formData;

    function getHeadTitle() {
        return $this->headTitle;
    }

    function setHeadTitle($headTitle) {
        $this->headTitle = $headTitle;
    }

    public function index() {
        
    }

    public function novo() {
        
    }

    public function editar() {
        
    }

    public function excluir() {
        
    }

}
