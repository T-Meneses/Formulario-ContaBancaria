<?php

class ContaBancaria {
    private $numeroConta;
    private $saldo;
    private $ativo;

    // Construtor
    public function __construct($numeroConta) {
        $this->numeroConta = $numeroConta;
        $this->saldo = 0;
        $this->ativo = true;
        echo "Conta {$this->numeroConta} criada com sucesso.\n";
    }

    // Destrutor
    public function __destruct() {
        echo "Conta {$this->numeroConta} encerrada.\n";
    }

    // Método para depositar
    public function depositar($valor) {
        if ($this->ativo) {
            if ($valor > 0) {
                $this->saldo += $valor;
                echo "Depósito de R$ $valor realizado com sucesso. Saldo atual: R$ {$this->saldo}.\n";
            } else {
                echo "Valor de depósito deve ser positivo.\n";
            }
        } else {
            echo "Conta encerrada. Não é possível depositar.\n";
        }
    }

    // Método para sacar
    public function sacar($valor) {
        if ($this->ativo) {
            if ($valor > 0 && $valor <= $this->saldo) {
                $this->saldo -= $valor;
                echo "Saque de R$ $valor realizado com sucesso. Saldo atual: R$ {$this->saldo}.\n";
            } else {
                echo "Valor de saque inválido ou saldo insuficiente.\n";
            }
        } else {
            echo "Conta encerrada. Não é possível sacar.\n";
        }
    }

    // Método para consultar saldo
    public function consultarSaldo() {
        if ($this->ativo) {
            echo "Saldo atual da conta {$this->numeroConta}: R$ {$this->saldo}.\n";
        } else {
            echo "Conta encerrada. Saldo não disponível.\n";
        }
    }

    // Método para encerrar a conta
    public function encerrar() {
        if ($this->ativo) {
            $this->ativo = false;
            echo "Conta {$this->numeroConta} encerrada com sucesso.\n";
        } else {
            echo "Conta já está encerrada.\n";
        }
    }
}

// Testando a classe
$conta = new ContaBancaria('12345-6');
$conta->depositar(100);
$conta->sacar(50);
$conta->consultarSaldo();
$conta->encerrar();
$conta->sacar(10); // Tentativa de sacar após encerramento
$conta->consultarSaldo(); // Tentativa de consultar saldo após encerramento

?>
