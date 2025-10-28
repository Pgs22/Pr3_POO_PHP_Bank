<?php namespace ComBank\Bank;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/27/24
 * Time: 7:25 PM
 */

use ComBank\Exceptions\BankAccountException;
use ComBank\Exceptions\InvalidArgsException;
use ComBank\Exceptions\ZeroAmountException;
use ComBank\OverdraftStrategy\NoOverdraft;
use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Exceptions\FailedTransactionException;
use ComBank\Exceptions\InvalidOverdraftFundsException;
use ComBank\OverdraftStrategy\Contracts\OverdraftInterface;
use ComBank\Support\Traits\AmountValidationTrait;
use ComBank\Transactions\Contracts\BankTransactionInterface;

class BankAccount implements BankAccountInterface 
{

    private float $balance;
    private string $status;
    private $overdraft;

    public function __construct(float $newBalance = 0.0) {
        $this->balance = $newBalance;
        $this->status = BankAccountInterface::STATUS_OPEN;
    }

    public function getBalance(): float{
        return $this-> balance;
    } 

    public function reopenAccount(): void{
        $this->status = BankAccountInterface::STATUS_OPEN;
    }

    public function closeAccount():void{
        $this->status = BankAccountInterface::STATUS_CLOSED;
    }

    public function isOpen(): bool{
        return $this->status === BankAccountInterface::STATUS_OPEN;
    }     
    
    //Para hacer la transacción a la cuenta.:
    public function transaction(BankTransactionInterface $bankTransaction): void{

        if ($this->isOpen()) {
            $newBalance = $bankTransaction->applyTransaction( $this);
            $this->balance = $newBalance;
        }

    }

    //Limite de saldo negativo (overdraft) para la cuenta: ////Falta configurar
    public function getOverdraft(): OverdraftInterface
    {
        return $this->overdraft;
    }

    //Cambiar el limite de saldo negativo a la cuenta, a no permitido o modificar el limite impuesto 
    public function applyOverdraft(OverdraftInterface $overdraft): void{
        $this->overdraft = $overdraft;
    }

    //Establece un nuevo saldo sin hacer ingresos, transferencias o retirar dinero, solo cambia el saldo
    public function setBalance(float $balance): void{

        
    }
}
