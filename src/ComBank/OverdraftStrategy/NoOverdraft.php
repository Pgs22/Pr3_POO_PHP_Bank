<?php namespace ComBank\OverdraftStrategy;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 12:27 PM
 */

class NoOverdraft 
{
    private const OVERDRAFT_LIMIT = 0.00;

    public function getOverdraftFundsAmount(): float
    {
        return self::OVERDRAFT_LIMIT; // Devuelve 0.00
    }

    public function isGrantOverdraftFunds(float $newBalance): bool
    {
        // NO se concede el descubierto; el saldo debe ser >= 0.00
        return $newBalance >= self::OVERDRAFT_LIMIT;
    }
   
}
