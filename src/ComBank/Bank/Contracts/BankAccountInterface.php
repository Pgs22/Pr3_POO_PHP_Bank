<?php namespace ComBank\Bank\Contracts;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/27/24
 * Time: 7:26 PM
 */

use ComBank\Exceptions\BankAccountException;
use ComBank\Exceptions\FailedTransactionException;
use ComBank\OverdraftStrategy\Contracts\OverdraftInterface;
use ComBank\Transactions\Contracts\BankTransactionInterface;

interface BankAccountInterface
{
    const STATUS_OPEN = 'OPEN';
    const STATUS_CLOSED = 'CLOSED';

   
    //Métodos añadidos respecto a la URL Class Diagram

    /**
     * Para hacer la transacción a la cuenta.
     */
    public function transaction(BankTransactionInterface $bankTransaction): void;

    /**
     * Revisa si la cuenta está abierta.
     */
    public function isOpen(): bool;

    /**
     * Reabre una cuenta que fue cerrada.
     */
    public function reopenAccount(): void;

    /**
     * Cierra la cuenta bancaria.
     */
    public function closeAccount(): void;

    /**
     * Obtiene el balance actual de la cuenta.
     */
    public function getBalance(): float;

    /**
     * Obtiene la estrategia de sobregiro (overdraft) actual de la cuenta.
     */
    //public function getOverdraft(): OverdraftInterface;

    /**
     * Aplica una nueva estrategia de sobregiro a la cuenta.
     */
    //public function applyOverdraft(OverdraftInterface $overdraft): void;

    /**
     * Establece un nuevo balance (generalmente usado internamente o en casos específicos).
     */
    public function setBalance(float $balance): void;
    
}
