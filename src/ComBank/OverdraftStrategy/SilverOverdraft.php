<?php namespace ComBank\OverdraftStrategy;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 1:39 PM
 */

/**
 * @description: Grant 100.00 overdraft funds.
 * */
class SilverOverdraft 
{
    private float $overdraftLimit;

    public function __construct(float $limit) 
    {
        $this->overdraftLimit = $limit;
    }

    public function getOverdraftFundsAmount(): float
    {
        return $this->overdraftLimit;
    }

    public function isGrantOverdraftFunds(float $newBalance): bool
    {
        // Se concede el descubierto si el nuevo saldo es >= -100.00
        return $newBalance >= $this->overdraftLimit;
    }

    
}
