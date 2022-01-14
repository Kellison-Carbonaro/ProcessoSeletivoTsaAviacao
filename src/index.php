<?php

use PhpParser\Node\Expr\New_;

require_once 'Class/Class.php';
require_once 'Class/Exercicios.php';
require_once 'model/Organizacao.php';
require_once 'model/Colaborador.php';

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
$exercicios = New Exercicios($funcionarios);

echo '<b>Questão 1)a)</b><br><br>';

echo $exercicios->questaoUmA();

echo '<br><br>------------------------------------------------------------------<br><br>';

echo '<b>Questão 1)b)</b><br><br>';

print_r($exercicios->questaoUmB());

echo '<br><br>------------------------------------------------------------------<br><br>';

echo '<b>Questão 1)c)</b><br><br>';

echo $exercicios->questaoUmC();

echo '<br><br>------------------------------------------------------------------<br><br>';

echo '<b>Questão 1)d)</b><br><br>';

$nomes = $exercicios->questaoUmD();
foreach ($nomes as $chave => $valor) {
    echo $valor.'<br>';
 };

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

echo 'Realiza a conferência se a média de salário do array é 2.675,00.<br>';

echo '<br><br>------------------------------------------------------------------<br><br>';

echo '<b>Questão Melhoria do codigo)</b><br><br>';
echo 'Removeria um foreach, pois ele faz um foreach para criar um array com as posiçoes recebidas, depois faz outro foreach para trocar no foreach que
        da class, podendo fazer tudo em um foreach como exemplificado abaixo, economizando processamento.';

echo '<br><br>------------------------------------------------------------------<br><br>';


$organizacaoMdl = new Organizacao();
$colaboradorMdl = new Colaborador();

echo '<b>Banco de dados 1)a)</b><br><br>';

$resultado = $organizacaoMdl->recuperaOrganizacaoAntiga();

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>1)b)</b><br><br>';

$resultado = $colaboradorMdl->recuperaColaboradorMaiorSalario();

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>1)c)</b><br><br>';

$resultado = $colaboradorMdl->recuperaColaboradorDataNasc();

var_dump($resultado);


echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>1)d)</b><br><br>';

$resultado = $colaboradorMdl->recuperaIdadeColaborador();

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>1)e)</b><br><br>';

$resultado = $colaboradorMdl->recuperaColaboradorOrganizacao();

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>2)</b><br><br>';

$resultado = $organizacaoMdl->recuperaOrganizacaoPagaMais();

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>3)</b><br><br>';

$resultado = $organizacaoMdl->recuperaSalarioMedioPorOrganizacao();

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';
echo '<b>4)</b><br><br>';

$resultado = $organizacaoMdl->recuperaOrganizacaoFuncionarioJovem();

var_dump($resultado);

echo '<br><br>------------------------------------------------------------------<br><br>';



?>