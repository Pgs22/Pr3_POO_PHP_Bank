<?php namespace ComBank\Transactions\Contracts;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/27/24
 * Time: 7:29 PM
 */

use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Exceptions\InvalidOverdraftFundsException;

interface BankTransactionInterface
{
    /**
     * Metodos para la transacción
     */
    //Para hacer una transacción seleccionando la cuenta
    public function applyTransaction(BankAccountInterface $account): float;

    //Texto que detalla la transacción
    public function getTransactionInfo(): string;

    //Para obtener el valor de la transacción.
    public function getAmount(): float;

}
