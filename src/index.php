<?php 
require_once 'Class.php';

$funcionarios = [
    [
        'nome' => 'Alessandra',
        'idade' => 18,
        'organizacao' => '1',
        'salario' => '5000'
    ],
    [
        'nome' => 'Leandro',
        'idade' => 25,
        'organizacao' => '3',
        'salario' => '1900',
    ],
    [
        'nome' => 'Bruno',
        'idade' => 23,
        'organizacao' => '1',
        'salario' => '1800',
    ],
    [
        'nome' => 'Gustavo',
        'idade' => 20,
        'organizacao' => '2',
        'salario' => '2000',
    ],
];

$count = count($funcionarios);
$idade = 999;

for($i = 0; $i < $count; $i++){
    if($idade > $funcionarios[$i]['idade']){
        $nome = $funcionarios[$i]['nome'];
        $idade = $funcionarios[$i]['idade'];
    }
}
echo '<b>Questão 1)a)</b><br><br>';
echo 'O funcionário mais jovem é o '. $nome .' com '. $idade . ' anos';
echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>Questão 1)b)</b><br><br>';

$array = [];
for($i = 0; $i < $count; $i++){
    $x = 0;
    if(array_key_exists($funcionarios[$i]['organizacao'], $array))
    {
        $x++;
    }

    $array[$funcionarios[$i]['organizacao']][$x] = $funcionarios[$i]['nome'];   
    
}
print_r($array);
echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>Questão 1)c)</b><br><br>';
$total = 0.0;
$media = 0.0;
for($i = 0; $i < $count; $i++){

    $total = $funcionarios[$i]['salario'] + $total;
    
}

$media = $total/$count;

$media = number_format($media,2,",",".");
echo 'A média salarial entre os '. $count .' funcionário é de R$'.$media;
echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>Questão 1)d)</b><br><br>';
$nomes = [];
for($i = 0; $i < $count; $i++){
    array_push($nomes, $funcionarios[$i]['nome']);
}
asort($nomes);
foreach ($nomes as $chave => $valor) {
    echo $valor.'<br>';
}

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>Questão 3)</b><br><br>';
$class = new Retorno();
$class->setNome('Kellison');
$class->setIdade(23);
$class->setSexo('masculino');

echo 'Meu nome é '.$class->getNome().' tenho '.$class->getIdade().' anos, sou do sexo '.$class->getSexo();

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>Questão 4)</b><br><br>';
//Padrão FACTORY
$pessoaFactory = new PessoaFactory();
$pessoa = $pessoaFactory::create('Kellison', 'Desenvolvedor Web');

print_r($pessoa->getNomeAndProfissao());
echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>Questão 5)</b><br><br>';
echo 'Realiza a conferência do array e verifica se 18 é o menor numero do array.<br>';

echo 'Realiza a conferência do array e verifica se 18 é o menor numero do array.<br>';
//echo 'Inserir uma nova pessoa na lista de funcionarios com o salário com casa decimais para ver se o valor de retorno esta com 2 casa decimais
//igual o padrão monetário.<br>';

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>Questão Melhoria do codigo)</b><br><br>';
echo 'Removeria um foreach, pois ele faz um foreach para criar um array com as posiçoes recebidas, depois faz outro foreach para trocar no foreach que
        da class, podendo fazer tudo em um foreach como exemplificado abaixo, economizando processamento.';
$conhecimentos = [
    "Js",
    "Php",
    "C#",
    "NodeJs",
];
$conhecimentos2 = ["None", "None", "None", "None"];
$c = [];
foreach($conhecimentos as $k => $conhecimento) {
    $conhecimentos2[$k] = $conhecimento;
}

print_r($conhecimentos);echo '<br>';
print_r($conhecimentos2);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>Banco de dados 1)a)</b><br><br>';
    $banco = new Banco();
    $conexao = $banco->conectar();
    $sql = $conexao->prepare("SELECT nome
                                FROM organizacao
                                ORDER BY data_fundacao DESC
                                LIMIT 1");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];       

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>1)b)</b><br><br>';

$banco = new Banco();
$conexao = $banco->conectar();
$sql = $conexao->prepare("SELECT nome
                            FROM colaborador 
                            ORDER BY salario DESC
                            LIMIT 1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];       

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>1)c)</b><br><br>';

$banco = new Banco();
$conexao = $banco->conectar();
$sql = $conexao->prepare("SELECT nome, DATE_FORMAT(data_nascimento, '%d/%m/%Y') AS data
                            FROM colaborador 
                            ORDER BY salario DESC");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);       

print_r($resultado);


echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>1)d)</b><br><br>';

$banco = new Banco();
$conexao = $banco->conectar();
$sql = $conexao->prepare("SELECT TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) as idade
                            FROM colaborador 
                            ORDER BY data_nascimento ASC");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);       

print_r($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>1)e)</b><br><br>';

$banco = new Banco();
$conexao = $banco->conectar();
$sql = $conexao->prepare("SELECT C.nome AS nome_funcionario, O.nome AS nome_organizacao
                            FROM colaborador AS C
                            JOIN organizacao AS O ON C.organizacao_id = O.id
                            ORDER BY O.nome, C.nome");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);       

print_r($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>2)</b><br><br>';

$banco = new Banco();
$conexao = $banco->conectar();
$sql = $conexao->prepare("SELECT MAX(C.salario) AS maior_salario, O.nome AS nome_organizacao
                            FROM colaborador AS C
                            JOIN organizacao AS O ON C.organizacao_id = O.id
                            ORDER BY O.nome, C.nome");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);       

print_r($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>3)</b><br><br>';

$banco = new Banco();
$conexao = $banco->conectar();
$sql = $conexao->prepare("SELECT MAX(C.salario) AS maior_salario, O.nome AS nome_organizacao
                            FROM colaborador AS C
                            JOIN organizacao AS O ON C.organizacao_id = O.id
                            ORDER BY O.nome, C.nome
                            LIMIT 1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];       

print_r($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>4)</b><br><br>';

$banco = new Banco();
$conexao = $banco->conectar();
$sql = $conexao->prepare("SELECT O.nome, AVG(salario) 
                            FROM colaborador 
                            JOIN organizacao AS O ON organizacao_id = O.id
                            GROUP BY organizacao_id
                            ORDER BY O.nome");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);       

print_r($resultado);




echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>5)</b><br><br>';

$banco = new Banco();
$conexao = $banco->conectar();
$sql = $conexao->prepare("SELECT MIN(TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE())) as idade
                            FROM colaborador 
                            ORDER BY data_nascimento ASC
                            LIMIT 1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC)[0];       

print_r($resultado);


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
?>