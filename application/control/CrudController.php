<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class CrudController {

    /**
     * $headTitle
     *
     * Receberá o título da página.
     * @access public
     */
    public $headTitle;

    /**
     * $public
     * acesso public.
     * @access public
     * @var boolean
     */
    public $public;

    /**
     * $page
     *
     * nome da página.
     *
     * @access public
     */
    public $page;

    /**
     * $folder
     *
     * nome da pasta
     *
     * @access public
     */
    public $folder;

    public function __construct($parameters) {
        $this->headTitle = NAMESYSTEM;
        $this->folder = $parameters->url_controlName;
        $this->page = $parameters->acao;
        $this->public = $parameters->public;
    }

    function getHeadTitle() {
        return $this->headTitle;
    }

    function setHeadTitle($headTitle) {
        $this->headTitle = $headTitle;
    }

    public function index() {
        return new ViewModel($this);
    }

    public function novo() {
        return new ViewModel($this);
    }

    public function editar() {
        return new ViewModel($this);
    }

    public function excluir() {
        
    }

    public function notFound() {
        $this->folder = 'home';
        $this->page = '404';
        return new ViewModel($this);
    }

}
