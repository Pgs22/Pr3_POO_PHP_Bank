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
        //Para obtener el objeto balance de la clase BankAccount que nos dice el saldo actual
        $balance = $bankAccount->getBalance();
        //Para saber el dinero a retirar
        $transactionAmount = $this->amount;
        //Para calcular el total que quedaría en la cuenta tras la retirada
        $newBalance = $balance - $transactionAmount;
        //Obtenemos el valor del limite permitido de saldo negativo
        $overdraft = $bankAccount->getOverdraft();

        //Comprobamos si queda en negativo el saldo y si tiene ese limite permitido
        if ($overdraft->isGrantOverdraftFunds($newBalance)){
            //Si se cumple condicion cambiar el saldo de la cuenta restando la retirada 
            $bankAccount->setBalance($newBalance);
            return $newBalance;
        }
        //Resta los valores
        return $bankAccount->getBalance() - $this->amount;        
    }

    public function getTransactionInfo(): string {
        return '';
    }

    public function getAmount(): float {
        return $this->amount; //Usamos la variable de la clase abstracta que hemos extendido en esta clase

    }
}
