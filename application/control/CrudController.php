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

    /**
     * $parametro
     *
     * Ex.: O id
     *
     * @access public
     */
    public $parametro;

    /**
     * $objDAO
     *
     * objeto para acesso ao banco de dados
     *
     * @access public
     */
    public $objDAO;

    public function __construct($parameters) {
        $this->headTitle = NAMESYSTEM;
        $this->folder = $parameters->url_controlName;
        $this->page = $parameters->acao;
        $this->public = $parameters->public;
        $this->parametro = $parameters->parametros;
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

    /**
     * SetMensagem
     *
     * @param  string $tipo success, danger, className
     * @param  string $texto Nome do controlador
     */
    protected function SetMensagem($tipo = 'success', $texto = null) {
        if ($texto == null) {
            switch ($tipo) {
                case "success" :
                    $texto = MSGM_SUCCESS;
                    break;
                case "danger":
                    $texto = MSGM_DANGER;
                    break;

                default:
                    break;
            }
        }

        $_SESSION['mensagem']['tipo'] = $tipo;
        $_SESSION['mensagem']['texto'] = $texto;
    }

    public function GetMensagem() {
        $mensagem = '';
        if (isset($_SESSION['mensagem']))
            $mensagem = $_SESSION['mensagem'];

        unset($_SESSION['mensagem']);
        return $mensagem;
    }

}
