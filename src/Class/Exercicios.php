<?php
Class Exercicios{

    protected $funcionarios;
    protected $count;

    public function __construct(array $funcionarios) {
        $this->funcionarios = $funcionarios;
        $this->count = count($funcionarios);
    }

    public function questaoUmA(){
        
        $idade = 999;
        
        for($i = 0; $i < $this->count; $i++){
            if($idade >  $this->funcionarios[$i]['idade']){
                $nome =  $this->funcionarios[$i]['nome'];
                $idade =  $this->funcionarios[$i]['idade'];
            }
        }
        return 'O funcionário mais jovem é o '. $nome .' com '. $idade . ' anos';
    }

    public function questaoUmB(){
        $array = [];
        for($i = 0; $i < $this->count; $i++){
            $x = 0;
            if(array_key_exists($this->funcionarios[$i]['organizacao'], $array))
            {
                $x++;
            }

            $array[$this->funcionarios[$i]['organizacao']][$x] = $this->funcionarios    [$i]['nome'];   
    
        }
        return $array;
    }

    public function questaoUmC(){
        $total = 0.0;
        $media = 0.0;
        for($i = 0; $i < $this->count; $i++){        
            $total = $this->funcionarios[$i]['salario'] + $total;
        }
        $media = $total/$this->count;
        $media = number_format($media,2,",",".");

        return 'A média salarial entre os '. $this->count .' funcionário é de R$'.$media;
    }

    public function questaoUmD(){
        $nomes = [];
        for($i = 0; $i < $this->count; $i++){        
            array_push($nomes, $this->funcionarios[$i]['nome']);
        }

        asort($nomes);
        return $nomes;
    }


}