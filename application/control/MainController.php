<?php

/**
 * TutsupMVC - Gerencia Models, Controllers e Views
 *
 * @package TutsupMVC
 * @since 0.1
 */
class MainController {

    /**
     * $url
     *
     * Receberá a URL.
     * exemplo.com/controlador/
     *
     * @access private
     */
    private $url;

    /**
     * $headTitle
     *
     * Receberá o título da página.
     * @access private
     */
    public $headTitle;

    /**
     * $controlador
     *
     * Receberá o valor do controlador (Vindo da URL).
     * exemplo.com/controlador/
     *
     * @access private
     */
    private $controlador;

    /**
     * $control
     *
     * Objeto controle
     * new xxxController()
     *
     * @access private
     */
    private $control;

    /**
     * $acao
     *
     * Receberá o valor da ação (Também vem da URL):
     * exemplo.com/controlador/acao
     *
     * @access private
     */
    private $acao;

    /**
     * $parametros
     *
     * Receberá um array dos parâmetros (Também vem da URL):
     * exemplo.com/controlador/acao/param1/param2/param50
     *
     * @access private
     */
    private $parametros;

    /**
     * $formData
     *
     * Dados passado pelo controlador Ex: registros do banco
     *
     * @access public
     */
    public $formData;

    /**
     * $content
     *
     * Todo conteúdo HTML
     *      *
     * @access public
     */
    public $content;

    /**
     * Construtor para essa classe
     *
     * Obtém os valores do controlador, ação e parâmetros. Configura 
     * o controlado e a ação (método).
     */
    public function __construct() {
        $this->control = new HomeController();
        $this->headTitle = NAMESYSTEM;
        $this->controlador = 'home';
        $this->acao = 'index';
    }

    /**
     * Obtém parâmetros de $_GET['path']
     *
     * Obtém os parâmetros de $_GET['path'] e configura as propriedades 
     * $this->controlador, $this->acao e $this->parametros
     *
     * A URL deverá ter o seguinte formato:
     * http://www.example.com/controlador/acao/parametro1/parametro2/etc...
     */
    private function get_control() {

        // Verifica se o parâmetro path foi enviado
        if (isset($_GET['path'])) {

            // Captura o valor de $_GET['path']
            $path = $_GET['path'];
            $this->url = $path;

            // Limpa os dados
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);

            // Cria um array de parâmetros
            $path = explode('/', $path);


            $controller = ucfirst(preg_replace('/[^a-zA-Z]/i', '', $path[0])) . 'Controller';
            if (file_exists(ABSPATH . '/application/control/' . $controller . '.php')) {

                $this->controlador = $path[0];
                $this->control = new $controller();
                $this->headTitle = $this->control->getHeadTitle();

                if (isset($path[1]))
                    $this->acao = preg_replace('/[^a-zA-Z]/i', '', $path[1]);

                // Configura os parâmetros
                if (chk_array($path, 2)) {
                    unset($path[0]);
                    unset($path[1]);

                    // Os parâmetros sempre virão após a ação
                    $this->parametros = array_values($path);
                }
            } else {
                $this->acao = '404';
            }
        }
    }

    public function get_route() {

        $this->get_control();

        $this->load_view();

        return;
    }

    private function load_view() {

        require_once ABS_VIEW . 'layout.php';
        return;
    }

}
