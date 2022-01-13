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
    [
        'nome' => 'Nathan',
        'idade' => 24,
        'organizacao' => '4',
        'salario' => '3999.97',
    ]
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

    if($i == $count-1){
        $media = $total/$count;
    }
    
}
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
$class->setIdade('23');
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
echo 'Inserir uma nova pessoa na lista de funcionarios com o salário com casa decimais para ver se o valor de retorno esta com 2 casa decimais
igual o padrão monetário.<br>';
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
?>