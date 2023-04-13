<?php

require_once("Conta.php");

$conta1 = new Conta();
$conta1->setCpfTitular("123456");
$conta1->setNome("Fulano");
$conta1->depositar(800);
$conta1->sacar(800);
$conta1->sacar(3);
$conta1->depositar(236);
$conta1->depositar(-236);

$conta2 = new Conta();
$conta2->setCpfTitular("666666");
$conta2->setNome("Outro");
$conta1->transferir(136, $conta2);

var_dump($conta1);
var_dump($conta2);