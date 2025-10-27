<?php namespace ComBank\Transactions;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 1:22 PM
 */

use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Exceptions\InvalidOverdraftFundsException;
use ComBank\Transactions\Contracts\BankTransactionInterface;

//Retirar transacción
class WithdrawTransaction extends BaseTransaction implements BankTransactionInterface
{

//Falta comprobar si está en negativo el balance para aceptar o no la retirada   
    public function applyTransaction(BankAccountInterface $bankAccount): float {
        //Suma los valores
        return $bankAccount->getBalance() - $this->amount;        
    }

    public function getTransactionInfo(): string {
        return '';
    }

    public function getAmount(): float {
        return $this->amount; //Usamos la variable de la clase abstracta que hemos extendido en esta clase

    }
}
