<?php namespace ComBank\Transactions;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 11:30 AM
 */

use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Transactions\Contracts\BankTransactionInterface;

class DepositTransaction extends BaseTransaction implements BankTransactionInterface
{
    public function __construct(float $amount = 0.0) {
        $this->amount;
    }

    //Para hacer una transacción seleccionando la cuenta
    public function applyTransaction(BankAccountInterface $bankAccount): float {
        //Suma los valores
        return $bankAccount->getBalance() + $this->amount;
    }

    //Texto que detalla la transacción
    public function getTransactionInfo(): string {
        return '';
    }

    //Para obtener el valor de la transacción.
    public function getAmount(): float {
        return $this->amount; //Usamos la variable de la clase abstracta que hemos extendido en esta clase

    }
   
}
