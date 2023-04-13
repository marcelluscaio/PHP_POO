<?php

class Conta
{
   public string $cpfTitular;
   public string $nomeTitular;
   public float $saldo;

   public function sacar(float $valor){
      if($valor <= $this->saldo){
         $this->saldo -= $valor;
      } else{
         echo "Saldo indisponível";
      }
   }
};

$conta = new Conta();
$conta->cpfTitular = "123456";
$conta->nomeTitular = "Fulano";
$conta->saldo = 800;

$conta->sacar(800);

var_dump($conta);