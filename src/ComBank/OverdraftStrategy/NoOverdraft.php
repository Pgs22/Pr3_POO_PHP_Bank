<?php namespace ComBank\OverdraftStrategy;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 12:27 PM
 */

use ComBank\OverdraftStrategy\Contracts\OverdraftInterface;

//No permitir sobregiro
class NoOverdraft implements OverdraftInterface
{
    private const OVERDRAFT_LIMIT = 0.00;

    public function getOverdraftFundsAmount(): float
    {
        return self::OVERDRAFT_LIMIT; // Devuelve el limite que siempre será 0.00
    }

    public function isGrantOverdraftFunds(float $newBalance): bool
    {
        // Devuelte un booleano, el saldo debe ser >= 0.00
        return $newBalance >= self::OVERDRAFT_LIMIT;
    }
   
}
