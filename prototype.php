<?php
/** Prototype nada mais é do que clonar um objeto
 * Created by PhpStorm.
 * User: tairo
 * Date: 17/05/16
 * Time: 22:11
 */
class Produto {
    private $id, $nome, $nomeCategoria, $nomeMarca, $limiteVenda, $porcentagemLucro;

    /**
     * Produto constructor.
     * @param $porcentagemLucro
     */
    public function __construct($porcentagemLucro) {
        $this->porcentagemLucro = $porcentagemLucro;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getNomeCategoria() {
        return $this->nomeCategoria;
    }

    /**
     * @param mixed $nomeCategoria
     */
    public function setNomeCategoria($nomeCategoria) {
        $this->nomeCategoria = $nomeCategoria;
    }

    /**
     * @return mixed
     */
    public function getNomeMarca() {
        return $this->nomeMarca;
    }

    /**
     * @param mixed $nomeMarca
     */
    public function setNomeMarca($nomeMarca) {
        $this->nomeMarca = $nomeMarca;
    }

    /**
     * @return mixed
     */
    public function getLimiteVenda() {
        return $this->limiteVenda;
    }

    /**
     * @param mixed $limiteVenda
     */
    public function setLimiteVenda($limiteVenda) {
        $this->limiteVenda = $limiteVenda;
    }

    public function __clone() {
        // TODO: Implement __clone() method.
        $this->id = rand(2,1000);
        $this->nomeCategoria = 'Tenis';
        $this->nomeMarca = 'Nike';
    }
}

$produto = new Produto(5);
$produto->setId(1);
$produto->setNome('Tenis corrida');

$produto2 = clone $produto;


var_dump($produto, $produto2);











