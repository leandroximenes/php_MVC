<?php

class usuarios extends Conexao {

    function __construct() {
        parent::__construct();
        $this->_table = "usuarios";
    }
    
}
