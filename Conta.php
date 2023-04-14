<?php

class Conta
{
   private string $cpfTitular;
   private string $nomeTitular;
   private float $saldo;

   private static $numeroDeContas = 0;

   public function __construct(string $cpf, string $nome){
      $this->saldo = 0;
      $this->cpfTitular = $cpf;
      $this->validaNome($nome);
      $this->nomeTitular = $nome;

      self::$numeroDeContas++;
   }

   private function validaNome(string $nome) :void{
      if(strlen($nome) < 4){
         echo "Nome precisa ter pelo menos 4 caracteres".PHP_EOL;
         exit();
      }
   }

   //php 8 permite criar dentro do construc public readonly string $nomeTitular e abrir mão dos getters

   public function getCpfTitular() :string{
      return $this->cpfTitular;
   }

   public function getNome() :string{
      return $this->nomeTitular;
   }

   public static function getNumeroContas() :int{
      return self::$numeroDeContas;
   }

   public function getSaldo() :string{
      return $this->saldo;
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
};