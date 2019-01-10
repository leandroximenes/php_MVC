<?php

/**
 * Configuração geral
 */

// Caminho para a raiz
define('NAMESYSTEM', "Controle de Despesas");

// Caminho para a raiz
define('ABSPATH', dirname(__FILE__));

// Caminho para a views
define('ABS_VIEW', ABSPATH . '/application/view/');

// Caminho para a pasta public
define('ABS_PUBLIC', ABSPATH . '/public/');

// Nome para acessar o modulo application. Ex: admin
define('APP_NAME', 'admin');

//ANTIGOS
// Caminho para a pasta de uploads
define('UP_ABSPATH', ABSPATH . '/views/_uploads');

// Nome do host da base de dados
define('HOSTNAME', 'localhost');

// Nome do DB
define('DB_NAME', 'tutsup');

// Usuário do DB
define('DB_USER', 'root');

// Senha do DB
define('DB_PASSWORD', '');

// Charset da conexão PDO
define('DB_CHARSET', 'utf8');

// Se você estiver desenvolvendo, modifique o valor para true
define('DEBUG', true);

define('logado', true);