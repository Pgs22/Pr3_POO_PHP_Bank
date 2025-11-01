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
use function PHPUnit\Framework\throwException;

//Retirar transacción
class WithdrawTransaction extends BaseTransaction implements BankTransactionInterface
{

//Esta variable $bankAccount nos sirve como parámetro de entrada para varias clases, lo reutilizamos
    public function applyTransaction(BankAccountInterface $bankAccount): float {
        //Nos dice el saldo actual: $bankAccount->getBalance();
        //Para saber el dinero a retirar: $this->amount;
        //Para calcular el total que quedaría en la cuenta tras la retirada:
        $newBalance = $bankAccount->getBalance() - $this->amount;
        //Si el saldo queda en negativo comprueba si el limite lo permite:
        if(!$bankAccount->getOverdraft()->isGrantOverdraftFunds($newBalance)){
            throw new InvalidOverdraftFundsException(message:'Your withdraw has reach the max overdraft funds.');
        }
        return $newBalance;        
    }

    public function getTransactionInfo(): string {
        return 'WITHDRAW_TRANSACTION';
    }

    public function getAmount(): float {
        return $this->amount; //Usamos la variable de la clase abstracta que hemos extendido en esta clase

    }
}
