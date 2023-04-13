<?php

class Conta
{
   private string $cpfTitular;
   private string $nomeTitular;
   private float $saldo=0;

   public function setCpfTitular(string $cpf) :void{
      $this->cpfTitular = $cpf;
   }

   public function getCpfTitular() :string{
      return $this->cpfTitular;
   }

   public function setNome(string $nome) :void{
      $this->nomeTitular = $nome;
   }

   public function getNome() :string{
      return $this->nomeTitular;
   }

   public function sacar(float $valor) :void{
      if($valor > $this->saldo){
         echo "Saldo indisponível".PHP_EOL;
         return;
      }
      $this->saldo -= $valor;
   }

   public function depositar(float $valor) :void{
      if($valor > 0){
         $this->saldo += $valor;
         return;
      }
      echo "Depósitos precisam ser de um valor maior que zero".PHP_EOL;
   }

   public function transferir(float $valor, Conta $conta) :void{
      if($valor > $this->saldo){
         echo "Saldo insuficiente".PHP_EOL;
         return;
      }
      $this->sacar($valor);
      $conta->depositar($valor);
   }

   public function getSaldo() :string{
      return $this->saldo;
   }
};