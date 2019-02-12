<?php

class example extends conexao {

    function __construct() {
        parent::__construct();
        $this->_table = "example";
    }

    public function getItens($indice = null) {
        $array = array(
            '1' => 'item 1',
            '2' => 'item 2',
            '3' => 'item 3',
            '4' => 'item 4',
            '5' => 'item 5',
            '6' => 'item 6',
        );
        if ($indice != null && $indice != '') {
            return $array[$indice];
        } else {
            return $array;
        }
    }

    public function getObjetctDAO($objectDAO = null) {
        if (isset($objectDAO)) {
            $objectDAO['date_full'] = inverteData($objectDAO['date_full']);
            $objectDAO['date_small'] = inverteData($objectDAO['date_small']);
            $objectDAO['date_small'] = dateFulltoSmall($objectDAO['date_small']);
            $objectDAO['value_decimal'] = newNumber_format($objectDAO['value_decimal'], 2, ',', '.');
            $objectDAO['value_select_text'] = $this->getItens($objectDAO['value_select']);
        } else {
            $objectDAO = parent::getObjetctDAO();
        }
        return $objectDAO;
    }

    public function setObjetctDAO($array) {
        $objectDAO = parent::setObjetctDAO($array);
        $objectDAO['hash_id'] = setHashId($objectDAO['hash_id']);
        $objectDAO['cpf'] = limpaMascara($objectDAO['cpf']);
        $objectDAO['date_full'] = inverteData($objectDAO['date_full']);
        $objectDAO['date_small'] = dateSmalltoFull($objectDAO['date_small']);
        $objectDAO['date_small'] = inverteData($objectDAO['date_small']);
        $objectDAO['value_int'] = converteMoedaBanco($objectDAO['value_int']);
        $objectDAO['value_decimal'] = converteMoedaBanco($objectDAO['value_decimal']);

        return $objectDAO;
    }

}
