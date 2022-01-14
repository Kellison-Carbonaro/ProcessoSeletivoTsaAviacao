<?php 
require_once "banco/Banco.php";
class Organizacao
{
    public function recuperaOrganizacaoAntiga()
    {
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT nome
                                    FROM organizacao
                                    ORDER BY data_fundacao DESC
                                    LIMIT 1");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
        if($sql->rowCount() >= 1){
            return $resultado;
        }else {
            return "Nenhuma organização cadastradaa";
        }
    }  
    
    public function recuperaOrganizacaoPagaMais()
    {
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT MAX(C.salario) AS maior_salario, O.nome AS nome_organizacao
                                    FROM colaborador AS C
                                    JOIN organizacao AS O ON C.organizacao_id = O.id
                                    ORDER BY O.nome, C.nome");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
        if($sql->rowCount() >= 1){
            return $resultado;
        }else {
            return "Nenhuma organização cadastradaa";
        }
    } 

    public function recuperaSalarioMedioPorOrganizacao()
    {
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT O.nome, AVG(salario) 
                                    FROM colaborador 
                                    JOIN organizacao AS O ON organizacao_id = O.id
                                    GROUP BY organizacao_id
                                    ORDER BY O.nome");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
        if($sql->rowCount() >= 1){
            return $resultado;
        }else {
            return "Nenhuma organização cadastradaa";
        }
    }

    public function recuperaOrganizacaoFuncionarioJovem()
    {
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT O.nome, MIN(TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE())) as idade
                                    FROM colaborador
                                    JOIN organizacao AS O ON organizacao_id = O.id
                                    ORDER BY data_nascimento ASC
                                    LIMIT 1");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
        if($sql->rowCount() >= 1){
            return $resultado;
        }else {
            return "Nenhuma organização cadastradaa";
        }
    }

}
