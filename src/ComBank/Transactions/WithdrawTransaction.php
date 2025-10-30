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

//Falta comprobar si está en negativo el balance para aceptar o no la retirada   
//Esta variable $bankAccount nos sirve como parámetro de entrada para varias clases, lo reutilizamos
    public function applyTransaction(BankAccountInterface $bankAccount): float {
        $newBalance = $bankAccount->getBalance() - $this->amount;
        if(!$bankAccount->getOverdraft()->isGrantOverdraftFunds($newBalance)){
            throw new InvalidOverdraftFundsException(message:'Your withdraw has reach the max overdraft funds.');
        }
        return $newBalance;
        //Para obtener el objeto balance de la clase BankAccount que nos dice el saldo actual
        //$balance = $bankAccount->getBalance();
        //Para saber el dinero a retirar
        //$transactionAmount = $this->amount;
        //Para calcular el total que quedaría en la cuenta tras la retirada
        //$newBalance = $balance - $transactionAmount;
        //Obtenemos el valor del limite permitido de saldo negativo
        //$overdraftStrategy = $bankAccount->getOverdraft();

        //Comprobamos si queda en negativo el saldo y si tiene ese limite permitido
        /*if ($overdraftStrategy->isGrantOverdraftFunds($newBalance)){
            //Si se cumple condicion cambiar el saldo de la cuenta restando la retirada 
            $bankAccount->setBalance($newBalance);
            return $newBalance;
        }*/
        
    }

    public function getTransactionInfo(): string {
        return '';
    }

    public function getAmount(): float {
        return $this->amount; //Usamos la variable de la clase abstracta que hemos extendido en esta clase

    }
}
