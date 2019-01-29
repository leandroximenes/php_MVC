<?php

class usuarios extends conexao {

    function __construct() {
        parent::__construct();
        $this->_table = "usuarios";
    }
    
}
