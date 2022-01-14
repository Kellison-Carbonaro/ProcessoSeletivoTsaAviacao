<?php 
class Banco {
    public $msgErro = "";

    public function conectar()
    {
        //Conexão do banco de dados
        global $conexao;
        global $msgErro;
        $nome = "tsa_teste_backend_bd";
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        try {
            $conexao = new PDO("mysql:dbname=" . $nome . "; host=" . $host, $usuario, $senha);
            return $conexao;
        } catch (PDOException $e) {
            return $msgErro = $e->getMessage();
        }
    }
    
}