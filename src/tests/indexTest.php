<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{
    private $mockFuncionarios = [
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
        ]
    ];
    public function testUmA(): void
    {
        $result = $this->questaoUmA($this->mockFuncionarios);
        $this->assertEquals(18, $result);
    }

    public function testUmC(): void
    {
        $result = $this->questaoUmC($this->mockFuncionarios);
        $this->assertEquals("2.675,00", $result);
    }

    private function questaoUmA($funcionarios){
        //Exercicio 1)a)
        $count = count($funcionarios);
        $idade = 999;

        for($i = 0; $i < $count; $i++){
            if($idade > $funcionarios[$i]['idade']){
                $nome = $funcionarios[$i]['nome'];
                $idade = $funcionarios[$i]['idade'];
            }
        }
        return $idade;
    }

    private function questaoUmC($funcionarios){
        //Exercicio 1)a)
        $count = count($funcionarios);
        $total = 0.0;
        $media = 0.0;

        for($i = 0; $i < $count; $i++){
        
            $total = $funcionarios[$i]['salario'] + $total;
            
        }

        $media = $total/$count;

        $media = number_format($media,2,",",".");
        return $media;
    }
    
}
