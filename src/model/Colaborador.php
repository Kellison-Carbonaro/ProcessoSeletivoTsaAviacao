<?php 
require_once "banco/Banco.php";
class Colaborador
{
    public function recuperaColaboradorMaiorSalario()
    {
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT nome
                            FROM colaborador 
                            ORDER BY salario DESC
                            LIMIT 1");
        $sql->execute();    
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
        if($sql->rowCount() >= 1){
            return $resultado;
        }else {
            return "Nenhum colaborador cadastrado";
        }
    }  
    
    public function recuperaColaboradorDataNasc()
    {
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT nome, DATE_FORMAT(data_nascimento, '%d/%m/%Y') AS data
                                    FROM colaborador 
                                    ORDER BY salario DESC");
        $sql->execute();   
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() >= 1){
            return $resultado;
        }else {
            return "Nenhum colaborador cadastrado";
        }
    }
    
    public function recuperaIdadeColaborador()
    {
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) as idade
                                    FROM colaborador 
                                    ORDER BY data_nascimento ASC");
        $sql->execute();  
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() >= 1){
            return $resultado;
        }else {
            return "Nenhum colaborador cadastrado";
        }
    }
    
    public function recuperaColaboradorOrganizacao()
    {
        $banco = new Banco();
        $conexao = $banco->conectar();
        $sql = $conexao->prepare("SELECT C.nome AS nome_funcionario, O.nome AS nome_organizacao
                                    FROM colaborador AS C
                                    JOIN organizacao AS O ON C.organizacao_id = O.id
                                    ORDER BY O.nome, C.nome");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() >= 1){
            return $resultado;
        }else {
            return "Nenhum colaborador cadastrado";
        }
    }




}
