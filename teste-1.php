<?php
 // Passar quantidade,valor, e nome
$produto = new Produto(11,11,'Geladeira'); 
$saida = $produto->CalculaDescontos();
print_r("Nome: ".$saida['nome']."\nTotal: ".$saida['total']. "\nDescontos: ".$saida['desconto']."\nTotal a pagar: ".$saida['total_pagar']);


class Produto {
    private $nome;
    private $valor;
    private $qtd;
    private $regras = array(
        'desconto_1' => '2.0',
        'desconto_2' => '3.0',
        'desconto_3' => '5.0',
        );
    private $desconto;
  
    public  function __construct($qtd, $valor, $nome)
    {
        $this->qtd = $qtd;
        $this->valor = $valor;
        $this->nome = $nome;
     
    }

    public function CalculaDescontos()
    {       
            if($this->qtd <= 5){
                $this->desconto = $this->regras['desconto_1'];
            }else if($this->qtd > 5 && $this->qtd  <= 10 ){
                $this->desconto = $this->regras['desconto_2'];
            }else if($this->qtd > 10){
                $this->desconto = $this->regras['desconto_3'];
            }else{
                return 'Quantidade invalida' ;
            }
           
            $total = $this->valor * $this->qtd;
            $desconto_calculado = $this->desconto / 100.0; 
            $total_pagar = $total - ($desconto_calculado * $total);
            $desconto_valor = $desconto_calculado * $total;

        return   array('nome'=>$this->nome,'total'=>$total,'desconto' => $desconto_valor,'total_pagar'=>$total_pagar);

     
    }
    


}