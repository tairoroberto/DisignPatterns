<?php

/**
 * Created by PhpStorm.
 * User: tairo
 * Date: 15/05/16
 * Time: 22:33
 */

class Registry {
    protected static $values;
    static function set($index, $valor){
        static::$values[$index] = $valor;
    }
    static function get($index){
        if(!isset(static::$values[$index])){
            throw new InvalidArgumentException("Não há valor cadastrado com o indíce: {$index}");
        }
        return static::$values[$index];
    }
}

$pdo = new PDO("sqlite:db");
Registry::set('pdo', $pdo);

class Produto {

}

class DbConn {
    protected static $instance;

    private function __construct(){
        $this->conn = new PDO("sqlite:db");
        return $this->conn;
    }

    static function getInstance(){
        if(static::$instance === null){
            static::$instance = new PDO("sqlite:db");
        }
        return static::$instance;
    }
}

class ProdutoDAO {

    function salvar(Produto $produto) {
        $sql = "insert into produto(nome, valor, categoria_id)
                values ('{$produto->nome}',{$produto->valor},{$produto->id_categoria})";

        Registry::get('pdo')->exec($sql);
    }

    function alterar($id, $produto) {
        $sql = "update...";
        Registry::get('pdo')->exec($sql);
    }

    function excluir(){
        $sql = "delete...";
        Registry::get('pdo')->exec($sql);
    }

    function publicar($id){
        $sql = "select...";
        Registry::get('pdo')->exec($sql);
    }
}