<?php

class Conta
{
   public string $cpfTitular;
   public string $nomeTitular;
   public float $saldo;

   public function sacar(float $valor) :void{
      if($valor <= $this->saldo){
         $this->saldo -= $valor;
      } else{
         echo "Saldo indisponível".PHP_EOL;;
      }
   }

   public function depositar(float $valor) :void{
      if($valor > 0){
         $this->saldo += $valor;
      } else{
         echo "Depósitos precisam ser de um valor maior que zero".PHP_EOL;;
      }
   }

   public function transferir(float $valor, Conta $conta) :void{
      if($valor > $this->saldo){
         echo "Saldo insuficiente".PHP_EOL;
      } else {
         $this->sacar($valor);
         $conta->depositar($valor);
      }
   } 
};

$conta1 = new Conta();
$conta1->cpfTitular = "123456";
$conta1->nomeTitular = "Fulano";
$conta1->saldo = 800;
$conta1->sacar(800);
$conta1->sacar(3);
$conta1->depositar(236);
$conta1->depositar(-236);

$conta2 = new Conta();
$conta2->cpfTitular = "666666";
$conta2->nomeTitular = "Outri";
$conta2->saldo = 0;

$conta1->transferir(136, $conta2);

var_dump($conta1);
var_dump($conta2);