<?php

/** Singletyon é a centralização de um processo
 * ex: instaciação de banco de dados
 * Created by PhpStorm.
 * User: tairo
 * Date: 15/05/16
 * Time: 22:33
 */
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
                values ('{$produto->nomeProduto}',{$produto->valor},{$produto->id_categoria})";

        DbConn::getInstance()->exec($sql);
    }

    function alterar($id, $produto) {
        $sql = "update...";
        DbConn::getInstance()->exec($sql);
    }

    function excluir(){
        $sql = "delete...";
        DbConn::getInstance()->exec($sql);
    }

    function publicar($id){
        $sql = "select...";
        DbConn::getInstance()->exec($sql);
    }
}