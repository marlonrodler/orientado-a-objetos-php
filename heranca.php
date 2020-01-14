<?php

#HERANÇA
//Final -> impede a ser extendida
abstract class Conta//classe só estrutural
{
    protected $agencia;
    protected $conta;
    protected $saldo;

    public function __construct($agencia, $conta, $saldo)
    {
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->conta = $conta;
    }

    public function getDetalhes()
    {
        return "Agencia: {$this->agencia} | Conta: {$this->conta} | Saldo: {$this->saldo}<br />";
    }

    public final function depositar($valor) //NÃO PODE ALTERAR O MÉTODO, SOMENTE USA-LO DEVIDO AO "FINAL"
    {
        $this->saldo += $valor;
        echo "Depósito de: {$valor} | Saldo atual: {$this->saldo}<br />";
    }

    #Exemplo
    //public abstract function saque($valor); FORÇO AS OUTRAS CLASSES QUE ESTENDEREM A UTILIZAR DO MÉTODO
    
}

final class Poupanca extends Conta //não pode ser extendida devido ao "Final"
{
    public function saque($valor)
    {
        if($this->saldo >= $valor):
            $this->saldo -= $valor;
            echo "Saque de: {$valor} | Saldo atual: {$this->saldo}<br />";
        else: 
            echo "Saque não autorizado | Saldo atual: {$this->saldo}<br />";
        endif;
    }
}

final class Corrente extends Conta//não pode ser extendida devido ao "Final"
{
    protected $limite;

    public function __construct($agencia, $conta, $saldo, $limite)
    {
        parent::__construct($agencia, $conta, $saldo);
        $this->limite = $limite;
    }

    public function saque($valor)
    {
        if(($this->saldo + $this->limite) >= $valor):
            $this->saldo -= $valor;
            echo "Saque de: {$valor} | Saldo atual: {$this->saldo}<br />";
        else: 
            echo "Saque não autorizado | Saldo atual: {$this->saldo}<br />";
        endif;
    }
}

$c1 = new Corrente(100, 2586, 5000, 500);
$c1->depositar(1800);
$c1->saque(2500);
$c1->saque(5500);

echo $c1->getDetalhes();