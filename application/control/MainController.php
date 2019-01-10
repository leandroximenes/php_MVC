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
     * $application
     *
     * Seta a variavel se utilizar o modulo aplication, caso chamando o admin
     * exemplo.com/ADMIN/controlador/acao/param1/param2/param50
     *
     * @access private
     */
    private $application;

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
        $this->headTitle = NAMESYSTEM;
        $this->controlador = 'home';
        $this->acao = 'index';
        $this->application = false;
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
            $appName = preg_replace('/[^a-zA-Z]/i', '', $path[0]);

            if ($appName == APP_NAME) {
                $this->application = true;

                if (!isset($path[1])) {
                    if (logado) {
                        $this->controlador = 'home';
                        $this->acao = 'index';
                        $this->control = new AdminController();
                    } else {
                        //login
                    }
                } else {
                    $controller = isset($path[1]) ? ucfirst(preg_replace('/[^a-zA-Z]/i', '', $path[1])) . 'Controller' : 'AdminController';
                    if (file_exists(ABSPATH . '/application/control/' . $controller . '.php')) {

                        $this->controlador = $path[1];
                        $this->control = new $controller();
                        $this->headTitle = $this->control->getHeadTitle();

                        if (isset($path[2]))
                            $this->acao = preg_replace('/[^a-zA-Z]/i', '', $path[2]);

                        // Configura os parâmetros
                        if (chk_array($path, 3)) {
                            unset($path[1]);
                            unset($path[2]);

                            // Os parâmetros sempre virão após a ação
                            $this->parametros = array_values($path);
                        }
                    } else {
                        $this->acao = '404';
                    }
                }
            } else {
                $this->acao = (file_exists(ABSPATH . $appName . '.php')) ? $appName : '404';
                return;
            }
        }
    }

    public function get_route() {

        $this->get_control();

        $this->load_view();

        return;
    }

    private function load_view() {

        if ($this->application) {
            require_once ABS_VIEW . 'layout.php';
        } else {

            require_once ABS_PUBLIC . 'layout.php';
        }
        return;
    }

}
