<?php 

Class Retorno{

    private $nome;
    private $idade;
    private $sexo;

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function getSexo(){
        return $this->sexo;
    }
}

Class Pessoa{
    private $nome;
    private $profissao;

    public function __construct($nome, $profissao)
    {
        $this->nome = $nome;
        $this->profissao = $profissao;
    }

    public function getNomeAndProfissao()
    {
        return $this->nome . ' sua profissão é  ' . $this->profissao;
    }
}

class PessoaFactory
{
    public static function create($nome, $profissao)
    {
        return new Pessoa($nome, $profissao);
    }
}