<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexao
 *
 * @author Leandro
 */
class Conexao extends PDO {

    /**
     * Conexao com o banco de dados
     * @var _conn
     */
    protected $_conn;

    /**
     * Nome da tabela no banco de dados
     * @var _table
     */
    protected $_table;

    /**
     * Id do registro inserido ou alterado
     * @var _lastId
     */
    public $_lastId;

    /**
     * Quantidade de registros afetados
     * @var _rowAffected
     */
    public $_rowAffected;

    /**
     * Erros
     * @var _errorInfo
     */
    public $_errorInfo;

    public function __construct($table = null, $file = 'my_setting.ini') {
        if (!$settings = parse_ini_file($file, TRUE))
            throw new exception('Unable to open ' . $file . '.');

        $dns = $settings['database']['driver'] .
                ':host=' . $settings['database']['host'] .
                ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
                ';dbname=' . $settings['database']['schema'] . ';charset=utf8';

        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
        $this->_conn = $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_table = $table;
    }

    public function find($id) {
        $query = $this->query("SELECT * FROM {$this->_table} WHERE id = $id");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array[0];
    }

    public function findHash($hash) {
        $query = $this->query("SELECT * FROM {$this->_table} WHERE hash_id = '$hash'");
        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array[0];
    }

    public function findAll() {
        $query = $this->query("SELECT * FROM {$this->_table}");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute($sql) {
        $query = $this->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar($array) {
        $this->_errorInfo = null;
        $this->_rowAffected = null;
        $this->_lastId = null;

        $colunas = array();
        $valores = array();
        $colunasValores = array();

        foreach ($array as $key => $value) {
            $colunas[] = $key;
            $valores[] = "'" . $value . "'";
            $colunasValores[] = $key . '=' . "'" . $value . "'";
        }

        $st_colunas = implode(", ", $colunas);
        $st_valores = implode(", ", $valores);
        $st_colunasValores = implode(", ", $colunasValores);

        $sql = "INSERT INTO {$this->_table} ($st_colunas) 
                VALUES($st_valores)
                ON DUPLICATE KEY UPDATE  $st_colunasValores";

        $action = $this->prepare($sql);
        if ($action->execute()) {
            $this->_rowAffected = $action->rowCount();
            $this->_lastId = (isset($array['id']) && $array['id'] > 0) ? $array['id'] : $this->lastInsertId();
            return true;
        } else {
            $this->_errorInfo = $action->errorInfo();
            return false;
        }
    }

    public function deleteHash($hash) {
        $action = $this->prepare("DELETE FROM {$this->_table} WHERE hash_id = '$hash'");
        if ($action->execute()) {
            return $this->_rowAffected = $action->rowCount();
        } else {
            throw new Exception("Houve um erro ao excluir o registro");
            return;
        }
    }

}
